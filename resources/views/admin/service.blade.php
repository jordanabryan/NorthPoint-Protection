@extends('admin.layouts.master')

@section('title', 'NorthPoint Protection Service | ' . $service->title)

@section('pagetitle', 'Services')

@section('maincontent')

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        @if($service)
            <li class="nav-item">
                <a class="nav-link {{ (Session::get('display') ? 'active' : '') }}" id="pills-overview-tab" data-toggle="pill" href="#pills-overview" role="tab" aria-controls="pills-overview" aria-selected="true">Overview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (Session::get('display') ? '' : 'active') }}" id="pills-edit-tab" data-toggle="pill" href="#pills-edit" role="tab" aria-controls="pills-edit" aria-selected="false">Edit</a>
            </li>
        @endif
    </ul>

    <div class="tab-content" id="pills-tabContent">
        @if($service)
            <div class="tab-pane fade {{ (Session::get('display') ? 'show active' : '') }}" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">

                <div class='bg-white border text-body mb-5'>

                    <div class='p-3 border-bottom mb-3'>
                        <h5 class='mb-0'>Service Overview</h5>
                    </div>

                    <div class='p-3'>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9">
                                    <h5>{{ $service->title }}</h5>
                                    <p>{{ $service->excerpt }}</p>
                                    <p>{{ $service->body }}</p>
                                </div>
                                @if($service->bg_image)
                                    <div class='col-md-3 h-100'>
                                        <img src="{{ asset($service->bg_image) }}" title='{{ $service->title }}' alt='{{ $service->title }}' />
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade {{ (Session::get('display') ? '' : 'show active') }}" id="pills-edit" role="tabpanel" aria-labelledby="pills-edit-tab">

                <div id='edit-wrapper' class="bg-white border text-body mb-5">

                    <div class='p-3 border-bottom mb-3'>
                        <h5 class='mb-0'>Edit Service</h5>
                    </div>

                    <form class='p-3' action="{{ route('admin.service_update') }}" method="POST" enctype='multipart/form-data'> 
                        
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
                           <input type="text" class="form-control {!! $errors->first('title', 'is-invalid') !!}" id='title' name='title' placeholder='service title' value="{{ $service->title }}">
                           {!! $errors->first('title', '<small class="form-text invalid-feedback">:message</small>') !!}
                        </div>

                        <div class="form-group">
                           <label for="icon">Icon</label>
                           <input type="text" class="form-control {!! $errors->first('icon', 'is-invalid') !!}" id='icon' name='icon' placeholder='icon' value="{{ $service->icon }}">
                           <small id="" class="form-text text-muted">A list of avaliable icons can be found here: <a href='https://fontawesome.com/v4.7.0/icons/'>icons</a></small>
                           {!! $errors->first('icon', '<small class="form-text invalid-feedback">:message</small>') !!}
                        </div>

                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <textarea class="form-control {!! $errors->first('excerpt', 'is-invalid') !!}" id='excerpt' name='excerpt' rows='3'>{{ $service->excerpt }}</textarea>
                            {!! $errors->first('excerpt', '<small class="form-text invalid-feedback">:message</small>') !!}
                        </div>

                        <div class="form-group">
                           <label for="body">Body</label>
                           <textarea class="form-control {!! $errors->first('body', 'is-invalid') !!}" id='body' name='body' rows='10'>{{ $service->body }}</textarea>
                           {!! $errors->first('body', '<small class="form-text invalid-feedback">:message</small>') !!}
                        </div>

                        <div class='input-wrap'>
                            <label for='bg_image'>background image</label>
                            <div class='row'>
                                <div class='col-3 input-holder'>
                                    <img src="{{ asset($service->bg_image) }}" title='{{ $service->title }}' alt='{{ $service->title }}' />
                                </div>
                                <div class='col-9 input-holder'>
                                    <input type="file" class="form-control-file" id='file' name='file'>
                                </div>
                            </div>
                        </div>


                        <fieldset class='bg-light border mt-4 p-3'>
                            <h5 class='mb-3'>Update What's Covered</h5>

                            @if(count($service->whats_covered) > 0)

                                @foreach($service->whats_covered as $whats_covered)

                                    <div class='clone-wrapper covered-wrapper border-top pt-3 pb-3 mb-3'>
                                        <div class="form-group">
                                           <label class='title_label' for="whats_covered_title_{{ $whats_covered->id }}">Whats Covered</label>
                                           <input data-type='whats_covered' type='text' class="form-control" id='whats_covered_title_{{ $whats_covered->id}}' name="whats_covered[{{ $whats_covered->id}}][title]" placeholder='whats covered' value="{{ $whats_covered->title }}" />
                                        </div>
                                        <div class="form-group">
                                           <label class='body_label' for="whats_covered_body_{{ $whats_covered->id}}">Info</label>
                                            <textarea data-type='whats_covered' class="form-control" id='whats_covered_body_{{ $whats_covered->id}}' name="whats_covered[{{ $whats_covered->id}}][body]" rows='2'>{{ $whats_covered->body }}</textarea>

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
                                        <textarea data-type='whats_covered' class="form-control" id='whats_covered_body_0' name="whats_covered[0][body]" rows='2'>{{ $whats_covered->body }}</textarea>

                                    </div>
                                </div>

                            @endif

                            <div class='text-right mt-1 mb-3'>
                                <button type="button" class="new-input btn btn-primary">Add New</button>
                            </div>

                        </fieldset>

                        <fieldset class='bg-light border mt-4 p-3'>
                            <h5 class='mb-3'>Update Common Questions</h5>  

                            @if(count($service->common_questions) > 0)

                                @foreach($service->common_questions as $common_questions)

                                    <div class='clone-wrapper question-wrapper border-top pt-3 pb-3 mb-3'>
                                        <div class="form-group">
                                           <label class='title_label' for="common_questions_title_{{ $common_questions->id }}">Question</label>
                                           <input data-type='common_questions' type='text' class="form-control" id='whats_covered_title_{{ $common_questions->id}}' name="common_questions[{{ $common_questions->id}}][title]" placeholder='common question' value="{{ $common_questions->title }}" />
                                        </div>
                                        <div class="form-group">
                                           <label class='body_label' for="whats_covered_body_{{ $common_questions->id}}">Info</label>
                                            <textarea data-type='common_questions' id='common_questions_body_{{ $common_questions->id}}' class="form-control" name="common_questions[{{ $common_questions->id}}][body]" rows='2'>{{ $common_questions->body }}</textarea>
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
                            <input type='hidden' name='id' value="{{ $service->id }}" />
                            <input type='hidden' name='_token' value="{{ Session::token() }}" />
                            <input type="submit" class="btn btn-success" value='update Service' />
                        </div>

                    </form>

                </div>
            </div>
        @endif
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
