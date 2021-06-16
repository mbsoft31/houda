@props(["id" => "input"])
<textarea
    id="{{$id}}"
    name="{{$id}}"
    {!! $attributes->merge(["class" => "block w-full rounded-md border-gray-200"]) !!}
>{{ $slot }}</textarea>
