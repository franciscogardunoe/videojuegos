<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clasificaciondetipo
 *
 * @ORM\Table(name="clasificaciondetipo", uniqueConstraints={@ORM\UniqueConstraint(name="idClasificaciondeTipo_UNIQUE", columns={"idClasificaciondeTipo"})})
 * @ORM\Entity
 */
class Clasificaciondetipo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idClasificaciondeTipo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclasificaciondetipo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoJuego", type="string", length=45, nullable=true)
     */
    private $tipojuego;



    /**
     * Get idclasificaciondetipo
     *
     * @return integer
     */
    public function getIdclasificaciondetipo()
    {
        return $this->idclasificaciondetipo;
    }

    /**
     * Set tipojuego
     *
     * @param string $tipojuego
     *
     * @return Clasificaciondetipo
     */
    public function setTipojuego($tipojuego)
    {
        $this->tipojuego = $tipojuego;

        return $this;
    }

    /**
     * Get tipojuego
     *
     * @return string
     */
    public function getTipojuego()
    {
        return $this->tipojuego;
    }
}
