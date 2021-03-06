<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>City Clicker</title>

        <!-- Bootstrap CDNs-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <link href="{{ asset('css/myGame.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <button class="btn-lg btn-success"><a href="{{ url('/home') }}">Home</a></button>
                    @else
                        <button class="btn-lg btn-success"><a href="{{ url('/login') }}">Login</a></button>
                        <button class="btn-lg btn-success"><a href="{{ url('/register') }}">Register</a></button>
                    @endif
                </div>
            @endif

           <div class="container">
               <div class="row">
                   <div class="col-md-8 col-md-offset-2 ">
                       {{--@component('components.who')--}}
                       {{--@endcomponent--}}
                       <div class="panel-heading welcome_page">
                           <h3>Site Purpose: To make Learning about Geography more FUN!</h3>
                           <hr>
                           <h3>Features: Admin and User Log-ins/Log-outs</h3>
                           <hr>
                           <h3>Tech Stack: PHP, Laravel, JavaScript,</h3>
                           <h3>Axios, Bootstrap, jQuery, Vue slots, </h3>
                           <h3>Blade templates, and MySQL database</h3>
                           <h3>Progressive Enhancement (CSS grid)</h3>
                           <h3>(Future Development) </h3>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </body>
</html>
