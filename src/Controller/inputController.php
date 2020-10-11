<?php
namespace App\Controller;

use App\Entity\Houses;
use App\Entity\InputForm;

use App\Entity\Reservations;
use App\Form\inputFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class inputController extends AbstractController
{

    /**
     * @Route("/", name = "index")
     */

    //this function handle input and decides if it could be flushed to database of reservations
    public Function inputPageLoading(Request $request, SessionInterface $session){
        $input = new inputForm();

        $form = $this->createForm(inputFormType::class, $input);

        $form->handleRequest($request);

        //we check given data
        if($form->isSubmitted() && $form->isValid()){

            //first we check if given house address is in our database
            $House = $this->getDoctrine()
                ->getRepository(Houses::class)
                ->findBy(['Address' => $input->getHouseAddress()]);

            // if isn't
            if(!$House){
                $message = '... no houses with that address have been found :(';
                return $this->render('submitted.html.twig', ['effect' => $message]);
            }

            //we are cloning our arrival date to avoid altering it by mistake, caused by some sticky pointer
            $dateBefore = clone($input->getArrivalDate());
            //we computing the date of checkout
            $endOfStay = date_add($input->getArrivalDate(),
                date_interval_create_from_date_string($input->getLengthOfVisit().'days'));


            //we get all reservations for chosen apartment from db
            $Reservations = $this->getDoctrine()
                                ->getRepository(Reservations::class)
                                ->findBy(['Address' => $input->getHouseAddress()]);

            //then we count how many places will be occupied during the time period we gave to the system
            $occupiedPlaces = 0;
            foreach ($Reservations as $temp){
                if (($temp->getRentedTo() >= $input->getArrivalDate()) && ($endOfStay >= $temp->getRentedFrom())){

                    $occupiedPlaces += $temp->getReservedPlaces();
                }
            }

            //and we will tell user how many places of all are reserved
            $message = 'we see that ' . $occupiedPlaces . ' of ' . $House[0]->getPlaces() . ' places are already reserved';


            //now we check if amount of accessible places is less than amount of places that we want to reserve
            //if it is then we cant accept that reservation, if not we can add reservation to database, but first
            if($House[0]->getPlaces() - $occupiedPlaces < $input->getAmountOfPeople()){
                $message = $message . ' but you can\'t make that reservation, because there are not enough places in the apartment';
                return $this->render('submitted.html.twig', ['effect' => $message]);
            }else{
                $cost = $House[0]->getPrice()*$input->getLengthOfVisit();
                //we subtract discount if reservation is at least week long
                if($input->getLengthOfVisit() >= 7){
                    $cost -= $cost * $House[0]->getDiscount()/100;
                }
                // we generate message that tells user how much he will need to pay
                $message = $message . ' so your reservation can be added to the database and will cost you '. $cost . ' zloty';
            }

            //we load variables and objects, that we will send to database, to session
            $session->set('message', $message);
            $session->set('input', $input);
            $session->set('arrivalDate',$dateBefore);
            $session->set('endOfStay',$endOfStay);

            //we redirect user to db controller
            return $this->redirectToRoute('AddToDb');
        }

        //that's what is loaded before clicking reserve button
        return $this->render('insides.html.twig',['input_form' => $form->createView(), 'message' => 'hello my friend :D']);
    }



}