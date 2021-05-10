<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NewsletterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"user:read"}},
*     denormalizationContext={"groups"={"user:write"}},
*     collectionOperations={
*           "get"={
*                   "security"="is_granted('ROLE_ADMIN')",
*                   "security_message"="Only admin can view users list and privileges"
*           },
*           "post"
*     },
*     itemOperations={
*           "put"={
*                   "security"="is_granted('ROLE_ADMIN') or object == user",
*                   "security_message"= "You are not the owner of this profile"
*           },
*           "delete"={
*                   "security"="is_granted('ROLE_ADMIN') or object == user",
*                   "security_message"= "You are not the owner of this profile"
*           },
*      },
* )
* @ORM\Entity(repositoryClass=NewsletterRepository::class)
*/
class Newsletter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
