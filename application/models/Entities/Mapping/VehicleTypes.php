<?php



use Doctrine\Mapping as ORM;

/**
 * VehicleTypes
 *
 * @Table(name="VEHICLE_TYPES")
 * @Entity
 */
class VehicleTypes
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
     * @Column(name="name", type="string", length=25, nullable=false)
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
     * @var integer
     *
     * @Column(name="up_date", type="integer", nullable=false)
     */
    private $upDate;

    /**
     * @var boolean
     *
     * @Column(name="state", type="boolean", nullable=true)
     */
    private $state = '1';


}

