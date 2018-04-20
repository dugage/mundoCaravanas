<?php



use Doctrine\Mapping as ORM;

/**
 * Roles
 *
 * @Table(name="ROLES")
 * @Entity
 */
class Roles
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


}

