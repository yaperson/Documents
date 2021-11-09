<?php

namespace App\Controller;

use App\Form\TableChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Table;
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
            dump("submit");
            $data = $form->getData();
            $nbr = $data['table_number'];
            $ind = $data['line_count'];
            $color = $data['color'];

            $table = new Table($nbr);
            $calculations = $table->calculMultiply($ind);

            $response = $this->render('table/index.html.twig', [
                'controller_name' => 'TableControleur',
                'nbr' => $nbr,
                'calculations' => $calculations,
                'color' => $color,
            ]);
        } else {
            dump("not submit");            
            $response = $this->render('table/vue.html.twig', [
                'formulaire' => $form->createView(),
            ]);            
        }        

        return $response;
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
