<!-- header -->
<header>

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">

                            <div class="logo">
                                <a href="{{route('homelvl1')}}"><img src="images/logo.jpg" alt="#" style="width:43%; height:50%"/></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- NAVBAR -->
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <div class="header_information">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">                                    
                                   
                                    <!-- PULSANTI NAVBAR --> 
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('homelvl1')}}">Home</a>
                                    </li>
                                    @can('isUtente')
                                        <a class="nav-link" href="{{route('amici',['id'=>Auth::user()->id])}}">Amici</a>
                                        <a class="nav-link" href="{{route('blogIndex')}}">Blog</a>
                                        <a class="nav-link" href="{{route('notifiche')}}">Notifiche</a>
                                    @endcan
                                    
                                    @can('isStaff')
                                    <a class="nav-link" href="{{route('allblogs')}}">Controllo blog</a>
                                    @endcan
                                    
                                    <!-- FINE PULSANTI NAVBAR -->
                                </ul>
                                
                                <!-- PULSANTE AUTENTICAZIONE/PROFILO --> 
                                @guest
                                <div class="sign_btn"><a href="{{route('login')}}">Accedi</a></div>
                                @endguest
                                @can('loggato')
                                <div class="sign_btn"><a href="{{route('profile')}}">Profilo</a></div>
                                @endcan
                                <!-- FINE PULSANTE AUTENTICAZIONE/PROFILO -->
                                
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- end header -->
