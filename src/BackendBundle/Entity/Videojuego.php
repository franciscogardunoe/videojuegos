<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Videojuego
 *
 * @ORM\Table(name="videojuego", uniqueConstraints={@ORM\UniqueConstraint(name="idvideojuego_UNIQUE", columns={"idVideojuego"})}, indexes={@ORM\Index(name="fk_videojuego_ClasificaciondeTipo1_idx", columns={"idClasificaciondeTipo"}), @ORM\Index(name="fk_videojuego_Clasificacion1_idx", columns={"idClasificacion"})})
 * @ORM\Entity
 */
class Videojuego
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idVideojuego", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvideojuego;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreJuego", type="string", length=45, nullable=true)
     */
    private $nombrejuego;

    /**
     * @var string
     *
     * @ORM\Column(name="lenguajes", type="string", length=45, nullable=true)
     */
    private $lenguajes;

    /**
     * @var string
     *
     * @ORM\Column(name="sipnosis", type="string", length=100, nullable=true)
     */
    private $sipnosis;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=45, nullable=true)
     */
    private $imagen;

    /**
     * @var float
     *
     * @ORM\Column(name="precioVenta", type="float", precision=10, scale=0, nullable=true)
     */
    private $precioventa;

    /**
     * @var \Clasificacion
     *
     * @ORM\ManyToOne(targetEntity="Clasificacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClasificacion", referencedColumnName="idClasificacion")
     * })
     */
    private $idclasificacion;

    /**
     * @var \Clasificaciondetipo
     *
     * @ORM\ManyToOne(targetEntity="Clasificaciondetipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClasificaciondeTipo", referencedColumnName="idClasificaciondeTipo")
     * })
     */
    private $idclasificaciondetipo;



    /**
     * Get idvideojuego
     *
     * @return integer
     */
    public function getIdvideojuego()
    {
        return $this->idvideojuego;
    }

    /**
     * Set nombrejuego
     *
     * @param string $nombrejuego
     *
     * @return Videojuego
     */
    public function setNombrejuego($nombrejuego)
    {
        $this->nombrejuego = $nombrejuego;

        return $this;
    }

    /**
     * Get nombrejuego
     *
     * @return string
     */
    public function getNombrejuego()
    {
        return $this->nombrejuego;
    }

    /**
     * Set lenguajes
     *
     * @param string $lenguajes
     *
     * @return Videojuego
     */
    public function setLenguajes($lenguajes)
    {
        $this->lenguajes = $lenguajes;

        return $this;
    }

    /**
     * Get lenguajes
     *
     * @return string
     */
    public function getLenguajes()
    {
        return $this->lenguajes;
    }

    /**
     * Set sipnosis
     *
     * @param string $sipnosis
     *
     * @return Videojuego
     */
    public function setSipnosis($sipnosis)
    {
        $this->sipnosis = $sipnosis;

        return $this;
    }

    /**
     * Get sipnosis
     *
     * @return string
     */
    public function getSipnosis()
    {
        return $this->sipnosis;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Videojuego
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set precioventa
     *
     * @param float $precioventa
     *
     * @return Videojuego
     */
    public function setPrecioventa($precioventa)
    {
        $this->precioventa = $precioventa;

        return $this;
    }

    /**
     * Get precioventa
     *
     * @return float
     */
    public function getPrecioventa()
    {
        return $this->precioventa;
    }

    /**
     * Set idclasificacion
     *
     * @param \BackendBundle\Entity\Clasificacion $idclasificacion
     *
     * @return Videojuego
     */
    public function setIdclasificacion(\BackendBundle\Entity\Clasificacion $idclasificacion = null)
    {
        $this->idclasificacion = $idclasificacion;

        return $this;
    }

    /**
     * Get idclasificacion
     *
     * @return \BackendBundle\Entity\Clasificacion
     */
    public function getIdclasificacion()
    {
        return $this->idclasificacion;
    }

    /**
     * Set idclasificaciondetipo
     *
     * @param \BackendBundle\Entity\Clasificaciondetipo $idclasificaciondetipo
     *
     * @return Videojuego
     */
    public function setIdclasificaciondetipo(\BackendBundle\Entity\Clasificaciondetipo $idclasificaciondetipo = null)
    {
        $this->idclasificaciondetipo = $idclasificaciondetipo;

        return $this;
    }

    /**
     * Get idclasificaciondetipo
     *
     * @return \BackendBundle\Entity\Clasificaciondetipo
     */
    public function getIdclasificaciondetipo()
    {
        return $this->idclasificaciondetipo;
    }
}
