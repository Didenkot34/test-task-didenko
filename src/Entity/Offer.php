<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Fresh\DoctrineEnumBundle\Validator\Constraints as EnumAssert;
use App\DBAL\Types\PlatformType;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OfferRepository")
 */
class Offer
{
    /**
     * @var \Ramsey\Uuid\Uuid
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @var
     * @ORM\Column(type="string", unique=true)
     * @Assert\Uuid
     */
    private $application_id;

    /**
     * @ORM\Column(type="json_document", options={"jsonb": true})
     * @Assert\Country()
     */
    private $countries;

    /**
     * @var
     * @ORM\Column(type="decimal", scale=2, options={"default" = 0})
     */
    private $payout;

    /**
     * @ORM\Column(name="platform", type="PlatformType", nullable=false)
     * @EnumAssert\Enum(entity="App\DBAL\Types\PlatformType")
     */
    private $platform;

    /**
     * @return \Ramsey\Uuid\Uuid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \Ramsey\Uuid\Uuid $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getApplicationId(): string
    {
        return $this->application_id;
    }

    /**
     * @param string $application_id
     */
    public function setApplicationId(string $application_id)
    {
        $this->application_id = $application_id;
    }

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     */
    public function setPlatform(string $platform)
    {
        $this->platform = $platform;
    }

    /**
     * @return string
     */
    public function getCountries(): string
    {
        return $this->countries;
    }

    /**
     * @param string $countries
     */
    public function setCountries(string $countries)
    {
        $this->countries = $countries;
    }

    /**
     * @return string
     */
    public function getPayout(): string
    {
        return $this->payout;
    }

    /**
     * @param string $payout
     */
    public function setPayout(string $payout)
    {
        $this->payout = $payout;
    }


}
