<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{$meta->title}}</title>
        <meta name="description" content="{{$meta->description}}"/>
        <meta property="og:url" content="https://www.aminaboutique.in{{$meta->url}}"/>
        <meta property="og:title" content="{{$meta->title}}"/>
        <meta property="og:description" content="{{$meta->description}}"/>
        <meta property="og:image" content="https://www.aminaboutique.in{{$meta->image}}"/>
        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:url" content="https://www.aminaboutique.in{{$meta->url}}"/>
        <meta name="twitter:title" content="{{$meta->title}}"/>
        <meta name="twitter:description" content="{{$meta->description}}"/>
        <meta name="twitter:image" content="https://www.aminaboutique.in{{$meta->image}}"/>
        <link rel="canonical" href="https://www.aminaboutique.in{{$meta->url}}"/>
        <link rel="alternate" href="https://www.aminaboutique.in{{$meta->url}}" hreflang="x-default" />
        <link rel="alternate" hreflang="en" href="https://www.aminaboutique.in{{$meta->url}}">
        <link rel="preconnect" href="https://www.aminaboutique.in{{$meta->url}}" />
        <link rel="dns-prefetch" href="https://www.aminaboutique.in{{$meta->url}}" />
        <link rel="preload" as="image" href="https://www.aminaboutique.in{{$meta->image}}"/>
        <meta name="allow-search" content="yes"/>
        <meta property="og:locale" content="en_US"/>
        <meta property="og:type" content="website"/>
        <meta property="og:site_name" content="Hindraj Tea"/>
        <meta property="article:modified_time" content="2021-08-23T17:49:25+00:00"/>
        <meta property="fb:app_id" content="154761472308630"/>
        <link rel="icon" type="image/x-icon" href="/images/icons/favicon.png">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
    </head>
    <body class="font-sans antialiased relative">
        <x-jet-banner />
        <div class="min-h-screen">
            @livewire('navigation-menu')
            {{ $slot }}
            @livewire('parts.footer')
        </div>
        @stack('modals')
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{asset('/js/sweetalert.js')}}"></script>
        <script>window.addEventListener('swal:modal', event => { swal({ title: event.detail.message, timer: event.detail.timer }); });</script>
        @livewireScripts
    </body>
</html>