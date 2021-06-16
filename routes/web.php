<?php

use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::prefix("/admin")->middleware(['auth', "role:admin"])->group(function () {

    Route::get("/faculty", [\App\Http\Controllers\FacultyController::class, "index"])->name("faculty.index");
    Route::get("/faculty/create", [\App\Http\Controllers\FacultyController::class, "create"])->name("faculty.create");
    Route::post("/faculty/store", [\App\Http\Controllers\FacultyController::class, "store"])->name("faculty.store");
    Route::get("/faculty/{faculty}", [\App\Http\Controllers\FacultyController::class, "show"])->name("faculty.show");
    Route::get("/faculty/{faculty}/edit", [\App\Http\Controllers\FacultyController::class, "edit"])->name("faculty.edit");
    Route::post("/faculty/{faculty}/update", [\App\Http\Controllers\FacultyController::class, "update"])->name("faculty.update");
    Route::delete("/faculty/{faculty}/destroy", [\App\Http\Controllers\FacultyController::class, "destroy"])->name("faculty.destroy");

    Route::get("/department", [\App\Http\Controllers\DepartmentController::class, "index"])->name("department.index");
    Route::get("/department/create", [\App\Http\Controllers\DepartmentController::class, "create"])->name("department.create");
    Route::post("/department/store", [\App\Http\Controllers\DepartmentController::class, "store"])->name("department.store");
    Route::get("/department/{department}", [\App\Http\Controllers\DepartmentController::class, "show"])->name("department.show");
    Route::get("/department/{department}/edit", [\App\Http\Controllers\DepartmentController::class, "edit"])->name("department.edit");
    Route::post("/department/{department}/update", [\App\Http\Controllers\DepartmentController::class, "update"])->name("department.update");


});

Route::prefix("/department-chief")->middleware(['auth', "role:department-chief"])->group(function () {
    Route::get("/department", [\App\Http\Controllers\DepartmentController::class, "index"])->name("department.index");

    Route::get("/department/{department}", [\App\Http\Controllers\DepartmentController::class, "show"])->name("department.show");

    Route::get("/student-management", function () {
        if (Auth::user()->hasRole("department-chief")) {

            $department = Department::where("user_id", Auth::id())->first();

            return redirect()->route("speciality.index");
        }
    })->name("student-management.index");

    Route::get("/speciality", [\App\Http\Controllers\SpecialityController::class, "index"])->name("speciality.index");
    Route::get("/speciality/{speciality}", [\App\Http\Controllers\SpecialityController::class, "show"])->name("speciality.show");
});

Route::prefix("/teacher")->middleware(['auth', "role:teacher"])->group(function () {

    Route::resource("theme", \App\Http\Controllers\ThemeController::class);

});

Route::prefix("/student")->middleware(['auth', "role:student"])->group(function () {

});




require __DIR__.'/auth.php';
