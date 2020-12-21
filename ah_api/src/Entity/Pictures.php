<?php

namespace App\Entity;

use App\Repository\PicturesRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(normalizationContext={"groups"={"picture:read"}},
 *     denormalizationContext={"groups"={"picture:write"}})
 * @ORM\Entity(repositoryClass=PicturesRepository::class)
 */
class Pictures
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"picture:read", "picture:write"})
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $url;

    /**
     * @Groups({"picture:read", "picture:write"})
     * @ORM\Column(type="integer")
     */
    private $max_size;

    /**
     * @Groups({"picture:read", "picture:write"})
     * @ORM\Column(type="array")
     */
    private $status;

    /**
     * @Groups("picture:read")
     * @ORM\ManyToOne(targetEntity=Comments::class, inversedBy="pictures")
     */
    private $comments;

    /**
     * @Groups("picture:read")
     * @ORM\ManyToOne(targetEntity=Property::class, inversedBy="pictures")
     */
    private $property;

    /**
     * @Groups("picture:read")
     * @ORM\ManyToOne(targetEntity=Activities::class, inversedBy="pictures")
     */
    private $activities;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getMaxSize(): ?int
    {
        return $this->max_size;
    }

    public function setMaxSize(int $max_size): self
    {
        $this->max_size = $max_size;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getComments(): ?Comments
    {
        return $this->comments;
    }

    public function setComments(?Comments $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getProperty(): ?Property
    {
        return $this->property;
    }

    public function setProperty(?Property $property): self
    {
        $this->property = $property;

        return $this;
    }

    public function getActivities(): ?Activities
    {
        return $this->activities;
    }

    public function setActivities(?Activities $activities): self
    {
        $this->activities = $activities;

        return $this;
    }
}
