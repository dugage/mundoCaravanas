<?php

namespace Entities;

/**
 * Collections
 *
 * @Table(name="COLLECTIONS", indexes={@Index(name="id_vehicle", columns={"id_vehicle"}), @Index(name="id_customer", columns={"id_customer"})})
 * @Entity
 */
class Collections
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
     * @Column(name="c_date", type="string", length=6, precision=0, scale=0, nullable=false, unique=false)
     */
    private $cDate;

    /**
     * @var \DateTime
     *
     * @Column(name="discharge_date", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dischargeDate;

    /**
     * @var string
     *
     * @Column(name="discharge_date_code", type="string", length=8, precision=0, scale=0, nullable=false, unique=false)
     */
    private $dischargeDateCode;

    /**
     * @var \Customers
     *
     * @ManyToOne(targetEntity="Customers")
     * @JoinColumns({
     *   @JoinColumn(name="id_customer", referencedColumnName="id", nullable=true)
     * })
     */
    private $idCustomer;

    /**
     * @var \Vehicles
     *
     * @ManyToOne(targetEntity="Vehicles")
     * @JoinColumns({
     *   @JoinColumn(name="id_vehicle", referencedColumnName="id", nullable=true)
     * })
     */
    private $idVehicle;


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
     * Set cDate
     *
     * @param string $cDate
     *
     * @return Collections
     */
    public function setCDate($cDate)
    {
        $this->cDate = $cDate;

        return $this;
    }

    /**
     * Get cDate
     *
     * @return string
     */
    public function getCDate()
    {
        return $this->cDate;
    }

    /**
     * Set dischargeDate
     *
     * @param \DateTime $dischargeDate
     *
     * @return Collections
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
     * @return Collections
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
     * Set idCustomer
     *
     * @param \Customers $idCustomer
     *
     * @return Collections
     */
    public function setIdCustomer($idCustomer)
    {
        $this->idCustomer = $idCustomer;

        return $this;
    }

    /**
     * Get idCustomer
     *
     * @return \Customers
     */
    public function getIdCustomer()
    {
        return $this->idCustomer;
    }

    /**
     * Set idVehicle
     *
     * @param \Vehicles $idVehicle
     *
     * @return Collections
     */
    public function setIdVehicle($idVehicle)
    {
        $this->idVehicle = $idVehicle;

        return $this;
    }

    /**
     * Get idVehicle
     *
     * @return \Vehicles
     */
    public function getIdVehicle()
    {
        return $this->idVehicle;
    }
}

