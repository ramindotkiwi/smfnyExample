<?php
namespace Sd\amvalBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class manager
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", nullable=true)
     */
    private $fn;

    /** 
     * @ORM\Column(type="string", nullable=true)
     */
    private $ln;

    /** 
     * @ORM\Column(type="string", nullable=true)
     */
    private $codemelli;

    /** 
     * @ORM\Column(type="string", nullable=true)
     */
    private $address;

    /** 
     * @ORM\Column(type="blob", nullable=true)
     */
    private $pic;

    /** 
     * @ORM\OneToMany(targetEntity="member", mappedBy="manager")
     */
    private $members;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->members = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fn
     *
     * @param string $fn
     * @return manager
     */
    public function setFn($fn)
    {
        $this->fn = $fn;
    
        return $this;
    }

    /**
     * Get fn
     *
     * @return string 
     */
    public function getFn()
    {
        return $this->fn;
    }

    /**
     * Set ln
     *
     * @param string $ln
     * @return manager
     */
    public function setLn($ln)
    {
        $this->ln = $ln;
    
        return $this;
    }

    /**
     * Get ln
     *
     * @return string 
     */
    public function getLn()
    {
        return $this->ln;
    }

    /**
     * Set codemelli
     *
     * @param string $codemelli
     * @return manager
     */
    public function setCodemelli($codemelli)
    {
        $this->codemelli = $codemelli;
    
        return $this;
    }

    /**
     * Get codemelli
     *
     * @return string 
     */
    public function getCodemelli()
    {
        return $this->codemelli;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return manager
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set pic
     *
     * @param string $pic
     * @return manager
     */
    public function setPic($pic)
    {
        $this->pic = $pic;
    
        return $this;
    }

    /**
     * Get pic
     *
     * @return string 
     */
    public function getPic()
    {
        return $this->pic;
    }

    /**
     * Add members
     *
     * @param \Sd\amvalBundle\Entity\member $members
     * @return manager
     */
    public function addMember(\Sd\amvalBundle\Entity\member $members)
    {
        $this->members[] = $members;
    
        return $this;
    }

    /**
     * Remove members
     *
     * @param \Sd\amvalBundle\Entity\member $members
     */
    public function removeMember(\Sd\amvalBundle\Entity\member $members)
    {
        $this->members->removeElement($members);
    }

    /**
     * Get members
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMembers()
    {
        return $this->members;
    }
    public function __toString(){

        return $this->getFn().' '.$this->getLn();
    }
}