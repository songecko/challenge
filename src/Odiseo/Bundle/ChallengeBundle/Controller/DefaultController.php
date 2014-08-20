<?php

namespace Odiseo\Bundle\ChallengeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OdiseoChallengeBundle:Default:index.html.twig', array('name' => $name));
    }
}
