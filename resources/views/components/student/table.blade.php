@props(["students", "actions" => true])

@php
$can_edit = Auth::user()->hasPermissionTo("edit student");
$can_delete = Auth::user()->hasPermissionTo("delete student");
@endphp

<table class="table table-striped student-table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">{{ __("Name") }}</th>
        <th scope="col">{{ __("Registration number") }}</th>
        <th scope="col">{{ __("Average") }}</th>
        <th scope="col">{{ __("Phone") }}</th>
        <th scope="col">{{ __("Speciality") }}</th>
        @if($actions)
        <th scope="col">{{ __("Actions") }}</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td class="text-sm font-bold" scope="row">{{ $student->id }}</td>
            <td class="text-sm">{{ $student->name }}</td>
            <td class="text-sm">{{ $student->registration_number }}</td>
            <td class="text-sm">{{ $student->average }}</td>
            <td class="text-sm">{{ $student->phone }}</td>
            <td class="text-sm">{{ $student->speciality->name }}</td>
            @if($actions)
            <td>
                <div class="inline-flex justify-end items-center space-x-2">
                    @if($can_edit)
                        <button class="px-2 py-1.5 text-xs rounded-md btn btn-outline-success">{{ __("Edit") }}</button>
                    @endif
                    @if($can_delete)
                        <button class="px-2 py-1.5 text-xs rounded-md btn btn-outline-danger">{{ __("Delete") }}</button>
                    @endif
                </div>
            </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
