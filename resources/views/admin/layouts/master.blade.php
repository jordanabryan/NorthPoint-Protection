@include('admin.includes.header')

    <div class='content-wrap pt-5'>
    	   
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4 class='mb-4 pl-3'>@yield('pagetitle')</h4>
                    @yield('maincontent')
                </div>
            </div>      
        </div>
    </div>

@include('admin.includes.footer')
