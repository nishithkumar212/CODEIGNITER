<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="Notesuser")
 */
class Notesuser
{
    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=32, unique=true, nullable=false)
     */
    protected $title;

    /**
     * @Column(type="string", length=32  )
     */
    protected $description;

    /**
     * @Column(type="string", length=32 )
     */
    protected $emailid;

    /**
     * @Column(type="string", length=32 )
     */
    protected $reminder;

    /**
     * @Column(type="integer", length=32)
     */
    protected $archive;

    /**
     * @Column(type="string", length=32)
     */
    protected  $color;


    /**
     * @Column(type="integer", length=32)
     */
    protected $unactive;


    /**
     * @Column(type="string", length=32)
     */
    protected $notesimage;
    

    /**
     * @ManyToOne(targetEntity="Registrationuser", inversedBy="user_id")
     * @JoinColumn(name="id", referencedColumnName="id")
     */
    protected  $user_id;
    












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
     * Set title.
     *
     * @param string $title
     *
     * @return Notesuser
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Notesuser
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set emailid.
     *
     * @param string $emailid
     *
     * @return Notesuser
     */
    public function setEmailid($emailid)
    {
        $this->emailid = $emailid;

        return $this;
    }

    /**
     * Get emailid.
     *
     * @return string
     */
    public function getEmailid()
    {
        return $this->emailid;
    }

    /**
     * Set reminder.
     *
     * @param string $reminder
     *
     * @return Notesuser
     */
    public function setReminder($reminder)
    {
        $this->reminder = $reminder;

        return $this;
    }

    /**
     * Get reminder.
     *
     * @return string
     */
    public function getReminder()
    {
        return $this->reminder;
    }

    /**
     * Set archive.
     *
     * @param int $archive
     *
     * @return Notesuser
     */
    public function setArchive($archive)
    {
        $this->archive = $archive;

        return $this;
    }

    /**
     * Get archive.
     *
     * @return int
     */
    public function getArchive()
    {
        return $this->archive;
    }

    /**
     * Set color.
     *
     * @param string $color
     *
     * @return Notesuser
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color.
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set unactive.
     *
     * @param int $unactive
     *
     * @return Notesuser
     */
    public function setUnactive($unactive)
    {
        $this->unactive = $unactive;

        return $this;
    }

    /**
     * Get unactive.
     *
     * @return int
     */
    public function getUnactive()
    {
        return $this->unactive;
    }

    /**
     * Set notesimage.
     *
     * @param string $notesimage
     *
     * @return Notesuser
     */
    public function setNotesimage($notesimage)
    {
        $this->notesimage = $notesimage;

        return $this;
    }

    /**
     * Get notesimage.
     *
     * @return string
     */
    public function getNotesimage()
    {
        return $this->notesimage;
    }
}
