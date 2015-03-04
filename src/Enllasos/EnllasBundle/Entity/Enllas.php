<?php

namespace Enllasos\EnllasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enllas
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Enllas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @var boolean
     *
     * @ORM\Column(name="privat", type="boolean")
     */
    private $privat;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcio", type="text")
     */
    private $descripcio;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Enllas
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Enllas
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set privat
     *
     * @param boolean $privat
     * @return Enllas
     */
    public function setPrivat($privat)
    {
        $this->privat = $privat;

        return $this;
    }

    /**
     * Get privat
     *
     * @return boolean 
     */
    public function getPrivat()
    {
        return $this->privat;
    }

    /**
     * Set descripcio
     *
     * @param string $descripcio
     * @return Enllas
     */
    public function setDescripcio($descripcio)
    {
        $this->descripcio = $descripcio;

        return $this;
    }

    /**
     * Get descripcio
     *
     * @return string 
     */
    public function getDescripcio()
    {
        return $this->descripcio;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}
