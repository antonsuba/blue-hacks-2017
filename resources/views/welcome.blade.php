<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <link href="/css/semantic.css" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
    </head>

    <body class="welcome-body">

        <div class="ui one column centered grid stackable middle aligned landing-master-div">
            <div class="seven wide column grid">
                <h1 class="title-logo">
                    {{ config('app.name') }}
                </h1>
                
                <center>
                <button class="ui facebook button" onclick="location.href='auth/facebook'" type="button">
                    <i class="facebook icon"></i>
                    Log in with Facebook
                </button>
                </center>
            </div>
        </div>
        
    </body>
</html>

