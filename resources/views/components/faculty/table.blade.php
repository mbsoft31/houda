@props(["faculties", "actions" => true])

@php
    $can_edit = Auth::user()->hasRole("admin") || Auth::user()->hasPermissionTo("edit faculty");
    $can_delete = Auth::user()->hasRole("admin") || Auth::user()->hasPermissionTo("delete faculty");
@endphp

<table class="table table-striped speciality-table">
    <thead>
    <tr class="bg-gray-50">
        <th scope="col">#</th>
        <th scope="col">{{ __("Name") }}</th>
        <th scope="col">{{ __("Address") }}</th>
        <th scope="col">{{ __("Phone") }}</th>
        @if($actions)
            <th scope="col">{{ __("Actions") }}</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($faculties as $faculty)
        <tr>
            <td class="text-sm font-bold" scope="row">{{ $faculty->id }}</td>
            <td class="text-sm">
                <a href="{{ route("faculty.show", $faculty) }}">{{ $faculty->name }}</a>
            </td>
            <td class="text-sm">{{ $faculty->address }}</td>
            <td class="text-sm">{{ $faculty->phone }}</td>
            @if($actions)
                <td>
                    <div class="inline-flex justify-end items-center space-x-2">
                        @if($can_edit)
                            <a href="{{ route("faculty.edit", $faculty) }}" class="px-2 py-1.5 text-xs rounded-md btn btn-outline-success">{{ __("Edit") }}</a>
                        @endif
                        @if($can_delete)
                            <button class="px-2 py-1.5 text-xs rounded-md btn btn-outline-danger"  data-bs-toggle="modal" data-bs-target="#modal-delete-{{$faculty->id}}">
                                {{ __("Delete") }}
                            </button>
                            <div class="modal fade" id="modal-delete-{{$faculty->id}}" tabindex="-1" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete faculty {{ $faculty->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure want to delete this faculty ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form method="POST" action="{{ route("faculty.destroy", $faculty) }}">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">{{ __("Delete") }}</button>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
