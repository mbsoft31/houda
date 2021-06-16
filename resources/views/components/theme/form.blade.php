@props(["route" => "create", "specialities" => null, "theme" => null])

@php

if ($route == "edit")
    $action = route('theme.update', $theme);
else
    $action = route('theme.store');

@endphp

<x-form :action="$action">
    <div class="space-y-6">
        <div>
            <x-form.label for="speciality_id" :value="__('Speciality')" />
            <select name="speciality_id" id="speciality_id" class="block w-full rounded-md border-gray-100">
                @foreach($specialities as $speciality)
                    @if($route == "edit")
                        <option value="{{$speciality->id}}" @if($speciality->id == $theme->speciality_id) selected @endif>{{$speciality->name}}</option>
                    @else
                        <option value="{{$speciality->id}}">{{$speciality->name}}</option>
                    @endif
                @endforeach
            </select>
            <x-form.error for="speciality_id" />
        </div>
        <div>
            <x-form.label for="title" :value="__('Title')" />
            @if($route == "edit")
                <x-form.text id="title" value="{{$theme->title}}"/>
            @else
                <x-form.text id="title" value="{{old('title')}}"/>
            @endif
            <x-form.error for="title" />
        </div>
        <div>
            <x-form.label for="objective" :value="__('Objective')" />
            <x-form.area id="objective">@isset($theme){!! $theme->objective !!}@endisset</x-form.area>
            <x-form.error for="objective" />
        </div>
        <div>
            <x-form.label for="resume" :value="__('resume')" />
            <x-form.area id="resume">@isset($theme){!! $theme->resume !!}@endisset</x-form.area>
            <x-form.error for="resume" />
        </div>
        <div class="flex justify-end items-center space-x-4 pt-6 border-t ">
            <a href="{{ route("theme.index") }}" class="btn btn-secondary">
                {{ __("Cancel") }}
            </a>
            @if($route == "edit")
                <button type="submit" class="btn btn-success">
                    {{ __("Save") }}
                </button>
            @else
                <button type="submit" class="btn btn-primary">
                    {{ __("Save") }}
                </button>
            @endif

        </div>
    </div>
</x-form>
