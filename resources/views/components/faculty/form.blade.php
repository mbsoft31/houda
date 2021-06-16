@props(["route" => "create", "faculty" => null])

@php

if ($route == "edit")
    $action = route('faculty.update', $faculty);
else
    $action = route('faculty.store');

@endphp

<x-form :action="$action">
    <div class="space-y-6">
        <div>
            <x-form.label for="name" :value="__('Name')" />
            @if($route == "edit")
                <x-form.text id="name" value="{{$faculty->name}}"/>
            @else
                <x-form.text id="name" value="{{old('name')}}"/>
            @endif
            <x-form.error for="name" />
        </div>
        <div>
            <x-form.label for="address" :value="__('Address')" />
            <x-form.area id="address">@isset($faculty){!! $faculty->address !!}@endisset</x-form.area>
            <x-form.error for="address" />
        </div>
        <div>
            <x-form.label for="phone" :value="__('Phone')" />
            @if($route == "edit")
                <x-form.text id="phone" value="{{$faculty->phone}}"/>
            @else
                <x-form.text id="phone" value="{{old('phone')}}"/>
            @endif
            <x-form.error for="phone" />
        </div>
        <div class="flex justify-end items-center space-x-4 pt-6 border-t ">
            <a href="{{ route("faculty.index") }}" class="btn btn-secondary">
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
