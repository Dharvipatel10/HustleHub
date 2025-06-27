<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title{{$title ?? 'Jobsearch | Find and list jobs'}}</title>
</head>

<body class="bg-gray-100">
    <x-header />
    @if(request()->is('/'))
    <x-hero />
    <x-top-banner />
    @endif
    <main class="container mx-auto p-4 mt-4">
        {{-- Display alert message --}}
        @if(session('success'))
            <x-alert type="success" message="{{session('success')}}"/>
        @endif
        @if(session('error'))
            <x-alert type="error" message="{{session('error')}}"/>
        @endif
        {{$slot}}
    </main>

    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>