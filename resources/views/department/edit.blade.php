<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Faculty - ') }} {{ $department->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-department.form route="edit" :faculties="$faculties" :department="$department" />
                </div>
            </div>
        </div>
    </div>
    @push("scripts")

    @endpush
</x-app-layout>
