<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pallet
 *
 * @ORM\Table(name="pallet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PalletRepository")
 */
class Pallet
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
     * @ORM\Column(name="code", type="string", length=50, unique=true)
     */
    private $code;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enable", type="boolean", unique=false)
     */
    private $enable;

    /**
    * @ORM\OneToMany(targetEntity="master", mappedBy="pallet")
    */
    private $masters;

    /**
    * @ORM\ManyToOne(targetEntity="Warehouse", inversedBy="pallets_current")
    * @ORM\JoinColumn(name="warehouse_current_id", referencedColumnName="id")
    */
    private $warehouse_current;

    /**
    * @ORM\ManyToOne(targetEntity="Warehouse", inversedBy="pallets_destiny")
    * @ORM\JoinColumn(name="warehouse_destiny_id", referencedColumnName="id")
    */
    private $warehouse_destiny;

    /**
    * @ORM\ManyToOne(targetEntity="Status", inversedBy="pallets")
    * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
    */
    private $status;

    /**
    * @ORM\OneToMany(targetEntity="Cargo", mappedBy="pallet")
    */
    private $cargos;


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
     * Set code
     *
     * @param string $code
     *
     * @return Pallet
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->master_id = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cargo_id = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set enable
     *
     * @param boolean $enable
     *
     * @return Pallet
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;

        return $this;
    }

    /**
     * Get enable
     *
     * @return boolean
     */
    public function getEnable()
    {
        return $this->enable;
    }

    /**
     * Add masterId
     *
     * @param \AppBundle\Entity\master $masterId
     *
     * @return Pallet
     */
    public function addMasterId(\AppBundle\Entity\master $masterId)
    {
        $this->master_id[] = $masterId;

        return $this;
    }

    /**
     * Remove masterId
     *
     * @param \AppBundle\Entity\master $masterId
     */
    public function removeMasterId(\AppBundle\Entity\master $masterId)
    {
        $this->master_id->removeElement($masterId);
    }

    /**
     * Get masterId
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMasterId()
    {
        return $this->master_id;
    }

    /**
     * Set warehouseCurrentId
     *
     * @param \AppBundle\Entity\warehouse $warehouseCurrentId
     *
     * @return Pallet
     */
    public function setWarehouseCurrentId(\AppBundle\Entity\warehouse $warehouseCurrentId = null)
    {
        $this->warehouse_current_id = $warehouseCurrentId;

        return $this;
    }

    /**
     * Get warehouseCurrentId
     *
     * @return \AppBundle\Entity\warehouse
     */
    public function getWarehouseCurrentId()
    {
        return $this->warehouse_current_id;
    }

    /**
     * Set warehouseDestinyId
     *
     * @param \AppBundle\Entity\warehouse $warehouseDestinyId
     *
     * @return Pallet
     */
    public function setWarehouseDestinyId(\AppBundle\Entity\warehouse $warehouseDestinyId = null)
    {
        $this->warehouse_destiny_id = $warehouseDestinyId;

        return $this;
    }

    /**
     * Get warehouseDestinyId
     *
     * @return \AppBundle\Entity\warehouse
     */
    public function getWarehouseDestinyId()
    {
        return $this->warehouse_destiny_id;
    }

    /**
     * Set statusId
     *
     * @param \AppBundle\Entity\status $statusId
     *
     * @return Pallet
     */
    public function setStatusId(\AppBundle\Entity\status $statusId = null)
    {
        $this->status_id = $statusId;

        return $this;
    }

    /**
     * Get statusId
     *
     * @return \AppBundle\Entity\status
     */
    public function getStatusId()
    {
        return $this->status_id;
    }

    /**
     * Add cargoId
     *
     * @param \AppBundle\Entity\cargo $cargoId
     *
     * @return Pallet
     */
    public function addCargoId(\AppBundle\Entity\cargo $cargoId)
    {
        $this->cargo_id[] = $cargoId;

        return $this;
    }

    /**
     * Remove cargoId
     *
     * @param \AppBundle\Entity\cargo $cargoId
     */
    public function removeCargoId(\AppBundle\Entity\cargo $cargoId)
    {
        $this->cargo_id->removeElement($cargoId);
    }

    /**
     * Get cargoId
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCargoId()
    {
        return $this->cargo_id;
    }

    /**
     * Add master
     *
     * @param \AppBundle\Entity\master $master
     *
     * @return Pallet
     */
    public function addMaster(\AppBundle\Entity\master $master)
    {
        $this->masters[] = $master;

        return $this;
    }

    /**
     * Remove master
     *
     * @param \AppBundle\Entity\master $master
     */
    public function removeMaster(\AppBundle\Entity\master $master)
    {
        $this->masters->removeElement($master);
    }

    /**
     * Get masters
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMasters()
    {
        return $this->masters;
    }

    /**
     * Set warehouseCurrent
     *
     * @param \AppBundle\Entity\Warehouse $warehouseCurrent
     *
     * @return Pallet
     */
    public function setWarehouseCurrent(\AppBundle\Entity\Warehouse $warehouseCurrent = null)
    {
        $this->warehouse_current = $warehouseCurrent;

        return $this;
    }

    /**
     * Get warehouseCurrent
     *
     * @return \AppBundle\Entity\Warehouse
     */
    public function getWarehouseCurrent()
    {
        return $this->warehouse_current;
    }

    /**
     * Set warehouseDestiny
     *
     * @param \AppBundle\Entity\Warehouse $warehouseDestiny
     *
     * @return Pallet
     */
    public function setWarehouseDestiny(\AppBundle\Entity\Warehouse $warehouseDestiny = null)
    {
        $this->warehouse_destiny = $warehouseDestiny;

        return $this;
    }

    /**
     * Get warehouseDestiny
     *
     * @return \AppBundle\Entity\Warehouse
     */
    public function getWarehouseDestiny()
    {
        return $this->warehouse_destiny;
    }

    /**
     * Set status
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return Pallet
     */
    public function setStatus(\AppBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add cargo
     *
     * @param \AppBundle\Entity\Cargo $cargo
     *
     * @return Pallet
     */
    public function addCargo(\AppBundle\Entity\Cargo $cargo)
    {
        $this->cargos[] = $cargo;

        return $this;
    }

    /**
     * Remove cargo
     *
     * @param \AppBundle\Entity\Cargo $cargo
     */
    public function removeCargo(\AppBundle\Entity\Cargo $cargo)
    {
        $this->cargos->removeElement($cargo);
    }

    /**
     * Get cargos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCargos()
    {
        return $this->cargos;
    }
}
