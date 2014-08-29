<?php

namespace Odiseo\Bundle\ChallengeBundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function dashboardAction()
    {
        return $this->render('OdiseoChallengeBundle:Backend/Main:dashboard.html.twig');
    }
}
