<?php

namespace Entities;;

/**
 * Attachments
 *
 * @Table(name="ATTACHMENTS")
 * @Entity
 */
class Attachments
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="table_attachment", type="string", length=25, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tableAttachment;

    /**
     * @var integer
     *
     * @Column(name="row_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $rowId;

    /**
     * @var \DateTime
     *
     * @Column(name="discharge_date", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dischargeDate;

    /**
     * @var string
     *
     * @Column(name="attached", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $attached;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    public function __construct()
    {
        $this->dischargeDate = new \DateTime("now");
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
     * Set tableAttachment
     *
     * @param string $tableAttachment
     *
     * @return Attachments
     */
    public function setTableAttachment($tableAttachment)
    {
        $this->tableAttachment = $tableAttachment;

        return $this;
    }

    /**
     * Get tableAttachment
     *
     * @return string
     */
    public function getTableAttachment()
    {
        return $this->tableAttachment;
    }

    /**
     * Set rowId
     *
     * @param integer $rowId
     *
     * @return Attachments
     */
    public function setRowId($rowId)
    {
        $this->rowId = $rowId;

        return $this;
    }

    /**
     * Get rowId
     *
     * @return integer
     */
    public function getRowId()
    {
        return $this->rowId;
    }

    /**
     * Set dischargeDate
     *
     * @param \DateTime $dischargeDate
     *
     * @return Attachments
     */
    public function setDischargeDate($dischargeDate)
    {
        $this->dischargeDate = $dischargeDate;

        return $this;
    }

    /**
     * Get dischargeDate
     *
     * @return \DateTime
     */
    public function getDischargeDate()
    {
        return $this->dischargeDate;
    }

    /**
     * Set attached
     *
     * @param string $attached
     *
     * @return Attachments
     */
    public function setAttached($attached)
    {
        $this->attached = $attached;

        return $this;
    }

    /**
     * Get attached
     *
     * @return string
     */
    public function getAttached()
    {
        return $this->attached;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Attachments
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

