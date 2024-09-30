<?php

namespace App\Modules\Location\Infrastructure\Repository;
use App\Modules\Location\Core\Domain\Repository\LocationRepository;
use Cache;

use App\Modules\Shared\Core\Domain\Model\Location;
use Illuminate\Database\Eloquent\Collection;


class EloquentLocationRepository implements LocationRepository
{
    /**
     * @return Collection<int, Location>
     */
    public function getAllLocations(): Collection
    {
        /** @var Collection<int, Location> $locations */
        $locations = Cache::remember('locations', 120, function () {
            return Location::all();
        });

        return $locations;
    }

    /**
     * @param array<string, mixed> $data
     */
    public function createLocation(array $data): Location
    {
        return Location::create($data);
    }

    public function getLocationById(int $locationId): Location
    {
        $location = Location::findOrFail($locationId);
        return $location;
    }

    /**
     * @param array<string, mixed> $data
     */
    public function updateLocation(int $locationId, array $data): Location
    {
        $location = $this->getLocationById($locationId);
        $location->update($data);
        return $location;
    }

    public function deleteLocation(int $locationId): void
    {
        Location::destroy($locationId);
    }
}
