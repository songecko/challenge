<?php

namespace Odiseo\Bundle\ChallengeBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Finder\Finder;
use Odiseo\Bundle\ChallengeBundle\Entity\User;

class LoadUserData extends DataFixture
{
    public function load(ObjectManager $manager)
    {
    	$videos = array(
    		array(
    			'name' => 'Lionel Messi',
    			'videoUrl' => 'https://www.youtube.com/watch?v=4L34ulnGAFk'
    		),
    		array(
    			'name' => 'Cristiano Ronaldo',
    			'videoUrl' => 'https://www.youtube.com/watch?v=S4OsKcwxAXA'
    		)
    	);
    	
    	foreach ($videos as $video)
    	{	
	    	$user = $this->createUser($video);
	    	$manager->persist($user);
    	}
    	
    	$manager->flush();
    }
    
    public function createUser($video)
    {
    	$user = new User();
    	$slufiedName = strtolower(preg_replace('~[^\\pL\d]+~u', '-', $video['name']));
    	$user->setName($video['name']);
    	$user->setVideoUrl($video['videoUrl']);
    	$user->setUsername($slufiedName);
    	$user->setEmail($slufiedName);
    	$user->setPassword('123456');
    	$user->setEnabled(true);
    	$user->setRoles(array('ROLE_USER'));
    	
    	return $user;
    }
    
    public function getOrder()
    {
    	return 1;
    }
}
