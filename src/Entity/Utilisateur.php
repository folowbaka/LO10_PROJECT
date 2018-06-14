<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pseudo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TableJeu", mappedBy="emailUtilisateur")
     */
    private $tablesJeu;

    public function __construct()
    {
        $this->tablesJeu = new ArrayCollection();
        $numargs = func_num_args();
        if($numargs==2)
        {
            $email=func_get_arg(0);
            $pseudo=func_get_arg(1);
            $this->setEmail($email);
            $this->setPseudo($pseudo);

        }
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->Pseudo;
    }

    public function setPseudo(string $Pseudo): self
    {
        $this->Pseudo = $Pseudo;

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
            $tablesJeu->setEmailUtilisateur($this);
        }

        return $this;
    }

    public function removeTablesJeu(TableJeu $tablesJeu): self
    {
        if ($this->tablesJeu->contains($tablesJeu)) {
            $this->tablesJeu->removeElement($tablesJeu);
            // set the owning side to null (unless already changed)
            if ($tablesJeu->getEmailUtilisateur() === $this) {
                $tablesJeu->setEmailUtilisateur(null);
            }
        }

        return $this;
    }
}
