<?php



use Doctrine\Mapping as ORM;

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
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="c_date", type="string", length=6, nullable=false)
     */
    private $cDate;

    /**
     * @var \DateTime
     *
     * @Column(name="discharge_date", type="datetime", nullable=false)
     */
    private $dischargeDate = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @Column(name="discharge_date_code", type="string", length=8, nullable=false)
     */
    private $dischargeDateCode;

    /**
     * @var \Customers
     *
     * @ManyToOne(targetEntity="Customers")
     * @JoinColumns({
     *   @JoinColumn(name="id_customer", referencedColumnName="id")
     * })
     */
    private $idCustomer;

    /**
     * @var \Vehicles
     *
     * @ManyToOne(targetEntity="Vehicles")
     * @JoinColumns({
     *   @JoinColumn(name="id_vehicle", referencedColumnName="id")
     * })
     */
    private $idVehicle;


}

