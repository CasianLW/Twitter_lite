<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

<style>
    html{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body{
        min-height: 100vh;
        margin: 0;
        padding: 0;
        background-image: url('https://images.unsplash.com/photo-1605557202138-097824c36ed2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=752&q=80');
        backdrop-filter: blur(16px);
-webkit-backdrop-filter: blur(16px);
}
.homepage-content{
    width: 70%;
    margin-left: auto;
    position: absolute;
    right: 0;
    bottom: 0;
}
.special-center{position: fixed; top: 30vh; }
.text-btns{
    position: absolute;
    top: 50vh;
    left: 10vw;
    text-align: center;
}
.text-btns a{
    padding: 8px 16px;
    background-color: white;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    color: black;
}
.text-btns a:hover{
    background-color: #485dba;
    color:white
}
.left{
    position: absolute;
    top: 25vh;
    left: 10vw;
    color: white;

}
    
</style>
    </head>
    <body class="antialiased">
        <div class="">
        <div class="left">
            <h1>Hello, welcome to our app</h1>
                    <h2>Please login or create an account :</h2>
        </div>
            <div class="homepage-content">
                
            <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 702.61 451.39"><defs><style>.cls-1{fill:#fff;}</style></defs><path class="cls-1" d="M1150.5,124.5v358s-227,204-315,9-323,112-371,13,15-235,100-268S799.5,407.5,1150.5,124.5Z" transform="translate(-447.89 -124.5)"/></svg>

            </div class="special-center">
            <div>@if (Route::has('login'))
                <div class="text-btns">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 ">Register</a>
                        @endif
                    @endauth
                </div>
            @endif</div>

            
        </div>
    </body>
</html>

