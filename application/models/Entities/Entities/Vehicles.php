<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicles
 *
 * @ORM\Table(name="VEHICLES", indexes={@ORM\Index(name="ve_pa", columns={"parking_id"}), @ORM\Index(name="ve_ty", columns={"vehicle_types_id"}), @ORM\Index(name="ve_br", columns={"vehicle_brands_id"}), @ORM\Index(name="customer_id", columns={"customer_id"})})
 * @ORM\Entity
 */
class Vehicles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="license_plate", type="string", length=35, precision=0, scale=0, nullable=true, unique=false)
     */
    private $licensePlate;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=35, precision=0, scale=0, nullable=true, unique=false)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="vin", type="string", length=25, precision=0, scale=0, nullable=true, unique=false)
     */
    private $vin;

    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=25, precision=0, scale=0, nullable=true, unique=false)
     */
    private $color;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="discharge_date", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dischargeDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="discharge_date_code", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dischargeDateCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="up_date", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $upDate;

    /**
     * @var \Entities\Customers
     *
     * @ORM\ManyToOne(targetEntity="Entities\Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $customer;

    /**
     * @var \Entities\VehicleBrands
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Entities\VehicleBrands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vehicle_brands_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $vehicleBrands;

    /**
     * @var \Entities\Parking
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Entities\Parking")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parking_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $parking;

    /**
     * @var \Entities\VehicleTypes
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Entities\VehicleTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vehicle_types_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $vehicleTypes;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Vehicles
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set licensePlate
     *
     * @param string $licensePlate
     *
     * @return Vehicles
     */
    public function setLicensePlate($licensePlate)
    {
        $this->licensePlate = $licensePlate;

        return $this;
    }

    /**
     * Get licensePlate
     *
     * @return string
     */
    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Vehicles
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set vin
     *
     * @param string $vin
     *
     * @return Vehicles
     */
    public function setVin($vin)
    {
        $this->vin = $vin;

        return $this;
    }

    /**
     * Get vin
     *
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Vehicles
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Vehicles
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set dischargeDate
     *
     * @param \DateTime $dischargeDate
     *
     * @return Vehicles
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
     * @return Vehicles
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
     * @return Vehicles
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
     * Set customer
     *
     * @param \Entities\Customers $customer
     *
     * @return Vehicles
     */
    public function setCustomer(\Entities\Customers $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Entities\Customers
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set vehicleBrands
     *
     * @param \Entities\VehicleBrands $vehicleBrands
     *
     * @return Vehicles
     */
    public function setVehicleBrands(\Entities\VehicleBrands $vehicleBrands)
    {
        $this->vehicleBrands = $vehicleBrands;

        return $this;
    }

    /**
     * Get vehicleBrands
     *
     * @return \Entities\VehicleBrands
     */
    public function getVehicleBrands()
    {
        return $this->vehicleBrands;
    }

    /**
     * Set parking
     *
     * @param \Entities\Parking $parking
     *
     * @return Vehicles
     */
    public function setParking(\Entities\Parking $parking)
    {
        $this->parking = $parking;

        return $this;
    }

    /**
     * Get parking
     *
     * @return \Entities\Parking
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * Set vehicleTypes
     *
     * @param \Entities\VehicleTypes $vehicleTypes
     *
     * @return Vehicles
     */
    public function setVehicleTypes(\Entities\VehicleTypes $vehicleTypes)
    {
        $this->vehicleTypes = $vehicleTypes;

        return $this;
    }

    /**
     * Get vehicleTypes
     *
     * @return \Entities\VehicleTypes
     */
    public function getVehicleTypes()
    {
        return $this->vehicleTypes;
    }
}

