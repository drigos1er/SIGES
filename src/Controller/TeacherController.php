<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{

    /**
     * Choice  Teacher Action
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dashboardteacher()
    {
        return $this->render('teacher/dashboardteacher.html.twig', [
            'controller_name' => 'TeacherController',
        ]);
    }


    /**
     * Dashboard Average Teacher
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function averagedashteacher()
    {

        $teacher= $this->getUser();
        return $this->render('teacher/averagedashteacher.html.twig', [
            'current_menu' => 'averagedashteacher',
        ]);
    }


    /**
     * Entry
     * @return Response
     */
    public function averagingAction()
    {
        return  $this->render('teacher/teachereculist.html.twig', array('current_menu'=>'teachereculist'));
    }

}
