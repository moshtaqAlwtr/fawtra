@props(['height' => '40', 'width' => '40'])

<img src="{{ asset('assets/images/logo.png') }}" 
     alt="Logo" 
     height="{{ $height }}"
     width="{{ $width }}"
     {{ $attributes->merge(['class' => 'block h-9 w-auto']) }} />
