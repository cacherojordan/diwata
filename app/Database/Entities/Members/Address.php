<?php
declare(strict_types=1);

namespace App\Database\Entities\Members;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Database\Entities\Member;

/**
 * @ORM\Entity
 * @ORM\Table(name="members_addresses")
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $addressId;

    /**
     * @ORM\Column(type="string")
     */
    protected $streetAddress;

    /**
     * @ORM\Column(type="string")
     */
    protected $city;

    /**
     * @ORM\Column(type="string")
     */
    protected $province;

    /**
     * @ORM\Column(type="string")
     */
    protected $country;

    /**
     * @ORM\Column(type="integer")
     */
    protected $isPrimary;

    /**
     * @ORM\ManyToOne(targetEntity="Member", inversedBy="addresses")
     * @var Doctrine\Common\Collections\ArrayCollection
     */
    protected $member;

    public function __construct($streetAddress, $city, $province, $country, $status)
    {
        $this->streetAddress = $streetAddress;
        $this->city = $city;
        $this->province = $province;
        $this->country = $country;
        $this->status = $status;
    }

    public function getAddressId()
    {
        return $this->addressId;
    }
    
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getMember(Member $member)
    {
        return $this->member;
    }
}
