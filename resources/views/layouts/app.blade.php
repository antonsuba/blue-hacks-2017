<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="/css/semantic.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">

    <!-- Scripts
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script> -->

    <script type="text/javascript" async defer 
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMqIdlNL1E-Rfw4SWL1hwQuwZ-MCZEaJk&libraries=places&callback=initMap">
	</script>
</head>

<body>
<div class="ui one column grid">
    <div class="ui top fixed menu borderless"><!-- Wild Card Title Bar -->
        <div class="item">
            <h1 class="title-navbar" onclick="window.location='/home'">
                Wild Card
            </h1>
        </div>

        <div class="right menu head-font">
            @yield('navbar-content')

            <div class="item">
                <a href="/create-an-experience" class="head-font">Create an Experience</a>
            </div>

            <div class="ui one column grid item">
                <div class="ui floating dropdown">
                    <img class="ui avatar image mini" src="{{ Auth::user()->avatar }}">
                    <!--{{ Auth::user()->name }}-->
                    <i class="caret down icon"></i>
                    
                    <div class="menu">
                        <div class="item"><a href="/bookmark" class="head-font">Bookmarks</a></div>
                        <div class="item"><a href="/account" class="head-font">Account Settings</a></div>
                        <div class="item">Logout</div>
                    </div>
                </div>
            </div>
        </div> 

    </div>
</div>

@yield('content')

<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous">
</script>

<script type="text/javascript">
    $.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
    });
</script>

<script src="/js/geoLocator.js"></script>
<script src="/js/semantic.min.js"></script>

<script type="text/javascript">
    $('.ui.dropdown').dropdown();
</script>

@yield('scripts')

</body>
</html>