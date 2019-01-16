@extends('layouts.master')

@section('title', 'About NorthPoint Protection')
@section('description', 'A little info about NorthPoint Protection')
@section('keywords', 'NorthPoint Protection, About NorthPoint Protection, Insurance Broker')
@section('canonical', 'http://northpoint-protection.lime-house-studio.co.uk/about')
@section('image', asset('images/background.jpg'))


@section('content')

    <div class='page-header-wrapper bg-income-protection'>
        <div class='page-header-inner'>
            <div class='page-header-content'>
                <h1>About NorthPoint Protection</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </div>

    <div class='section-wrapper'>
        <div class='section-inner'>
            <div class='section-content'>
                <div class='grid'>
                    <div class='grid-col-4 bg-image order-1 sm-order-2' style="background-image: url({{asset('images/background.jpg')}});"></div>
                    <div class='grid-col-8 order-2 sm-order-1'>
                        <h2 class='section-title'>Bacon ipsum dolor amet cow</h2>
                        <p class='larger-font'>Bacon ipsum dolor amet cow cupim pig burgdoggen tongue, drumstick chuck boudin ham meatball bresaola andouille filet mignon pork loin picanha. Kevin capicola sirloin alcatra, cupim bresaola tongue pork chop fatback burgdoggen hamburger tenderloin beef pork belly biltong. Meatloaf sausage tenderloin, t-bone picanha jerky turkey ham hock bresaola capicola rump biltong. Short loin cupim tongue ham shank, turkey meatloaf. Sausage filet mignon pork loin short ribs salami turkey.</p>
                    </div>
                </div>              
            </div>  
        </div>
    </div>


    <div class='half-page-wrapper'>
        <div class='half-page-content'>
            <div class='half-content-image order-1 sm-order-2'></div>
            <div class='half-content-text order-2 sm-order-1'>
                <div class='content-inner'>
                    <h2 class='section-title'>Bacon ipsum dolor amet cow</h2>
                    <p class='larger-font'>Bacon ipsum dolor amet cow cupim pig burgdoggen tongue, drumstick chuck boudin ham meatball bresaola andouille filet mignon pork loin picanha. Kevin capicola sirloin alcatra, cupim bresaola tongue pork chop fatback burgdoggen hamburger tenderloin beef pork belly biltong. Meatloaf sausage tenderloin, t-bone picanha jerky turkey ham hock bresaola capicola rump biltong. Short loin cupim tongue ham shank, turkey meatloaf. Sausage filet mignon pork loin short ribs salami turkey.</p>
                </div>      
            </div>      
        </div>
    </div>

    <div class='section-wrapper'>
        <div class='section-inner'>
            <div class='section-content'>
                <div class='grid'>
                    <div class='grid-col-8 order-1 sm-order-2'>
                        <h2 class='section-title'>Bacon ipsum dolor amet cow</h2>
                        <p class='larger-font'>Bacon ipsum dolor amet cow cupim pig burgdoggen tongue, drumstick chuck boudin ham meatball bresaola andouille filet mignon pork loin picanha. Kevin capicola sirloin alcatra, cupim bresaola tongue pork chop fatback burgdoggen hamburger tenderloin beef pork belly biltong. Meatloaf sausage tenderloin, t-bone picanha jerky turkey ham hock bresaola capicola rump biltong. Short loin cupim tongue ham shank, turkey meatloaf. Sausage filet mignon pork loin short ribs salami turkey.</p>
                    </div>
                    <div class='grid-col-4 bg-image order-2 sm-order-1' style="background-image: url({{asset('images/background.jpg')}});"></div>
                </div>              
            </div>  
        </div>
    </div>


@endsection

@section('footerJS')


@endsection



