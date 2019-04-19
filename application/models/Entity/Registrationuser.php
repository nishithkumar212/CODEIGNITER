<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="registrationuser")
 */
class Registrationuser
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=32)
     */
    protected $firstname;

    /**
     * @Column(type="string")
     */
    protected $lastname;

   

    /**
     * @Column(type="string", length=255)
     */
    protected $email;

    /**
     * @Column(type="string", length=255)
     */
    protected $password;


    /**
     * @Column(type="string", length=255)
     */
    protected $confirmpassword;

   

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname.
     *
     * @param string $firstname
     *
     * @return Registrationuser
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname.
     *
     * @param string $lastname
     *
     * @return Registrationuser
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

  
    /**
     * Set email.
     *
     * @param string $email
     *
     * @return Registrationuser
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return Registrationuser
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

   

    /**
     * Set confirmpassword.
     *
     * @param string $confirmpassword
     *
     * @return Registrationuser
     */
    public function setConfirmpassword($confirmpassword)
    {
        $this->confirmpassword = $confirmpassword;

        return $this;
    }

    /**
     * Get confirmpassword.
     *
     * @return string
     */
    public function getConfirmpassword()
    {
        return $this->confirmpassword;
    }

  
    /**
    * @OneToMany(targetEntity="Notesuser", mappedBy="user_id")
    */
    protected $user_id;


    /**
     *@OneToMany(targetEntity="Labels",mappedBy="user_id") 
     */
    protected $user_labelid;



    public function __construct() {
        $this->user_id = new ArrayCollection();
        $this->user_labelid=new ArrayCollection();
    }

    /**
     * Add userId.
     *
     * @param \Entity\Notesuser $userId
     *
     * @return Registrationuser
     */
    public function addUserId(\Entity\Notesuser $userId)
    {
        $this->user_id[] = $userId;

        return $this;
    }

    /**
     * Remove userId.
     *
     * @param \Entity\Notesuser $userId
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUserId(\Entity\Notesuser $userId)
    {
        return $this->user_id->removeElement($userId);
    }

    /**
     * Get userId.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
