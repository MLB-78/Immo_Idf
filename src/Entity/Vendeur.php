<?php

namespace App\Entity;

use App\Repository\VendeurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VendeurRepository::class)
 */
class Vendeur
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
    private $nomV;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomV(): ?string
    {
        return $this->nomV;
    }

    public function setNomV(string $nomV): self
    {
        $this->nomV = $nomV;

        return $this;
    }
}
