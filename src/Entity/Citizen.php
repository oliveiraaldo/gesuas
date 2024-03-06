<?php

namespace App\Entity;

use App\Repository\CitizenRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Event\PrePersistEventArgs;

#[ORM\Entity(repositoryClass: CitizenRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Citizen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 11, unique: true)]
    private ?string $nis = null;

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

    public function getNis(): ?string
    {
        return $this->nis;
    }

    public function setNis(string $nis): self
    {
        $this->nis = $nis;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    #[ORM\PrePersist]
    public function generateNis(): void
    {
        $this->nis = (string) random_int(10000000000, 99999999999);
        // Simples verificação para debug
        error_log('NIS gerado: ' . $this->nis);
    }
    
}