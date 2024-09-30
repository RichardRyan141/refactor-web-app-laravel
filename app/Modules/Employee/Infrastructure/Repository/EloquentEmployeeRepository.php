<?php

namespace App\Modules\Employee\Infrastructure\Repository;
use App\Modules\Employee\Core\Domain\Repository\EmployeeRepository;
use Cache;

use App\Modules\Shared\Core\Domain\Model\User;
use App\Modules\Shared\Core\Domain\Model\Location;
use Illuminate\Database\Eloquent\Collection;


class EloquentEmployeeRepository implements EmployeeRepository
{
    /**
     * @return Collection<int, User>
     */
    public function getAllEmployees(): Collection
    {
        /** @var Collection<int, User> $employees */
        $employees = Cache::remember('employees', 120, function () {
            return User::where('role', '!=', 'pelanggan')->get();
        });

        foreach($employees as $employee)
        {
            /** @var User $employee */
            $location = Location::findOrFail($employee->location_id);
            $employee->location_address = $location->alamat;
        }

        return $employees;
    }

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
    public function createEmployee(array $data): User
    {
        return User::create($data);
    }

    public function getEmployeeById(int $employeeId): User
    {
        $employee = User::findOrFail($employeeId);
        return $employee;
    }

    /**
     * @param array<string, mixed> $data
     */
    public function updateEmployee(int $employeeId, array $data): User
    {
        $employee = User::findOrFail($employeeId);
        $employee->update($data);
        return $employee;
    }

    public function deleteEmployee(int $employeeId): void
    {
        User::destroy($employeeId);
    }
}
