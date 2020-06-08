<?php

namespace App\Entity;

use App\Repository\EtiquetaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtiquetaRepository::class)
 */
class Etiqueta
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\ManyToMany(targetEntity=Cerveza::class, mappedBy="etiqueta")
     */
    private $cervezas;

    public function __construct()
    {
        $this->cervezas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|Cerveza[]
     */
    public function getCervezas(): Collection
    {
        return $this->cervezas;
    }

    public function addCerveza(Cerveza $cerveza): self
    {
        if (!$this->cervezas->contains($cerveza)) {
            $this->cervezas[] = $cerveza;
            $cerveza->addEtiquetum($this);
        }

        return $this;
    }

    public function removeCerveza(Cerveza $cerveza): self
    {
        if ($this->cervezas->contains($cerveza)) {
            $this->cervezas->removeElement($cerveza);
            $cerveza->removeEtiquetum($this);
        }

        return $this;
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getNombre();
    }
}
