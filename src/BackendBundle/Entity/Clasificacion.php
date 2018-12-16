<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clasificacion
 *
 * @ORM\Table(name="clasificacion", uniqueConstraints={@ORM\UniqueConstraint(name="idClasificacion_UNIQUE", columns={"idClasificacion"})})
 * @ORM\Entity
 */
class Clasificacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idClasificacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclasificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="clasificacionJuego", type="string", length=45, nullable=true)
     */
    private $clasificacionjuego;



    /**
     * Get idclasificacion
     *
     * @return integer
     */
    public function getIdclasificacion()
    {
        return $this->idclasificacion;
    }

    /**
     * Set clasificacionjuego
     *
     * @param string $clasificacionjuego
     *
     * @return Clasificacion
     */
    public function setClasificacionjuego($clasificacionjuego)
    {
        $this->clasificacionjuego = $clasificacionjuego;

        return $this;
    }

    /**
     * Get clasificacionjuego
     *
     * @return string
     */
    public function getClasificacionjuego()
    {
        return $this->clasificacionjuego;
    }
}
