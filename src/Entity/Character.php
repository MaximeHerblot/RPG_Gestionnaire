<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 * @ORM\Table(name="`character`")
 */
class Character
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
    private $Name;

    /**
     * @ORM\Column(type="integer")
     */
    private $Strength;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Dexterity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Constitution;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Intelligence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Wisdom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Charisma;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Characters")
     */
    private $user;

    public function __construct($name,$strength,$dexterity,$constitution,$intelligence,$sagesse,$charisme)
    {
        $this->Name = $name;
        $this->Strength = $strength;
        $this->Dexterity = $dexterity;
        $this->Constitution = $constitution;
        $this->Intelligence = $intelligence;
        $this->Wisdom = $sagesse;
        $this->Charisma = $charisme;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getStrength(): ?int
    {
        return $this->Strength;
    }

    public function setStrength(int $Strength): self
    {
        $this->Strength = $Strength;

        return $this;
    }

    public function getDexterity(): ?string
    {
        return $this->Dexterity;
    }

    public function setDexterity(string $Dexterity): self
    {
        $this->Dexterity = $Dexterity;

        return $this;
    }

    public function getConstitution(): ?string
    {
        return $this->Constitution;
    }

    public function setConstitution(string $Constitution): self
    {
        $this->Constitution = $Constitution;

        return $this;
    }

    public function getIntelligence(): ?string
    {
        return $this->Intelligence;
    }

    public function setIntelligence(string $Intelligence): self
    {
        $this->Intelligence = $Intelligence;

        return $this;
    }

    public function getWisdom(): ?string
    {
        return $this->Wisdom;
    }

    public function setWisdom(string $Wisdom): self
    {
        $this->Wisdom = $Wisdom;

        return $this;
    }

    public function getCharisma(): ?string
    {
        return $this->Charisma;
    }

    public function setCharisma(string $Charisma): self
    {
        $this->Charisma = $Charisma;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
