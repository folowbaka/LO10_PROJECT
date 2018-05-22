<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TableJeuTypeRepository")
 */
class TableJeuType
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TableJeu", mappedBy="type")
     */
    private $tableJeux;

    public function __construct()
    {
        $this->tableJeux = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|TableJeu[]
     */
    public function getTableJeux(): Collection
    {
        return $this->tableJeux;
    }

    public function addTableJeux(TableJeu $tableJeux): self
    {
        if (!$this->tableJeux->contains($tableJeux)) {
            $this->tableJeux[] = $tableJeux;
            $tableJeux->setType($this);
        }

        return $this;
    }

    public function removeTableJeux(TableJeu $tableJeux): self
    {
        if ($this->tableJeux->contains($tableJeux)) {
            $this->tableJeux->removeElement($tableJeux);
            // set the owning side to null (unless already changed)
            if ($tableJeux->getType() === $this) {
                $tableJeux->setType(null);
            }
        }

        return $this;
    }
}
