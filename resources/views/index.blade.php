@extends('layouts.master')

@section('title', 'Welcome to NorthPoint Protection | Insurance Specialists')
@section('description', "Welcome to NorthPoint Protection, Southport's Insurance Specialists")
@section('keywords', 'NorthPoint Protection, Insurance Specialist, Insurance Southport')
@section('canonical', 'http://northpoint-protection.lime-house-studio.co.uk/')
@section('image', asset('images/income-protection.jpg'))


@section('content')

    <div class='page-header-wrapper bg-income-protection'>
        <div class='page-header-inner'>
            <div class='page-header-content'>
                <h1>Welcome to NorthPoint Protection</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
                <p class='hide-mobile hide-tablet show-desktop'>
                    <a href="{{ route('services') }}" class='ghost-button'>Protection We Provide</a>
                    <a href="{{ route('contact') }}" class='ghost-button'>Contact Us</a>
                </p>
            </div>
        </div>
    </div> 

    @include('includes.infobar')

    <div class='section-wrapper bg-lightgrey'>
        <div class='section-inner'>
            <div class='section-content'>   
                <h2 class='section-title'>Bacon ipsum dolor amet cow</h2>
                <p class='larger-font'>Bacon ipsum dolor amet cow cupim pig burgdoggen tongue, drumstick chuck boudin ham meatball bresaola andouille filet mignon pork loin picanha. Kevin capicola sirloin alcatra, cupim bresaola tongue pork chop fatback burgdoggen hamburger tenderloin beef pork belly biltong. Meatloaf sausage tenderloin, t-bone picanha jerky turkey ham hock bresaola capicola rump biltong. Short loin cupim tongue ham shank, turkey meatloaf. Sausage filet mignon pork loin short ribs salami turkey.</p>
                <p class='larger-font'>Bresaola cow buffalo pork chop hamburger, swine ribeye biltong. Leberkas burgdoggen shankle pancetta, pork loin picanha fatback kielbasa pork belly chicken jowl capicola brisket. Burgdoggen flank tongue capicola turkey strip steak. Bacon chicken ham hock swine. Ham porchetta ham hock meatloaf beef. Rump frankfurter ribeye, hamburger chicken pork chop strip steak bresaola corned beef brisket tenderloin andouille pancetta pig tongue. Turducken pork ribeye pork belly short loin shankle.</p> 
            </div>  
        </div>
    </div>

    <div class='section-wrapper'>
        <div class='section-inner'>
            <div class='section-content'>   
                
                <div class='grid grid-align-center'>

                    @if($services)
                        @foreach ($services as $service)
                            
                            <div class='service-wrapper'>
                                <a href="services/{{ $service->slug }}" class='service-block'>
                                    <div class='service-header'>
                                        <div class='service-icon'>
                                            <span class='fa fa-{{ $service->icon }}' aria-hidden='true'></span>
                                        </div>
                                        <div class='service-title'>
                                            {{ $service->title }}
                                        </div>
                                    </div>
                                    <div class='service-content'>
                                        <p>{{ $service->excerpt }}</p>
                                    </div>
                                </a>
                            </div>

                        @endforeach
                    @endif

                </div>

            </div>  
        </div>
    </div>


@endsection

@section('footerJS')


@endsection



