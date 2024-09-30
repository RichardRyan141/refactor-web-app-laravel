<?php

namespace App\Modules\Location\Core\Domain\Repository;

use App\Modules\Shared\Core\Domain\Model\Location;
use Illuminate\Database\Eloquent\Collection;

interface LocationRepository
{
    /**
     * @return Collection<int, Location>
     */
    public function getAllLocations(): Collection;

    /**
     * @param array<string, mixed> $data
     */
    public function createLocation(array $data): Location;

    public function getLocationById(int $locationId): Location;

    /**
     * @param array<string, mixed> $data
     */
    public function updateLocation(int $locationId, array $data): Location;

    public function deleteLocation(int $locationId): void;
}
