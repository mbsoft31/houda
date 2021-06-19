<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Speciality;
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

    public function available()
    {
        $user = Auth::user();
        $student = $user->student;
        $speciality = $student->speciality;
        $themes = $speciality->themes()->where("themes.status", "active")->get();

        return view("theme.index", [
            "themes" => $themes,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function manage()
    {

        $department = Department::whereUserId(Auth::id())->first();

        $specialities = $this->getSpecialities($department);

        $themes = $this->getSpecialityThemes($specialities);

        return view("theme.index", [
            "teacher" => Auth::user()->teacher,
            "themes" => $themes,
        ]);
    }

    public function accept(Theme $theme)
    {

        $theme->accept();

        return back();
    }

    public function refuse(Theme $theme)
    {

        $theme->refuse();

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $specialities = $this->getTeacherSpecialities();
        return view("theme.create", [
            "specialities" => $specialities,
        ]);
    }

    private function getTeacherSpecialities()
    {
        $departments = Auth::user()->teacher->departments;
        $specialities = collect();
        foreach ($departments as $department) {
            $data = $this->getSpecialities($department);
            if ($specialities->isEmpty()) {
                $specialities = $data;
            }else{
                if ( $data != null && ! $data->isEmpty()) {
                    $specialities = $specialities->concat($data);
                }
            }
        }

        return $specialities;
    }

    private function getSpecialities(Department $department)
    {
        $specialities = collect();
        $data = $department->specialities;
        if ($specialities->isEmpty()) {
            $specialities = $data;
        }else if ( $data != null && ! $data->isEmpty()) {
            $specialities = $specialities->concat($data);
        }

        return $specialities;
    }

    private function getSpecialityThemes($specialities)
    {
        $themes = collect();
        foreach ($specialities as $speciality) {
            if ($themes->isEmpty()) {
                $themes = $speciality->themes;
            }else{
                if ($speciality->themes != null && !$speciality->themes->isEmpty()) {
                    $themes = $themes->concat($speciality->themes);
                }
            }
        }
        return $themes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $validated = $this->validate($request, [
            "title" => ["required", "string", "unique:themes,title"],
            "speciality_id" => ["required", "exists:specialities,id"],
            "objective" => ["required", "string"],
            "resume" => ["nullable", "string"],
        ]);

        $speciality = Speciality::find($request->speciality_id);

        $validated = array_merge(
            $validated, [
                "teacher_id" => Auth::user()->teacher->id,
                "status" => $speciality->diploma == "licence" ? "active" : "pending",
            ]
        );

        Theme::create($validated);

        return redirect()->route("theme.index");
    }

    /**
     * Display the specified resource.
     *
     * @param Theme $theme
     * @return Application|Factory|View|Response
     */
    public function show(Theme $theme)
    {
        $specialities = $this->getTeacherSpecialities();
        return view("theme.create", [
            "specialities" => $specialities,
            "theme" => $theme,
        ]);
    }

    public function studentShow(Theme $theme)
    {
        $user = Auth::user();
        $student = $user->student;

        if ( ! $student->isThemeAvailable($theme) ) abort(404, "Theme not found!");

        $speciality = $student->speciality;

        return view("student.theme.show", [
            "student" => $student,
            "theme" => $theme,
        ]);
    }

    public function choose(Theme $theme)
    {
        $user = Auth::user();
        $student = $user->student;

        if ($student->themes()->where('themes.id', $theme->id)->count() <= config("theme.max_per_student"))
            $student->themes()->attach($theme);

        return back();

    }

    public function remove(Theme $theme)
    {
        $user = Auth::user();
        $student = $user->student;
        $student->themes()->detach($theme);

        return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Theme $theme
     * @return Application|Factory|View|Response
     */
    public function edit(Theme $theme)
    {
        $specialities = $this->getTeacherSpecialities();
        return view("theme.edit", [
            "specialities" => $specialities,
            "theme" => $theme,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Theme $theme
     * @return \Illuminate\Http\RedirectResponse|Response
     */
    public function update(Request $request, Theme $theme)
    {
        $validated = $this->validate($request, [
            "title" => ["required", "string"],
            "speciality_id" => ["required", "exists:specialities,id"],
            "objective" => ["required", "string"],
            "resume" => ["nullable", "string"],
        ]);

        $speciality = Speciality::find($request->speciality_id);

        $validated = array_merge(
            $validated, [
                "teacher_id" => Auth::user()->teacher->id,
                "status" => $speciality->diploma == "licence" ? "active" : "pending",
            ]
        );

        $theme->update($validated);

        return redirect()->route("theme.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Theme $theme
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();
        return back();
    }
}
