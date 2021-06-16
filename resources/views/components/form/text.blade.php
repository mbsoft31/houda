@props(["id" => "input"])
<input
    type="text"
    id="{{$id}}"
    name="{{$id}}"
    {!! $attributes->merge(["class" => "block w-full rounded-md border-gray-200"]) !!}
/>
