<?php

namespace App\Entity;

use App\Repository\TheloaiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TheloaiRepository::class)]
class Theloai
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tentheloai = null;

    #[ORM\OneToMany(mappedBy: 'theloai', targetEntity: Baiviet::class)]
    private Collection $baiviets;

    public function __construct()
    {
        $this->baiviets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTentheloai(): ?string
    {
        return $this->tentheloai;
    }

    public function setTentheloai(string $tentheloai): static
    {
        $this->tentheloai = $tentheloai;

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
            $baiviet->setTheloai($this);
        }

        return $this;
    }

    public function removeBaiviet(Baiviet $baiviet): static
    {
        if ($this->baiviets->removeElement($baiviet)) {
            // set the owning side to null (unless already changed)
            if ($baiviet->getTheloai() === $this) {
                $baiviet->setTheloai(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->tentheloai;
        // TODO: Implement __toString() method.
    }
}
