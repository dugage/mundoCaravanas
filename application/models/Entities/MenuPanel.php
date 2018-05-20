<?php

namespace Entities;

/**
 * MenuPanel
 *
 * @Table(name="MENU_PANEL")
 * @Entity(repositoryClass="Repositories\MenuPanelRepositorio")
 */
class MenuPanel
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
     * @Column(name="parent", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $parent;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=25, precision=0, scale=0, nullable=true, unique=false)
     */
    private $name;

    /**
     * @var string
     *
     * @Column(name="icono", type="string", length=25, precision=0, scale=0, nullable=true, unique=false)
     */
    private $icono;

    /**
     * @var boolean
     *
     * @Column(name="state", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $state;


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
     * Set parent
     *
     * @param integer $parent
     *
     * @return MenuPanel
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return integer
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return MenuPanel
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
     * Set icono
     *
     * @param string $icono
     *
     * @return MenuPanel
     */
    public function setIcono($icono)
    {
        $this->icono = $icono;

        return $this;
    }

    /**
     * Get icono
     *
     * @return string
     */
    public function getIcono()
    {
        return $this->icono;
    }

    /**
     * Set state
     *
     * @param boolean $state
     *
     * @return MenuPanel
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
}

