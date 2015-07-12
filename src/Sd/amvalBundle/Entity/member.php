<?php
namespace Sd\amvalBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/** 
 * @ORM\Entity
 */
class member
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
    private $birthdate;

    /** 
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /** 
     * @ORM\Column(type="string", nullable=true)
     */
    private $address;

    /** 
     * @ORM\Column(type="string", nullable=true)
     */
    private $phone;

    /** 
     * @ORM\Column(type="blob", nullable=true)
     */
    private $pic;

    /** 
     * @ORM\OneToMany(targetEntity="message", mappedBy="member")
     */
    private $messages;

    /** 
     * @ORM\ManyToOne(targetEntity="manager", inversedBy="members")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id", nullable=false)
     */
    private $manager;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return member
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
     * @return member
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
     * Set birthdate
     *
     * @param string $birthdate
     * @return member
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    
        return $this;
    }

    /**
     * Get birthdate
     *
     * @return string 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return member
     */
    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return member
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
     * Set phone
     *
     * @param string $phone
     * @return member
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set pic
     *
     * @param string $pic
     * @return member
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
     * Add messages
     *
     * @param \Sd\amvalBundle\Entity\message $messages
     * @return member
     */
    public function addMessage(\Sd\amvalBundle\Entity\message $messages)
    {
        $this->messages[] = $messages;
    
        return $this;
    }

    /**
     * Remove messages
     *
     * @param \Sd\amvalBundle\Entity\message $messages
     */
    public function removeMessage(\Sd\amvalBundle\Entity\message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Set manager
     *
     * @param \Sd\amvalBundle\Entity\manager $manager
     * @return member
     */
    public function setManager(\Sd\amvalBundle\Entity\manager $manager)
    {
        $this->manager = $manager;
    
        return $this;
    }

    /**
     * Get manager
     *
     * @return \Sd\amvalBundle\Entity\manager 
     */
    public function getManager()
    {
        return $this->manager;
    }
}