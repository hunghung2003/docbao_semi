<?php

namespace App\Entity;

use App\Repository\TacgiaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TacgiaRepository::class)]
class Tacgia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tentacgia = null;

    #[ORM\OneToMany(mappedBy: 'tacgia', targetEntity: Baiviet::class)]
    private Collection $baiviets;

    #[ORM\OneToMany(mappedBy: 'tacgia', targetEntity: Binhluan::class)]
    private Collection $binhluans;

    public function __construct()
    {
        $this->baiviets = new ArrayCollection();
        $this->binhluans = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTentacgia(): ?string
    {
        return $this->tentacgia;
    }

    public function setTentacgia(string $tentacgia): static
    {
        $this->tentacgia = $tentacgia;

        return $this;
    }

    /**
     * @return Collection<int, Baiviet>
     */
    public function getBaiviets(): Collection
    {
        return $this->baiviets;
    }

    public function addBaiviet(Baiviet $baiviet): static
    {
        if (!$this->baiviets->contains($baiviet)) {
            $this->baiviets->add($baiviet);
            $baiviet->setTacgia($this);
        }

        return $this;
    }

    public function removeBaiviet(Baiviet $baiviet): static
    {
        if ($this->baiviets->removeElement($baiviet)) {
            // set the owning side to null (unless already changed)
            if ($baiviet->getTacgia() === $this) {
                $baiviet->setTacgia(null);
            }
        }

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
            $binhluan->setTacgia($this);
        }

        return $this;
    }

    public function removeBinhluan(Binhluan $binhluan): static
    {
        if ($this->binhluans->removeElement($binhluan)) {
            // set the owning side to null (unless already changed)
            if ($binhluan->getTacgia() === $this) {
                $binhluan->setTacgia(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->tentacgia;
        // TODO: Implement __toString() method.
    }
}
