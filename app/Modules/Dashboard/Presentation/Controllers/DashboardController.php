<?php

namespace App\Modules\Dashboard\Presentation\Controllers;

use App\Modules\Dashboard\Core\Application\Service\DashboardService;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DashboardController
{
    private DashboardService $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    /**
     * @return View
     */
    public function index()
    {
        $locations = $this->dashboardService->getAllLocations();

        return view('dashboard::index', compact('locations'));
    }
}
