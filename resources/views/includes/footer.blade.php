
	<div class='footer-wrapper'>
		<div class='top-footer grid'>
			
			<div class='footer-links'>

				<h3 class='footer-title'>Contact</h3>
					
				@if($settings->phone)
					<a href='#' onClick='alert("Use tel:{{ $settings->phone }} on this link")' target='_blank' class='footer-links-line'>
						<div class='footer-links-icon'>
							<span class='fa fa-caret-right' aria-hidden='true'></span>
						</div>
						<div class='footer-links-info'>
							<p>{{ $settings->phone }}</p>
						</div>
					</a>
				@endif

				@if($settings->mobile)
					<a href='#' onClick='alert("Use tel:{{ $settings->mobile }} on this link")' target='_blank' class='footer-links-line'>
						<div class='footer-links-icon'>
							<span class='fa fa-caret-right' aria-hidden='true'></span>
						</div>
						<div class='footer-links-info'>
							<p>{{ $settings->mobile }}</p>
						</div>
					</a>
				@endif

				@if($settings->email)
					<a href='#' onClick='alert("Use mailto:{{ $settings->email }} on this link")' target='_blank' class='footer-links-line'>
						<div class='footer-links-icon'>
							<span class='fa fa-caret-right' aria-hidden='true'></span>
						</div>
						<div class='footer-links-info'>
							<p>{{ $settings->email }}</p>
						</div>
					</a>
				@endif

				@if($settings->facebook)
					<a href='#' onClick='alert("link to {{ $settings->facebook }} on this link")' target='_blank' class='footer-links-line'>
						<div class='footer-links-icon'>
							<span class='fa fa-caret-right' aria-hidden='true'></span>
						</div>
						<div class='footer-links-info'>
							<p>{{ str_replace('https://www.facebook.com/', 'facebook/', $settings->facebook) }}</p>
						</div>
					</a>
				@endif

				@if($settings->twitter)
					<a href='#' onClick='alert("link to {{ $settings->twitter }} on this link")' target='_blank' class='footer-links-line'>
						<div class='footer-links-icon'>
							<span class='fa fa-caret-right' aria-hidden='true'></span>
						</div>
						<div class='footer-links-info'>
							<p>{{ str_replace('https://www.twitter.com/', 'twitter/', $settings->twitter) }}</p>
						</div>
					</a>
				@endif

				@if($settings->linkedin)
					<a href='#' onClick='alert("link to {{ $settings->linkedin }} on this link")' target='_blank' class='footer-links-line'>
						<div class='footer-links-icon'>
							<span class='fa fa-caret-right' aria-hidden='true'></span>
						</div>
						<div class='footer-links-info'>
							<p>{{ str_replace('https://www.linkedin.com/', 'linkedin/', $settings->linkedin) }}</p>
						</div>
					</a>
				@endif

				<div class='footer-links-line'>
					<div class='footer-links-icon'>
						<span class="fa fa-caret-right" aria-hidden="true"></span>
					</div>
					<div class='footer-links-info'>
						<p>Mon-Fri: 8am-6pm</p>
					</div>
				</div>
			</div>

			<div class='footer-links'>
						
				<h3 class='footer-title'>Protection</h3>

				@foreach($serviceLinks as $serviceLink)

					<a href="{{ route('service', $serviceLink->slug) }}" class='footer-links-line'>
						<div class='footer-links-icon'>
							<span class='fa fa-caret-right' aria-hidden='true'></span>
						</div>
						<div class='footer-links-info'>
							<p>{{ $serviceLink->title }}</p>
						</div>
					</a>

				@endforeach

			</div>
			
			<div class='footer-content'>
				<div class='recent-news'>
						
					<h3 class='footer-title'>Request Info</h3>

					<div>
						<p>Use our quick contact form and we will get back to you as soon as we can.</p>
						<br />

						<form id='footer-form' action="{{ route('quickContactSubmit') }}" method='POST'>

							@if(Session::has('footer_success_message'))
	                            <div class='message success-message'>{{ Session::get('footer_success_message') }}</div>
	                        @endif

	                        @if(Session::has('footer_error_message'))
	                            <div class='message error-message'>{{ Session::get('footer_error_message') }}</div>
	                        @endif

							<div class='field-wrapper'>
								<div class='field-input'>
									<input class='input' data-id='name' type="text" name="full_name" placeholder='Name' value="{{ (Session::has('footer_error_message') ? old('full_name') : '') }}" required>
									<div class='input-error-warning'></div>
								</div>
							</div>
							<div class='field-wrapper'>
								<div class='field-input'>
									<input class='input' data-id='email' type="email" name="email" placeholder='Email' value="{{ (Session::has('footer_error_message') ? old('email') : '') }}" required>
									<div class='input-error-warning'></div>
								</div>
							</div>
							<div class='field-wrapper'>
								<div class='field-input'>
									<input class='input' data-id='phone' type="tel" name="phone" placeholder='Phone' pattern="[0-9]{12}" value="{{ (Session::has('footer_error_message') ? old('phone') : '') }}" required>
									<div class='input-error-warning'></div>
								</div>
							</div>
							<div class='field-wrapper'>
								<input type='hidden' name='service' value="0" /> 
                                <input type='hidden' name='message' value="Footer form submit" /> 
								<input type='hidden' name='_token' value="{{ Session::token() }}" /> 
								<input class='submit' type="submit" value='submit'>
							</div>
						</form>

					</div>
				</div>
			</div>

		</div>
		<div class='bottom-footer'>
			<div class='bottom-footer-inner'>
				<p>
					<a class='footer-link' data-token="{{ Session::token() }}" href="{{ route('privacy') }}">Privacy and Data Policy</a> 
					&nbsp; | &nbsp; 
					<a class='footer-link' data-token="{{ Session::token() }}" href="{{ route('terms') }}">Terms and Conditions</a>
				</p>
				<p>Bacon ipsum dolor amet cow cupim pig burgdoggen tongue, drumstick chuck boudin ham meatball bresaola andouille filet mignon pork loin picanha. Kevin capicola sirloin alcatra, cupim bresaola tongue pork chop fatback burgdoggen hamburger tenderloin beef pork belly biltong.</p>
				<p>Copyright NorthPoint Protection <?= date('Y'); ?> | All Rights Reserved</p>
				<p>Developed By <a href='https://www.lime-house-studio.co.uk' target='_blank'>Lime House Studio</a> <?= date('Y'); ?></p>
			</div>
		</div>
	</div>

	<script>
		
		(function(){

			var footerForm = document.getElementById('footer-form');
			var inputs = footerForm.getElementsByClassName('input');
			var length = inputs.length;
			var submit = footerForm.getElementsByClassName('submit')[0];
			var errorArr = [];
	
			submit.addEventListener('click', function(e){

				e.preventDefault();

				for (var i = 0; i < length; i++) {

					var id = inputs[i].getAttribute('data-id');
					
					if(inputs[i].value === '') errorArr.push(id);

					if(errorArr.indexOf(id) !== -1){
						var parent = inputs[i].parentNode;
						var grandparent = parent.parentNode;
						var inputError = parent.getElementsByClassName('input-error-warning')[0];

						inputError.innerHTML = 'Sorry, the ' + id + ' field cannot be left blank';

						grandparent.classList.add('error');
						inputs[i].classList.add('input-error');
							
					}

				}

				if(errorArr.length === 0) footerForm.submit();

			});

			for (var i = 0; i < length; i++) {
				inputs[i].addEventListener('keydown', function(e){

					var parent = this.parentNode;
					var grandparent = parent.parentNode;
					var inputError = parent.getElementsByClassName('input-error-warning')[0];

					if((e.target.value.length > 0) && (grandparent.classList.contains('error'))){
					
						inputError.innerHTML = '';

						grandparent.classList.remove('error');
						this.classList.remove('input-error');

					}

				})
				
			}
		})();

	</script>

	@yield('footerJS')

	<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>