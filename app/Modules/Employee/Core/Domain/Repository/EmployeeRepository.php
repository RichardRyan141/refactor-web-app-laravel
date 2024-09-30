<?php

namespace App\Modules\Employee\Core\Domain\Repository;

use App\Modules\Shared\Core\Domain\Model\User;
use App\Modules\Shared\Core\Domain\Model\Location;
use Illuminate\Database\Eloquent\Collection;

interface EmployeeRepository
{
    /**
     * @return Collection<int, User>
     */
    public function getAllEmployees(): Collection;

    /**
     * @return Collection<int, Location>
     */
    public function getAllLocations(): Collection;

    public function getEmployeeById(int $employeeId): User;

    /**
     * @param array<string, mixed> $data
     */
    public function createEmployee(array $data): User;

    /**
     * @param array<string, mixed> $data
     */
    public function updateEmployee(int $employeeId, array $data): User;

    public function deleteEmployee(int $employeeId): void;
}
