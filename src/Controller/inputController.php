<?php
namespace App\Controller;

use App\Entity\Houses;
use App\Entity\InputForm;

use App\Entity\Reservations;
use App\Form\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class inputController extends AbstractController
{

    /**
     * @Route("/", name = "index")
     */
    public Function inputPageLoading(Request $request){
        $input = new inputForm();

        $form = $this->createForm(FormType::class, $input);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            //var_dump($input);
            //die();
            return $this->redirectToRoute('reserved');
        }

        return $this->render('insides.html.twig',['input_form' => $form->createView()]);
    }

    /**
     * @Route("/reserved", name="reserved")
     */
    public function redirected(){
        $House = $this->getDoctrine()
            ->getRepository(Reservations::class)
            ->findAll();
        var_dump($House[1]);



        return $this->render('submitted.html.twig');
    }


}