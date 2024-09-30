<?php

namespace App\Modules\Employee\Core\Application\Service;

use App\Modules\Employee\Core\Domain\Repository\EmployeeRepository;
use App\Modules\Shared\Core\Domain\Model\User;
use App\Modules\Shared\Core\Domain\Model\Location;
use Illuminate\Database\Eloquent\Collection;

class EmployeeService
{
    private EmployeeRepository $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * @return Collection<int, User>
     */
    public function getAllEmployees(): Collection
    {
        return $this->employeeRepository->getAllEmployees();
    }

    /**
     * @return Collection<int, Location>
     */
    public function getAllLocations(): Collection
    {
        return $this->employeeRepository->getAllLocations();
    }

    /**
     * @param array<string, mixed> $data
     */
    public function createEmployee(array $data): User
    {
        return $this->employeeRepository->createEmployee($data);
    }

    public function getEmployeeById(int $id): User
    {
        return $this->employeeRepository->getEmployeeById($id);
    }

    /**
     * @param array<string, mixed> $data
     */
    public function updateEmployee(int $employeeId, array $data): User
    {
        return $this->employeeRepository->updateEmployee($employeeId, $data);
    }

    public function deleteEmployee(int $employeeId): void
    {
        $this->employeeRepository->deleteEmployee($employeeId);
    }
}

