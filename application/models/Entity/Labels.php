<?php
namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="Labels")
 */
class Labels
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
    protected $labelname;

    /**
     * @ManyToOne(targetEntity="Registrationuser", inversedBy="$user_labelid")
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
     * Set labelname.
     *
     * @param string $labelname
     *
     * @return Labels
     */
    public function setLabelname($labelname)
    {
        $this->labelname = $labelname;

        return $this;
    }

    /**
     * Get labelname.
     *
     * @return string
     */
    public function getLabelname()
    {
        return $this->labelname;
    }
}
