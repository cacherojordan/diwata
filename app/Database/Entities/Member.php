<?php
declare(strict_types=1);

namespace App\Database\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Database\Entities\Members\Address;

/**
 * @ORM\Entity
 * @ORM\Table(name="members")
 */
class Members
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $memberId;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @ORM\Column(type="integer")
     */
    protected $status;

    /**
     * @ORM\OneToMany(targetEntity="Address", mappedBy="member", cascade={"persist"})
     * @var Doctrine\Common\Collections\ArrayCollection
     */
    protected $addresses;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;

        $this->addresses = new ArrayCollection();
    }

    public function getMemberId()
    {
        return $this->memberId;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getAddresses()
    {
        return $this->addresses;
    }

    public function setAddress(Address $address)
    {
        if (!$this->addresses->contains($address)) {
            $address->setMember($this);
            $this->addresses->add($address);
        }
    }
}
