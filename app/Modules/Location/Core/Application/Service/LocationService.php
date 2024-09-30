<?php

namespace App\Modules\Location\Core\Application\Service;

use App\Modules\Location\Core\Domain\Repository\EmployeeRepository;
use App\Modules\Location\Core\Domain\Repository\LocationRepository;
use App\Modules\Shared\Core\Domain\Model\Location;
use Illuminate\Database\Eloquent\Collection;

class LocationService
{
    private LocationRepository $locationRepository;

    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getAllLocations(): Collection
    {
        return $this->locationRepository->getAllLocations();
    }

    /**
     * @param array<string, mixed> $data
     */
    public function createLocation(array $data): Location
    {
        return $this->locationRepository->createLocation($data);
    }

    public function getLocationById(int $locationId): Location
    {
        return $this->locationRepository->getLocationById($locationId);
    }

    /**
     * @param array<string, mixed> $data
     */
    public function updateLocation(int $locationId, array $data): Location
    {
        return $this->locationRepository->updateLocation($locationId, $data);
    }

    public function deleteLocation(int $locationId): void
    {
        $this->locationRepository->deleteLocation($locationId);
    }
}

