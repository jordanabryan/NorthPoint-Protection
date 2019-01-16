<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>@yield('title')</title>

    <link rel='stylesheet' href="{{ asset('css/admin.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}">

</head>
<body>

<div class="page-wrap">
    <div class="bg-dark full-height text-white side-bar">
        <div class='pl-2 pr-4 pt-4 pb-4 mb-1 d-none d-md-block'>
            <img src="{{ asset('images/logo-white.png') }}" alt='NorthPoint Protection' title='NorthPoint Protection' />
        </div>

        <nav class='main-nav'>
            <ul class='list-unstyled'>
                <li class='d-block'>
                    <a href="{{ route('admin.index') }}" class='pl-3 pt-3 pb-3 pr-3 d-block h4 text-white'>
                        <span class="fa fa-television" aria-hidden="true"></span>
                        <span class="pl-2 text">Settings</span>
                    </a>
                </li>
                <li class='d-block'>
                    <a href="{{ route('admin.services') }}" class='pl-3 pt-3 pb-3 pr-3 d-block h4 text-white'>
                        <span class="fa fa-cogs" aria-hidden="true"></span>
                        <span class="pl-2 text">Services</span>
                    </a>
                </li>
                <li class='d-block'>
                    <a href="{{ route('admin.messages') }}" class='pl-3 pt-3 pb-3 pr-3 d-block h4 text-white'>
                        <span class="fa fa-envelope" aria-hidden="true"></span>
                        <span class="pl-2 text">Messages</span>
                    </a>
                </li>
                <li class='d-block'>
                    <a href="{{ route('logout') }}" class='pl-3 pt-3 pb-3 pr-3 d-block h4 text-white'>
                        <span class="fa fa-sign-out" aria-hidden="true"></span>
                        <span class="pl-2 text">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class='bottom-content'>
            <p>Copyright NorthPoint Protection</p>
            <p>Developed By Lime House Studio</p>
        </div>

    </div>

    <header class="navbar navbar-dark bg-dark text-white">
        <button class='mob-nav-button'>
            <div class='menu-line'>&nbsp;</div>
        </button>
        <h5 class="text-right mb-0">NorthPoint Protection Admin</h4>
    </header>

    <main class="main-content full-height page-content">
