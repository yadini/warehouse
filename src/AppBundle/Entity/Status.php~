<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 *
 * @ORM\Table(name="status")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StatusRepository")
 */
class Status
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
     * @ORM\Column(name="label", type="string", length=200, unique=true)
     */
    private $label;

    /**
    * @ORM\OneToMany(targetEntity="master", mappedBy="status")
    */
    private $masters;

    /**
    * @ORM\OneToMany(targetEntity="Pallet", mappedBy="status")
    */
    private $pallets;

    /**
    * @ORM\OneToMany(targetEntity="Imei", mappedBy="status")
    */
    private $imeis;

    /**
    * @ORM\OneToMany(targetEntity="Pallet", mappedBy="status")
    */
    private $pallet_id;


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
     * @return Status
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
        $this->master_id = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pallet_id = new \Doctrine\Common\Collections\ArrayCollection();
        $this->imei_id = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add masterId
     *
     * @param \AppBundle\Entity\master $masterId
     *
     * @return Status
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
     * Add palletId
     *
     * @param \AppBundle\Entity\pallet $palletId
     *
     * @return Status
     */
    public function addPalletId(\AppBundle\Entity\pallet $palletId)
    {
        $this->pallet_id[] = $palletId;

        return $this;
    }

    /**
     * Remove palletId
     *
     * @param \AppBundle\Entity\pallet $palletId
     */
    public function removePalletId(\AppBundle\Entity\pallet $palletId)
    {
        $this->pallet_id->removeElement($palletId);
    }

    /**
     * Get palletId
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPalletId()
    {
        return $this->pallet_id;
    }

    /**
     * Add imeiId
     *
     * @param \AppBundle\Entity\imei $imeiId
     *
     * @return Status
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
     * Add master
     *
     * @param \AppBundle\Entity\master $master
     *
     * @return Status
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
     * Add imei
     *
     * @param \AppBundle\Entity\Imei $imei
     *
     * @return Status
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
     * Add pallet
     *
     * @param \AppBundle\Entity\Pallet $pallet
     *
     * @return Status
     */
    public function addPallet(\AppBundle\Entity\Pallet $pallet)
    {
        $this->pallets[] = $pallet;

        return $this;
    }

    /**
     * Remove pallet
     *
     * @param \AppBundle\Entity\Pallet $pallet
     */
    public function removePallet(\AppBundle\Entity\Pallet $pallet)
    {
        $this->pallets->removeElement($pallet);
    }

    /**
     * Get pallets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPallets()
    {
        return $this->pallets;
    }
}
