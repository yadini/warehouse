<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warehouse_limits
 *
 * @ORM\Table(name="warehouse_limits")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Warehouse_limitsRepository")
 */
class WarehousesLimit
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
     * @ORM\Column(name="limits", type="decimal", precision=10, scale=3)
     */
    private $limits;

   /**
   * @ORM\ManyToOne(targetEntity="Warehouse", inversedBy="warehouse_limits_origin")
   * @ORM\JoinColumn(name="warehouse_origin_id", referencedColumnName="id")
   */
   private $warehouse_origin;

      /**
   * @ORM\ManyToOne(targetEntity="Warehouse", inversedBy="warehouse_limits_target")
   * @ORM\JoinColumn(name="warehouse_target_id", referencedColumnName="id")
   */
   private $warehouse_target;


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
     * Set limits
     *
     * @param string $limits
     *
     * @return Warehouse_limits
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
     * Set wharehouseOriginId
     *
     * @param \AppBundle\Entity\warehouse $wharehouseOriginId
     *
     * @return Warehouse_limits
     */
    public function setWharehouseOriginId(\AppBundle\Entity\warehouse $wharehouseOriginId = null)
    {
        $this->wharehouse_origin_id = $wharehouseOriginId;

        return $this;
    }

    /**
     * Get wharehouseOriginId
     *
     * @return \AppBundle\Entity\warehouse
     */
    public function getWharehouseOriginId()
    {
        return $this->wharehouse_origin_id;
    }

    /**
     * Set harehouseTargetId
     *
     * @param \AppBundle\Entity\warehouse $harehouseTargetId
     *
     * @return Warehouse_limits
     */
    public function setHarehouseTargetId(\AppBundle\Entity\warehouse $harehouseTargetId = null)
    {
        $this->harehouse_target_id = $harehouseTargetId;

        return $this;
    }

    /**
     * Get harehouseTargetId
     *
     * @return \AppBundle\Entity\warehouse
     */
    public function getHarehouseTargetId()
    {
        return $this->harehouse_target_id;
    }

    /**
     * Set wharehouseOrigin
     *
     * @param \AppBundle\Entity\Warehouse $wharehouseOrigin
     *
     * @return WarehousesLimit
     */
    public function setWharehouseOrigin(\AppBundle\Entity\Warehouse $wharehouseOrigin = null)
    {
        $this->wharehouse_origin = $wharehouseOrigin;

        return $this;
    }

    /**
     * Get wharehouseOrigin
     *
     * @return \AppBundle\Entity\Warehouse
     */
    public function getWharehouseOrigin()
    {
        return $this->wharehouse_origin;
    }

    /**
     * Set harehouseTarget
     *
     * @param \AppBundle\Entity\Warehouse $harehouseTarget
     *
     * @return WarehousesLimit
     */
    public function setHarehouseTarget(\AppBundle\Entity\Warehouse $harehouseTarget = null)
    {
        $this->harehouse_target = $harehouseTarget;

        return $this;
    }

    /**
     * Get harehouseTarget
     *
     * @return \AppBundle\Entity\Warehouse
     */
    public function getHarehouseTarget()
    {
        return $this->harehouse_target;
    }

    /**
     * Set warehouseOrigin
     *
     * @param \AppBundle\Entity\Warehouse $warehouseOrigin
     *
     * @return WarehousesLimit
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
     * Set warehouseTarget
     *
     * @param \AppBundle\Entity\Warehouse $warehouseTarget
     *
     * @return WarehousesLimit
     */
    public function setWarehouseTarget(\AppBundle\Entity\Warehouse $warehouseTarget = null)
    {
        $this->warehouse_target = $warehouseTarget;

        return $this;
    }

    /**
     * Get warehouseTarget
     *
     * @return \AppBundle\Entity\Warehouse
     */
    public function getWarehouseTarget()
    {
        return $this->warehouse_target;
    }
}
