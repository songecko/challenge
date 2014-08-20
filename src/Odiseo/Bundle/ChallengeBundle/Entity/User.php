<?php

namespace Odiseo\Bundle\ChallengeBundle\Entity;

use DateTime;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 */
class User extends BaseUser
{
    protected $id;
    
    protected $name;
    protected $videoUrl;
    
    protected $createdAt;
    protected $updatedAt;
    
    public function __construct()
    {
    	parent::__construct();
    	$this->createdAt = new DateTime('now');
    }
    
    public function setName($name) 
    {
    	$this->name = $name;
    	
    	return $this;
    }
    
    public function getName() 
    {
    	return $this->name;
    }
    
    public function setVideoUrl($videoUrl)
    {
    	$this->videoUrl = $videoUrl;
    	 
    	return $this;
    }
    
    public function getVideoUrl()
    {
    	return $this->videoUrl;
    }
    
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    
    
    /** Functional methods **/ 
    
    public function getCanonicalName()
    {
    	return $this->getName()?$this->getName():$this->getUsername();
    }
    
    public function __toString()
    {
    	return $this->getCanonicalName();
    }
}