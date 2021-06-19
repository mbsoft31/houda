<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Themes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Auth::user()->hasPermissionTo("create theme"))
                        <div class="flex justify-end">
                            <a href="{{ route("theme.create") }}" class="block btn btn-primary">{{ __("Create new theme") }}</a>
                        </div>
                    @endif
                    <div class="mt-4 py-6 border-t">
                        @if(request()->routeIs("theme.available"))
                            <x-theme.table :themes="$themes" :actions="false"/>
                        @else
                            <x-theme.table :themes="$themes"/>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    @push("scripts")

    @endpush
</x-app-layout>
