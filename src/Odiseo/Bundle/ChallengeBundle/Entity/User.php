<?php

namespace Odiseo\Bundle\ChallengeBundle\Entity;

use DateTime;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * User
 */
class User extends BaseUser
{
    protected $name;
    protected $videoUrl;
    protected $thumbnail;
    protected $challengedBy;
    protected $challenges;
    
    protected $createdAt;
    protected $updatedAt;
    
    public function __construct()
    {
    	parent::__construct();
    	
    	$this->createdAt = new DateTime('now');
    	$this->challenges = new ArrayCollection();
    }
    
    public function setName($name) 
    {
    	$this->name = $name;
    	
    	$this->setUsername($name);
    	$this->setEmail($name);
    	$this->setPassword('123456');
    	
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
    
    public function setThumbnail($thumbnail)
    {
    	$this->thumbnail = $thumbnail;
    	 
    	return $this;
    }
    
    public function getThumbnail()
    {
    	return $this->thumbnail;
    }
    
    public function setChallengedBy($user)
    {
    	$this->challengedBy = $user;
    
    	return $this;
    }
    
    public function getChallengedBy()
    {
    	return $this->challengedBy;
    }
    
	public function setChallenges(Collection $challenges)
	{
		$this->challenges = $challenges;
	
		return $this;
	}
	
	public function getChallenges()
	{
		return $this->challenges;
	}
	
	public function clearChallenges()
	{
		$this->challenges->clear();
	
		return $this;
	}
	
	public function countChallenges()
	{
		return $this->challenges->count();
	}
	
	public function addChallenge(User $user)
	{
		if ($this->hasChallenge($user)) {
			return $this;
		}
	
		$user->setChallengedBy($this);
		$this->challenges->add($user);
	
		return $this;
	}
	
	public function removeChallenge(User $user)
	{
		if ($this->hasChallenge($user)) {
			$user->setChallengedBy(null);
			$this->challenges->removeElement($user);
		}
	
		return $this;
	}

	public function hasChallenge(User $user)
	{
		return $this->challenges->contains($user);
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
    
    public function getDate()
    {
    	return $this->getCreatedAt()->format('Y-m-d H:i:s');	
    }
    
    public function __toString()
    {
    	return $this->getCanonicalName();
    }
}