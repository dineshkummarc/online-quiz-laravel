<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width,  initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="jsrc.js" type="text/javascript"></script>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <title>Online Quiz System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 60vh;
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
                margin-top: 150px;
            }

            .division1 {
                padding-top: 150px;
                padding-bottom: 80px;
                text-align: center;
            }

            .division2 {
                padding-top: 70px;
                padding-bottom: 80px;
                text-align: center;
                background-color: #e0ecff;
            }

            .title {
                font-size: 84px;
            }

            .paragraph {
                font-size: 18px;
                font-weight: 80;
                color: black;
            }

            .heading {
                font-size: 50px;
                font-weight: 180;
                color: black;
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

            .footer{
                background: #2F2F32;
                color: white;
                padding-top: 30px;
                padding-left: 50px;
                padding-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{URL::asset('/img/onlinequiz.png')}}" height="400" width="1349" class="img-responsive">
                </div>
            </div>
        </div>

        <div class="division1">
            <div class="row">
                <div class="col-lg-offset-2 col-lg-8">
                    <h1>Test your knowledge</h1>
                    <hr>
                    <div class="col-lg-4">
                        <div class="well">
                            <i class="fa fa-graduation-cap" aria-hidden="true" style="font-size: 200%; color: brown;"></i>
                            <h3>Check your IQ</h3>
                            <p>Have you wondered what your IQ score is? Take our quiz and find out just how smart you are.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="well">
                            <i class="fa fa-users" aria-hidden="true" style="font-size: 200%; color: blue;"></i>
                            <h3>Compete with others</h3>
                            <p>Have fun with online quiz together with your friends and compare your score in real time online. </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="well">
                            <i class="fa fa-smile-o" aria-hidden="true" style="font-size: 200%; color: green;"></i>
                            <h3>Have fun</h3>
                            <p>Playing and creating quizzes has never been more easy and fun with our online quiz system</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="division2">
            <div class="row">
                <div class="col-lg-offset-3 col-lg-6">
                    <h1 class="heading">Create your own quiz</h1>
                    <hr>
                    <p class="paragraph">Always wanted to make a quiz, but couldn't find an easy quiz creator to help you out? With our online quiz tool it’s easy to make a quiz in less than five minutes. Just follow these simple steps to create online quizzes with our online quiz software.</p>
                    <br>
                    @if (Route::has('login'))
                        <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                    @endif
                </div>
            </div>
        </div>

        <!--Footer-->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <h4>Contact Us</h4>
                        <p><i class="fa fa-home" aria-hidden="true"></i>   Kupondole, Lalitpur, Nepal</p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i>   ujjenms.bania@gmail.com</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i>   014242234</p>
                        <p><i class="fa fa-mobile" aria-hidden="true"></i>   9841574793</p>
                        <p><i class="fa fa-globe" aria-hidden="true"></i>   wwww.onlinequiz.com</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-md-offset-4">
                        <img src="{{URL::asset('/img/logo.jpg')}}" width="200" height="100" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
