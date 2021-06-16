<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Theme - ') }} {{ $theme->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <div class="flex-grow">
                            <h1 class="uppercase text-2xl font-semibold tracking-wide">{{ $theme->title }}</h1>
                        </div>
                        <div class="flex space-x-2">
                            @if(Auth::user()->hasPermissionTo("create speciality"))
                                <a href="{{ route("speciality.create") }}" class="block btn btn-primary">{{ __("Create new speciality") }}</a>
                            @endif
                            @if(Auth::user()->hasPermissionTo("choose theme") && $student->isThemeAvailable($theme))
                                @if( $student->hasTheme($theme))
                                    <a href="#" class="block btn disabled border" disabled="disabled">{{ __("Already added") }}</a>
                                    <a href="{{ route("theme.remove", $theme) }}" class="block btn btn-danger">{{ __("remove from choices") }}</a>
                                @elseif($student->themes()->where('themes.id', $theme->id)->count() <= config("theme.max_per_student"))
                                    <a href="{{ route("theme.choose", $theme) }}" class="block btn btn-primary">{{ __("add to choices") }}</a>
                                @endif
                            @endif
                        </div>

                    </div>

                    <div class="mt-4 py-6 space-y-6 border-t">
                        <div class="space-y-4">
                            <h1 class="uppercase text-xl font-semibold tracking-wide">{{ __("Framer") }}</h1>
                            <div>
                                {!! $theme->teacher->name !!}
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h1 class="uppercase text-xl font-semibold tracking-wide">{{ __("Speciality") }}</h1>
                            <div>
                                {!! $theme->speciality->name !!}
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h1 class="uppercase text-xl font-semibold tracking-wide">{{ __("Objectives") }}</h1>
                            <div>
                                {!! $theme->objective !!}
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h1 class="uppercase text-xl font-semibold tracking-wide">{{ __("Resume") }}</h1>
                            <div>
                                {!! $theme->resume !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push("scripts")

    @endpush
</x-app-layout>
