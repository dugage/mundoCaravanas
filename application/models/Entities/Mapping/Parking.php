<?php



use Doctrine\Mapping as ORM;

/**
 * Parking
 *
 * @Table(name="PARKING")
 * @Entity
 */
class Parking
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
     * @var integer
     *
     * @Column(name="number", type="integer", nullable=true)
     */
    private $number;

    /**
     * @var \DateTime
     *
     * @Column(name="discharge_date", type="datetime", nullable=false)
     */
    private $dischargeDate = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @Column(name="discharge_date_code", type="string", length=8, nullable=true)
     */
    private $dischargeDateCode;

    /**
     * @var \DateTime
     *
     * @Column(name="up_date", type="datetime", nullable=false)
     */
    private $upDate = 'CURRENT_TIMESTAMP';

    /**
     * @var boolean
     *
     * @Column(name="state", type="boolean", nullable=true)
     */
    private $state = '0';


}

