@props(["themes", "actions" => true])

@php
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
                <a href="{{ route("theme.show", $theme) }}">
                    {{ $theme->title }}
                </a>
            </td>
            <td class="text-sm">{{ $theme->teacher->name }}</td>
            <td class="text-sm">{{ $theme->objective }}</td>
            <td class="text-sm">{{ $theme->resume }}</td>
            <td class="text-sm">{{ $theme->speciality->name }}</td>
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
