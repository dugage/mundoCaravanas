<?php



use Doctrine\Mapping as ORM;

/**
 * Vehicles
 *
 * @Table(name="VEHICLES", indexes={@Index(name="ve_pa", columns={"parking_id"}), @Index(name="ve_ty", columns={"vehicle_types_id"}), @Index(name="ve_br", columns={"vehicle_brands_id"}), @Index(name="customer_id", columns={"customer_id"})})
 * @Entity
 */
class Vehicles
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="license_plate", type="string", length=35, nullable=true)
     */
    private $licensePlate;

    /**
     * @var string
     *
     * @Column(name="model", type="string", length=35, nullable=true)
     */
    private $model;

    /**
     * @var string
     *
     * @Column(name="vin", type="string", length=25, nullable=true)
     */
    private $vin;

    /**
     * @var integer
     *
     * @Column(name="year", type="integer", nullable=false)
     */
    private $year;

    /**
     * @var string
     *
     * @Column(name="color", type="string", length=25, nullable=true)
     */
    private $color;

    /**
     * @var \DateTime
     *
     * @Column(name="discharge_date", type="datetime", nullable=true)
     */
    private $dischargeDate;

    /**
     * @var integer
     *
     * @Column(name="discharge_date_code", type="integer", nullable=true)
     */
    private $dischargeDateCode;

    /**
     * @var \DateTime
     *
     * @Column(name="up_date", type="datetime", nullable=false)
     */
    private $upDate = 'CURRENT_TIMESTAMP';

    /**
     * @var \Customers
     *
     * @ManyToOne(targetEntity="Customers")
     * @JoinColumns({
     *   @JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;

    /**
     * @var \VehicleBrands
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="VehicleBrands")
     * @JoinColumns({
     *   @JoinColumn(name="vehicle_brands_id", referencedColumnName="id")
     * })
     */
    private $vehicleBrands;

    /**
     * @var \Parking
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="Parking")
     * @JoinColumns({
     *   @JoinColumn(name="parking_id", referencedColumnName="id")
     * })
     */
    private $parking;

    /**
     * @var \VehicleTypes
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="VehicleTypes")
     * @JoinColumns({
     *   @JoinColumn(name="vehicle_types_id", referencedColumnName="id")
     * })
     */
    private $vehicleTypes;


}

