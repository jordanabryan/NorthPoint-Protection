@extends('admin.layouts.master')

@section('title', 'NorthPoint Protection Services')

@section('pagetitle', 'Services')

@section('maincontent')


	<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">Services</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pills-add-tab" data-toggle="pill" href="#pills-add" role="tab" aria-controls="pills-add" aria-selected="false">Add Service</a>
		</li>
	</ul>

	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
			
			<div class='bg-white border text-body mb-5'>

				<div class='p-3 border-bottom mb-3'>
					<h5 class='mb-0'>All Services</h5>
				</div>

				@if($services)

					<div class='p-3'>
						<div class='table-responsive'>
					
							<table class="table table-striped table-hover">
								<thead class='thead-light'>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Title</th>
										<th scope="col">Excerpt</th>
										<th scope="col" class='d-none d-md-block'>Image</th>
									</tr>
								</thead>
								<tbody>
									@foreach($services as $service)

										<tr class='cursor-pointer' onclick='location.href="{{ route('admin.service', ['id' => $service->id]) }}"'>
											<td scope="row">{{ $service->id }}</td>
											<td>{{ $service->title }}</td>
											<td>{{ $service->excerpt }}</td>
											<td class='d-none d-md-block'><img style='max-width:100px;' src="{{asset($service->bg_image)}}" alt="{{ $service->title }}"  /></td>
										</tr>
										
									@endforeach
								</tbody>
							</table>

						</div>
					</div>

				@else

					<div class='p-3'>
						<h3>No services present</h3>
					</div>

				@endif

			</div>

		</div>

		<div class="tab-pane fade" id="pills-add" role="tabpanel" aria-labelledby="pills-add-tab">

			<div class='bg-white border text-body mb-5'>

				<div class='p-3 border-bottom mb-3'>
					<h5 class='mb-0'>Add New Service</h5>
					<small class='display-block mb-2'>Add a new service</small>
				</div>

				<form class='p-3' action="{{ route('admin.service_add') }}" method="POST" enctype='multipart/form-data'>           

					@if(Session::get('success_message'))
						<div class="alert alert-success" role="alert">
							<p class='mb-0 font-weight-bold'>{{ Session::get('success_message') }}</p>    
						</div>
					@endif

					@if(Session::get('error_message'))
						<div class="alert alert-danger" role="alert">
							<p class='mb-0 font-weight-bold'>{{ Session::get('error_message') }}</p> 

							@if($errors->any())
								<ul class='mb-0'>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							@endif

						</div>
					@endif

					<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
					   <label for="title">Title</label>
					   <input type="text" class="form-control {!! $errors->first('title', 'is-invalid') !!}" id='title' name='title' placeholder='service title' value="{{ old('title') }}">
					   {!! $errors->first('title', '<small class="form-text invalid-feedback">:message</small>') !!}
					</div>


					<div class="form-group {{ $errors->has('icon') ? 'has-error' : ''}}">
					   <label for="icon">Icon</label>
					   <input type="text" class="form-control {!! $errors->first('icon', 'is-invalid') !!}" id='icon' name='icon' placeholder='icon of the service' value="{{ old('icon') }}">
					   <small id="" class="form-text text-muted">A list of avaliable icons can be found here: <a target='_blank' href='https://fontawesome.com/v4.7.0/icons/'>icons</a></small>
					   {!! $errors->first('icon', '<small class="form-text invalid-feedback">:message</small>') !!}
					</div>

					<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : ''}}">
					   <label for="excerpt">Excerpt</label>
					   <textarea class="form-control {!! $errors->first('excerpt', 'is-invalid') !!}" id='excerpt' name='excerpt' rows='3' placeholder='Excerpt of the service'>{{ old('excerpt') }}</textarea>
					   {!! $errors->first('excerpt', '<small class="form-text invalid-feedback">:message</small>') !!}
					</div>

					<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
					   <label for="body">Body</label>
					   <textarea class="form-control {!! $errors->first('body', 'is-invalid') !!}" id='body' name='body' rows='10' placeholder='Main body of the service'>{{ old('body') }}</textarea>
					   {!! $errors->first('body', '<small class="form-text invalid-feedback">:message</small>') !!}
					</div>

					<div class='form-group'>
						<label for='bg_image'>background image</label>
						<input type="file" class="form-control-file" id='file' name='file'>
					</div>

					<fieldset class='bg-light border mt-4 p-3'>
						<h5 class='mb-3'>Update What's Covered</h5>

						@if(old('whats_covered'))

							@foreach(old('whats_covered') as $key => $whats_covered)

								<div class='clone-wrapper covered-wrapper border-top pt-3 pb-3 mb-3'>
									<div class="form-group">
									   <label class='title_label' for="whats_covered_title_{{ $key }}">Whats Covered</label>
									   <input data-type='whats_covered' type='text' class="form-control" id='whats_covered_title_{{ $key }}' name="whats_covered[{{ $key}}][title]" placeholder='whats covered' value="{{ $whats_covered['title'] }}" />
									</div>
									<div class="form-group">
									   <label class='body_label' for="whats_covered_body_{{ $key }}">Info</label>
										<textarea data-type='whats_covered' class="form-control" id='whats_covered_body_{{ $key }}' name="whats_covered[{{ $key }}][body]" rows='2'>{{ $whats_covered['body'] }}</textarea>
									</div>
								</div>

							@endforeach

						@else 

							<div class='clone-wrapper covered-wrapper border-top pt-3 pb-3 mb-3'>
								<div class="form-group">
								   <label class='title_label' for="whats_covered_title_0">Whats Covered</label>
								   <input data-type='whats_covered' type='text' class="form-control" id='whats_covered_title_0' name="whats_covered[0][title]" placeholder='whats covered' value="" />
								</div>
								<div class="form-group">
								   	<label class='body_label' for="whats_covered_body_0">Info</label>
									<textarea data-type='whats_covered' class="form-control" id='whats_covered_body_0' name="whats_covered[0][body]" rows='2'></textarea>
								</div>
							</div>

						@endif

						<div class='text-right mt-1 mb-3'>
							<button type="button" class="new-input btn btn-primary">Add New</button>
						</div>

					</fieldset>

					<fieldset class='bg-light border mt-4 p-3'>
						<h5 class='mb-3'>Update Common Questions</h5>  

						@if(old('common_questions'))

							@foreach(old('common_questions') as $key => $common_questions)

								<div class='clone-wrapper question-wrapper border-top pt-3 pb-3 mb-3'>
									<div class="form-group">
									   <label class='title_label' for="common_questions_title_{{ $key }}">Question</label>
									   <input data-type='common_questions' type='text' class="form-control" id='whats_covered_title_{{ $key }}' name="common_questions[{{ $key }}][title]" placeholder='common question' value="{{ $common_questions['title'] }}" />
									</div>
									<div class="form-group">
									   <label class='body_label' for="whats_covered_body_{{ $key }}">Info</label>
										<textarea data-type='common_questions' id='common_questions_body_{{ $key }}' class="form-control" name="common_questions[{{ $key }}][body]" rows='2'>{{ $common_questions['body'] }}</textarea>
									</div>
								</div>

							@endforeach

						@else

							<div class='clone-wrapper question-wrapper border-top pt-3 pb-3 mb-3'>
								<div class="form-group">
								   <label class='title_label' for="common_questions_title_0">Question</label>
								   <input data-type='common_questions' type='text' class="form-control" id='common_questions_title_0' name="common_questions[0][title]" placeholder='common question' value="" />
								</div>
								<div class="form-group">
								   <label class='body_label' for="common_questions_body_0">Info</label>
									<textarea data-type='common_questions' id='common_questions_body_0' class="form-control" name="common_questions[0][body]" rows='2'></textarea>
								</div>
							</div>

						@endif

						<div class='text-right mt-1 mb-3'>
							<button type="button" class="new-input btn btn-primary">Add New</button>
						</div>

					</fieldset>

					<div class='text-right mt-3'>
						<input type='hidden' name='_token' value="{{ Session::token() }}" />
						<input type="submit" class="btn btn-success" value='Add Service' />
					</div>

				</form>
			</div>				

		</div>
	</div>


@endsection


@section('footerJS')

<script>
	
	(function(){

		var buttons = document.getElementsByClassName('new-input');
		var length = buttons.length;

		for (var i = 0; i < length; i++) {
			buttons[i].addEventListener('click', function(e){
				e.preventDefault();
				cloneElements(this);
			})
		}

		function cloneElements(el){


			var parent = el.parentNode;
			var grandparent = parent.parentNode;

			var cloneElements = grandparent.getElementsByClassName('clone-wrapper');
			var cloneLength = cloneElements.length;
			var toClone = cloneElements[(cloneLength - 1)];

			var clone = toClone.cloneNode(true);
			var cloneTitleLabel = clone.getElementsByClassName('title_label')[0];
			var cloneBodyLabel = clone.getElementsByClassName('body_label')[0];
			var cloneInput = clone.getElementsByTagName('input')[0];
			var cloneTextarea = clone.getElementsByTagName('textarea')[0];

			var prevTitleLabel = cloneTitleLabel.getAttribute('for');
			var prevBodyLabel = cloneBodyLabel.getAttribute('for');

			cloneTitleLabel.htmlFor = prevTitleLabel.replace(/[0-9]/g, '') + cloneLength;
			cloneBodyLabel.htmlFor = prevBodyLabel.replace(/[0-9]/g, '') + cloneLength;

			cloneInput.value = '';
			cloneInput.id = cloneInput.id.replace(/[0-9]/g, '') + cloneLength;
			cloneInput.name = cloneInput.getAttribute('data-type') + "[" + cloneLength + "][title]";
			
			cloneTextarea.value = '';
			cloneTextarea.id = cloneTextarea.id.replace(/[0-9]/g, '') + cloneLength;
			cloneTextarea.name = cloneTextarea.getAttribute('data-type') + "[" + cloneLength + "][body]";


			grandparent.insertBefore(clone, parent);

		}


	})();


</script>


@endsection
