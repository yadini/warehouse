<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transporter
 *
 * @ORM\Table(name="transporter")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TransporterRepository")
 */
class Transporter
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
    * @ORM\OneToMany(targetEntity="Transference", mappedBy="transporter")
    */
    private $transferences;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=50)
     */
    private $label;



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
     * @return Transporter
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
        $this->transferences = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add transference
     *
     * @param \AppBundle\Entity\Transference $transference
     *
     * @return Transporter
     */
    public function addTransference(\AppBundle\Entity\Transference $transference)
    {
        $this->transferences[] = $transference;

        return $this;
    }

    /**
     * Remove transference
     *
     * @param \AppBundle\Entity\Transference $transference
     */
    public function removeTransference(\AppBundle\Entity\Transference $transference)
    {
        $this->transferences->removeElement($transference);
    }

    /**
     * Get transferences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransferences()
    {
        return $this->transferences;
    }
}
