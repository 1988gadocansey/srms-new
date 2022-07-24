<?php

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programmes
 *
 * @ORM\Table(name="programmes", uniqueConstraints={@ORM\UniqueConstraint(name="idx_programmes_name", columns={"name"}), @ORM\UniqueConstraint(name="idx_programmes_slug", columns={"slug"})}, indexes={@ORM\Index(name="idx_programmes_deleted_at", columns={"deleted_at"}), @ORM\Index(name="IDX_3631FC3FAE80F5DF", columns={"department_id"})})
 * @ORM\Entity
 */
class Programmes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="programmes_id_seq", allocationSize=1, initialValue=1)
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
     * @var int|null
     *
     * @ORM\Column(name="slug", type="smallint", nullable=true)
     */
    private $slug;

    /**
     * @var string|null
     *
     * @ORM\Column(name="duration", type="text", nullable=true)
     */
    private $duration;

    /**
     * @var \Departments
     *
     * @ORM\ManyToOne(targetEntity="Departments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     * })
     */
    private $department;


}
