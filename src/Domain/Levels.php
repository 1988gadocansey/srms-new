<?php

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * Levels
 *
 * @ORM\Table(name="levels", uniqueConstraints={@ORM\UniqueConstraint(name="idx_levels_name", columns={"name"}), @ORM\UniqueConstraint(name="idx_levels_slug", columns={"slug"})}, indexes={@ORM\Index(name="idx_levels_deleted_at", columns={"deleted_at"})})
 * @ORM\Entity
 */
class Levels
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="levels_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uuid", type="string", length=36, nullable=true, options={"fixed"=true})
     */
    private $uuid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetimetz", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetimetz", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deleted_at", type="datetimetz", nullable=true)
     */
    private $deletedAt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="text", nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="text", nullable=true)
     */
    private $slug;


}
