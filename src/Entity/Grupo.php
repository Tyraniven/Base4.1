<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GrupoRepository")
 */
class Grupo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codigo_grupo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Clase")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_clase;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCodigoGrupo(): ?string
    {
        return $this->codigo_grupo;
    }

    public function setCodigoGrupo(string $codigo_grupo): self
    {
        $this->codigo_grupo = $codigo_grupo;

        return $this;
    }

    public function getIdClase(): ?Clase
    {
        return $this->id_clase;
    }

    public function setIdClase(?Clase $id_clase): self
    {
        $this->id_clase = $id_clase;

        return $this;
    }
}
