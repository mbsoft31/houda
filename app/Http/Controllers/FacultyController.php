<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{

    public function index()
    {
        return view("faculty.index", [
            "faculties" => Faculty::all(),
        ]);
    }

    public function show(Faculty $faculty)
    {
        return view("faculty.show", [
            "faculty" => $faculty,
        ]);
    }

    public function create()
    {
        return view("faculty.create");
    }

    public function store(Request $request)
    {

        $validated = $this->validate($request, [
            "name" => ["required", "string", "min:3", "unique:faculties,name"],
            "address" => ["nullable", "string"],
            "phone" => ["nullable", "string", "min:9", "max:12"],
        ]);

        Faculty::create($validated);

        return redirect()->route("faculty.index");
    }

    public function edit(Faculty $faculty)
    {
        return view("faculty.edit", compact("faculty"));
    }

    public function update(Request $request, $id)
    {

        $validated = $this->validate($request, [
            "name" => ["required", "string", "min:3"],
            "address" => ["nullable", "string"],
            "phone" => ["nullable", "string", "min:9", "max:12"],
        ]);

        Faculty::find($id)->update($validated);

        return back();
    }

    public function destroy(Faculty $faculty)
    {

        $faculty->delete();

        return back();
    }

}
