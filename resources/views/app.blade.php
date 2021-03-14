<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.head')
    <body class="bg-gray-100">
        @include('components.navbar')
        @yield("content")
    </body>
</html>
