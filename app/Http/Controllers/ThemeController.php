<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Theme;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        if (Auth::user()->hasRole("teacher"))
        {
            $teacher = Teacher::where("user_id", Auth::id())->first();

            return view("theme.index", [
                "teacher" => $teacher,
                "themes" => $teacher->themes,
            ]);
        }
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
     * @param Theme $theme
     * @return Response
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Theme $theme
     * @return Response
     */
    public function edit(Theme $theme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Theme $theme
     * @return Response
     */
    public function update(Request $request, Theme $theme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Theme $theme
     * @return Response
     */
    public function destroy(Theme $theme)
    {
        //
    }
}
