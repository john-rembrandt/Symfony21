<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NewsRepository::class)
 */
class News
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
    private $auteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAjout;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateModif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateAjout(): ?\DateTime
    {
        return $this->dateAjout;
    }

    public function setDateAjout(\DateTime $dateAjout): self
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    public function getDateModif(): ?\DateTime
    {
        return $this->dateModif;
    }

    public function setDateModif(\DateTime $dateModif): self
    {
        $this->dateModif = $dateModif;

        return $this;
    }
}
