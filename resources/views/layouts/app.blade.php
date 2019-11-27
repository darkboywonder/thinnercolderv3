<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Thinner Colder</title>

        <link href='//fonts.googleapis.com/css?family=Poiret+One|Open+Sans:300italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400&display=swap" rel="stylesheet">
        <link href="{{ url('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body class="bg-gray-500">
        <div id="app">
            <div class="relative block lg:hidden bg-white h-12 shadow-lg z-10">
                <section class="flex justify-around items-center h-12">
                    <menu-button></menu-button>

                    <div class="w-10">
                        <img src="{{ url('resource_img/thinnercolder_logo.png') }}" alt="thinner colder logo">
                    </div>

                    @yield('action')
                </section>

                <side-nav class="sm:block lg:hidden sm:w-1/3 shadow-lg z-10"></side-nav>
            </div>

            <div class="hidden lg:block fixed lg:w-1/6 shadow-lg z-10 bg-white">
                <div class="relative fixed h-screen bg-white">
                    <div class="w-full p-4 mt-4">
                        <img src="/resource_img/thinnercolder_logo.png"/>
                    </div>

                    <navigation-links></navigation-links>
                </div>
            </div>
            <div class="flex z-0 justify-end">


                <div class="sm:w-full lg:w-5/6 h-full bg-gray-500 z-0">
                    @yield('content')
                </div>
            </div>
        </div>

        <script src="{{ url('js/app.js') }}"></script>
    </body>
</html>
