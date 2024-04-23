<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez saisir le nom de la ville")
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=500)
     * @Assert\Length( 
     *  min=10,
     *  max=250,
     *  minMessage="La description doit comporter au minimum {{ limit }}",
     *  maxMessage="La description doit comporter au maximum{{ limit }}"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez insérer l'image du bien que vous souhaitez vendre")
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez indiquez le code postale")
     */
    private $cp;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="annonces")

     */
    private $Utilisateurs;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="annonce")
     */
    private $Messages;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $superficie;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_piece;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="annonces")
     */
    private $Annonce;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="annonces")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Vendeur::class, inversedBy="annonces")
     */
    private $vendeurs;

    /**
     * @ORM\ManyToOne(targetEntity=Etat::class, inversedBy="annonces")
     * @Assert\NotBlank(message="Veuillez séléctionnez au mois un état !")
     */
    private $etat;

   
    public function __construct()
    {
        $this->Maisons = new ArrayCollection();
        $this->Appartements = new ArrayCollection();
        $this->Messages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }


    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getUtilisateurs(): ?Utilisateur
    {
        return $this->Utilisateurs;
    }

    public function setUtilisateurs(?Utilisateur $Utilisateurs): self
    {
        $this->Utilisateurs = $Utilisateurs;

        
        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->Messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->Messages->contains($message)) {
            $this->Messages[] = $message;
            $message->setAnnonce($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->Messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getAnnonce() === $this) {
                $message->setAnnonce(null);
            }
        }

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getSuperficie(): ?int
    {
        return $this->superficie;
    }

    public function setSuperficie(int $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getNbPiece(): ?int
    {
        return $this->nb_piece;
    }

    public function setNbPiece(int $nb_piece): self
    {
        $this->nb_piece = $nb_piece;

        return $this;
    }

    public function getAnnonce(): ?Type
    {
        return $this->Annonce;
    }

    public function setAnnonce(?Type $Annonce): self
    {
        
        $this->Annonce = $Annonce;
 
        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getVendeurs(): ?Vendeur
    {
        return $this->vendeurs;
    }

    public function setVendeurs(?Vendeur $vendeurs): self
    {
        $this->vendeurs = $vendeurs;

        return $this;
    }

    public function getEtat(): ?Etat
    {
        return $this->etat;
    }

    public function setEtat(?Etat $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

}
