<?php

namespace Odiseo\Bundle\ChallengeBundle\Controller\Api;

use FOS\RestBundle\Controller\FOSRestController;

class UserController extends FOSRestController
{
    public function getAction($id)
    {
        return $this->get('odiseo_challenge.repository.user')->find($id);
    }
}
