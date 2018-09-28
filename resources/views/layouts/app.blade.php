
<?php 
  function current_page($uri = "/") { 
    return strstr(request()->path(), $uri); 
  } 
?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

  

    <!-- Styles -->
    <link href="{{URL::to('/')}}/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link href="{{URL::to('/')}}/public/css/datepicker.css" rel="stylesheet">
    <link href="{{asset('/public/css/app.css')}}" rel="stylesheet">
    <link href="{{URL::to('/')}}/public/css/main.css" rel="stylesheet">



</head>
<body>

    <div id="app">

      
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">{{config('app.name')}}</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                
                <ul class="nav navbar-nav navbar-right">
                    
                @guest
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Guest <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>    
                        
                    </ul>
                    </li>
                @else
                    <li class="active" ><a href="{{url('/medi')}}">Home</a></li>
                    <li class="{{current_page('about') ? 'active' : '' }}"><a href="#">Patients</a></li>
                    <li class="{{current_page('appointment') ? 'active' : '' }}"><a href="{{url('/appointment')}}">Appointments</a></li>                                     
                    <li class="{{current_page('report') ? 'active' : '' }}"><a href="#">Reports</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->firstname}},{{ Auth::user()->lastname}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                       
                        <li><a href="{{url('/profile')}}">My Profile</a></li>

                        <!--Subscriber role-->
                        <?php if(auth()->user()->admin ==1){ ?>
                            <li><a href="{{url('/admin')}}">Dashboard</a></li>
                        <?php  } ?>
                                      
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li> 
                    </ul>
                    </li>

                @endguest
                </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        
        <div class="container">
            <div class="content-wrapper">

            
            <!--Error list-->          
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>                       
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!--Patient addition success message-->
            @if(session()->has('patientmessage'))
                <div class="alert alert-success">{{session()->get('patientmessage')}}</div>
            @endif
            </div>
        </div>
        

        <div class="content-wrappers ">
            @yield('content')
        </div>

        


       


    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{URL::to('/')}}/public/js/jquery.js"></script>	
    <!--script src="{{URL::to('/')}}/public/js/bootstrap.min.js"></script-->
    <script src="{{URL::to('/')}}/public/js/datepicker.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('/public/js/app.js')}}"></script>
    <script src="{{URL::to('/')}}/public/js/main.js"></script>

    
</body>
</html>
