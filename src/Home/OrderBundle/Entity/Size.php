<?php

namespace Home\OrderBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Size
 *
 * @ApiResource
 * @ORM\Table(name="size")
 * @ORM\Entity
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var SizeCategory
     *
     * @Assert\NotNull
     * @ORM\ManyToOne(targetEntity="SizeCategory")
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

