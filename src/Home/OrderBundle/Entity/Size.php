<?php

namespace Home\OrderBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * Size
 *
 * @ApiResource(attributes={"normalization_context"={"groups"={"size"}}})
 * @ORM\Table(name="size", uniqueConstraints={@UniqueConstraint(name="size_unique", columns={"name", "category_id"})})
 * @ORM\Entity
 * @UniqueEntity(fields={"name", "category"})
 */
class Size
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
     * @Groups({"size", "size_category"})
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var SizeCategory
     *
     * @Assert\NotNull
     * @Groups({"size"})
     * @ORM\ManyToOne(targetEntity="SizeCategory", inversedBy="sizes", cascade={"persist"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     */
    private $category;


    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): Size
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setCategory(SizeCategory $category): Size
    {
        $this->category = $category;

        return $this;
    }

    public function getCategory(): SizeCategory
    {
        return $this->category;
    }
}

