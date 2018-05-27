<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Parking
 *
 * @ORM\Table(name="PARKING")
 * @ORM\Entity
 */
class Parking
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="vehicle_id", type="integer", nullable=true)
     */
    private $vehicleId;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=true)
     */
    private $number;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="discharge_date", type="datetime", nullable=false)
     */
    private $dischargeDate = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="discharge_date_code", type="string", length=8, nullable=true)
     */
    private $dischargeDateCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="up_date", type="datetime", nullable=false)
     */
    private $upDate = 'CURRENT_TIMESTAMP';

    /**
     * @var boolean
     *
     * @ORM\Column(name="state", type="boolean", nullable=true)
     */
    private $state = '0';


}

