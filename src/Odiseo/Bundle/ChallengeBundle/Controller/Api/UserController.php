<?php

namespace Odiseo\Bundle\ChallengeBundle\Controller\Api;

use FOS\RestBundle\Controller\FOSRestController;
use Odiseo\Bundle\ChallengeBundle\Entity\User;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\Route;

class UserController extends FOSRestController
{
	/**
	 * Get the user information by id.
	 *
	 * @Route(requirements={"id"="\d+"})
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
	
	/**
	 * Search users.
	 * 
	 * @QueryParam(name="name", description="Name of user")
	 * @ApiDoc(
	 *  resource=true,
	 *  description="Search users."
	 * )
	 */
	public function searchAction()
	{
		$name = $this->getRequest()->get('name');
		$data = $this->get('odiseo_challenge.repository.user')->createQueryBuilder('u')
			->where('u.name LIKE :name')
			->setParameter('name', '%'.$name.'%')
			->getQuery()
			->getResult()
		;
	
		return $this->handleView($this->view($data, 200));
	}
}
