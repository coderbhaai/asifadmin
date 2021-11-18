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
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <main>{{ $slot }}</main>
            @livewire('parts.footer')
        </div>
        @stack('modals')
        @if( Request::route()->getName()!= 'addblog' && Request::route()->getName()!= 'updateblog' && Request::route()->getName()!= 'addproduct' && Request::route()->getName()!= 'updateproduct')
            <script src="/js/jquery-3.1.0.js"></script>
        @endif
        <script src="{{ mix('js/app.js') }}" defer></script>
        @if(session()->has('message'))
            <style>
                .sweetalert{ bottom: 1em; }
            </style>
            <div class="sweetalert z-50 flex items-center justify-end gap-4 bg-red-100 p-4 rounded-md fixed right-0 rounded-xl shadow">
                <div class="space-y-1 text-sm">
                    <h6 class="font-medium text-red-900">Message</h6>
                    <p class="leading-tight">{{ session('message') }}</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <script>$(document).ready(function(){ $(".sweetalert").delay(2000).slideUp(300); }); </script>
        @endif
        @livewireScripts
    </body>
</html>
