<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"></meta>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>@yield('title', '*') | Octopath</title>
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!-- Custom CSS -->
        <link rel="stylesheet" href={{ asset('css/commons.css') }}>
        <link rel="stylesheet" href={{ asset('css/app_.css') }}>
        
        @yield('head-plus')
    </head>
    <body>
        <!--
        | # id naming convention:
        |  - (position)-(role)
        -->
        @include('commons.navbar')

        @include('commons.status')
        @include('commons.error')
        
        @yield('content')
        
        @include('commons.footer')
    </body>
</html>