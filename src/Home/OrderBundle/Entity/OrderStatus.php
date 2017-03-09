<?php

namespace Home\OrderBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * OrderStatus
 *
 * @ApiResource(
 *     collectionOperations={"get"={"method"="GET", "path"="/statuses"}},
 *     itemOperations={"get"={"method"="GET", "path"="/statuses/{id}"}}
 * )
 * @ORM\Table(name="order_status")
 * @ORM\Entity
 */
class OrderStatus
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255, unique=true)
     */
    private $alias;


    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): OrderStatus
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setAlias(string $alias): OrderStatus
    {
        $this->alias = $alias;

        return $this;
    }

    public function getAlias(): string
    {
        return $this->alias;
    }
}

