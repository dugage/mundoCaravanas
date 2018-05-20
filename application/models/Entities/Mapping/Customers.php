<?php



use Doctrine\Mapping as ORM;

/**
 * Customers
 *
 * @Table(name="CUSTOMERS", indexes={@Index(name="cu_pa", columns={"paytype_id"})})
 * @Entity
 */
class Customers
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
     * @Column(name="province_id", type="integer", nullable=true)
     */
    private $provinceId;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="surname", type="string", length=45, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @Column(name="nif", type="string", length=10, nullable=true)
     */
    private $nif;

    /**
     * @var integer
     *
     * @Column(name="phone_primary", type="integer", nullable=true)
     */
    private $phonePrimary;

    /**
     * @var integer
     *
     * @Column(name="phone_second", type="integer", nullable=true)
     */
    private $phoneSecond;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="address", type="string", length=45, nullable=true)
     */
    private $address;

    /**
     * @var integer
     *
     * @Column(name="zip", type="integer", nullable=true)
     */
    private $zip;

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

    /**
     * @var \Paytypes
     *
     * @ManyToOne(targetEntity="Paytypes")
     * @JoinColumns({
     *   @JoinColumn(name="paytype_id", referencedColumnName="id")
     * })
     */
    private $paytype;


}

