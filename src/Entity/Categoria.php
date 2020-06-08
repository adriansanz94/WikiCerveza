<?php

namespace App\Entity;

use App\Repository\CategoriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriaRepository::class)
 */
class Categoria
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
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity=Cerveza::class, mappedBy="categoria")
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

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

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
            $cerveza->setCategoria($this);
        }

        return $this;
    }

    public function removeCerveza(Cerveza $cerveza): self
    {
        if ($this->cervezas->contains($cerveza)) {
            $this->cervezas->removeElement($cerveza);
            // set the owning side to null (unless already changed)
            if ($cerveza->getCategoria() === $this) {
                $cerveza->setCategoria(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getNombre();
    }
}
