<?php



use Doctrine\Mapping as ORM;

/**
 * Users
 *
 * @Table(name="USERS", indexes={@Index(name="us_ro", columns={"rol_id"})})
 * @Entity
 */
class Users
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="NONE")
     */
    private $id;

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
     * @Column(name="email", type="string", length=150, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="password", type="string", length=250, nullable=true)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @Column(name="discharge_date", type="datetime", nullable=false)
     */
    private $dischargeDate = 'CURRENT_TIMESTAMP';

    /**
     * @var \Roles
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="Roles")
     * @JoinColumns({
     *   @JoinColumn(name="rol_id", referencedColumnName="id")
     * })
     */
    private $rol;


}

