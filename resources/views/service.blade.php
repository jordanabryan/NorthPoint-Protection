@extends('layouts.master')

@section('title', $service->title . ' | NorthPoint Protection Services')
@section('description', $service->excerpt)
@section('keywords', $service->title . ', NorthPoint Protection, ' . $service->title . ' Southport, Insurance Broker')
@section('canonical', 'http://northpoint-protection.lime-house-studio.co.uk/services/' . $service->slug)
@section('image', asset($service->bg_image))


@section('content')

    <div class='page-header-wrapper small service-header bg-income-protection'>
        <div class='page-header-inner small'>
            <div class='page-header-content'>
                <h1>{{ $service->title }}</h1>
                <p>{{ $service->excerpt }}</p>
            </div>
        </div>
    </div>

    @if($service->whats_covered)

        <div class='section-wrapper bg-lightgrey'>
            <div class='section-inner'>
                <div class='section-content'>                   

                    <h2 class='section-title'>Whats Covered</h2>

                    <div class='grid grid-align-center'>

                        @foreach ($service->whats_covered as $covered)

                            @if($covered->title !== null && $covered->body !== null)

                                <div class='provided-wrapper'>
                                    <div class='provided-block'>
                                        <div class='provided-icon'>
                                            <span class='fa fa-check' aria-hidden='true'></span>
                                        </div>
                                        <div class='provided-content'>
                                            <p class='provided-title'>{{ $covered->title }}</p>
                                            <p>{{ $covered->body }}</p>
                                        </div>
                                    </div>
                                </div>

                            @endif

                        @endforeach

                    </div>

                </div>  
            </div>
        </div>

    @endif


    <div class='section-wrapper'>
        <div class='section-inner'>
            <div class='section-content'>   
                <h2 class='section-title'>How it works</h2>

                <div class='provided-content'>

                    <div class='grid'>
                        <div class='grid-col-8'>
                            <p class='larger-font'>{{ $service->body }}</p>
                        </div>
                        <div class='grid-col-4 side-image' style="background-image: url({{asset($service->bg_image)}});"></div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    @if($service->common_questions)

        <div class='section-wrapper bg-lightgrey'>
            <div class='section-inner'>
                <div class='section-content'>                   

                    <h2 class='section-title'>Common Questions</h2>

                    <div class='grid grid-align-center'>
                        
                        @foreach ($service->common_questions as $covered)

                            @if($covered->title !== null && $covered->body !== null)

                                <div class='provided-wrapper'>
                                    <div class='provided-block'>
                                        <div class='provided-icon'>
                                            <span class='fa fa-question' aria-hidden='true'></span>
                                        </div>
                                        <div class='provided-content'>
                                            <p class='provided-title'>{{ $covered->title }}</p>
                                            <p>{{ $covered->body }}</p>
                                        </div>
                                    </div>
                                </div>

                            @endif

                        @endforeach 

                        </div>
                </div>  
            </div>
        </div>

    @endif


    <div id='more-info' class='section-wrapper'>
        <div class='section-inner'>
            <div class='section-content'>   

                <h2 class='section-title'>Request More Information</h2>

                <div class='grid'>

                    <div class='grid-col-4 hide-mobile show-tablet-grid show-desktop-grid provided-image' style="background-image: url({{asset($service->bg_image)}});"></div>
                    
                        <form action="{{ route('serviceSubmit') }}" method='POST' class='grid-col-8'>

                            <div class='form-inner bg-lightgrey'>

                                @if(Session::has('success_message'))
                                    <div class='message success-message'>{{ Session::get('success_message') }}</div>
                                @endif

                                @if(Session::has('error_message'))
                                    <div class='message error-message'>{{ Session::get('error_message') }}</div>
                                @endif

                                <!-- <fieldset> -->
                                    
                                    <!-- <legend>Contact Info</legend> -->

                                    <div class='field-wrapper'>
                                        <label>Full Name</label>
                                        <div class='field-input'>
                                            <input class='input' type="text" name="full_name" placeholder='Name'>
                                        </div>
                                    </div>

                                    <div class='field-wrapper'>
                                        <label>Email</label>
                                        <div class='field-input'>
                                            <input class='input' type="text" name="email" placeholder='Name'>
                                        </div>
                                    </div>

                                    <div class='field-wrapper'>
                                        <label>Phone</label>
                                        <div class='field-input'>
                                            <input class='input' type="text" name="phone" placeholder='Name'>
                                        </div>
                                    </div>

                                    <div class='field-wrapper'>
                                        <div class='field-input'>
                                            <input type='hidden' name='_token' value="{{ Session::token() }}" /> 
                                            <input type='hidden' name='service' value="{{ $service->id }}" /> 
                                            <input type='hidden' name='message' value="Submitted from the {{ $service->title }} page" /> 
                                            <input class='submit' type="submit" value='Request Info'>
                                        </div>
                                    </div>

                                <!-- </fieldset> -->

                            </div>

                        </form>

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



