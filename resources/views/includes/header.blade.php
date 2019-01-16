<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title')</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta name='description' content="@yield('description')" />
	<meta name='keywords' content="@yield('keywords')" />
	<meta name='twitter:card' content='summary' />
	<meta name='twitter:url' content="@yield('canonical')" />
	<meta name='twitter:title' content="@yield('title')" />
	<meta name='twitter:description' content="@yield('description')" />
	<meta name='twitter:image' content="@yield('image')" />

	<meta property='og:type' content='website' />
	<meta property='og:site_name' content='NorthPoint Protection' />
	<meta property='og:locale' content='en_GB' />
	<meta property='og:url' content="@yield('canonical')" />
	<meta property='og:description' content="@yield('description')" />
	<meta property='og:title' content="@yield('title')" />
	<meta property='og:image' content="@yield('image')" />
	<meta property='fb:app_id' content='' />

	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' type='text/css' />
	<link rel="stylesheet" href="{{ asset('css/app.css') }}" type='text/css'>

	<link rel="shortcut icon" href="{{ asset('images/icon.png') }}">

</head>
<body>

	<div class='mobile-nav'>
		<div class='mobile-nav-inner'>
			<div class='mobile-nav-links'>
				<ul>
					<li><a href="{{ route('about') }}">About</a></li>
					<li><a href="{{ route('services') }}">Protection</a></li>
					<li><a href="{{ route('contact') }}">Contact</a></li>
				</ul>
			</div>
			<div class='mobile-social-nav'>
				<ul>
					@if($settings->facebook)
						<li>
							<a href='#' onClick='alert("link to {{ $settings->facebook }} on this link")'>
								<span class="fa fa-facebook-official" aria-hidden="true"></span>
							</a>
						</li>
					@endif

					@if($settings->twitter)
						<li>
							<a href='#' onClick='alert("link to {{ $settings->twitter }} on this link")'>
								<span class="fa fa-twitter-square" aria-hidden="true"></span>
							</a>
						</li>
					@endif

					@if($settings->linkedin)
						<li>
							<a href='#' onClick='alert("link to {{ $settings->linkedin }} on this link")'>
								<span class="fa fa-linkedin-square" aria-hidden="true"></span>
							</a>
						</li>
					@endif

					@if($settings->phone)
						<li>
							<a href='#' onClick='alert("Use tel:{{ $settings->phone }} on this link")'>
								<span class="fa fa-phone" aria-hidden="true"></span>
							</a>
						</li>
					@endif

					@if($settings->email)
						<li>
							<a href='#' onClick='alert("link to mailto:{{ $settings->email }} on this link")'>
								<span class="fa fa-envelope" aria-hidden="true"></span>
							</a>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</div>

	<div class='header-wrapper'>
		<div class='main-header'>
			<div class='logo'>
				<a href="{{ route('index') }}">
					<img src="{{ asset('images/logo.png') }}" alt='NorthPoint Protection' title='NorthPoint Protection' />
				</a>
			</div>
			<div class='nav'>
				<ul>
					<li><a href="{{ route('about') }}">About</a></li>
					<li><a href="{{ route('services') }}">Protection</a></li>
					<li><a href="{{ route('contact') }}">Contact</a></li>
				</ul>
			</div>
			<div class='social-nav'>
				<ul>
					@if($settings->facebook)
						<li>
							<a href='#' onClick='alert("link to {{ $settings->facebook }} on this link")'>
								<span class="fa fa-facebook-official" aria-hidden="true"></span>
							</a>
						</li>
					@endif

					@if($settings->twitter)
						<li>
							<a href='#' onClick='alert("link to {{ $settings->twitter }} on this link")'>
								<span class="fa fa-twitter-square" aria-hidden="true"></span>
							</a>
						</li>
					@endif

					@if($settings->linkedin)
						<li>
							<a href='#' onClick='alert("link to {{ $settings->linkedin }} on this link")'>
								<span class="fa fa-linkedin-square" aria-hidden="true"></span>
							</a>
						</li>
					@endif

					@if($settings->phone)
						<li>
							<a href='#' onClick='alert("Use tel:{{ $settings->phone }} on this link")'>
								<span class="fa fa-phone" aria-hidden="true"></span>
							</a>
						</li>
					@endif

					@if($settings->email)
						<li>
							<a href='#' onClick='alert("link to mailto:{{ $settings->email }} on this link")'>
								<span class="fa fa-envelope" aria-hidden="true"></span>
							</a>
						</li>
					@endif
				</ul>
			</div>

			<div class='mob-nav-button'>
				<span class='line'></span>
				<span class='line'></span>
				<span class='line'></span>
			</div>
		</div>
	</div>