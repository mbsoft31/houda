<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view("department.index", [
            "departments" => Department::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view("department.create", [
            "faculties" => Faculty::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            "faculty" => ["required", "integer", "exists:faculties,id"],
            "name" => ["required", "string", "min:3", "unique:departments,name"],
            "address" => ["nullable", "string"],
            "phone" => ["nullable", "string", "min:9", "max:12"],
        ]);

        Department::create($validated);

        return redirect()->route("department.index");
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return Application|Factory|View|Response
     */
    public function show(Department $department)
    {
        return view("department.show", [
            "department" => $department,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return Application|Factory|View|Response
     */
    public function edit(Department $department)
    {
        return view("department.edit", [
            "faculties" => Faculty::all(),
            "department" => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Department $department
     * @return RedirectResponse|Response
     */
    public function update(Request $request, Department $department)
    {
        $validated = $this->validate($request, [
            "faculty_id" => ["required", "exists:faculties,id"],
            "name" => ["required", "string", "min:3"],
            "address" => ["nullable", "string"],
            "phone" => ["nullable", "string", "min:9", "max:12"],
        ]);

        $department->update($validated);

        return redirect()->route("department.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route("department.index");
    }
}
