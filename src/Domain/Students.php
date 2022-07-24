<?php

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * Students
 *
 * @ORM\Table(name="students", uniqueConstraints={@ORM\UniqueConstraint(name="idx_students_indexno", columns={"indexno"}), @ORM\UniqueConstraint(name="idx_students_custom_id", columns={"custom_id"}), @ORM\UniqueConstraint(name="idx_students_stno", columns={"stno"})}, indexes={@ORM\Index(name="idx_students_deleted_at", columns={"deleted_at"}), @ORM\Index(name="IDX_A4698DB262BB7AEE", columns={"programme_id"}), @ORM\Index(name="IDX_A4698DB25FB14BA7", columns={"level_id"})})
 * @ORM\Entity
 */
class Students
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="students_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="stno", type="text", nullable=true)
     */
    private $stno;

    /**
     * @var string|null
     *
     * @ORM\Column(name="indexno", type="text", nullable=true)
     */
    private $indexno;

    /**
     * @var string|null
     *
     * @ORM\Column(name="custom_id", type="text", nullable=true)
     */
    private $customId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="text", nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="text", nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="other_name", type="text", nullable=true)
     */
    private $otherName;

    /**
     * @var \Programmes
     *
     * @ORM\ManyToOne(targetEntity="Programmes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="programme_id", referencedColumnName="id")
     * })
     */
    private $programme;

    /**
     * @var \Levels
     *
     * @ORM\ManyToOne(targetEntity="Levels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="level_id", referencedColumnName="id")
     * })
     */
    private $level;


}
