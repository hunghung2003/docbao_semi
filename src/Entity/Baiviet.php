<?php

namespace App\Entity;

use App\Repository\BaivietRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BaivietRepository::class)]
class Baiviet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tieude = null;

    #[ORM\Column(length: 255)]
    private ?string $noidung = null;

    #[ORM\Column(length: 255)]
    private ?string $ngayxuatban = null;

    #[ORM\ManyToOne(inversedBy: 'baiviets')]
    private ?Tacgia $tacgia = null;

    #[ORM\ManyToOne(inversedBy: 'baiviets')]
    private ?Theloai $theloai = null;

    #[ORM\OneToMany(mappedBy: 'baiviet', targetEntity: Binhluan::class)]
    private Collection $binhluans;

    #[ORM\Column(length: 255)]
    private ?string $hinh = null;

    public function __construct()
    {
        $this->binhluans = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTieude(): ?string
    {
        return $this->tieude;
    }

    public function setTieude(string $tieude): static
    {
        $this->tieude = $tieude;

        return $this;
    }

    public function getNoidung(): ?string
    {
        return $this->noidung;
    }

    public function setNoidung(string $noidung): static
    {
        $this->noidung = $noidung;

        return $this;
    }

    public function getNgayxuatban(): ?string
    {
        return $this->ngayxuatban;
    }

    public function setNgayxuatban(string $ngayxuatban): static
    {
        $this->ngayxuatban = $ngayxuatban;

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

    public function getTheloai(): ?Theloai
    {
        return $this->theloai;
    }

    public function setTheloai(?Theloai $theloai): static
    {
        $this->theloai = $theloai;

        return $this;
    }

    /**
     * @return Collection<int, Binhluan>
     */
    public function getBinhluans(): Collection
    {
        return $this->binhluans;
    }

    public function addBinhluan(Binhluan $binhluan): static
    {
        if (!$this->binhluans->contains($binhluan)) {
            $this->binhluans->add($binhluan);
            $binhluan->setBaiviet($this);
        }

        return $this;
    }

    public function removeBinhluan(Binhluan $binhluan): static
    {
        if ($this->binhluans->removeElement($binhluan)) {
            // set the owning side to null (unless already changed)
            if ($binhluan->getBaiviet() === $this) {
                $binhluan->setBaiviet(null);
            }
        }

        return $this;
    }

    public function getHinh(): ?string
    {
        return $this->hinh;
    }

    public function setHinh(string $hinh): static
    {
        $this->hinh = $hinh;

        return $this;
    }

    public function __toString()
    {
        return $this->tieude;
        // TODO: Implement __toString() method.
    }

}
