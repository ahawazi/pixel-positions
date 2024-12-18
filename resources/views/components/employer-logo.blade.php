@props(['employer' ,'width' => 90])

<img src="{{ asset($employer->logo) }}" alt="{{ $employer->name }}" class="rounded-xl" width="{{ $width }}">
