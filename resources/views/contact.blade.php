@extends('layouts.master')

@section('title', 'Contact NorthPoint Protection')
@section('description', 'Contact NorthPoint Protection to find out more info on our services')
@section('keywords', 'NorthPoint Protection, Contact NorthPoint Protection, Insurance Broker')
@section('canonical', 'http://northpoint-protection.lime-house-studio.co.uk/contact')
@section('image', asset('images/income-protection.jpg'))


@section('content')

    <div class='page-header-wrapper small bg-income-protection'>
        <div class='page-header-inner small'>
            <div class='page-header-content'>
                <h1>Contact NorthPoint Protection</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </div>

    <div class='section-wrapper'>
        <div class='section-inner'>
            <div class='section-content'>   

                <h2 class='section-title'>Contact us</h2>
                
                <div class='grid'>

                    <div class='grid-col-8'>

                        @if(Session::has('success_message'))
                            <div class='message success-message'>{{ Session::get('success_message') }}</div>
                        @endif

                        @if(Session::has('error_message'))
                            <div class='message error-message'>
                                {{ Session::get('error_message') }}

                                @if($errors && count($errors) > 0)
                                    <div class='form-message form-message-error'>
                                        <div class='form-message-icon'>
                                            <span class='icon-warning'></span>
                                        </div>
                                        <div class='form-message-content'>
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        @endif
                    
                        <form action="{{ route('contactSubmit') }}" method='POST'>

                            <fieldset>
                                
                                <legend>Contact Info</legend>

                                <div class='field-wrapper'>
                                    <label for='full_name'>Full Name</label>
                                    <div class='field-input'>
                                        <input class='input' type="text" id='full_name' name="full_name" placeholder='john Doe' value="{{ old('full_name') }}" required>
                                    </div>
                                </div>

                                <div class='field-wrapper'>
                                    <label for='email'>Email</label>
                                    <div class='field-input'>
                                        <input class='input' type="text" id='email' name="email" placeholder='johndoe@domain.com' value="{{ old('email') }}" required>
                                    </div>
                                </div>

                                <div class='field-wrapper'>
                                    <label for='phone'>Phone</label>
                                    <div class='field-input'>
                                        <input class='input' type="text" id='phone' name="phone" placeholder='0123456789' value="{{ old('phone') }}" required>
                                    </div>
                                </div>

                            </fieldset>

                            <fieldset>
                                
                                <legend>Services</legend>

                                <p>Please select the services you wish to discuss</p>

                                <div class='field-wrapper'>
                                    <div class='grid field-input'>
                                        <div class='input-checkbox'>
                                            <input type="radio" id='illness-cover' name="service" value='2' {{ old('service') == 2 ? "checked" : ""}} >
                                            <label for='illness-cover'>Illness Cover</label>
                                        </div>
                                        <div class='input-checkbox'>
                                            <input type="radio" id='life-insurance' name="service" value='1' {{ old('service') == 1 ? "checked" : ""}} >
                                            <label for='life-insurance'>Life Insurance</label>
                                        </div>
                                        <div class='input-checkbox'>
                                            <input type="radio" id='income-protection' name="service" value='5' {{ old('service') == 5 ? "checked" : ""}}>
                                            <label for='income-protection'>Income Protection</label>
                                        </div>
                                        <div class='input-checkbox'>
                                            <input type="radio" id='mortgage-protection' name="service" value='6' {{ old('service') == 6 ? "checked" : ""}}>
                                            <label for='mortgage-protection'>Mortgage Protection</label>
                                        </div>
                                        <div class='input-checkbox'>
                                            <input type="radio" id='over-50-cover' name="service" value='3' {{ old('service') == 3 ? "checked" : ""}}>
                                            <label for='over-50-cover'>Over 50's Cover</label>
                                        </div>
                                        <div class='input-checkbox'>
                                            <input type="radio" id='family-income-cover' name="service" value='4' {{ old('service') == 4 ? "checked" : ""}}>
                                            <label for='family-income-cover'>Family Income Cover</label>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>


                            <fieldset>
                                
                                <legend>Extra Info</legend>

                                <div class='field-wrapper'>
                                    <label for="subject">subject</label>
                                    <div class='field-input'>
                                        <input class='input' type="text" id='subject' name="subject" placeholder='subject' value="{{old('subject')}}">
                                    </div>
                                </div>

                                <div class='field-wrapper'>
                                    <label for="message">message</label>
                                    <div class='field-input'>
                                        <textarea class='input' id='message' name="message">{{old('subject')}}</textarea>
                                    </div>
                                </div>

                            </fieldset>

                            <fieldset>
                                
                                <legend>Send Message</legend>

                                <div class='field-wrapper'>
                                    <div class='field-input'>
                                        <input type='hidden' name='_token' value="{{ Session::token() }}" /> 
                                        <input class='submit' type="submit" value='send message'>
                                    </div>
                                </div>

                            </fieldset>
                            
                        </form>

                    </div>
        
                </div>

            </div>  
        </div>
    </div>


@endsection

@section('footerJS')

<script>

    (function(){

        var textarea = document.getElementsByTagName('textarea');
        var length = textarea.length;


        for (var i = 0; i < length; i++) {
                
            textarea[i].addEventListener('focus', function(){
                this.style.height = '50px';
                this.style.transition = 'all 500ms';
                setTimeout(() => {
                    this.style.height = '150px';
                }, 1);
            });
            textarea[i].addEventListener('blur', function(){
                this.style.height = '50px';
                setTimeout(() => {
                    this.style.transition = 'all 500ms';
                }, 1);
            });
        }

    })();

</script>

@endsection



