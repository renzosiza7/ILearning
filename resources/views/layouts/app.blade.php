<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <b-navbar toggleable="lg" type="light" variant="light">
            <b-navbar-brand href="#">ILearning</b-navbar-brand>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item to="/errors">Incidencias</b-nav-item>
                    <!--<b-nav-item href="#" disabled>Disabled</b-nav-item>-->
                </b-navbar-nav>
                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">                                 
                    <b-nav-item-dropdown right>
                        <!-- Using 'button-content' slot -->
                        <template v-slot:button-content>
                            <em>User</em>
                        </template>
                        <!--<b-dropdown-item href="#">Perfil</b-dropdown-item>-->
                        <b-dropdown-item 
                            href="#" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();
                        ">
                            Cerrar sesión
                        </b-dropdown-item>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </b-nav-item-dropdown>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>

        <main>            
            @yield('content')            
        </main>
    </div>
</body>
</html>
