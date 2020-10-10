<?php

namespace App\Controller;

use App\Entity\Reservations;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\InputForm;

class DbOpsController
{
    /**
     * @Route("/reserved", name="reserved")
     */
    public function DbAction(InputForm $input){
        $House = $this->getDoctrine()
            ->getRepository(Reservations::class)
            ->findAll();
        var_dump($House[1]);
        var_dump($input);


        return $this->render('submitted.html.twig');
    }

}
