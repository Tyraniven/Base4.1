<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClaseRepository")
 */
class Clase
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
    private $codigo_clase;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Docente")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_docente;

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

    public function getCodigoClase(): ?string
    {
        return $this->codigo_clase;
    }

    public function setCodigoClase(string $codigo_clase): self
    {
        $this->codigo_clase = $codigo_clase;

        return $this;
    }

    public function getIdDocente(): ?Docente
    {
        return $this->id_docente;
    }

    public function setIdDocente(?Docente $id_docente): self
    {
        $this->id_docente = $id_docente;

        return $this;
    }
}
