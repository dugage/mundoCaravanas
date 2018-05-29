<?php

namespace Entities;

/**
 * Parking
 *
 * @Table(name="PARKING")
 * @Entity(repositoryClass="Repositories\ParkingRepositorio")
 */
class Parking
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
     * @var integer
     *
     * @Column(name="vehicle_id", type="integer", nullable=true)
     */
    private $vehicleId;

    /**
     * @var integer
     *
     * @Column(name="number", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $number;

    /**
     * @var \DateTime
     *
     * @Column(name="discharge_date", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dischargeDate;

    /**
     * @var string
     *
     * @Column(name="discharge_date_code", type="string", length=8, precision=0, scale=0, nullable=true, unique=false)
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
    private $state;

    public function __construct()
    {
        $this->dischargeDate = new \DateTime("now");
        $this->dischargeDateCode = date("Ymd");
        $this->upDate = new \DateTime("now");
        $this->vehicleId = 0;
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
     * Set vehicleId
     *
     * @param integer $vehicleId
     *
     * @return Parking
     */
    public function setVehicleid($vehicleId)
    {
        $this->vehicleId = $vehicleId;

        return $this;
    }

    /**
     * Get vehicleId
     *
     * @return integer
     */
    public function getVehicleid()
    {
        return $this->vehicleId;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Parking
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set dischargeDate
     *
     * @param \DateTime $dischargeDate
     *
     * @return Parking
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
     * @param string $dischargeDateCode
     *
     * @return Parking
     */
    public function setDischargeDateCode($dischargeDateCode)
    {
        $this->dischargeDateCode = $dischargeDateCode;

        return $this;
    }

    /**
     * Get dischargeDateCode
     *
     * @return string
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
     * @return Parking
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
     * @return Parking
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

