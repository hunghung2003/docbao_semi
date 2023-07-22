<?php

namespace App\Entity;

use App\Repository\BinhluanRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BinhluanRepository::class)]
class Binhluan
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $noidungbinhluan = null;

    #[ORM\ManyToOne(inversedBy: 'binhluans')]
    private ?Baiviet $baiviet = null;

    #[ORM\ManyToOne(inversedBy: 'binhluans')]
    private ?Tacgia $tacgia = null;

    #[ORM\Column(length: 255)]
    private ?string $fullname = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoidungbinhluan(): ?string
    {
        return $this->noidungbinhluan;
    }

    public function setNoidungbinhluan(string $noidungbinhluan): static
    {
        $this->noidungbinhluan = $noidungbinhluan;

        return $this;
    }

    public function getBaiviet(): ?Baiviet
    {
        return $this->baiviet;
    }

    public function setBaiviet(?Baiviet $baiviet): static
    {
        $this->baiviet = $baiviet;

        return $this;
    }

    public function getTacgia(): ?Tacgia
    {
        return $this->tacgia;
    }

    public function setTacgia(?Tacgia $tacgia): static
    {
        $this->tacgia = $tacgia;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): static
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }
}
