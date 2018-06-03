<?php



use Doctrine\Mapping as ORM;

/**
 * Vehicles
 *
 * @Table(name="VEHICLES", indexes={@Index(name="customer_id", columns={"customer_id"}), @Index(name="parking_id", columns={"parking_id"}), @Index(name="vehicle_types_id", columns={"vehicle_types_id"}), @Index(name="vehicle_brands_id", columns={"vehicle_brands_id"}), @Index(name="paytype_id", columns={"paytype_id"})})
 * @Entity
 */
class Vehicles
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
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
     * @var string
     *
     * @Column(name="pay_method", type="string", length=25, nullable=false)
     */
    private $payMethod;

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
     * @var \Paytypes
     *
     * @ManyToOne(targetEntity="Paytypes")
     * @JoinColumns({
     *   @JoinColumn(name="paytype_id", referencedColumnName="id")
     * })
     */
    private $paytype;

    /**
     * @var \Parking
     *
     * @ManyToOne(targetEntity="Parking")
     * @JoinColumns({
     *   @JoinColumn(name="parking_id", referencedColumnName="id")
     * })
     */
    private $parking;

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
     * @var \VehicleTypes
     *
     * @ManyToOne(targetEntity="VehicleTypes")
     * @JoinColumns({
     *   @JoinColumn(name="vehicle_types_id", referencedColumnName="id")
     * })
     */
    private $vehicleTypes;

    /**
     * @var \VehicleBrands
     *
     * @ManyToOne(targetEntity="VehicleBrands")
     * @JoinColumns({
     *   @JoinColumn(name="vehicle_brands_id", referencedColumnName="id")
     * })
     */
    private $vehicleBrands;


}

