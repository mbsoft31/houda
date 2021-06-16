@props(["specialities", "actions" => true])

@php
$can_edit = Auth::user()->hasRole("admin") || Auth::user()->hasPermissionTo("edit speciality");
$can_delete = Auth::user()->hasRole("admin") || Auth::user()->hasPermissionTo("delete speciality");
@endphp

<table class="table table-striped speciality-table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">{{ __("Name") }}</th>
        <th scope="col">{{ __("Diploma") }}</th>
        <th scope="col">{{ __("Department") }}</th>
        @if($actions)
        <th scope="col">{{ __("Actions") }}</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($specialities as $speciality)
        <tr>
            <td class="text-sm font-bold" scope="row">{{ $speciality->id }}</td>
            <td class="text-sm">
                <a href="{{ route("speciality.show", $speciality) }}">
                    {{ $speciality->name }}
                </a>
            </td>
            <td class="text-sm">{{ $speciality->diploma }}</td>
            <td class="text-sm">{{ $speciality->department->name }}</td>
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
