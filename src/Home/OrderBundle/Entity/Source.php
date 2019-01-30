<?php

namespace Home\OrderBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Source
 *
 * @ApiResource(attributes={"normalization_context"={"groups"={"source"}}})
 * @ORM\Table(name="source")
 * @ORM\Entity
 * @UniqueEntity(fields={"name"})
 */
class Source
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
     * @Groups({"source"})
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @Assert\Url
     * @Assert\Length(max="255")
     * @Groups({"source"})
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @Groups({"source"})
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;


    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): Source
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setUrl(string $url): Source
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url ?: '';
    }

    public function setComment(string $comment): Source
    {
        $this->comment = $comment;

        return $this;
    }

    public function getComment(): string
    {
        return $this->comment ?: '';
    }
}
