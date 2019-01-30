<?php

namespace Home\MediaBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Image
 *
 * @ApiResource
 * @ORM\Table(name="media")
 * @ORM\Entity
 */
class Media
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Length(max="255")
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @Assert\Length(max="255")
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $originName;

    public function getId(): int
    {
        return $this->id;
    }

    public function setPath(string $path): Image
    {
        $this->path = $path;

        return $this;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setOriginName(string $originName): Image
    {
        $this->originName = $originName;

        return $this;
    }

    public function getOriginName(): string
    {
        return $this->originName;
    }
}
