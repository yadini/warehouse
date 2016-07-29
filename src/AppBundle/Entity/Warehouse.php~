<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warehouse
 *
 * @ORM\Table(name="warehouse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WarehouseRepository")
 */
class Warehouse
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
     * @ORM\Column(name="label", type="string", length=100)
     */
    private $label;

    /**
    * @ORM\OneToMany(targetEntity="WarehousesLimit", mappedBy="warehouse_origin")
    */
    private $warehouse_limits_origin;

    /**
    * @ORM\OneToMany(targetEntity="Transference", mappedBy="warehouse_origin")
    */
    private $transferences_origin;

    /**
    * @ORM\OneToMany(targetEntity="Transference", mappedBy="warehouse_destiny")
    */
    private $transferences_destiny;

    /**
    * @ORM\OneToMany(targetEntity="WarehousesLimit", mappedBy="warehouse_target")
    */
    private $warehouse_limits_target;

    /**
     * @ORM\ManyToMany(targetEntity="Administrator", mappedBy="warehouses")
     */
    private $admins;

     /**
    * @ORM\OneToMany(targetEntity="Pallet", mappedBy="warehouse_current")
    */
    private $pallets_current;

     /**
    * @ORM\OneToMany(targetEntity="Pallet", mappedBy="warehouse_destiny")
    */
    private $pallets_destiny;

     /**
    * @ORM\OneToMany(targetEntity="master", mappedBy="warehouse_current")
    */
    private $masters_current;

     /**
    * @ORM\OneToMany(targetEntity="master", mappedBy="warehouse_destiny")
    */
    private $masters_destiny;

     /**
    * @ORM\OneToMany(targetEntity="Imei", mappedBy="warehouse_current")
    */
    private $imeis_current;

     /**
    * @ORM\OneToMany(targetEntity="Imei", mappedBy="warehouse_destiny")
    */
    private $imeis_destiny;


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
     * Set label
     *
     * @param string $label
     *
     * @return Warehouse
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->warehouse_limits = new \Doctrine\Common\Collections\ArrayCollection();
    }

   
    /**
     * Add admin
     *
     * @param \AppBundle\Entity\administrator $admin
     *
     * @return Warehouse
     */
    public function addAdmin(\AppBundle\Entity\administrator $admin)
    {
        $this->admins[] = $admin;

        return $this;
    }

    /**
     * Remove admin
     *
     * @param \AppBundle\Entity\administrator $admin
     */
    public function removeAdmin(\AppBundle\Entity\administrator $admin)
    {
        $this->admins->removeElement($admin);
    }

    /**
     * Get admins
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdmins()
    {
        return $this->admins;
    }

    /**
     * Add warehouseLimitsOrigin
     *
     * @param \AppBundle\Entity\WarehousesLimit $warehouseLimitsOrigin
     *
     * @return Warehouse
     */
    public function addWarehouseLimitsOrigin(\AppBundle\Entity\WarehousesLimit $warehouseLimitsOrigin)
    {
        $this->warehouse_limits_origin[] = $warehouseLimitsOrigin;

        return $this;
    }

    /**
     * Remove warehouseLimitsOrigin
     *
     * @param \AppBundle\Entity\WarehousesLimit $warehouseLimitsOrigin
     */
    public function removeWarehouseLimitsOrigin(\AppBundle\Entity\WarehousesLimit $warehouseLimitsOrigin)
    {
        $this->warehouse_limits_origin->removeElement($warehouseLimitsOrigin);
    }

    /**
     * Get warehouseLimitsOrigin
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWarehouseLimitsOrigin()
    {
        return $this->warehouse_limits_origin;
    }

    /**
     * Add warehouseLimitsTarget
     *
     * @param \AppBundle\Entity\WarehousesLimit $warehouseLimitsTarget
     *
     * @return Warehouse
     */
    public function addWarehouseLimitsTarget(\AppBundle\Entity\WarehousesLimit $warehouseLimitsTarget)
    {
        $this->warehouse_limits_target[] = $warehouseLimitsTarget;

        return $this;
    }

    /**
     * Remove warehouseLimitsTarget
     *
     * @param \AppBundle\Entity\WarehousesLimit $warehouseLimitsTarget
     */
    public function removeWarehouseLimitsTarget(\AppBundle\Entity\WarehousesLimit $warehouseLimitsTarget)
    {
        $this->warehouse_limits_target->removeElement($warehouseLimitsTarget);
    }

    /**
     * Get warehouseLimitsTarget
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWarehouseLimitsTarget()
    {
        return $this->warehouse_limits_target;
    }

    /**
     * Add palletsCurrent
     *
     * @param \AppBundle\Entity\Pallet $palletsCurrent
     *
     * @return Warehouse
     */
    public function addPalletsCurrent(\AppBundle\Entity\Pallet $palletsCurrent)
    {
        $this->pallets_current[] = $palletsCurrent;

        return $this;
    }

    /**
     * Remove palletsCurrent
     *
     * @param \AppBundle\Entity\Pallet $palletsCurrent
     */
    public function removePalletsCurrent(\AppBundle\Entity\Pallet $palletsCurrent)
    {
        $this->pallets_current->removeElement($palletsCurrent);
    }

    /**
     * Get palletsCurrent
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPalletsCurrent()
    {
        return $this->pallets_current;
    }

    /**
     * Add palletsDestiny
     *
     * @param \AppBundle\Entity\Pallet $palletsDestiny
     *
     * @return Warehouse
     */
    public function addPalletsDestiny(\AppBundle\Entity\Pallet $palletsDestiny)
    {
        $this->pallets_destiny[] = $palletsDestiny;

        return $this;
    }

    /**
     * Remove palletsDestiny
     *
     * @param \AppBundle\Entity\Pallet $palletsDestiny
     */
    public function removePalletsDestiny(\AppBundle\Entity\Pallet $palletsDestiny)
    {
        $this->pallets_destiny->removeElement($palletsDestiny);
    }

    /**
     * Get palletsDestiny
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPalletsDestiny()
    {
        return $this->pallets_destiny;
    }

    /**
     * Add mastersCurrent
     *
     * @param \AppBundle\Entity\master $mastersCurrent
     *
     * @return Warehouse
     */
    public function addMastersCurrent(\AppBundle\Entity\master $mastersCurrent)
    {
        $this->masters_current[] = $mastersCurrent;

        return $this;
    }

    /**
     * Remove mastersCurrent
     *
     * @param \AppBundle\Entity\master $mastersCurrent
     */
    public function removeMastersCurrent(\AppBundle\Entity\master $mastersCurrent)
    {
        $this->masters_current->removeElement($mastersCurrent);
    }

    /**
     * Get mastersCurrent
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMastersCurrent()
    {
        return $this->masters_current;
    }

    /**
     * Add mastersDestiny
     *
     * @param \AppBundle\Entity\master $mastersDestiny
     *
     * @return Warehouse
     */
    public function addMastersDestiny(\AppBundle\Entity\master $mastersDestiny)
    {
        $this->masters_destiny[] = $mastersDestiny;

        return $this;
    }

    /**
     * Remove mastersDestiny
     *
     * @param \AppBundle\Entity\master $mastersDestiny
     */
    public function removeMastersDestiny(\AppBundle\Entity\master $mastersDestiny)
    {
        $this->masters_destiny->removeElement($mastersDestiny);
    }

    /**
     * Get mastersDestiny
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMastersDestiny()
    {
        return $this->masters_destiny;
    }

    /**
     * Add imeisCurrent
     *
     * @param \AppBundle\Entity\Imei $imeisCurrent
     *
     * @return Warehouse
     */
    public function addImeisCurrent(\AppBundle\Entity\Imei $imeisCurrent)
    {
        $this->imeis_current[] = $imeisCurrent;

        return $this;
    }

    /**
     * Remove imeisCurrent
     *
     * @param \AppBundle\Entity\Imei $imeisCurrent
     */
    public function removeImeisCurrent(\AppBundle\Entity\Imei $imeisCurrent)
    {
        $this->imeis_current->removeElement($imeisCurrent);
    }

    /**
     * Get imeisCurrent
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImeisCurrent()
    {
        return $this->imeis_current;
    }

    /**
     * Add imeisDestiny
     *
     * @param \AppBundle\Entity\Imei $imeisDestiny
     *
     * @return Warehouse
     */
    public function addImeisDestiny(\AppBundle\Entity\Imei $imeisDestiny)
    {
        $this->imeis_destiny[] = $imeisDestiny;

        return $this;
    }

    /**
     * Remove imeisDestiny
     *
     * @param \AppBundle\Entity\Imei $imeisDestiny
     */
    public function removeImeisDestiny(\AppBundle\Entity\Imei $imeisDestiny)
    {
        $this->imeis_destiny->removeElement($imeisDestiny);
    }

    /**
     * Get imeisDestiny
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImeisDestiny()
    {
        return $this->imeis_destiny;
    }

    /**
     * Add transferencesOrigin
     *
     * @param \AppBundle\Entity\Transference $transferencesOrigin
     *
     * @return Warehouse
     */
    public function addTransferencesOrigin(\AppBundle\Entity\Transference $transferencesOrigin)
    {
        $this->transferences_origin[] = $transferencesOrigin;

        return $this;
    }

    /**
     * Remove transferencesOrigin
     *
     * @param \AppBundle\Entity\Transference $transferencesOrigin
     */
    public function removeTransferencesOrigin(\AppBundle\Entity\Transference $transferencesOrigin)
    {
        $this->transferences_origin->removeElement($transferencesOrigin);
    }

    /**
     * Get transferencesOrigin
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransferencesOrigin()
    {
        return $this->transferences_origin;
    }

    /**
     * Add transferencesDestiny
     *
     * @param \AppBundle\Entity\Transference $transferencesDestiny
     *
     * @return Warehouse
     */
    public function addTransferencesDestiny(\AppBundle\Entity\Transference $transferencesDestiny)
    {
        $this->transferences_destiny[] = $transferencesDestiny;

        return $this;
    }

    /**
     * Remove transferencesDestiny
     *
     * @param \AppBundle\Entity\Transference $transferencesDestiny
     */
    public function removeTransferencesDestiny(\AppBundle\Entity\Transference $transferencesDestiny)
    {
        $this->transferences_destiny->removeElement($transferencesDestiny);
    }

    /**
     * Get transferencesDestiny
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransferencesDestiny()
    {
        return $this->transferences_destiny;
    }
}
