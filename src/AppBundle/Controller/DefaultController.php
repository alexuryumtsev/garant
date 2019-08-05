<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $price = 0;
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('AppBundle:Category')->findAll();
        foreach ($data as $name)
        {
            $price = $name->name;
        }

        if($price == null or ''){
            $price = 0;
        }

//        $price = 2562;

        $proba999 = $price;
        $proba958 = floor($price/1.042);
        $proba916 = floor($price/1.09);
        $proba900 = floor($price/1.11);
        $proba850 = floor($price/1.175);
        $proba750 = floor($price/1.332);
        $proba585 = floor($price/1.708);
        $proba500 = floor($price/1.998);
        $proba375 = floor($price/2.664);


        $proba375_2 = floor($proba375*1.005);
        $proba500_2 = floor($proba500*1.005);
        $proba585_2 = floor($proba585*1.005);
        $proba750_2 = floor($proba750*1.005);
        $proba850_2 = floor($proba850*1.005);
        $proba900_2 = floor($proba900*1.005);
        $proba916_2 = floor($proba916*1.005);
        $proba958_2 = floor($proba958*1.005);
        $proba999_2 = floor($proba999*1.005);



        $comments = $em->getRepository('AppBundle:Comments')->findBy(array('status' => 1));

        // replace this example code with whatever you need
        return $this->render('index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'proba999'  => $proba999,
            'proba958'  => $proba958,
            'proba916'  => $proba916,
            'proba900'  => $proba900,
            'proba850'  => $proba850,
            'proba750'  => $proba750,
            'proba585'  => $proba585,
            'proba500'  => $proba500,
            'proba375'  => $proba375,

            'proba375_2' => $proba375_2,
            'proba500_2' => $proba500_2,
            'proba585_2' => $proba585_2,
            'proba750_2' => $proba750_2,
            'proba850_2'  => $proba850_2,
            'proba900_2'  => $proba900_2,
            'proba916_2'  => $proba916_2,
            'proba958_2'  => $proba958_2,
            'proba999_2'  => $proba999_2,
            'comment'   => $comments,
        ]);
    }

    /**
     * @Route("/rules", name="rules")
     */
    public function rulesAction(){
        return $this->render('rules.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
