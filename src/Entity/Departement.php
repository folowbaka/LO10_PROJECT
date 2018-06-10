<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartementRepository")
 */
class Departement
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string",length=255)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Region", inversedBy="departements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $region;

    public function __construct()
    {
        $numargs = func_num_args();
        if($numargs==3)
        {
            $nom=func_get_arg(0);
            $region=func_get_arg(1);
            $code=func_get_arg(2);
            $this->setNom($nom);
            $this->setRegion($region);
            $this->setCode($code);
        }
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }
}
