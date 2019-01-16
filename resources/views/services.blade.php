@extends('layouts.master')

@section('title', 'NorthPoint Protection Services')
@section('description', 'Services NorthPoint Protection Provides')
@section('keywords', 'NorthPoint Protection Services, Insurance Southport, Insurance Broker')
@section('canonical', 'http://northpoint-protection.lime-house-studio.co.uk/services/')
@section('image', asset('images/income-protection.jpg'))


@section('content')

    <div class='page-header-wrapper small bg-income-protection'>
        <div class='page-header-inner small'>
            <div class='page-header-content'>
                <h1>Protection we provide</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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



