@props(["route" => "create", "teachers" => [], "faculties" => [], "department" => null])

@php

if ($route == "edit")
    $action = route('department.update', $department);
else
    $action = route('department.store');

@endphp

<x-form :action="$action">
    <div class="space-y-6">
        <div>
            <x-form.label for="faculty_id" :value="__('Faculty')" />
            <select name="faculty_id" id="faculty_id" class="block w-full rounded-md border-gray-100">
                @foreach($faculties as $faculty)
                    @if($route == "edit")
                        <option value="{{$faculty->id}}" @if($faculty->id == $department->faculty_id) selected @endif>{{$faculty->name}}</option>
                    @else
                        <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                    @endif
                @endforeach
            </select>
            <x-form.error for="faculty_id" />
        </div>
        <div>
            <x-form.label for="user_id" :value="__('Department Chief')" />
            <select name="user_id" id="user_id" class="block w-full rounded-md border-gray-100">
                @foreach($teachers as $teacher)
                    @if($route == "edit")
                        <option value="{{$teacher->user->id}}" @if($teacher->user->id == $department->user->id) selected @endif>{{$teacher->name}}</option>
                    @else
                        <option value="{{$teacher->user->id}}">{{$teacher->name}}</option>
                    @endif
                @endforeach
            </select>
            <x-form.error for="user_id" />
        </div>
        <div>
            <x-form.label for="name" :value="__('Name')" />
            @if($route == "edit")
                <x-form.text id="name" value="{{$department->name}}"/>
            @else
                <x-form.text id="name" value="{{old('name')}}"/>
            @endif
            <x-form.error for="name" />
        </div>
        <div>
            <x-form.label for="address" :value="__('Address')" />
            @if($route == "edit")
                <x-form.area id="address">{!! $department->address !!}</x-form.area>
            @else
                <x-form.area id="address">{!! old("address") !!}</x-form.area>
            @endif
            <x-form.error for="address" />
        </div>
        <div>
            <x-form.label for="phone" :value="__('Phone')" />
            @if($route == "edit")
                <x-form.text id="phone" value="{{$department->phone}}"/>
            @else
                <x-form.text id="phone" value="{{old('phone')}}"/>
            @endif
            <x-form.error for="phone" />
        </div>
        <div class="flex justify-end items-center space-x-4 pt-6 border-t ">
            <a href="{{ route("department.index") }}" class="btn btn-secondary">
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
