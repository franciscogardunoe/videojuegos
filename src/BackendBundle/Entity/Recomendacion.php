<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recomendacion
 *
 * @ORM\Table(name="recomendacion", uniqueConstraints={@ORM\UniqueConstraint(name="idRecomendacion_UNIQUE", columns={"idRecomendacion"})}, indexes={@ORM\Index(name="fk_Usuario_has_videojuego_videojuego1_idx", columns={"idVideojuego"}), @ORM\Index(name="fk_Usuario_has_videojuego_Usuario1_idx", columns={"idUsuario"})})
 * @ORM\Entity
 */
class Recomendacion
{
    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=45, nullable=true)
     */
    private $comentario;

    /**
     * @var integer
     *
     * @ORM\Column(name="estrellas", type="integer", nullable=true)
     */
    private $estrellas;

    /**
     * @var integer
     *
     * @ORM\Column(name="idRecomendacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrecomendacion;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUsuario", referencedColumnName="idUsuario")
     * })
     */
    private $idusuario;

    /**
     * @var \Videojuego
     *
     * @ORM\ManyToOne(targetEntity="Videojuego")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVideojuego", referencedColumnName="idVideojuego")
     * })
     */
    private $idvideojuego;



    /**
     * Set comentario
     *
     * @param string $comentario
     *
     * @return Recomendacion
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set estrellas
     *
     * @param integer $estrellas
     *
     * @return Recomendacion
     */
    public function setEstrellas($estrellas)
    {
        $this->estrellas = $estrellas;

        return $this;
    }

    /**
     * Get estrellas
     *
     * @return integer
     */
    public function getEstrellas()
    {
        return $this->estrellas;
    }

    /**
     * Get idrecomendacion
     *
     * @return integer
     */
    public function getIdrecomendacion()
    {
        return $this->idrecomendacion;
    }

    /**
     * Set idusuario
     *
     * @param \BackendBundle\Entity\Usuario $idusuario
     *
     * @return Recomendacion
     */
    public function setIdusuario(\BackendBundle\Entity\Usuario $idusuario = null)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return \BackendBundle\Entity\Usuario
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set idvideojuego
     *
     * @param \BackendBundle\Entity\Videojuego $idvideojuego
     *
     * @return Recomendacion
     */
    public function setIdvideojuego(\BackendBundle\Entity\Videojuego $idvideojuego = null)
    {
        $this->idvideojuego = $idvideojuego;

        return $this;
    }

    /**
     * Get idvideojuego
     *
     * @return \BackendBundle\Entity\Videojuego
     */
    public function getIdvideojuego()
    {
        return $this->idvideojuego;
    }
}
