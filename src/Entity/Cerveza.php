<?php

namespace App\Entity;

use App\Repository\CervezaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CervezaRepository::class)
 */
class Cerveza
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
     * @ORM\Column(type="float", nullable=true)
     */
    private $graduacion;

    /**
     * @ORM\ManyToOne(targetEntity=Categoria::class, inversedBy="cervezas")
     */
    private $categoria;

    /**
     * @ORM\ManyToMany(targetEntity=Etiqueta::class, inversedBy="cervezas")
     */
    private $etiqueta;

    public function __construct()
    {
        $this->etiqueta = new ArrayCollection();
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

    public function getGraduacion(): ?float
    {
        return $this->graduacion;
    }

    public function setGraduacion(?float $graduacion): self
    {
        $this->graduacion = $graduacion;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * @return Collection|Etiqueta[]
     */
    public function getEtiqueta(): Collection
    {
        return $this->etiqueta;
    }

    public function addEtiquetum(Etiqueta $etiquetum): self
    {
        if (!$this->etiqueta->contains($etiquetum)) {
            $this->etiqueta[] = $etiquetum;
        }

        return $this;
    }

    public function removeEtiquetum(Etiqueta $etiquetum): self
    {
        if ($this->etiqueta->contains($etiquetum)) {
            $this->etiqueta->removeElement($etiquetum);
        }

        return $this;
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getNombre();
    }
}
