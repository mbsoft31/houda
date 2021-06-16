@props(["themes", "actions" => true])

@php
$can_accept = Auth::user()->hasPermissionTo("accept theme");
$can_refuse = Auth::user()->hasPermissionTo("refuse theme");
$can_edit = Auth::user()->hasPermissionTo("edit theme");
$can_delete = Auth::user()->hasPermissionTo("delete theme");

@endphp

<table class="table table-striped theme-table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">{{ __("Title") }}</th>
        <th scope="col">{{ __("Teacher") }}</th>
        <th scope="col">{{ __("Objective") }}</th>
        <th scope="col">{{ __("Resume") }}</th>
        <th scope="col">{{ __("Speciality") }}</th>
        <th scope="col">{{ __("Status") }}</th>
        @if($actions)
        <th scope="col">{{ __("Actions") }}</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($themes as $theme)
        <tr>
            <td class="text-sm font-bold" scope="row">{{ $theme->id }}</td>
            <td class="text-sm">
                <a href="{{ Auth::user()->hasRole("student") ? route("student.theme.show", $theme) :
                route("theme.show", $theme) }}">
                    {{ $theme->title }}
                </a>
            </td>
            <td class="text-sm">{{ $theme->teacher->name }}</td>
            <td class="text-sm">{{ $theme->objective }}</td>
            <td class="text-sm">{{ $theme->resume }}</td>
            <td class="text-sm">{{ $theme->speciality->name }}</td>
            <td class="text-sm">{{ $theme->status }}</td>
            @if($actions)
            <td>
                <div class="inline-flex justify-end items-center space-x-2">
                    @if($can_accept && $theme->status == "pending")
                        <a href="{{ route("theme.accept", $theme) }}" class="px-2 py-1.5 text-xs rounded-md btn btn-outline-primary">{{ __("Accept") }}</a>
                    @endif
                        @if($can_refuse && ($theme->status == "pending" || $theme->status == "active"))
                            <a href="{{ route("theme.refuse", $theme) }}" class="px-2 py-1.5 text-xs rounded-md btn btn-outline-warning">{{ __("Refuse") }}</a>
                        @endif
                    @if($can_edit && $theme->teacher_id == Auth::user()->teacher->id )
                        <a href="{{ route("theme.edit", $theme) }}" class="px-2 py-1.5 text-xs rounded-md btn btn-outline-success">{{ __("Edit") }}</a>
                    @endif
                    @if($can_delete)
                        <a href="{{ route("theme.destroy", $theme) }}" class="px-2 py-1.5 text-xs rounded-md btn btn-outline-danger">{{ __("Delete") }}</a>
                    @endif
                </div>
            </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
