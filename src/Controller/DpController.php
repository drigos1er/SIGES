<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DpController extends AbstractController
{
    /**
     * Choice  PEDAGORES Action
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dashboardsupdp()
    {
        return $this->render('dp/dashboardsupdp.html.twig', [
            'controller_name' => 'DpController',
        ]);
    }
}
