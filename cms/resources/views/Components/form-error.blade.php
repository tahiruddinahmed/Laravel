@props(['name'])
@error($name)
    <p class="text-red-500 font-xs">{{ $message }}</p>
@enderror