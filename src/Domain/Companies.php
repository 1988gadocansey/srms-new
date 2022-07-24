<?php

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * Companies
 *
 * @ORM\Table(name="companies", uniqueConstraints={@ORM\UniqueConstraint(name="idx_companies_name", columns={"name"})}, indexes={@ORM\Index(name="idx_companies_deleted_at", columns={"deleted_at"}), @ORM\Index(name="IDX_8244AA3AB97257A", columns={"company_category_id"})})
 * @ORM\Entity
 */
class Companies
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="companies_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Website", type="text", nullable=true)
     */
    private $website;

    /**
     * @var \CompanyCategories
     *
     * @ORM\ManyToOne(targetEntity="CompanyCategories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company_category_id", referencedColumnName="id")
     * })
     */
    private $companyCategory;


}
