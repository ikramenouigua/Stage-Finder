<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Entity\Trait\SlugTrait;
use App\Repository\OffresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffresRepository::class)]
class Offres
{
    use CreatedAtTrait;
    //use SlugTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'text')]
    private $duree;

    #[ORM\Column(type: 'integer')]
    private $remuneration;

    #[ORM\Column(type: 'text')]
    private $image;

    #[ORM\Column(type: 'text')]
    private $ville;

    /**
     * @var User
     * @ORM\OneToMany (targetEntity=Entity/User,mappedBy={"offers")
     */
    private $user;

  
    #[ORM\ManyToOne(targetEntity: Users::class, inversedBy: 'postuler')]
    #[ORM\JoinColumn(name:"id", referencedColumnName:"id")]
    private $entreprise_id;

   

    


   


    

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getRemuneration(): ?int
    {
        return $this->remuneration;
    }

    public function setRemuneration(int $remuneration): self
    {
        $this->remuneration = $remuneration;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    

    public function __toString()
    {
        return $this->getId() ;
    }

    

    
    public function getEntrepriseId(): ?Users
    {
        return $this->entreprise_id;
    }

    public function setEntrepriseId(?Users $entreprise_id): self
    {
        $this->entreprise_id = $entreprise_id;

        return $this;
    }

    
}