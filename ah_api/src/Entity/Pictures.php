<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\PicturesController;
use App\Repository\PicturesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ApiResource(
 *     iri="http://schema.org/MediaObject",
 *     normalizationContext={
 *         "groups"={"picture:read"}
 *     },
 *      denormalizationContext={
 *         "groups"={"picture:write"}
 *     },
 *     collectionOperations={
 *         "post"={
 *             "controller"=PicturesController::class,
 *             "deserialize"=false,
 *             "validation_groups"={"Default", "picture:write"},
 *             "openapi_context"={
 *                 "requestBody"={
 *                     "content"={
 *                         "multipart/form-data"={
 *                             "schema"={
 *                                 "type"="object",
 *                                 "properties"={
 *                                     "file"={
 *                                         "type"="string",
 *                                         "format"="binary"
 *                                     }
 *                                 }
 *                             }
 *                         }
 *                     }
 *                 }
 *             }
 *         },
 *         "get"
 *     },
 *     itemOperations={
 *         "get"
 *     }
 * )
 * @Vich\Uploadable()
 * @ORM\Entity(repositoryClass=PicturesRepository::class)
 * 
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
     * @ApiProperty(iri="http://schema.org/contentUrl")
     * @Groups({"picture:read", "picture:write", "property:write"})
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    
    /**
     * @Groups({"picture:read", "picture:write", "property:write"})
     * @ORM\Column(type="integer")
     */
    private $maxSize;
    
    /**
     * @Groups({"picture:read", "picture:write", "property:write"})
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

    /**
     * @var File|null
     * 
     * @Assert\NotNull(groups={"picture:write"})
     * @Vich\UploadableField(mapping="pictures", fileNameProperty="filePath")
     */
    public $file;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $filePath;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;
    
    public function __construct(){
        $this->status = "en modération";
        $this->url = "/images/uploads";
        $this->maxSize=300;
    }
    
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
        return $this->maxSize;
    }

    public function setMaxSize(int $maxSize): self
    {
        $this->maxSize = $maxSize;

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
    public function setFile(?File $file) : self 
    {
        $this->file = $file;
        if ( $this->file instanceof UploadedFile ) {
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    
    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(?string $filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * Get the value of file
     *
     * @return  File|null
     */ 
    public function getFile()
    {
        return $this->file;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
