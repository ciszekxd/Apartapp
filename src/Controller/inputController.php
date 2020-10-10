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


        //we check given data
        if($form->isSubmitted()){
            //var_dump($input);
            //first we check if given house address is in our database
            $House = $this->getDoctrine()
                ->getRepository(Houses::class)
                ->findBy(['Address' => $input->getHouseAddress()]);

            // if isn't
            if(!$House){
                $message = '... no houses with that address have been found :(';
                return $this->render('submitted.html.twig', ['effect' => $message]);
            }
            //now we should find records of reservations that are in the same time as our
            //and sum the amount of people who will be in the apartment to check if there are any free place

            //we compute date of check out
            $endOfStay = date_add($input->getArrivalDate(),
                date_interval_create_from_date_string($input->getLengthOfVisit().'days'));
            var_dump($endOfStay);

            //get all reservations for chosen apartment
            $Reservations = $this->getDoctrine()
                                ->getRepository(Reservations::class)
                                ->findBy(['Address' => $input->getHouseAddress()]);

            //no reservations for this apartment
            if(!$Reservations){
                $message = 'no other reservations for this apartment';
                //now we need to check if our client didn't make too much reservations
                var_dump($House);
                if($input->getAmountOfPeople() > $House[0]->getFreePlaces()){
                    $message = $message . ', but you were trying to reserve more places that this apartment offers';
                }else{
                    $message = $message . ', and your reservation was added to the database';
                }
                return $this->render('submitted.html.twig', ['effect' => $message]);

            }


            //$Db_response = new DbOpsController();
            //return $Db_response->DbAction($input);
        }

        return $this->render('insides.html.twig',['input_form' => $form->createView()]);
    }



}