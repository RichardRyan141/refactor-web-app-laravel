<?php

namespace App\Modules\Dashboard\Core\Application\Service;

use App\Modules\Shared\Core\Domain\Model\Location;
use App\Modules\Dashboard\Core\Domain\Repository\DashboardRepository;
use Illuminate\Database\Eloquent\Collection;

class DashboardService
{
    private DashboardRepository $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getAllLocations(): Collection
    {
        return $this->dashboardRepository->getAllLocations();
    }
}

