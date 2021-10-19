<?php

namespace App\Controller;

use App\Form\TableChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\VarDumper\Cloner\Data;

/**
* @Route("/table", name="table")
*/
class TableController extends AbstractController
{
    /**
    * @Route("/select", name="table_select")
    */
    public function select(Request $request){
        $form = $this->createForm(TableChoiceType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $data = $form->getData();
            $n = $data['table_number'];
            $m = $data['line_count'];
            $color = $data['color'];
            $response = $this->render('table/index.html.twig', [
                'controller_name' => 'TableControleur',
                'n' => $n,
                'm' => $m,
                'color' => $color,
            ]);
        } else {
            $response = $this->render('table/vue.html.twig', [
                'formulaire' => $form->createView(),
            ]);
        return $response;
        }
        

        return $this->render('table/vue.html.twig', [
            'formulaire' => $form->createView(),
        ]);
    }

    public function index(): Response
    {
        return $this->render('table/index.html.twig', [
            'controller_name' => 'TableController',
        ]);
    }

    /**
     * @Route("table/print/{nbr}/{ind}", name="table_print")
     */
    public function index2(int $nbr, int $ind, Request $request): Response
    {
        $color = $request->get('color');
        return $this->render('table/index.html.twig', [
            'controller_name' => 'Table de '. $nbr . ' ',
            'table_number' => $nbr, 
            'line_count' => $ind,
            'color' => $color,
        ]);
    }



}
