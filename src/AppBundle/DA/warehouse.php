<?php
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class warehouse extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function getWarehouses (){
    	$warehouses = $this->getDoctrine()->getRepository("AppBundle:Warehouse")->findAll();
    }
}