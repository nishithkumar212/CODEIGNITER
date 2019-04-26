<?php
namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity
 * @Table(name="Labels" )
 */
class Labels
{
    /**
     * @Id
     * @column(type="integer" ,nullable=false)
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @column(type="string" ,nullable=false)
     */
    protected $labelname;

    /**
     * @column(type="integer" ,nullable=false)
     */
    protected $uid;

    /**
     * Set id.
     *
     * @param int $id
     *
     * @return Labels
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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

    /**
     * Set uid.
     *
     * @param int $uid
     *
     * @return Labels
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid.
     *
     * @return int
     */
    public function getUid()
    {
        return $this->uid;
    }
}
