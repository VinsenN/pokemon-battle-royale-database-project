<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- templated -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

         <!-- external css -->
        <link rel="stylesheet" href="{{URL::asset('assets/css/cursor.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/unselectable.css')}}">


        <!-- external js -->
        <script type="text/javascript" src="{{URL::asset('assets/js/additional-time.js')}}"></script>

        <!-- icon -->
        <link rel="icon" href="{{URL::asset('assets/image/icon.jpg')}}" crossorigin="anonymous">
        <title>Pokemon Battle Royale</title>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark px-4 navbar-expand-lg
            /*fixed-top*/"
        >

            <div class="navbar-brand unselectable">
                <a href = "/" style="text-decoration: none; color: white;">
                    <img src="{{URL::asset('assets/image/icon.jpg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                    <b>Battle Royale</b>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-item nav-link" href="/">Home</a>
                  <a class="nav-item nav-link" href="/pokemon">Pokemon</a>
                  <a class="nav-item nav-link" href="/player">Trainer</a>
                  <a class="nav-item nav-link" href="/leaderboard">Leaderboard</a>
                </div>
            </div>

            <div class="navbar-brand default-cursor unselectable" style="font-size:15px">
                <body onload="time()">
                <div id="span"></div>
            </div>

        </nav>

        @yield('content')

        <div>
            <br><br><br><br><br><br><br>
        </div>

        <footer class="bg-dark text-white-50 py-2" style="/*position: fixed;*/ bottom: 0; width: 100%" >
            <div class="text-center">
                <small>Dibuat oleh:</small><br>
                <small>Vinsen Nawir - 2440031521</small> <br>
                <br>
                <small>Dr. Robertus Nugroho Perwiro Atmojo, S.Kom., M.M.S.I, CSCA</small><br>
                <small>ISYS6169001 - Database Systems</small><br>
                <small>LG01</small>
            </div>
        </footer>
    </body>
</html>
