<?php

namespace Entities;

/**
 * Vehicles
 *
 * @Table(name="VEHICLES", indexes={@Index(name="customer_id", columns={"customer_id"}), @Index(name="parking_id", columns={"parking_id"}), @Index(name="vehicle_types_id", columns={"vehicle_types_id"}), @Index(name="vehicle_brands_id", columns={"vehicle_brands_id"})})
 * @Entity
 */
class Vehicles
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
     * @Column(name="license_plate", type="string", length=35, precision=0, scale=0, nullable=true, unique=false)
     */
    private $licensePlate;

    /**
     * @var string
     *
     * @Column(name="model", type="string", length=35, precision=0, scale=0, nullable=true, unique=false)
     */
    private $model;

    /**
     * @var string
     *
     * @Column(name="vin", type="string", length=25, precision=0, scale=0, nullable=true, unique=false)
     */
    private $vin;

    /**
     * @var integer
     *
     * @Column(name="year", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $year;

    /**
     * @var string
     *
     * @Column(name="color", type="string", length=25, precision=0, scale=0, nullable=true, unique=false)
     */
    private $color;

    /**
     * @var \DateTime
     *
     * @Column(name="discharge_date", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dischargeDate;

    /**
     * @var integer
     *
     * @Column(name="discharge_date_code", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dischargeDateCode;

    /**
     * @var \DateTime
     *
     * @Column(name="up_date", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $upDate;

    /**
     * @var \Parking
     *
     * @ManyToOne(targetEntity="Parking")
     * @JoinColumns({
     *   @JoinColumn(name="parking_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $parking;

    /**
     * @var \Customers
     *
     * @ManyToOne(targetEntity="Customers")
     * @JoinColumns({
     *   @JoinColumn(name="customer_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $customer;

    /**
     * @var \VehicleTypes
     *
     * @ManyToOne(targetEntity="VehicleTypes")
     * @JoinColumns({
     *   @JoinColumn(name="vehicle_types_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $vehicleTypes;

    /**
     * @var \VehicleBrands
     *
     * @ManyToOne(targetEntity="VehicleBrands")
     * @JoinColumns({
     *   @JoinColumn(name="vehicle_brands_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $vehicleBrands;

    public function __construct()
    {
        $this->dischargeDate = new \DateTime("now");
        $this->dischargeDateCode = date("Y-m-d");
        $this->upDate = new \DateTime("now");
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
     * Set parking
     *
     * @param \Parking $parking
     *
     * @return Vehicles
     */
    public function setParking($parking)
    {
        $this->parking = $parking;

        return $this;
    }

    /**
     * Get parking
     *
     * @return \Parking
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * Set customer
     *
     * @param \Customers $customer
     *
     * @return Vehicles
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Customers
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set vehicleTypes
     *
     * @param \VehicleTypes $vehicleTypes
     *
     * @return Vehicles
     */
    public function setVehicleTypes($vehicleTypes)
    {
        $this->vehicleTypes = $vehicleTypes;

        return $this;
    }

    /**
     * Get vehicleTypes
     *
     * @return \VehicleTypes
     */
    public function getVehicleTypes()
    {
        return $this->vehicleTypes;
    }

    /**
     * Set vehicleBrands
     *
     * @param \VehicleBrands $vehicleBrands
     *
     * @return Vehicles
     */
    public function setVehicleBrands($vehicleBrands )
    {
        $this->vehicleBrands = $vehicleBrands;

        return $this;
    }

    /**
     * Get vehicleBrands
     *
     * @return \VehicleBrands
     */
    public function getVehicleBrands()
    {
        return $this->vehicleBrands;
    }
}

