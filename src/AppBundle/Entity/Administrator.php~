<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Administrator
 *
 * @ORM\Table(name="administrator")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdministratorRepository")
 */
class Administrator
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
      *@ORM\ManyToMany(targetEntity="Warehouse", inversedBy="admins")
     * @ORM\JoinTable(name="warehouse_admin",
     *      joinColumns={@ORM\JoinColumn(name="admin_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="warehouse_id", referencedColumnName="id")}
     *      )
     */
    private $warehouses;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Administrator
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
     * Constructor
     */
    public function __construct()
    {
        $this->warehouses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add warehouse
     *
     * @param \AppBundle\Entity\warehouse $warehouse
     *
     * @return Administrator
     */
    public function addWarehouse(\AppBundle\Entity\warehouse $warehouse)
    {
        $this->warehouses[] = $warehouse;

        return $this;
    }

    /**
     * Remove warehouse
     *
     * @param \AppBundle\Entity\warehouse $warehouse
     */
    public function removeWarehouse(\AppBundle\Entity\warehouse $warehouse)
    {
        $this->warehouses->removeElement($warehouse);
    }

    /**
     * Get warehouses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWarehouses()
    {
        return $this->warehouses;
    }
}
