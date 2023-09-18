<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $immatriculation = null;

    #[ORM\Column(length: 255)]
    private ?string $vehicleBrand = null;

    #[ORM\Column(length: 255)]
    private ?string $vehicleModel = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $entryDate = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $exitDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $insurancePolicy = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastTechnicalControl = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $nextTechnicalControl = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lastPollutionControl = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $nextPollutionControl = null;

    #[ORM\ManyToMany(targetEntity: Employee::class, inversedBy: 'vehicles')]
    private Collection $driver;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fuelCardId = null;

    public function __construct()
    {
        $this->driver = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): static
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getVehicleBrand(): ?string
    {
        return $this->vehicleBrand;
    }

    public function setVehicleBrand(string $vehicleBrand): static
    {
        $this->vehicleBrand = $vehicleBrand;

        return $this;
    }

    public function getVehicleModel(): ?string
    {
        return $this->vehicleModel;
    }

    public function setVehicleModel(string $vehicleModel): static
    {
        $this->vehicleModel = $vehicleModel;

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

    public function getInsurancePolicy(): ?string
    {
        return $this->insurancePolicy;
    }

    public function setInsurancePolicy(?string $insurancePolicy): static
    {
        $this->insurancePolicy = $insurancePolicy;

        return $this;
    }

    public function getLastTechnicalControl(): ?\DateTimeImmutable
    {
        return $this->lastTechnicalControl;
    }

    public function setLastTechnicalControl(?\DateTimeImmutable $lastTechnicalControl): static
    {
        $this->lastTechnicalControl = $lastTechnicalControl;

        return $this;
    }

    public function getNextTechnicalControl(): ?\DateTimeImmutable
    {
        return $this->nextTechnicalControl;
    }

    public function setNextTechnicalControl(?\DateTimeImmutable $nextTechnicalControl): static
    {
        $this->nextTechnicalControl = $nextTechnicalControl;

        return $this;
    }

    public function getLastPollutionControl(): ?\DateTimeImmutable
    {
        return $this->lastPollutionControl;
    }

    public function setLastPollutionControl(?\DateTimeImmutable $lastPollutionControl): static
    {
        $this->lastPollutionControl = $lastPollutionControl;

        return $this;
    }

    public function getNextPollutionControl(): ?\DateTimeImmutable
    {
        return $this->nextPollutionControl;
    }

    public function setNextPollutionControl(?\DateTimeImmutable $nextPollutionControl): static
    {
        $this->nextPollutionControl = $nextPollutionControl;

        return $this;
    }

    /**
     * @return Collection<int, Employee>
     */
    public function getDriver(): Collection
    {
        return $this->driver;
    }

    public function addDriver(Employee $driver): static
    {
        if (!$this->driver->contains($driver)) {
            $this->driver->add($driver);
        }

        return $this;
    }

    public function removeDriver(Employee $driver): static
    {
        $this->driver->removeElement($driver);

        return $this;
    }

    public function getFuelCardId(): ?string
    {
        return $this->fuelCardId;
    }

    public function setFuelCardId(?string $fuelCardId): static
    {
        $this->fuelCardId = $fuelCardId;

        return $this;
    }
    public function __toString(): string
    {
        return $this->immatriculation;
    }
}
