<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Speciality;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        if ($request->user()->hasRole("department-chief"))
            return view("speciality.index", [
                "specialities" => Department::where('user_id', Auth::id())->first()->specialities
            ]);

        return view("speciality.index", [
            "specialities" => Speciality::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Speciality $speciality
     * @return Application|Factory|View|Response
     */
    public function show(?Speciality $speciality)
    {
        if ( is_null($speciality) ) $speciality = Department::where("user_id", Auth::id())->first()->speciality;

        return view("speciality.show", [
            "speciality" => $speciality,
            "students" => $speciality->students()->orderByDesc('average')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Speciality $speciality
     * @return Response
     */
    public function edit(Speciality $speciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Speciality $speciality
     * @return Response
     */
    public function update(Request $request, Speciality $speciality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Speciality $speciality
     * @return Response
     */
    public function destroy(Speciality $speciality)
    {
        //
    }
}
