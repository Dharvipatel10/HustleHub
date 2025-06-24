@props([
    'url' => '/',
    'icon' => null,
    'bgClass' => 'bg-yellow-500',
    'hoverClass' => 'hover:bg-yellow-600',
    'textClass' => 'text-black',
    'block' => false,
])

<a href="{{ $url }}"
   class="{{ $bgClass }} {{ $hoverClass }} {{ $textClass }} px-4 py-2 rounded transition duration-300 {{$block ? 'block' : ''}}">
   
   @if ($icon)
       <i class="fa fa-{{ $icon }} mr-2"></i>
   @endif

   {{ $slot }}
</a>
