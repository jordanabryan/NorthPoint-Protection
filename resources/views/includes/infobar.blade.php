<div class='info-bar-wrapper'>
    <div class='info-bar-inner grid'>
        
        @if($settings->phone)
            <a href='#' onClick='alert("Use tel:{{ $settings->phone }} on this link")' class='info-bar-line'>
                <div class='info-bar-icon'>
                    <span class="fa fa-envelope" aria-hidden="true"></span>
                </div>
                <div class='info-bar-contact'>
                    <p>{{ $settings->phone }}</p>
                </div>
            </a>
        @endif

        @if($settings->mobile)
            <a href='#' onClick='alert("Use tel:{{ $settings->mobile }} on this link")' class='info-bar-line'>
                <div class='info-bar-icon'>
                    <span class="fa fa-phone" aria-hidden="true"></span>
                </div>
                <div class='info-contact'>
                    <p>{{ $settings->mobile }}</p>
                </div>
            </a>
        @endif

        @if($settings->facebook)
            <a href='#' onClick='alert("link to {{ $settings->facebook }} on this link")' class='info-bar-line'>
                <div class='info-bar-icon'>
                    <span class="fa fa-facebook-official" aria-hidden="true"></span>
                </div>
                <div class='info-bar-contact'>
                    <p>{{ str_replace('https://www.facebook.com/', '@', $settings->facebook) }}</p>
                </div>
            </a>
        @endif
    </div>
</div>