<?php



use Doctrine\Mapping as ORM;

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
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=25, nullable=true)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @Column(name="discharge_date", type="datetime", nullable=false)
     */
    private $dischargeDate = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @Column(name="discharge_date_code", type="integer", nullable=false)
     */
    private $dischargeDateCode;

    /**
     * @var \DateTime
     *
     * @Column(name="up_date", type="datetime", nullable=false)
     */
    private $upDate = '0000-00-00 00:00:00';

    /**
     * @var boolean
     *
     * @Column(name="state", type="boolean", nullable=true)
     */
    private $state = '1';


}

