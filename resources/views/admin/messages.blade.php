@extends('admin.layouts.master')

@section('title', 'NorthPoint Protection Messages')

@section('pagetitle', 'Messages')

@section('maincontent')

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        @if($new)
            <li class="nav-item">
                <a class="nav-link {{ (Session::get('success_message') || Session::get('error_message') ? '' : 'active') }}" id="pills-new-tab" data-toggle="pill" href="#pills-new" role="tab" aria-controls="pills-new" aria-selected="true">New</a>
            </li>
        @endif
        @if($opened)
            <li class="nav-item">
                <a class="nav-link" id="pills-opened-tab" data-toggle="pill" href="#pills-opened" role="tab" aria-controls="pills-opened" aria-selected="false">Opened</a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link {{ (Session::get('success_message') || Session::get('error_message') ? 'active' : '') }}" id="pills-send-tab" data-toggle="pill" href="#pills-send" role="tab" aria-controls="pills-send" aria-selected="false">Send Message</a>
        </li>
    </ul>
    
    <div class="tab-content" id="pills-tabContent">
        
        @if($new)

            <div class="tab-pane fade {{ (Session::get('success_message') || Session::get('error_message') ? '' : 'show active') }}" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
                <div class='bg-white border text-body mb-5'>

                    <div class='p-3 border-bottom mb-3'>
                        <h5 class='mb-0'>New Messages</h5>
                    </div>

                    <div class='p-3'>
                        <div class='table-responsive'>
                    
                            <table class="table table-striped table-hover">
                                <thead class='thead-light'>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Date</th>
                                        <th scope="col" class='d-none d-md-block'>user</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($new as $message)

                                        <tr class='cursor-pointer' onclick="location.href='{{ route('admin.message', ['id' => $message->id]) }}'">
                                            <td scope="row">{{ $message->id }}</td>
                                            <td>{{ $message->subject }} <br /> {{ $message->services }}</td>
                                            <td>{{ date('j-m-y H:m', strtotime($message->created_at)) }}</td>
                                            <td class='d-none d-md-block'>{{ $message->full_name }}</td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class='p-3'>
                        {{ $new->links() }}
                    </div>

                </div>
            </div>
        @endif

        @if($opened)
            <div class="tab-pane fade" id="pills-opened" role="tabpanel" aria-labelledby="pills-opened-tab">
                <div class='bg-white border text-body mb-5'>

                    <div class='p-3 border-bottom mb-3'>
                        <h5 class='mb-0'>Old Messages</h5>
                    </div>

                    <div class='p-3'>
                        <div class='table-responsive'>
                    
                            <table class="table table-striped table-hover">
                                <thead class='thead-light'>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Date</th>
                                        <th scope="col" class='d-none d-md-block'>user</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($opened as $message)

                                        <tr class='cursor-pointer' onclick="location.href='{{ route('admin.message', ['id' => $message->id]) }}'">
                                            <td scope="row">{{ $message->id }}</td>
                                            <td>{{ $message->subject }} <br /> {{ $message->services }}</td>
                                            <td>{{ date('j-m-y H:m', strtotime($message->created_at)) }}</td>
                                            <td class='d-none d-md-block'>{{ $message->full_name }}</td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        @endif 

        <div class="tab-pane fade {{ (Session::get('success_message') || Session::get('error_message') ? 'show active' : '') }}" id="pills-send" role="tabpanel" aria-labelledby="pills-send-tab">
            <div class='bg-white border text-body mb-5'>

                <div class='p-3 border-bottom mb-3'>
                    <h5 class='mb-0'>Send A New Message</h5>
                </div>

                <div class='p-3'>
                    
                    <form class='p-3' action="{{ route('admin.messages_send') }}" method="POST" enctype='multipart/form-data'> 
                        
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

                        <div class="form-group {{ $errors->has('receiver') ? 'has-error' : ''}}">
                           <label for="receiver">Receiver</label>
                           <input type="text" class="form-control {!! $errors->first('receiver', 'is-invalid') !!}" id='reciever' name='reciever' placeholder='John Doe'>
                           {!! $errors->first('receiver', '<small class="form-text invalid-feedback">receiver</small>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                           <label for="email">Email</label>
                           <input type="text" class="form-control {!! $errors->first('email', 'is-invalid') !!}" id='email' name='email' placeholder='johndoe@domain.com'>
                           {!! $errors->first('email', '<small class="form-text invalid-feedback">email</small>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                           <label for="subject">Subject</label>
                           <input type="text" class="form-control {!! $errors->first('subject', 'is-invalid') !!}" id='subject' name='subject' placeholder='subject of message'>
                           {!! $errors->first('subject', '<small class="form-text invalid-feedback">subject</small>') !!}
                        </div>

                        <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                           <label for="message">Message</label>
                           <textarea class="form-control {!! $errors->first('message', 'is-invalid') !!}" rows='5' id='message' name='message' placeholder="body of message"></textarea>
                           {!! $errors->first('message', '<small class="form-text invalid-feedback">message</small>') !!}
                        </div>

                        <div class='text-right mt-3'>
                            <input type='hidden' name='_token' value="{{ Session::token() }}" />
                            <input type="submit" class="btn btn-success" value='Send Message' />
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
