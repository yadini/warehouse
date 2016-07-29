<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Transference;
use AppBundle\Entity\Cargo;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {   
        // id_admin = administrator's Id logued   
        $id_admin = 1;
        $admin = $this->getDoctrine()->getRepository("AppBundle:Administrator")->find($id_admin);
        $warehouses_origin = $admin->getWarehouses();
        $transporters = $this->getDoctrine()->getRepository("AppBundle:Transporter")->findAll();
        // replace this example code with whatever you need
        return $this->render('AppBundle:Default:index.html.twig',array('transporters' => $transporters,
            'warehouses_origin' => $warehouses_origin
            ));
    }

    /**
     * @Route("/warehouse_destiny/{warehouse_origin_id}")
     */
    public function aAction($warehouse_origin_id){

        $warehouse_origin = $this->getDoctrine()->getRepository("AppBundle:Warehouse")->find($warehouse_origin_id);
        $warehouses_limits = $this->getDoctrine()->getRepository("AppBundle:WarehousesLimit")->findBy(array(
            "warehouse_origin"=>$warehouse_origin));

        $warehouses_destiny = array();

        foreach ($warehouses_limits as $w) {
            $dest = $w->getWarehouseTarget();
            array_push($warehouses_destiny, array(
                "id"=>$dest->getId(), 
                "label"=>$dest->getLabel(),
                "limit"=>$w->getLimits()));
        }

        $json_resp = new JsonResponse();
        $json_resp->setData(array(
            "data"=>$warehouses_destiny,
            ));
        return $json_resp;

    }

    /**
     * @Route("/getpallets/{warehouse_origin_id}")
     */
    public function getPalletsAction($warehouse_origin_id){

        $warehouse_origin = $this->getDoctrine()->getRepository("AppBundle:Warehouse")->find($warehouse_origin_id);

        $pallets = array();

        foreach ($warehouse_origin->getPalletsCurrent() as $pallet) {

            array_push($pallets, array("id"=>$pallet->getId(), "code"=>$pallet->getCode()));

        }

        $json_resp = new JsonResponse();
        $json_resp->setData(array(
            "data"=>$pallets,
            ));
        return $json_resp;


    }


    /**
     * @Route("/maketransference")
     */
    public function makeTransferenceAction(Request $request){
        
        $info = $request->getContent();

        $content = json_decode($info, true);

        $transporter_id = $content['transporter'];
        $transporter = $this->getDoctrine()->getRepository("AppBundle:Transporter")->find($transporter_id);

        $warehouse_origin_id = $content['origin'];
        $warehouse_origin = $this->getDoctrine()->getRepository("AppBundle:Warehouse")->find($warehouse_origin_id);


        $warehouse_destiny_id = $content['destiny'];
        $warehouse_destiny = $this->getDoctrine()->getRepository("AppBundle:Warehouse")->find($warehouse_destiny_id);

        $data = $content['data'];


        $status_in_transit = $this->getDoctrine()->getRepository("AppBundle:Status")->findOneBy(array("label"=>"in-transit"));

        $transference = new Transference();
        $transference->setTransporter($transporter);
        $transference->setWarehouseOrigin($warehouse_origin);
        $transference->setWarehouseDestiny($warehouse_destiny);
        $transference->setTransferenceValue($content['transference_value']);
        $transference->setDate(new \DateTime());

        $this->getDoctrine()->getManager()->persist($transference);
        $this->getDoctrine()->getManager()->flush();

        $t_id = $transference->getId();

        foreach ($data as $key => $item) {
            
            if($item['confirmed'] == 1){
            $pallet_id = $item['pallet'];
            $pallet = $this->getDoctrine()->getRepository("AppBundle:Pallet")->find(intval($pallet_id));

            $master_id = $item['master'];
            $imei_id = $item['imei'];

            if($master_id == -1){
                foreach ($pallet->getMasters() as $master) {
                    if($master->getStatus()->getLabel() == "in-stock"){

                        foreach ($master->getImeis() as $imei) {
                            if($imei->getStatus()->getLabel() == "in-stock"){
                                $c = new Cargo();
                                $c->setTransference($transference);
                                $c->setPallet($pallet);
                                $c->setMaster($master);
                                $c->setImei($imei);
                                $this->getDoctrine()->getManager()->persist($c);
                                $this->getDoctrine()->getManager()->flush();

                                $imei->setWarehouseDestiny($warehouse_destiny);
                                $imei->setStatus($status_in_transit);

                                $this->getDoctrine()->getManager()->persist($imei);
                                $this->getDoctrine()->getManager()->flush();

                            }
                        }
                    }
                    
                }
            }
            elseif($imei_id == -1){


                        foreach ($master->getImeis() as $imei) {
                            if($imei->getStatus()->getLabel() == "in-stock"){
                                $c = new Cargo();
                                $c->setTransference($transference);
                                $c->setPallet($pallet);
                                $c->setMaster($master);
                                $c->setImei($imei);
                                $this->getDoctrine()->getManager()->persist($c);
                                $this->getDoctrine()->getManager()->flush();

                                $imei->setWarehouseDestiny($warehouse_destiny);
                                $imei->setStatus($status_in_transit);

                                $this->getDoctrine()->getManager()->persist($imei);
                                $this->getDoctrine()->getManager()->flush();

                            }
                        }

            }
            else{

                $imei = $this->getDoctrine()->getRepository("AppBundle:Imei")->find($imei_id);
                $master = $imei->getMaster();

                if($imei->getStatus()->getLabel() == "in-stock"){
                                $c = new Cargo();
                                $c->setTransference($transference);
                                $c->setPallet($pallet);
                                $c->setMaster($master);
                                $c->setImei($imei);
                                $this->getDoctrine()->getManager()->persist($c);
                                $this->getDoctrine()->getManager()->flush();

                                $imei->setWarehouseDestiny($warehouse_destiny);
                                $imei->setStatus($status_in_transit);

                                $this->getDoctrine()->getManager()->persist($imei);
                                $this->getDoctrine()->getManager()->flush();

                            }

            }
        }
        }

        $json_resp = new JsonResponse();
        $json_resp->setData(array("result"=>1));
        return $json_resp;

    }



    /**
     * @Route("/getmasters/{pallet_id}")
     */
    public function getMastersAction($pallet_id){

        $pallet = $this->getDoctrine()->getRepository("AppBundle:Pallet")->find($pallet_id);

        $masters = array();

        foreach ($pallet->getMasters() as $master) {

            if($master->getStatus()->getLabel() == 'in-stock')
                array_push($masters, array("id"=>$master->getId(), "code"=>$master->getCode()));

        }

        $json_resp = new JsonResponse();
        $json_resp->setData(array(
            "data"=>$masters,
            ));
        return $json_resp;


    }

    /**
     * @Route("/getimeis/{master_id}")
     */
    public function getImeisAction($master_id){

        $master = $this->getDoctrine()->getRepository("AppBundle:master")->find($master_id);

        $imeis = array();

        foreach ($master->getImeis() as $imei) {
            if($imei->getStatus()->getLabel() == 'in-stock')
                array_push($imeis, array("id"=>$imei->getId(), "code"=>$imei->getCode()));

        }

        $json_resp = new JsonResponse();
        $json_resp->setData(array(
            "data"=>$imeis,
            ));
        return $json_resp;

    }


    /**
     * @Route("/gettransferencevalue")
     */
    public function getTransferenceValueAction(Request $request){

        $params = array();

        $content = $request->getContent();
        $transference_value = 0;

        if (!empty($content))
        {
            $params = json_decode($content, true);
            

            foreach ($params as $rowid => $status) {
                
                $pallet_id = $status['pallet'];

                if($pallet_id != -1){

                        $pallet = $this->getDoctrine()->getRepository("AppBundle:Pallet")->find($pallet_id);

                        $master_id = $status['master'];
                        $imei_id = $status['imei'];     

                        if($master_id == -1 && $imei_id == -1){

                            foreach ($pallet->getMasters() as $master) {

                                foreach ($master->getImeis() as $imei) {
                                    $transference_value += $imei->getProduct()->getUnitaryPrice();
                                }

                            }

                        }

                        elseif($master_id != -1 && $imei_id == -1){

                            $master = $this->getDoctrine()->getRepository("AppBundle:Master")->find($master_id);

                            foreach ($master->getImeis() as $imei) {
                                    $transference_value += $imei->getProduct()->getUnitaryPrice();
                                }

                        }

                        elseif ($imei_id != -1) {
                                        $imei = $this->getDoctrine()->getRepository("AppBundle:Imei")->find($imei_id);
                                       $transference_value += $imei->getProduct()->getUnitaryPrice();
                                   }           
                }
            }
        }

        $json_resp = new JsonResponse();
        $json_resp->setData(array("value"=> $transference_value));
        return $json_resp;

    }



}
