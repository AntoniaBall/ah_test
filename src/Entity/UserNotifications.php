<?php

namespace App\Entity;

use App\Repository\UserNotificationsRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"userNotifications:read"}},
 *     denormalizationContext={"groups"={"userNotifications:write"}},
 *     subresourceOperations={
 *         "api_users_user_notifications_get_subresource"={
 *             "security"="is_granted('ROLE_PROPRIO')",
 *             "order"={"createdAt":"ASC"}
 *         }
 *     }
 * )
 * @ORM\Entity(repositoryClass=UserNotificationsRepository::class)
 */
#[ApiResource]
class UserNotifications
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups("userNotifications:read")
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userNotifications")
     */
    private $user;

    /**
     * @Groups("userNotifications:read")
     * @ORM\Column(type="string", length=255)
     */
    private $notificationText;

    /**
     * @Groups("userNotifications:read")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    public function __construct(){
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNotificationText(): ?string
    {
        return $this->notificationText;
    }

    public function setNotificationText(string $notificationText): self
    {
        $this->notificationText = $notificationText;

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
}
