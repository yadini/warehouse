transporter = -1;
w_origin_dd = -1;
w_destiny_dd = -1;
warehouses_destiny = -1;
warehouse_destiny_dom_elments = [];
limits = {};
current_limit = 0;
elements_row_current_id = 0;
transference_value = 0;

data = {0:{'pallet':-1, 'master':-1, 'imei': -1, 'confirmed': 0}};
whole_pallets = [];
whole_masters = [];
imeis = [];

$(document).on('click', "#submitbtn", function() {

    if(transporter == -1 || w_origin_dd == -1 || warehouses_destiny == -1){
         alert("Some fields are not correct.");
    }
    else if(transference_value > current_limit){

        alert("Limit exceeded.");

    }
    else{
        json_obj = {'transporter': transporter, 'origin': w_origin_dd, 'destiny': w_destiny_dd, 'data': data, 'transference_value': transference_value};

        $.ajax({
                    type: 'post',
                    url: 'maketransference',
                    data: JSON.stringify(json_obj),
                    contentType: "application/json; charset=utf-8",
                    traditional: true,
                    success: function (_data) {

                        alert("Transference done.");
                        setTimeout(function(){ location.reload(); }, 1500);

                    }
                });

    }

});

function updateTransferenceValue(){

    $.ajax({
                    type: 'post',
                    url: 'gettransferencevalue',
                    data: JSON.stringify(data),
                    contentType: "application/json; charset=utf-8",
                    traditional: true,
                    success: function (_data) {

                        $("#transference_value label").text("Transference value: " + parseFloat(_data['value']));
                        transference_value = parseFloat(_data['value']);

                    }
                });

}

$("#transporter_dd .dropdown-menu li a").click(function(){

	transporter = parseInt($(this).attr('id'));

});

$(document).on('click', ".dropdown-menu li a",function() {


    dropdown_el = $(this).parent().parent().parent();
    head = dropdown_el.find("[data-toggle='dropdown']");
    head.text($(this).text());

});


$("#w_origin_dd .dropdown-menu li a").click(function(){

    this_el_warehouse_id = $(this).attr('id');
	if(this_el_warehouse_id != w_origin_dd){

                w_origin_dd = this_el_warehouse_id;

                	$.ajax({
                        url: "warehouse_destiny/" + w_origin_dd,
                        success: function(data)
                        {
                            $("#w_destiny_dd .dropdown-menu").remove();
                            $("#w_destiny_dd").append("<ul class='dropdown-menu'></ul>");
                            
                            w_destiny_dropdown = $("#w_destiny_dd");            
                            head = w_destiny_dropdown.find("[data-toggle='dropdown']");
                            head.text("Select ");
                            head.append('<span class="caret"></span>');


                            	warehouses_destiny = data['data'];
                            	for (i = 0; i < warehouses_destiny.length; i++) {
                            		warehouse_dest_id = warehouses_destiny[i]['id'];
                            		warehouse_dest_label= warehouses_destiny[i]['label'];
                            		li = "<li><a id='"+ warehouse_dest_id +"'>" + warehouse_dest_label + "</a></li>";
                            		$("#w_destiny_dd .dropdown-menu").append(li);
                            		limits[warehouse_dest_id] = warehouses_destiny[i]['limit'];

                            	}

                     	}});


             while(elements_row_current_id != 0){

                $("[class='row'][id='" + elements_row_current_id  + "']").remove();
                elements_row_current_id --;

             }

             data = {0:{'pallet': -1, 'imei':-1, 'master':-1, 'confirmed': 0}};
             whole_masters = []
             whole_pallets = []
             imeis = [];
             $("#transference_value label").text("Transference value: 0");             

             $("#pallet_sel [data-toggle='dropdown']").removeClass("disabled");
             $("#master_sel [data-toggle='dropdown']").removeClass("disabled");
             $("#imei_sel [data-toggle='dropdown']").removeClass("disabled");
             $("#addbtn").removeClass("disabled");

             $.ajax({
                        url: "getpallets/" + w_origin_dd,
                        success: function(data)
                        {
                            id = "pallets_dropdownmenu_elements_row_" + elements_row_current_id;
                            dropdown_menu_selector = "#" + id;

                    
                            parent = $(dropdown_menu_selector).parent();
                            $(dropdown_menu_selector).remove();
                            parent.append("<ul class='dropdown-menu' id='"+ id +"'></ul>");
           
                            head = parent.find("[data-toggle='dropdown']");
                            head.text("Select ");
                            head.append('<span class="caret"></span>');

                            master_dropdown = $("[class='row'][id='" + elements_row_current_id + "'] #master_sel");
                            head = master_dropdown.find("[data-toggle='dropdown']");
                            head.text("Select ");
                            head.append('<span class="caret"></span>');

                            imei_dropdown = $("[class='row'][id='" + elements_row_current_id + "'] #imei_sel");
                            head = imei_dropdown.find("[data-toggle='dropdown']");
                            head.text("Select ");
                            head.append('<span class="caret"></span>');

                                pallets = data['data'];
                                for (i = 0; i < pallets.length; i++) {
                                    pallet_id = pallets[i]['id'];
                                    pallet_label= pallets[i]['code'];
                                    li = "<li><a id='"+ pallet_id +"'>" + pallet_label + "</a></li>";
                                    $(dropdown_menu_selector).append(li);

                                }



                        }});
        }

});


$(document).on('click', '#pallet_sel .dropdown-menu li a',function() {



		current_row_id = parseInt($(this).parent().parent().parent().parent().parent().attr('id'));        
        pallet_id = $(this).attr('id');
        _this = $(this);

        if(pallet_id != data[current_row_id]['pallet']){   

                

        		$.ajax({
                url: "getmasters/" + pallet_id,
                success: function(_data)
                {
                    id = "masters_dropdownmenu_elements_row_" + elements_row_current_id;
                    selector = "#" + id;
                    parent = $(selector).parent();
                    $(selector).remove();
                    parent.append("<ul class='dropdown-menu' id='" + id +"'></ul>");

                        masters_availabel = false;
                    	masters = _data['data'];
                    	for (i = 0; i < masters.length; i++) {
                    		master_id = masters[i]['id'];

                            if(whole_masters.indexOf(master_id) == -1){
                                masters_availabel = true;
                        		master_label= masters[i]['code'];
                        		li = "<li><a id='"+ master_id +"'>" + master_label + "</a></li>";
                        		$(selector).append(li);

                            }

                    	}

                    if(!masters_availabel){

                        alert("This pallet was fully selected already");

                        dropdown_el = _this.parent().parent().parent();
                        head = dropdown_el.find("[data-toggle='dropdown']");
                        head.text("Select ");
                        head.append('<span class="caret"></span>');

                    }
                    else{

                        data[current_row_id]['pallet'] = parseInt(pallet_id);
                        data[current_row_id]['master'] = -1;
                        data[current_row_id]['imei'] = -1;


                        master_dropdown = $("[class='row'][id='" + elements_row_current_id + "'] #master_sel");
                        head = master_dropdown.find("[data-toggle='dropdown']");
                        head.text("Select ");
                        head.append('<span class="caret"></span>');

                        imei_dropdown = $("[class='row'][id='" + elements_row_current_id + "'] #imei_sel");
                        head = imei_dropdown.find("[data-toggle='dropdown']");
                        head.text("Select ");
                        head.append('<span class="caret"></span>');

                    }



             	}});

                
    }


});


$(document).on('click', '#master_sel .dropdown-menu li a',function() {

        current_row_id = parseInt($(this).parent().parent().parent().parent().parent().attr('id'));  
        master_id = $(this).attr('id');
        _this = $(this);


         if(master_id != data[current_row_id]['master']){

            
            
            imeis_availabel = false
           

            $.ajax({
            url: "getimeis/" + master_id,
            success: function(_data)
            {
                id = "imeis_dropdownmenu_elements_row_" + current_row_id;
                selector = "#" + id;
                parent = $(selector).parent();
                $(selector).remove();
                parent.append("<ul class='dropdown-menu' id='" + id +"'></ul>");


                    imeis_from_server = _data['data'];
                    for (i = 0; i < imeis_from_server.length; i++) {
                        imei_id = imeis_from_server[i]['id'];

                        if(imeis.indexOf(imei_id) == -1){
                                imeis_availabel = true;
                                imei_label= imeis_from_server[i]['code'];
                                li = "<li><a id='"+ imei_id +"'>" + imei_label + "</a></li>";
                                $(selector).append(li);
                        }

                    }

                    if(!imeis_availabel){

                        alert("This master was fully selected already");

                        dropdown_el = _this.parent().parent().parent();
                        head = dropdown_el.find("[data-toggle='dropdown']");
                        head.text("Select ");
                        head.append('<span class="caret"></span>');

                    }
                    else{

                         // updateTransferenceValue();
                        data[current_row_id]['master'] = parseInt(master_id);
                        data[current_row_id]['imei'] = -1;


                        imei_dropdown = $("[class='row'][id='" + elements_row_current_id + "'] #imei_sel");
                        head = imei_dropdown.find("[data-toggle='dropdown']");
                        head.text("Select ");
                        head.append('<span class="caret"></span>');

                    }


            }});        
    }
});


$(document).on('click', '#imei_sel .dropdown-menu li a',function() {

        current_row_id = parseInt($(this).parent().parent().parent().parent().parent().attr('id'));  
        imei_id = $(this).attr('id');

        if(data[current_row_id]['imei'] != imei_id)
            data[current_row_id]['imei'] = parseInt(imei_id);


	});

$(document).on('click', '#delbtn',function() {


    row_id = parseInt($(this).parent().parent().attr('id'));
    current_row_status = data[row_id];

    alert("Row id: " + row_id);
    alert("Count: " + elements_row_current_id);

    if(current_row_status['pallet'] != -1){

            if(row_id == elements_row_current_id){

                if(elements_row_current_id == 0){
                    data = {0:{'pallet': -1, 'imei':-1, 'master':-1, 'confirmed': 0}};
                    whole_masters = [];
                    whole_pallets = [];
                    imeis = [];
                }

                $.ajax({
                url: "getpallets/" + w_origin_dd,
                success: function(_data)
                {
                    id = "pallets_dropdownmenu_elements_row_" + row_id;
                    dropdown_menu_selector = "#" + id;

                    parent = $(dropdown_menu_selector).parent();
                    $(dropdown_menu_selector).remove();
                    parent.append("<ul class='dropdown-menu' id='"+ id +"'></ul>");


                    pallet_dropdown = $("[class='row'][id='" + row_id + "'] #pallet_sel");
                    head = pallet_dropdown.find("[data-toggle='dropdown']");
                    head.text("Select ");
                    head.append('<span class="caret"></span>');

                    id = "masters_dropdownmenu_elements_row_" + row_id;
                    selector = "#" + id;
                    parent = $(selector).parent();
                    $(selector).remove();
                    parent.append("<ul class='dropdown-menu' id='" + id +"'></ul>");

                    id = "imeis_dropdownmenu_elements_row_" + row_id;
                    selector = "#" + id;
                    parent = $(selector).parent();
                    $(selector).remove();
                    parent.append("<ul class='dropdown-menu' id='" + id +"'></ul>");
   
                    head = parent.find("[data-toggle='dropdown']");
                    head.text("Select ");
                    head.append('<span class="caret"></span>');

                    master_dropdown = $("[class='row'][id='" + row_id + "'] #master_sel");
                    head = master_dropdown.find("[data-toggle='dropdown']");
                    head.text("Select ");
                    head.append('<span class="caret"></span>');

                    imei_dropdown = $("[class='row'][id='" + row_id + "'] #imei_sel");
                    head = imei_dropdown.find("[data-toggle='dropdown']");
                    head.text("Select ");
                    head.append('<span class="caret"></span>');

                    pallets = _data['data'];
                    for (i = 0; i < pallets.length; i++) {

                        pallet_id = pallets[i]['id'];

                            if(whole_pallets.indexOf(pallet_id) == -1){

                            pallet_label= pallets[i]['code'];
                            li = "<li><a id='"+ pallet_id +"'>" + pallet_label + "</a></li>";
                            $(dropdown_menu_selector).append(li);
                        }

                    }

                }});
            }
            else{
                    alert("Whole pallets antes: " + whole_pallets);
                    alert("Whole masters antes: " + whole_masters);
                    alert("Whole imeis antes: " + imeis);

                    if(current_row_status['pallet'] != -1 && current_row_status['master'] == -1){

                            index_of_this_pallet = whole_pallets.indexOf(current_row_status['pallet']);
                            whole_pallets.splice(index_of_this_pallet, 1);
                            alert("Whole pallets: " + whole_pallets);

                        }

                        else if(current_row_status['imei'] == -1){
                            index_of_this_master = whole_masters.indexOf(current_row_status['master']);
                            whole_masters.splice(index_of_this_master, 1);
                            alert("Whole masters: " + whole_masters);
                        }

                        else{

                            index_of_this_imei = whole_masters.indexOf(current_row_status['imei']);
                            imeis.splice(index_of_this_imei, 1);    
                            alert("Whole imeis: " + imeis);            
                        }
                        

                    $('[class="row"][id="' + row_id + '"]').remove();

                    alert("data antes " + Object.keys(data));

                    delete data[row_id];

                    alert('data despues ' + Object.keys(data));
                    updateTransferenceValue();
                    elements_row_current_id --;
            }
           
        }

});

$(document).on('click', '#addbtn',function() {


    row_id = parseInt($(this).parent().parent().attr('id'));
    current_row_status = data[row_id];

    if(current_row_status['pallet'] == -1)
        alert("Please select some item.");

    else{   
                updateTransferenceValue();

                data[row_id]['confirmed'] = 1;

                if(current_row_status['pallet'] != -1 && current_row_status['master'] == -1)
                    whole_pallets.push(current_row_status['pallet']);

                else if(current_row_status['imei'] == -1)
                    whole_masters.push(current_row_status['master']);

                else
                    imeis.push(current_row_status['imei']);

                $("[class='row'][id='" + row_id + "'] #pallet_sel [data-toggle='dropdown']").addClass("disabled");
                $("[class='row'][id='" + row_id + "'] #master_sel [data-toggle='dropdown']").addClass("disabled");
                $("[class='row'][id='" + row_id + "'] #imei_sel [data-toggle='dropdown']").addClass("disabled");
                $("[class='row'][id='" + row_id + "'] #addbtn").addClass("disabled");

                elements_row_current_id += 1;
                data[elements_row_current_id] = {'pallet':-1, 'master': -1, 'imei': -1, 'confirmed': 0};

                elements_row_el = '<div class="row" id="' + elements_row_current_id + '">'
                                + '   <div class="col-md-2">'
                                + '          <span><b>Pallet:</b></span>'
                                + '          <div class="dropdown" id="pallet_sel">'
                                + '              <a class="btn dropdown-toggle" data-toggle="dropdown">'
                                + '                  Select'
                                + '                <span class="caret"></span>'
                                + '              </a>'
                                + '              <ul class="dropdown-menu" id="pallets_dropdownmenu_elements_row_' + elements_row_current_id +'">'
                                + '              </ul>'
                                + '          </div>'
                                + '    </div>'
                                + '    <div class="col-md-2">'
                                + '          <span><b>Master:</b></span>'
                                + '          <div class="dropdown" id="master_sel">'
                                + '              <a class="btn dropdown-toggle" data-toggle="dropdown">'
                                + '                Select'
                                + '                <span class="caret"></span>'
                                + '              </a>'
                                + '              <ul class="dropdown-menu" id="masters_dropdownmenu_elements_row_'+ elements_row_current_id + '"">'
                                + '              </ul>'
                                + '          </div>'
                                + '    </div>'
                                + '    <div class="col-md-2">'
                                + '          <span><b>Imei:</b></span>'
                                + '          <div class="dropdown" id="imei_sel">'
                                + '              <a class="btn dropdown-toggle" data-toggle="dropdown">'
                                + '                Select'
                                + '                <span class="caret"></span>'
                                + '              </a>'
                                + '              <ul class="dropdown-menu" id="imeis_dropdownmenu_elements_row_' + elements_row_current_id + '">'
                                + '              </ul>'
                                + '          </div>'
                                + '    </div>'
                                + '    <div class="col-md-2 col-md-offset-2">'
                                + '      <br>'
                                + '      <button type="button" class="btn btn-primary" id="addbtn">Add</button>'
                                + '      <button style="display:inline" class="btn btn-primary" type="button" id="delbtn">Del</button>'
                                + '    </div>'
                                + ' </div>';

                $(this).parent().parent().parent().append(elements_row_el);

                $.ajax({
                        url: "getpallets/" + w_origin_dd,
                        success: function(data)
                        {
                            id = "pallets_dropdownmenu_elements_row_" + elements_row_current_id;
                            dropdown_menu_selector = "#" + id;

                    
                            parent = $(dropdown_menu_selector).parent();
                            $(dropdown_menu_selector).remove();
                            parent.append("<ul class='dropdown-menu' id='"+ id +"'></ul>");
           
                            head = parent.find("[data-toggle='dropdown']");
                            head.text("Select ");
                            head.append('<span class="caret"></span>');

                            master_dropdown = $("[class='row'][id='" + elements_row_current_id + "'] #master_sel");
                            head = master_dropdown.find("[data-toggle='dropdown']");
                            head.text("Select ");
                            head.append('<span class="caret"></span>');

                            imei_dropdown = $("[class='row'][id='" + elements_row_current_id + "'] #imei_sel");
                            head = imei_dropdown.find("[data-toggle='dropdown']");
                            head.text("Select ");
                            head.append('<span class="caret"></span>');

                                pallets = data['data'];
                                for (i = 0; i < pallets.length; i++) {

                                    pallet_id = pallets[i]['id'];

                                        if(whole_pallets.indexOf(pallet_id) == -1){

                                        pallet_label= pallets[i]['code'];
                                        li = "<li><a id='"+ pallet_id +"'>" + pallet_label + "</a></li>";
                                        $(dropdown_menu_selector).append(li);
                                    }

                                }



                        }});

                // str = "";

                //  for (i = 0; i < elements_row_current_id; i++) {
                //     str += "Data: " + i + "\n";
                //     str += "\t Pallet: " + data[i]['pallet'] + "\n";
                //     str += "\t Master: " + data[i]['master'] + "\n";
                //     str += "\t Imei: " + data[i]['imei'] + "\n";
                // }

                // alert(str);
	}
	
});

$(document).on('click', '#w_destiny_dd .dropdown-menu li a',function() {
    current_limit = limits[parseInt($(this).attr('id'))];
	$("#transference_limit label").text("Transference Limit: " + parseInt(current_limit));
    w_destiny_dd = parseInt($(this).attr('id'));

}); 