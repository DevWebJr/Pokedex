<?php

namespace App\Entity;

use App\Repository\CapacityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CapacityRepository::class)
 */
class Capacity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $details;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logoMini;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logoMaxi;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="capacity", orphanRemoval=true)
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getLogoMini(): ?string
    {
        return $this->logoMini;
    }

    public function setLogoMini(string $logoMini): self
    {
        $this->logoMini = $logoMini;

        return $this;
    }

    public function getLogoMaxi(): ?string
    {
        return $this->logoMaxi;
    }

    public function setLogoMaxi(string $logoMaxi): self
    {
        $this->logoMaxi = $logoMaxi;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setCapacity($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getCapacity() === $this) {
                $category->setCapacity(null);
            }
        }

        return $this;
    }
}
