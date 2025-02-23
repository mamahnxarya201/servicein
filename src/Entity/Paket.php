<?php

namespace App\Entity;

use App\Repository\PaketRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: PaketRepository::class)]
class Paket
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255)]
    private ?string $penerima = null;

    #[ORM\Column(length: 255)]
    private ?string $alamat = null;

    #[ORM\Column(length: 255)]
    private ?string $notelp = null;

    #[ORM\ManyToOne(inversedBy: 'pakets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'pakets')]
    private ?Katalog $barang = null;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getPenerima(): ?string
    {
        return $this->penerima;
    }

    public function setPenerima(string $penerima): static
    {
        $this->penerima = $penerima;

        return $this;
    }

    public function getAlamat(): ?string
    {
        return $this->alamat;
    }

    public function setAlamat(string $alamat): static
    {
        $this->alamat = $alamat;

        return $this;
    }

    public function getNotelp(): ?string
    {
        return $this->notelp;
    }

    public function setNotelp(string $notelp): static
    {
        $this->notelp = $notelp;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getBarang(): ?Katalog
    {
        return $this->barang;
    }

    public function setBarang(?Katalog $barang): static
    {
        $this->barang = $barang;

        return $this;
    }
}
