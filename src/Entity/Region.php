<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegionRepository")
 */
class Region
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string",length=255)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Departement", mappedBy="region")
     */
    private $departements;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TableJeu", mappedBy="region")
     */
    private $tablesJeu;

    public function __construct()
    {
        $this->departements = new ArrayCollection();
        $this->tablesJeu = new ArrayCollection();
        $numargs = func_num_args();
        if($numargs==2)
        {
            $id=func_get_arg(0);
            $nom=func_get_arg(1);
            $this->setId($id);
            $this->setNom($nom);
        }
    }

    public function getId(): ?string
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
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Collection|Departement[]
     */
    public function getDepartements(): Collection
    {
        return $this->departements;
    }

    public function addDepartement(Departement $departement): self
    {
        if (!$this->departements->contains($departement)) {
            $this->departements[] = $departement;
            $departement->setRegion($this);
        }

        return $this;
    }

    public function removeDepartement(Departement $departement): self
    {
        if ($this->departements->contains($departement)) {
            $this->departements->removeElement($departement);
            // set the owning side to null (unless already changed)
            if ($departement->getRegion() === $this) {
                $departement->setRegion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TableJeu[]
     */
    public function getTablesJeu(): Collection
    {
        return $this->tablesJeu;
    }

    public function addTablesJeu(TableJeu $tablesJeu): self
    {
        if (!$this->tablesJeu->contains($tablesJeu)) {
            $this->tablesJeu[] = $tablesJeu;
            $tablesJeu->setRegion($this);
        }

        return $this;
    }

    public function removeTablesJeu(TableJeu $tablesJeu): self
    {
        if ($this->tablesJeu->contains($tablesJeu)) {
            $this->tablesJeu->removeElement($tablesJeu);
            // set the owning side to null (unless already changed)
            if ($tablesJeu->getRegion() === $this) {
                $tablesJeu->setRegion(null);
            }
        }

        return $this;
    }
}
