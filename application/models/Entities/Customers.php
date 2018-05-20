<?php

namespace Entities;

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
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @Column(name="province_id", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $provinceId;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="surname", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $surname;

    /**
     * @var string
     *
     * @Column(name="nif", type="string", length=10, precision=0, scale=0, nullable=true, unique=false)
     */
    private $nif;

    /**
     * @var integer
     *
     * @Column(name="phone_primary", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $phonePrimary;

    /**
     * @var integer
     *
     * @Column(name="phone_second", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $phoneSecond;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="address", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $address;

    /**
     * @var integer
     *
     * @Column(name="zip", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $zip;

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
    private $state = 1;

    /**
     * @var \Paytypes
     *
     * @ManyToOne(targetEntity="Paytypes")
     * @JoinColumns({
     *   @JoinColumn(name="paytype_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $paytype;

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
     * Set provinceId
     *
     * @param integer $provinceId
     *
     * @return Customers
     */
    public function setProvinceId($provinceId)
    {
        $this->provinceId = $provinceId;

        return $this;
    }

    /**
     * Get provinceId
     *
     * @return integer
     */
    public function getProvinceId()
    {
        return $this->provinceId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Customers
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Customers
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set nif
     *
     * @param string $nif
     *
     * @return Customers
     */
    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }

    /**
     * Get nif
     *
     * @return string
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * Set phonePrimary
     *
     * @param integer $phonePrimary
     *
     * @return Customers
     */
    public function setPhonePrimary($phonePrimary)
    {
        $this->phonePrimary = $phonePrimary;

        return $this;
    }

    /**
     * Get phonePrimary
     *
     * @return integer
     */
    public function getPhonePrimary()
    {
        return $this->phonePrimary;
    }

    /**
     * Set phoneSecond
     *
     * @param integer $phoneSecond
     *
     * @return Customers
     */
    public function setPhoneSecond($phoneSecond)
    {
        $this->phoneSecond = $phoneSecond;

        return $this;
    }

    /**
     * Get phoneSecond
     *
     * @return integer
     */
    public function getPhoneSecond()
    {
        return $this->phoneSecond;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Customers
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Customers
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zip
     *
     * @param integer $zip
     *
     * @return Customers
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return integer
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set dischargeDate
     *
     * @param \DateTime $dischargeDate
     *
     * @return Customers
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
     * @return Customers
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
     * @return Customers
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
     * @return Customers
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

    /**
     * Set paytype
     *
     * @param \Paytypes $paytype
     *
     * @return Customers
     */
    public function setPaytype($paytype)
    {
        $this->paytype = $paytype;

        return $this;
    }

    /**
     * Get paytype
     *
     * @return \Paytypes
     */
    public function getPaytype()
    {
        return $this->paytype;
    }
}

