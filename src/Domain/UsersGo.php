<?php

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersGo
 *
 * @ORM\Table(name="users_go", uniqueConstraints={@ORM\UniqueConstraint(name="users_email_key", columns={"email"})}, indexes={@ORM\Index(name="idx_users_deleted_at", columns={"deleted_at"})})
 * @ORM\Entity
 */
class UsersGo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="users_go_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="email", type="text", nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="text", nullable=true)
     */
    private $password;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="is_verified", type="boolean", nullable=true)
     */
    private $isVerified;

    /**
     * @var int|null
     *
     * @ORM\Column(name="level", type="bigint", nullable=true)
     */
    private $level;

    /**
     * @var int|null
     *
     * @ORM\Column(name="status", type="bigint", nullable=true)
     */
    private $status;

    /**
     * @var int|null
     *
     * @ORM\Column(name="role", type="smallint", nullable=true)
     */
    private $role;


}
