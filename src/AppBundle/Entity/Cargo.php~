<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cargo
 *
 * @ORM\Table(name="cargo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CargoRepository")
 */
class Cargo
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
    * @ORM\ManyToOne(targetEntity="Transference", inversedBy="cargos")
    * @ORM\JoinColumn(name="transference_id", referencedColumnName="id")
    */
    private $transference;

    /**
    * @ORM\ManyToOne(targetEntity="Pallet", inversedBy="cargos")
    * @ORM\JoinColumn(name="pallet_id", referencedColumnName="id")
    */
    private $pallet;

    /**
    * @ORM\ManyToOne(targetEntity="master", inversedBy="cargos")
    * @ORM\JoinColumn(name="master_id", referencedColumnName="id")
    */
    private $master;

    /**
    * @ORM\ManyToOne(targetEntity="Imei", inversedBy="cargos")
    * @ORM\JoinColumn(name="imei_id", referencedColumnName="id")
    */
    private $imei;


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
     * Set transferenceId
     *
     * @param \AppBundle\Entity\transference $transferenceId
     *
     * @return Cargo
     */
    public function setTransferenceId(\AppBundle\Entity\transference $transferenceId = null)
    {
        $this->transference_id = $transferenceId;

        return $this;
    }

    /**
     * Get transferenceId
     *
     * @return \AppBundle\Entity\transference
     */
    public function getTransferenceId()
    {
        return $this->transference_id;
    }

    /**
     * Set palletId
     *
     * @param \AppBundle\Entity\pallet $palletId
     *
     * @return Cargo
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
     * Set masterId
     *
     * @param \AppBundle\Entity\master $masterId
     *
     * @return Cargo
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
     * Set imeiId
     *
     * @param \AppBundle\Entity\imei $imeiId
     *
     * @return Cargo
     */
    public function setImeiId(\AppBundle\Entity\imei $imeiId = null)
    {
        $this->imei_id = $imeiId;

        return $this;
    }

    /**
     * Get imeiId
     *
     * @return \AppBundle\Entity\imei
     */
    public function getImeiId()
    {
        return $this->imei_id;
    }

    /**
     * Set transference
     *
     * @param \AppBundle\Entity\Transference $transference
     *
     * @return Cargo
     */
    public function setTransference(\AppBundle\Entity\Transference $transference = null)
    {
        $this->transference = $transference;

        return $this;
    }

    /**
     * Get transference
     *
     * @return \AppBundle\Entity\Transference
     */
    public function getTransference()
    {
        return $this->transference;
    }

    /**
     * Set pallets
     *
     * @param \AppBundle\Entity\Pallet $pallets
     *
     * @return Cargo
     */
    public function setPallets(\AppBundle\Entity\Pallet $pallets = null)
    {
        $this->pallets = $pallets;

        return $this;
    }

    /**
     * Get pallets
     *
     * @return \AppBundle\Entity\Pallet
     */
    public function getPallets()
    {
        return $this->pallets;
    }

    /**
     * Set masters
     *
     * @param \AppBundle\Entity\master $masters
     *
     * @return Cargo
     */
    public function setMasters(\AppBundle\Entity\master $masters = null)
    {
        $this->masters = $masters;

        return $this;
    }

    /**
     * Get masters
     *
     * @return \AppBundle\Entity\master
     */
    public function getMasters()
    {
        return $this->masters;
    }

    /**
     * Set imeis
     *
     * @param \AppBundle\Entity\Imei $imeis
     *
     * @return Cargo
     */
    public function setImeis(\AppBundle\Entity\Imei $imeis = null)
    {
        $this->imeis = $imeis;

        return $this;
    }

    /**
     * Get imeis
     *
     * @return \AppBundle\Entity\Imei
     */
    public function getImeis()
    {
        return $this->imeis;
    }

    /**
     * Set pallet
     *
     * @param \AppBundle\Entity\Pallet $pallet
     *
     * @return Cargo
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
     * Set master
     *
     * @param \AppBundle\Entity\master $master
     *
     * @return Cargo
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
     * Set imei
     *
     * @param \AppBundle\Entity\Imei $imei
     *
     * @return Cargo
     */
    public function setImei(\AppBundle\Entity\Imei $imei = null)
    {
        $this->imei = $imei;

        return $this;
    }

    /**
     * Get imei
     *
     * @return \AppBundle\Entity\Imei
     */
    public function getImei()
    {
        return $this->imei;
    }
}
