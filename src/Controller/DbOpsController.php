<?php

namespace App\Controller;

use App\Entity\Output;
use App\Entity\Reservations;
use App\Form\TwoButtonsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\InputForm;
use App\Controller\inputController;

class DbOpsController extends AbstractController
{
    /**
     * @Route("/addtodb", name="AddToDb")
     */
    public function DbAction(Request $request, SessionInterface $session){

        //prevent unwanted user to get here
        if(!$session->has('input')){
            return $this->redirectToRoute('index');
        }

        //creates buttons to decide what to do with reservation
        $TwoButtons = $this->createForm(TwoButtonsType::class);

        $message = $session->get('message');

        $TwoButtons->handleRequest($request);

        //if we click go back button we come back to the first form
        if($TwoButtons->get('cancel')->isClicked()){
            return $this->redirectToRoute('index');
        }
        //if we decide to add reservation to db, we start doctrine entity manager,
        // and set variables for output reservation
        if($TwoButtons->get('addtodatabase')->isClicked()){
            $em = $this->getDoctrine()->getManager();

            $nReservation = new Reservations();
            $input = $session->get('input');

            $nReservation->setAddress($input->getHouseAddress());
            $nReservation->setRentedFrom($session->get('arrivalDate'));
            $nReservation->setRentedTo($session->get('endOfStay'));
            $nReservation->setReservedPlaces($input->getAmountOfPeople());


            $em->persist($nReservation);

            $em->flush();

            //we clear session to prevent repeating adding stored object to db
            $session->clear();

            return $this->redirectToRoute('index');
        }

        return $this->render('insides.html.twig', ['message' => $message, 'input_form' => $TwoButtons->createView()]);
    }

}
