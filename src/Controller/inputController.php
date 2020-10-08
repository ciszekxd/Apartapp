<?php
namespace App\Controller;

use App\Entity\InputForm;

use App\Form\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class inputController extends AbstractController
{
    /**
     * @Route("/")
     */
    public Function inputPageLoading(Request $request){
        $input = new inputForm();

        $form = $this->createForm(FormType::class, $input);


        return $this->render('insides.html.twig',['input_form' => $form->createView()]);
    }
}