
<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Gruppo 53">
        <meta name="description" content="Sito di HiBlog">
        <meta name="keywords" content="social, amici, network, blog, chat">      
        <title>HiBlog | @yield('title','HomePage')</title>
        @include('layouts.stylelayout') 
        @show

        
        

    </head>    
    <body>
        <div id="wrapper">
            
            <div id="navbar">
                @include('layouts/navbar')
            </div>
            
            <div id="page">                
                    <div id="home">
                        @yield('homepage')
                        @yield('login')
                        @yield('register')
                        @yield('profile')
                        @yield('profileEdit')
                        @yield('amici')
                        @yield('ricerca')
                        @yield('profileOther')
                        @yield('profileResult')
                        @yield('notifiche')
                        @yield('blogIndex')
                        @yield('theblog')
                        @yield('NuovoBlog')
                        @yield('GestBlogs')
                        @yield('BlogControl')
                        @yield('GestUtenti')
                        @yield('AggiungiStaff')
                        @yield('ModifyStaff')
                        @yield('Stats')
                        @yield('ProfileStats')
                    </div>                
            </div>
           
            
             <div id="footer">
                @include('layouts/footer')
            </div> 
            <!-- end footer -->        
            


        </div>
        
    </body>
</html>
