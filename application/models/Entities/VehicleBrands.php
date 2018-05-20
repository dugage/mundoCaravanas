<?php


namespace Entities;

/**
 * VehicleBrands
 *
 * @Table(name="VEHICLE_BRANDS")
 * @Entity
 */
class VehicleBrands
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
     * @Column(name="name", type="string", length=25, precision=0, scale=0, nullable=true, unique=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @Column(name="discharge_date", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dischargeDate;

    /**
     * @var integer
     *
     * @Column(name="discharge_date_code", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dischargeDateCode;

    /**
     * @var \DateTime
     *
     * @Column(name="up_date", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $upDate;

    /**
     * @var boolean
     *
     * @Column(name="state", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $state = 1;

    public function __construct()
    {
        $this->dischargeDate = new \DateTime("now");
        $this->dischargeDateCode = date("Y-m-d");
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
     * Set name
     *
     * @param string $name
     *
     * @return VehicleBrands
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

    /**
     * Set dischargeDate
     *
     * @param \DateTime $dischargeDate
     *
     * @return VehicleBrands
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
     * Set dischargeDateCode
     *
     * @param integer $dischargeDateCode
     *
     * @return VehicleBrands
     */
    public function setDischargeDateCode($dischargeDateCode)
    {
        $this->dischargeDateCode = $dischargeDateCode;

        return $this;
    }

    /**
     * Get dischargeDateCode
     *
     * @return integer
     */
    public function getDischargeDateCode()
    {
        return $this->dischargeDateCode;
    }

    /**
     * Set upDate
     *
     * @param \DateTime $upDate
     *
     * @return VehicleBrands
     */
    public function setUpDate($upDate)
    {
        $this->upDate = $upDate;

        return $this;
    }

    /**
     * Get upDate
     *
     * @return \DateTime
     */
    public function getUpDate()
    {
        return $this->upDate;
    }

    /**
     * Set state
     *
     * @param boolean $state
     *
     * @return VehicleBrands
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return boolean
     */
    public function getState()
    {
        return $this->state;
    }
}

