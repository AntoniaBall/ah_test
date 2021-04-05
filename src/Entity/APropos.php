<?php

namespace App\Entity;

use App\Repository\AProposRepository;
use App\Controller\AProposController;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(normalizationContext={"groups"={"apropos:read"}},
 *     denormalizationContext={"groups"={"apropos:write"}},
 *     collectionOperations={
 *          "get",
 *          "post"={
 *             "security"="is_granted('ROLE_ADMIN')",
 *             "controller"=AProposController::class
 *          }
 *      }
 * )
 * @ORM\Entity(repositoryClass=AProposRepository::class)
 */
class APropos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"apropos:read","apropos:write"})
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @Groups({"apropos:read"})
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActived;

    public function __construct(){
        $this->createdAt = new \DateTime();
        $this->isActived = true;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getIsActived(): ?bool
    {
        return $this->isActived;
    }

    public function setIsActived(bool $isActived): self
    {
        $this->isActived = $isActived;

        return $this;
    }
}
