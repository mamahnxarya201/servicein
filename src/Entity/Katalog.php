<?php

namespace App\Entity;

use App\Repository\KatalogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: KatalogRepository::class)]
class Katalog
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tipe = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $harga = null;

    /**
     * @var Collection<int, Paket>
     */
    #[ORM\OneToMany(targetEntity: Paket::class, mappedBy: 'barang')]
    private Collection $pakets;

    #[ORM\Column(length: 255)]
    private ?string $images = null;

    public function __construct()
    {
        $this->pakets = new ArrayCollection();
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getTipe(): ?string
    {
        return $this->tipe;
    }

    public function setTipe(string $tipe): static
    {
        $this->tipe = $tipe;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getHarga(): ?string
    {
        return $this->harga;
    }

    public function setHarga(string $harga): static
    {
        $this->harga = $harga;

        return $this;
    }

    /**
     * @return Collection<int, Paket>
     */
    public function getPakets(): Collection
    {
        return $this->pakets;
    }

    public function addPaket(Paket $paket): static
    {
        if (!$this->pakets->contains($paket)) {
            $this->pakets->add($paket);
            $paket->setBarang($this);
        }

        return $this;
    }

    public function removePaket(Paket $paket): static
    {
        if ($this->pakets->removeElement($paket)) {
            // set the owning side to null (unless already changed)
            if ($paket->getBarang() === $this) {
                $paket->setBarang(null);
            }
        }

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(string $images): static
    {
        $this->images = $images;

        return $this;
    }
}
