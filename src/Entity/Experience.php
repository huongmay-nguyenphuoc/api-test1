<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ExperienceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"experience:read"}},
 *      denormalizationContext={"groups"={"experience:write"}}
 * 
 * )
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 */
class Experience
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"experience:read", "user:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"experience:read", "experience:write", "user:read"})
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * 
     * @Groups({"experience:read", "experience:write", "user:read"})
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"experience:read", "experience:write", "user:read"})
     */
    private $image;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * 
     * @Groups({"experience:read", "experience:write", "user:read"})
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"experience:read", "experience:write", "user:read"})
     */
    private $location;

    /**
     * @ORM\Column(type="integer")
     * 
     * @Groups({"experience:read", "experience:write", "user:read"})
     */
    private $spots;

    /**
     * @ORM\Column(type="integer")
     * 
     * @Groups({"experience:read", "experience:write", "user:read"})
     */
    private $duration;

    /**
     * @ORM\Column(type="boolean")
     * 
     * @Groups({"experience:read", "experience:write", "user:read"})
     */
    private $visible;

    /**
     * @ORM\Column(type="boolean")
     * 
     * @Groups({"experience:read", "experience:write", "user:read"})
     */
    private $archive;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * 
     * @Groups("experience:read")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="experiences")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"experience:write", "experience:read"})
     */
    private $user;

    public function __construct()
    {
        $this->archive = false;
        $this->createdAt = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getSpots(): ?int
    {
        return $this->spots;
    }

    public function setSpots(int $spots): self
    {
        $this->spots = $spots;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): self
    {
        $this->visible = $visible;

        return $this;
    }

    public function getArchive(): ?bool
    {
        return $this->archive;
    }

    public function setArchive(bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTime $updated_at): self
    {
        $this->updated_at = $updated_at;

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
