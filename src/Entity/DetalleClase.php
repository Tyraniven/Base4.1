<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DetalleClaseRepository")
 */
class DetalleClase
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Clase", inversedBy="id_detalleclase")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_clase;

    public function getId(): ?int
    {
        return $this->id;
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
