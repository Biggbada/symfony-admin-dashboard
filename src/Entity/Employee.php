<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adress2 = null;

    #[ORM\Column(length: 255)]
    private ?string $zipCode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $birthDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $personalPhoneNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $professionalPhoneNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $personalEmail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $professionalEmail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $drivingLicense = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $entryDate = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $exitDate = null;

    #[ORM\ManyToMany(targetEntity: Vehicle::class, mappedBy: 'driver')]
    private Collection $vehicles;

    public function __construct()
    {
        $this->vehicles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getAdress2(): ?string
    {
        return $this->adress2;
    }

    public function setAdress2(?string $adress2): static
    {
        $this->adress2 = $adress2;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): static
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeImmutable
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeImmutable $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getPersonalPhoneNumber(): ?string
    {
        return $this->personalPhoneNumber;
    }

    public function setPersonalPhoneNumber(?string $personalPhoneNumber): static
    {
        $this->personalPhoneNumber = $personalPhoneNumber;

        return $this;
    }

    public function getProfessionalPhoneNumber(): ?string
    {
        return $this->professionalPhoneNumber;
    }

    public function setProfessionalPhoneNumber(?string $professionalPhoneNumber): static
    {
        $this->professionalPhoneNumber = $professionalPhoneNumber;

        return $this;
    }

    public function getPersonalEmail(): ?string
    {
        return $this->personalEmail;
    }

    public function setPersonalEmail(?string $personalEmail): static
    {
        $this->personalEmail = $personalEmail;

        return $this;
    }

    public function getProfessionalEmail(): ?string
    {
        return $this->professionalEmail;
    }

    public function setProfessionalEmail(?string $professionalEmail): static
    {
        $this->professionalEmail = $professionalEmail;

        return $this;
    }

    public function getDrivingLicense(): ?string
    {
        return $this->drivingLicense;
    }

    public function setDrivingLicense(?string $drivingLicense): static
    {
        $this->drivingLicense = $drivingLicense;

        return $this;
    }

    public function getEntryDate(): ?\DateTimeImmutable
    {
        return $this->entryDate;
    }

    public function setEntryDate(\DateTimeImmutable $entryDate): static
    {
        $this->entryDate = $entryDate;

        return $this;
    }

    public function getExitDate(): ?\DateTimeImmutable
    {
        return $this->exitDate;
    }

    public function setExitDate(?\DateTimeImmutable $exitDate): static
    {
        $this->exitDate = $exitDate;

        return $this;
    }

    /**
     * @return Collection<int, Vehicle>
     */
    public function getVehicles(): Collection
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): static
    {
        if (!$this->vehicles->contains($vehicle)) {
            $this->vehicles->add($vehicle);
            $vehicle->addDriver($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): static
    {
        if ($this->vehicles->removeElement($vehicle)) {
            $vehicle->removeDriver($this);
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->firstName;
    }
}
