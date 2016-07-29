<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imei
 *
 * @ORM\Table(name="imei")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImeiRepository")
 */
class Imei
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
    * @ORM\ManyToOne(targetEntity="Warehouse", inversedBy="imeis_current")
    * @ORM\JoinColumn(name="warehouse_current_id", referencedColumnName="id")
    */
    private $warehouse_current;

    /**
    * @ORM\ManyToOne(targetEntity="Warehouse", inversedBy="imeis_destiny")
    * @ORM\JoinColumn(name="warehouse_destiny_id", referencedColumnName="id")
    */
    private $warehouse_destiny;

    /**
    * @ORM\ManyToOne(targetEntity="master", inversedBy="imeis")
    * @ORM\JoinColumn(name="master_id", referencedColumnName="id")
    */
    private $master;

    /**
    * @ORM\ManyToOne(targetEntity="Product", inversedBy="imeis")
    * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
    */
    private $product;

    /**
    * @ORM\ManyToOne(targetEntity="status", inversedBy="imeis")
    * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
    */
    private $status;

    /**
    * @ORM\OneToMany(targetEntity="cargo", mappedBy="imei")
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
     * @return Imei
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
    }

    /**
     * Set enable
     *
     * @param boolean $enable
     *
     * @return Imei
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
     * Set warehouseCurrentId
     *
     * @param \AppBundle\Entity\warehouse $warehouseCurrentId
     *
     * @return Imei
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
     * @return Imei
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
     * Set masterId
     *
     * @param \AppBundle\Entity\master $masterId
     *
     * @return Imei
     */
    public function setMasterId(\AppBundle\Entity\master $masterId = null)
    {
        $this->master_id = $masterId;

        return $this;
    }

    /**
     * Get masterId
     *
     * @return \AppBundle\Entity\master
     */
    public function getMasterId()
    {
        return $this->master_id;
    }

    /**
     * Set productId
     *
     * @param \AppBundle\Entity\product $productId
     *
     * @return Imei
     */
    public function setProductId(\AppBundle\Entity\product $productId = null)
    {
        $this->product_id = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return \AppBundle\Entity\product
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set statusId
     *
     * @param \AppBundle\Entity\status $statusId
     *
     * @return Imei
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
     * @return Imei
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
     * Set warehouseCurrent
     *
     * @param \AppBundle\Entity\Warehouse $warehouseCurrent
     *
     * @return Imei
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
     * @return Imei
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
     * Set master
     *
     * @param \AppBundle\Entity\master $master
     *
     * @return Imei
     */
    public function setMaster(\AppBundle\Entity\master $master = null)
    {
        $this->master = $master;

        return $this;
    }

    /**
     * Get master
     *
     * @return \AppBundle\Entity\master
     */
    public function getMaster()
    {
        return $this->master;
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return Imei
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set status
     *
     * @param \AppBundle\Entity\status $status
     *
     * @return Imei
     */
    public function setStatus(\AppBundle\Entity\status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add cargo
     *
     * @param \AppBundle\Entity\cargo $cargo
     *
     * @return Imei
     */
    public function addCargo(\AppBundle\Entity\cargo $cargo)
    {
        $this->cargos[] = $cargo;

        return $this;
    }

    /**
     * Remove cargo
     *
     * @param \AppBundle\Entity\cargo $cargo
     */
    public function removeCargo(\AppBundle\Entity\cargo $cargo)
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
