<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * master
 *
 * @ORM\Table(name="master")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\masterRepository")
 */
class master
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
    * @ORM\ManyToOne(targetEntity="Pallet", inversedBy="masters")
    * @ORM\JoinColumn(name="pallet_id", referencedColumnName="id")
    */
    private $pallet;

    /**
    * @ORM\ManyToOne(targetEntity="Status", inversedBy="masters")
    * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
    */
    private $status;

    /**
    * @ORM\ManyToOne(targetEntity="Warehouse", inversedBy="masters_current")
    * @ORM\JoinColumn(name="warehouse_current_id", referencedColumnName="id")
    */
    private $warehouse_current;

    /**
    * @ORM\ManyToOne(targetEntity="Warehouse", inversedBy="masters_destiny")
    * @ORM\JoinColumn(name="warehouse_destiny_id", referencedColumnName="id")
    */
    private $warehouse_destiny;

    /**
    * @ORM\OneToMany(targetEntity="Cargo", mappedBy="master")
    */
    private $cargos;

    /**
    * @ORM\OneToMany(targetEntity="Imei", mappedBy="master")
    */
    private $imeis;


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
     * @return master
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
        $this->cargo_id = new \Doctrine\Common\Collections\ArrayCollection();
        $this->imei_id = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set enable
     *
     * @param boolean $enable
     *
     * @return master
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
     * Set palletId
     *
     * @param \AppBundle\Entity\pallet $palletId
     *
     * @return master
     */
    public function setPalletId(\AppBundle\Entity\pallet $palletId = null)
    {
        $this->pallet_id = $palletId;

        return $this;
    }

    /**
     * Get palletId
     *
     * @return \AppBundle\Entity\pallet
     */
    public function getPalletId()
    {
        return $this->pallet_id;
    }

    /**
     * Set statusId
     *
     * @param \AppBundle\Entity\status $statusId
     *
     * @return master
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
     * Set warehouseCurrentId
     *
     * @param \AppBundle\Entity\warehouse $warehouseCurrentId
     *
     * @return master
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
     * @return master
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
     * Add cargoId
     *
     * @param \AppBundle\Entity\cargo $cargoId
     *
     * @return master
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
     * Add imeiId
     *
     * @param \AppBundle\Entity\imei $imeiId
     *
     * @return master
     */
    public function addImeiId(\AppBundle\Entity\imei $imeiId)
    {
        $this->imei_id[] = $imeiId;

        return $this;
    }

    /**
     * Remove imeiId
     *
     * @param \AppBundle\Entity\imei $imeiId
     */
    public function removeImeiId(\AppBundle\Entity\imei $imeiId)
    {
        $this->imei_id->removeElement($imeiId);
    }

    /**
     * Get imeiId
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImeiId()
    {
        return $this->imei_id;
    }

    /**
     * Set pallet
     *
     * @param \AppBundle\Entity\Pallet $pallet
     *
     * @return master
     */
    public function setPallet(\AppBundle\Entity\Pallet $pallet = null)
    {
        $this->pallet = $pallet;

        return $this;
    }

    /**
     * Get pallet
     *
     * @return \AppBundle\Entity\Pallet
     */
    public function getPallet()
    {
        return $this->pallet;
    }

    /**
     * Set status
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return master
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
     * Set warehouseCurrent
     *
     * @param \AppBundle\Entity\Warehouse $warehouseCurrent
     *
     * @return master
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
     * @return master
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
     * Add cargo
     *
     * @param \AppBundle\Entity\Cargo $cargo
     *
     * @return master
     */
    public function addCargo(\AppBundle\Entity\Cargo $cargo)
    {
        $this->cargo[] = $cargo;

        return $this;
    }

    /**
     * Remove cargo
     *
     * @param \AppBundle\Entity\Cargo $cargo
     */
    public function removeCargo(\AppBundle\Entity\Cargo $cargo)
    {
        $this->cargo->removeElement($cargo);
    }

    /**
     * Get cargo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Add imei
     *
     * @param \AppBundle\Entity\Imei $imei
     *
     * @return master
     */
    public function addImei(\AppBundle\Entity\Imei $imei)
    {
        $this->imeis[] = $imei;

        return $this;
    }

    /**
     * Remove imei
     *
     * @param \AppBundle\Entity\Imei $imei
     */
    public function removeImei(\AppBundle\Entity\Imei $imei)
    {
        $this->imeis->removeElement($imei);
    }

    /**
     * Get imeis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImeis()
    {
        return $this->imeis;
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
