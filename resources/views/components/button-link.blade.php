@props([
    'url' => '/',
    'icon' => null,
    'bgClass' => 'bg-yellow-500',
    'hoverClass' => 'hover:bg-yellow-600',
    'textClass' => 'text-black'
])

<a href="{{ $url }}"
   class="inline-flex items-center {{ $bgClass }} {{ $hoverClass }} {{ $textClass }} px-4 py-2 rounded transition duration-300">
   
   @if ($icon)
       <i class="fa fa-{{ $icon }} mr-2"></i>
   @endif

   {{ $slot }}
</a>
