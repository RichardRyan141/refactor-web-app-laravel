<?php

namespace App\Modules\Employee\Presentation\Controllers;

use Cache;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use App\Modules\Employee\Core\Application\Service\EmployeeService;

use App\Modules\Shared\Core\Domain\Model\User;
use App\Modules\Shared\Core\Domain\Model\Location;

class EmployeeController
{
    private EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(): View
    {
        $employees = $this->employeeService->getAllEmployees();
        $locations = $this->employeeService->getAllLocations();
        
        return view('employee::index', compact('employees', 'locations'));
    }

    public function create(): View
    {
        $locations = $this->employeeService->getAllLocations();
        return view ('employee::create', compact('locations'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'noTelepon' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|string',
        ]);

        $password = $request->input('password', 'password');
        $hashedPassword = Hash::make(is_string($password) ? $password : 'password');

        $data = [
            'nama' => $request->input('nama'),
            'noTelepon' => $request->input('noTelepon'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
            'location_id' => $request->input('location_id', 1),
            'role' => $request->input('role', 'karyawan'),
        ];
        
        $this->employeeService->createEmployee($data);

        Cache::forget('employees');

        return redirect()->route('employee.index')->with('success', 'Employee has been created!');
    }

    public function edit(int $id): View
    {
        $employee = $this->employeeService->getEmployeeById($id);
        $locations = $this->employeeService->getAllLocations();
        return view('employee::edit', compact('employee', 'locations'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $employee = $this->employeeService->getEmployeeById($id);

        $data = [
            'nama' => $request->input('nama', $employee->nama),
            'noTelepon' => $request->input('noTelepon', $employee->noTelepon),
            'alamat' => $request->input('alamat', $employee->alamat),
            'email' => $request->input('email', $employee->email),
            'location_id' => $request->input('location_id', $employee->location_id),
            'role' => $request->input('role', $employee->role),
        ];

        
        $this->employeeService->updateEmployee($id, $data);

        Cache::forget('employees');
        return redirect()->route('employee.index')->with('success', 'Employee has been updated');    
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->employeeService->deleteEmployee($id);

        Cache::forget('employees');
    
        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully');
    }
}
