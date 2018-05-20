<?php



use Doctrine\Mapping as ORM;

/**
 * MenuPanel
 *
 * @Table(name="MENU_PANEL")
 * @Entity
 */
class MenuPanel
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
     * @Column(name="parent", type="integer", nullable=true)
     */
    private $parent;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=25, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="icono", type="string", length=25, nullable=true)
     */
    private $icono;

    /**
     * @var boolean
     *
     * @Column(name="state", type="boolean", nullable=true)
     */
    private $state = '0';


}

