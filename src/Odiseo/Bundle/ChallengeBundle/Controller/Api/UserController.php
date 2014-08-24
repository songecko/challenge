<?php

namespace Odiseo\Bundle\ChallengeBundle\Controller\Api;

use FOS\RestBundle\Controller\FOSRestController;
use Odiseo\Bundle\ChallengeBundle\Entity\User;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class UserController extends FOSRestController
{
	/**
	 * Get the user information by id.
	 *
	 * @ApiDoc(
	 *  resource=true,
	 *  description="Get the user information."
	 * )
	 */
	public function getAction($id)
	{
		$data = $this->get('odiseo_challenge.repository.user')->find($id);
		
		return $this->handleView($this->view($data, 200));
	}
}
