<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Department') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Auth::user()->hasPermissionTo("create department"))
                        <div class="flex justify-end">
                            <a href="{{ route("department.create") }}" class="block btn btn-primary">{{ __("Create new department") }}</a>
                        </div>
                    @endif
                    <div class="mt-4 py-6 border-t">
                        <x-department.table :departments="$departments" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push("scripts")

    @endpush
</x-app-layout>
