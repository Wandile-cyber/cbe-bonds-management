<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'CBE Bonds' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="CBE Bonds" name="description">
    <meta content="Wandile-cyber" name="author">
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.png') }}">
    <link href="{{ url('assets/libs/gridjs/theme/mermaid.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ url('assets/js/config.js') }}"></script>

    <link href="https://unpkg.com/tabulator-tables/dist/css/tabulator_bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/tabulator-tables/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>

    @livewireStyles
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="flex wrapper">
        <livewire:partials.menu />
        <div class="page-content">
            <livewire:partials.header />
            <livewire:partials.topbar-search-modal />
            <main class="flex-grow p-6">
                {{ $slot }}
            </main>
            <livewire:partials.footer />
        </div>
    </div>

    <button data-toggle="back-to-top" class="fixed hidden h-10 w-10 items-center justify-center rounded-full z-10 bottom-20 end-14 p-2.5 bg-primary cursor-pointer shadow-lg text-white">
        <i class="mgc_arrow_up_line text-lg"></i>
    </button>
    @yield('scripts')

    {{-- <livewire:partials.settings /> --}}
    <script src="{{ url('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ url('assets/libs/%40frostui/tailwindcss/frostui.js') }}"></script>
    <script src="{{ url('assets/js/app.js') }}"></script>
    <script src="{{ url('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ url('assets/js/pages/dashboard.js') }}"></script>
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

</body>
</html>
