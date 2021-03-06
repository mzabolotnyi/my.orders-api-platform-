<?php

namespace Home\OrderBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SizeCategory
 *
 * @ApiResource(attributes={"normalization_context"={"groups"={"size_category"}}})
 * @ORM\Table(name="size_category")
 * @ORM\Entity
 * @UniqueEntity("name")
 */
class SizeCategory
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
     * @Groups({"size_category", "size"})
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @Groups({"size_category"})
     * @ORM\OneToMany(targetEntity="Size", mappedBy="category", cascade={"persist"})
     */
    private $sizes;


    public function __construct()
    {
        $this->sizes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): SizeCategory
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addSize(\Home\OrderBundle\Entity\Size $size): SizeCategory
    {
        $this->sizes[] = $size;

        return $this;
    }

    public function removeSize(\Home\OrderBundle\Entity\Size $size): bool
    {
        return $this->sizes->removeElement($size);
    }

    public function getSizes()
    {
        return $this->sizes;
    }
}
