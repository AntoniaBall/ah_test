<?php

namespace App\Entity;

use App\Repository\PicturesRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
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
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $url;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_size;

    /**
     * @ORM\Column(type="array")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Comments::class, inversedBy="pictures")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=Property::class, inversedBy="pictures")
     */
    private $property;

    /**
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
