<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transference
 *
 * @ORM\Table(name="transference")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TransferenceRepository")
 */
class Transference
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
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="transference_value", type="decimal", precision=10, scale=3)
     */
    private $transferenceValue;


    /**
    * @ORM\ManyToOne(targetEntity="Warehouse", inversedBy="transferences_origin")
    * @ORM\JoinColumn(name="warehouse_origin_id", referencedColumnName="id")
    */
    private $warehouse_origin;

    /**
    * @ORM\ManyToOne(targetEntity="Warehouse", inversedBy="transferences_destiny")
    * @ORM\JoinColumn(name="warehouse_destiny_id", referencedColumnName="id")
    */
    private $warehouse_destiny;

    /**
    * @ORM\ManyToOne(targetEntity="Transporter", inversedBy="transferences")
    * @ORM\JoinColumn(name="transporter_id", referencedColumnName="id")
    */
    private $transporter;

    /**
    * @ORM\OneToMany(targetEntity="Cargo", mappedBy="transference")
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
     * Set data
     *
     * @param \DateTime $data
     *
     * @return Transference
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set imeisQuantity
     *
     * @param integer $imeisQuantity
     *
     * @return Transference
     */
    public function setImeisQuantity($imeisQuantity)
    {
        $this->imeisQuantity = $imeisQuantity;

        return $this;
    }

    /**
     * Get imeisQuantity
     *
     * @return int
     */
    public function getImeisQuantity()
    {
        return $this->imeisQuantity;
    }

    /**
     * Set transferenceValue
     *
     * @param string $transferenceValue
     *
     * @return Transference
     */
    public function setTransferenceValue($transferenceValue)
    {
        $this->transferenceValue = $transferenceValue;

        return $this;
    }

    /**
     * Get transferenceValue
     *
     * @return string
     */
    public function getTransferenceValue()
    {
        return $this->transferenceValue;
    }

    /**
     * Set limits
     *
     * @param string $limits
     *
     * @return Transference
     */
    public function setLimits($limits)
    {
        $this->limits = $limits;

        return $this;
    }

    /**
     * Get limits
     *
     * @return string
     */
    public function getLimits()
    {
        return $this->limits;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cargo_id = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set warehouseOriginId
     *
     * @param \AppBundle\Entity\warehouse $warehouseOriginId
     *
     * @return Transference
     */
    public function setWarehouseOriginId(\AppBundle\Entity\warehouse $warehouseOriginId = null)
    {
        $this->warehouse_origin_id = $warehouseOriginId;

        return $this;
    }

    /**
     * Get warehouseOriginId
     *
     * @return \AppBundle\Entity\warehouse
     */
    public function getWarehouseOriginId()
    {
        return $this->warehouse_origin_id;
    }

    /**
     * Set warehouseDestinyId
     *
     * @param \AppBundle\Entity\warehouse $warehouseDestinyId
     *
     * @return Transference
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
     * Set transporterId
     *
     * @param \AppBundle\Entity\transporter $transporterId
     *
     * @return Transference
     */
    public function setTransporterId(\AppBundle\Entity\transporter $transporterId = null)
    {
        $this->transporter_id = $transporterId;

        return $this;
    }

    /**
     * Get transporterId
     *
     * @return \AppBundle\Entity\transporter
     */
    public function getTransporterId()
    {
        return $this->transporter_id;
    }

    /**
     * Add cargoId
     *
     * @param \AppBundle\Entity\cargo $cargoId
     *
     * @return Transference
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
     * Add cargo
     *
     * @param \AppBundle\Entity\cargo $cargo
     *
     * @return Transference
     */
    public function addCargo(\AppBundle\Entity\cargo $cargo)
    {
        $this->cargo[] = $cargo;

        return $this;
    }

    /**
     * Remove cargo
     *
     * @param \AppBundle\Entity\cargo $cargo
     */
    public function removeCargo(\AppBundle\Entity\cargo $cargo)
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
     * Set warehouseOrigin
     *
     * @param \AppBundle\Entity\Warehouse $warehouseOrigin
     *
     * @return Transference
     */
    public function setWarehouseOrigin(\AppBundle\Entity\Warehouse $warehouseOrigin = null)
    {
        $this->warehouse_origin = $warehouseOrigin;

        return $this;
    }

    /**
     * Get warehouseOrigin
     *
     * @return \AppBundle\Entity\Warehouse
     */
    public function getWarehouseOrigin()
    {
        return $this->warehouse_origin;
    }

    /**
     * Set warehouseDestiny
     *
     * @param \AppBundle\Entity\Warehouse $warehouseDestiny
     *
     * @return Transference
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
     * Set transporter
     *
     * @param \AppBundle\Entity\Transporter $transporter
     *
     * @return Transference
     */
    public function setTransporter(\AppBundle\Entity\Transporter $transporter = null)
    {
        $this->transporter = $transporter;

        return $this;
    }

    /**
     * Get transporter
     *
     * @return \AppBundle\Entity\Transporter
     */
    public function getTransporter()
    {
        return $this->transporter;
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

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Transference
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
