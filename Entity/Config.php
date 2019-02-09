<?php

namespace Plugin\QrcodeGenerator\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Config
 *
 * @ORM\Table(name="plg_qrcode_generator_config")
 * @ORM\Entity(repositoryClass="Plugin\QrcodeGenerator\Repository\ConfigRepository")
 */
class Config
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer", nullable=false, options={"unsigned":true})
     */
    private $size;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int  $size
     *
     * @return $this;
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }
}
