<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="product_id_seq", allocationSize=1, initialValue=1)
     */
    public $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=256, nullable=true)
     */
    public $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="string", length=256, nullable=true)
     */
    public $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="format", type="string", length=256, nullable=true)
     */
    public $format;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagesource", type="string", length=256, nullable=true)
     */
    public $imagesource;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    public $description;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string|null $name
     *
     * @return Product
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price.
     *
     * @param string|null $price
     *
     * @return Product
     */
    public function setPrice($price = null)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price.
     *
     * @return string|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set format.
     *
     * @param string|null $format
     *
     * @return Product
     */
    public function setFormat($format = null)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format.
     *
     * @return string|null
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set imagesource.
     *
     * @param string|null $imagesource
     *
     * @return Product
     */
    public function setImagesource($imagesource = null)
    {
        $this->imagesource = $imagesource;

        return $this;
    }

    /**
     * Get imagesource.
     *
     * @return string|null
     */
    public function getImagesource()
    {
        return $this->imagesource;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Product
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }
}
