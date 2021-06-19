@props(["departments", "actions" => true])

@php
    $can_create = Auth::user()->hasPermissionTo("create department");
    $can_edit = Auth::user()->hasPermissionTo("edit department");
    $can_delete = Auth::user()->hasPermissionTo("delete department");
@endphp

<table class="table table-striped speciality-table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">{{ __("Name") }}</th>
        <th scope="col">{{ __("Address") }}</th>
        <th scope="col">{{ __("Phone") }}</th>
        <th scope="col">{{ __("Faculty") }}</th>
        <th scope="col">{{ __("Department chief") }}</th>
        @if($actions)
            <th scope="col">{{ __("Actions") }}</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($departments as $department)
        <tr>
            <td class="text-sm font-bold" scope="row">{{ $department->id }}</td>
            <td class="text-sm">
                <a href="{{ route("department.show", $department) }}">{{ $department->name }}</a>
            </td>
            <td class="text-sm">{{ $department->address }}</td>
            <td class="text-sm">{{ $department->phone }}</td>
            <td class="text-sm">{{ $department->faculty->name }}</td>
            @if($department->chief)
            <td class="text-sm">{{ $department->chief->name }}</td>
            @else
            <td class="text-sm">{{ __("Not specified") }}</td>
            @endif
            @if($actions)
                <td>
                    <div class="inline-flex justify-end items-center space-x-2">
                        @if($can_edit)
                            <a href="{{route("department.edit", $department)}}" class="px-2 py-1.5 text-xs rounded-md btn btn-outline-success">{{ __("Edit") }}</a>
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
