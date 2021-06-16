<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\ThemeController;
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

    Route::get("/faculty/create", [FacultyController::class, "create"])->name("faculty.create");
    Route::post("/faculty/store", [FacultyController::class, "store"])->name("faculty.store");
    Route::get("/faculty/{faculty}/edit", [FacultyController::class, "edit"])->name("faculty.edit");
    Route::post("/faculty/{faculty}/update", [FacultyController::class, "update"])->name("faculty.update");
    Route::delete("/faculty/{faculty}/destroy", [FacultyController::class, "destroy"])->name("faculty.destroy");

    Route::get("/department/create", [DepartmentController::class, "create"])->name("department.create");
    Route::post("/department/store", [DepartmentController::class, "store"])->name("department.store");
    Route::get("/department/{department}/edit", [DepartmentController::class, "edit"])->name("department.edit");
    Route::post("/department/{department}/update", [DepartmentController::class, "update"])->name("department.update");


});

Route::prefix("/department-chief")->middleware(['auth', "role:department-chief"])->group(function () {
    Route::get("/department", [DepartmentController::class, "index"])->name("department.index");

    Route::get("/department/{department}", [DepartmentController::class, "show"])->name("department.show");

    Route::get("/student-management", function () {
        if (Auth::user()->hasRole("department-chief")) {

            $department = Department::where("user_id", Auth::id())->first();

            return redirect()->route("speciality.index");
        }
    })->name("student-management.index");

    Route::get("/speciality", [SpecialityController::class, "index"])->name("speciality.index");
    Route::get("/speciality/{speciality}", [SpecialityController::class, "show"])->name("speciality.show");

    Route::get("manage-themes", [ThemeController::class, "manage"])->name("theme.manage");
    Route::get("manage-themes/{theme}/accept", [ThemeController::class, "accept"])->name("theme.accept");
    Route::get("manage-themes/{theme}/refuse", [ThemeController::class, "refuse"])->name("theme.refuse");

});

Route::prefix("/teacher")->middleware(['auth', "role:teacher"])->group(function () {

    // theme create
    // theme store
    // theme edit
    // theme update
    // theme delete
    // Route::resource("theme", ThemeController::class);

    Route::get("/theme", [ThemeController::class, "index"])->name("theme.index");
    Route::get("/theme/create", [ThemeController::class, "create"])->name("theme.create");
    Route::get("/theme/{theme}/edit", [ThemeController::class, "edit"])->name("theme.edit");
    Route::post("/theme/{theme}/update", [ThemeController::class, "update"])->name("theme.update");
    Route::get("/theme/{theme}/destroy", [ThemeController::class, "destroy"])->name("theme.destroy");
    Route::post("/theme/store", [ThemeController::class, "store"])->name("theme.store");


});




Route::prefix("/student")->middleware(['auth', "role:student"])->group(function () {
    // consult themes

    Route::get("/available-themes", [ThemeController::class, "available"])->name("theme.available");
    Route::get("/theme/{theme}", [ThemeController::class, "studentShow"])->name("student.theme.show");
    Route::get("/theme/{theme}/choose", [ThemeController::class, "choose"])->name("theme.choose");
    Route::get("/theme/{theme}/remove", [ThemeController::class, "remove"])->name("theme.remove");

    // add theme to choices route post

    // remove theme from choices

    // consult profile

});

Route::prefix("/")->middleware(['auth'])->group(function () {

    Route::get("/faculty", [FacultyController::class, "index"])->name("faculty.index");
    Route::get("/faculty/{faculty}", [FacultyController::class, "show"])->name("faculty.show");

    Route::get("/department", [DepartmentController::class, "index"])->name("department.index");
    Route::get("/department/{department}", [DepartmentController::class, "show"])->name("department.show");

    // theme view
    Route::get("/theme/{theme}", [ThemeController::class, "show"])->name("theme.show");


});




    require __DIR__.'/auth.php';


