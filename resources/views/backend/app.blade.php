<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700');
        @import url('https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css');

        html, body {
        height: 100%;
        }

        body {
        font: 12px/1 'Montserrat', sans-serif;
        color: #333;
        background: #333;
        overflow-x: hidden;
        }

        .wrapper {
        display: -webkit-flex;
        display: flex;
        min-height: 100%;
        }

        .sidebar {
        position: absolute;
        width: 220px;
        }

        .content {
        -webkit-flex: 1;
        flex: 1;
        padding: 30px;
        background: #eee;
        box-shadow: 0 0 5px rgba(0,0,0,1);
        transform: translate3d(0,0,0);
        transition: all .3s;
        }

        .side-panel-toggle {
        cursor: pointer;
        font-size: 42px;
        display: none;
        }

        /* Demo Navigation */

        .title {
        font-size: 16px;
        line-height: 50px;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 7px;
        color: #eee;
        border-bottom: 1px solid #222;
        background: #2a2a2a;
        }

        .nav li a {
        position: relative;
        display: block;
        padding: 15px 15px 15px 50px;
        font-size: 12px;
        color: #eee;
        border-bottom: 1px solid #222;
        }

        .nav li a:before {
        font: 14px fontawesome;
        position: absolute;
        top: 14px;
        left: 20px;
        }

        .nav li:nth-child(1) a:before { content: '\f00a'; }
        .nav li:nth-child(2) a:before { content: '\f012'; }
        .nav li:nth-child(3) a:before { content: '\f0e8'; }
        .nav li:nth-child(4) a:before { content: '\f0c3'; }
        .nav li:nth-child(5) a:before { content: '\f022'; }
        .nav li:nth-child(6) a:before { content: '\f115'; }
        .nav li:nth-child(7) a:before { content: '\f085'; }
        .nav li:nth-child(8) a:before { content: '\f023'; left: 23px; }

        .nav li a:hover {
        background: #444;
        }

        .nav li a.active {
        box-shadow: inset 5px 0 0 #5b5, inset 6px 0 0 #222;
        background: #444;
        }

        /* Demo Description */

        h1 {
        margin: 25px 0 15px;
        font-size: 28px;
        font-weight: 400;
        }

        h2 {
        font-size: 18px;
        font-weight: 400;
        color: #999;
        }

        @media only screen and (max-width: 768px) {
        .content {
            margin-left: 0;
        }

        .side-panel-toggle {
            display: block;
        }
        }

        @media only screen and (min-width: 769px) {
        .content {
            margin-left: 220px;
        }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
          <div class="title">Simple.Team</div>
          <ul class="nav" style="color: #fff;">
            <li>
              <a>Dashboard</a>
            </li>
            <li>
              <a class='active' href="{{ route('residents.index') }}">Kartu Tanda Penduduk</a>
            </li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
  
                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log out') }}
                </button>
            </form>
            </li>
            
          </ul>
        </div> 
        <div class="content content-is-open">
          <span class='side-panel-toggle'>
            <i class="fa fa-bars"></i>
          </span>
          <div class="well well-sm">
           @yield('content')
          </div>
          <hr>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        $(window).resize(function() {
            var path = $(this);
            var contW = path.width();
            if(contW >= 769){
            $('.content').css('margin-left', '220px');
            }else{
            $('.content').css('margin-left', '0px');
            }
        });

        $(document).ready(function() {
            $(".side-panel-toggle").click(function(e) {
                e.preventDefault();
            var marginLeft = $('.content').css('margin-left');
            if (marginLeft === '220px') {
            $('.content').css('margin-left', '0px');
            } else {
            $('.content').css('margin-left', '220px');
            }
            });
        });
        
    </script>
    
</body>
</html>