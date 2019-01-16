<!DOCTYPE html>
<html lang='en'>
<head>
	<title>@yield('title')</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel='stylesheet' href="{{ asset('css/login.css') }}" type="text/css">

	<link rel="shortcut icon" href="{{ asset('images/icon.png') }}">
	
</head>
<body>

	<div class='page-wrapper d-flex justify-content-center align-items-center'>
		<div class='login-content p-4 bg-dark text-white'>
			<h1>Admin Login</h1>
			<form action="{{ route('logincheck') }}" method="POST">   
				
				@if(Session::get('error_message'))
					<div class="mb-2 alert alert-danger" role="alert">
						<p class='mb-0 font-weight-bold'>{{ Session::get('error_message') }}</p> 
					</div>
				@endif
				
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" id="email" name='email' placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name='password' placeholder="Password">
				</div>
				<div class="text-right">
					<input type='hidden' name='_token' value="{{ Session::token() }}" />
					<button type="submit" class="btn btn-primary text-white">Submit</button>
				</div>
			</form>
		</div>
	</div>

</body>
</html>