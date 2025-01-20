<?php

namespace App\Entity;

use App\Repository\PaketRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaketRepository::class)]
class Paket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $penerima = null;

    #[ORM\Column(length: 255)]
    private ?string $alamat = null;

    #[ORM\Column(length: 255)]
    private ?string $notelp = null;

    public function getId(): ?int
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
}
