@extends('admin.layouts.master')

@section('title', 'NorthPoint Protection Admin')

@section('pagetitle', 'Settings')

@section('maincontent')

	<div class='bg-white border text-body mb-5'>

		<div class='p-3 border-bottom mb-3'>
			<h5 class='mb-0'>Contact and Social Details</h5>
		</div>

		<form class='p-3' action="{{ route('admin.settings_update') }}" method='POST'> 

			@if(Session::get('success_message'))
				<div class="alert alert-success" role="alert">
					<p class='mb-0 font-weight-bold'>{{ Session::get('success_message') }}</p>    
				</div>
			@endif

			@if(Session::get('error_message'))
				<div class="alert alert-warning" role="alert">
					<p class='mb-0 font-weight-bold'>{{ Session::get('error_message') }}</p>    
				</div>
			@endif

			<div class="form-group">
			   <label for="phone">Phone Number</label>
			   <input type="text" class="form-control" id="phone" name='phone' placeholder="" value="{{ $phone }}">
			</div>

			<div class="form-group">
			   <label for="mobile">Mobile Number</label>
			   <input type="text" class="form-control" id="mobile" name='mobile' placeholder="" value="{{ $mobile }}">
			</div>

			<div class="form-group">
			   <label for="email">Email</label>
			   <input type="email" class="form-control" id="email" name='email' placeholder="" value="{{ $email }}">
			</div>

			<div class="form-group">
			   <label for="facebook">Facebook</label>
			   <input type="text" class="form-control" id="facebook" name='facebook' placeholder="" value="{{ $facebook }}">
			</div>

			<div class="form-group">
			   <label for="twitter">Twitter</label>
			   <input type="text" class="form-control" id="twitter" name='twitter' placeholder="" value="{{ $twitter }}">
			</div>

			<div class="form-group">
			   <label for="linkedin">Linkedin</label>
			   <input type="text" class="form-control" id="linkedin" name='linkedin' placeholder="" value="{{ $linkedin }}">
			</div>

			<div class='text-right mt-3'>
				<input type='hidden' name='_token' value="{{ Session::token() }}" />
				<button type="submit" class="btn btn-success">Update Settings</button>
			</div>

		</form>
	
	</div>

@endsection
