@extends('admin.layouts.master')

@section('title', 'NorthPoint Protection Messages')

@section('pagetitle', 'Messages')

@section('maincontent')

    @if($message)

        <div class='bg-white border text-body mb-5'>

            <div class='p-3 border-bottom mb-3'>
                <h5 class='mb-0'>Message</h5>
            </div>

            <div class='p-3' id="{{ $message->id }}">
                <p class='h4 mb-3'>{{ $message->subject }}</p>
                <p class='h5 mb-3'>{{ $message->services }}</p>
                <p>{{ $message->message }}</p>
                <p>{{ $message->full_name }} | {{ date('jS F Y H:m', strtotime($message->created_at)) }}</p>
            </div>
        </div>

        <div class='bg-white border text-body mb-5'>

            <div class='p-3 border-bottom mb-3'>
                <h5 class='mb-0'>Reply</h5>
            </div>

            <form action="{{ route('admin.messages_send') }}" method='POST' class='p-3'>

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

                <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                   <label for="subject">Subject</label>
                   <input type="text" class="form-control {!! $errors->first('subject', 'is-invalid') !!}" id='subject' name='subject' placeholder='subject of message' value="{{ ($message->subject ? $message->subject : '') }} - {{ ($message->services ? $message->services : '') }}">
                   {!! $errors->first('subject', '<small class="form-text invalid-feedback">subject</small>') !!}
                </div>

                <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                   <label for="message">Message</label>
                   <textarea class="form-control {!! $errors->first('message', 'is-invalid') !!}" rows='5' id='message' name='message' placeholder="body of message"></textarea>
                   {!! $errors->first('message', '<small class="form-text invalid-feedback">message</small>') !!}
                </div>

                <div class='text-right mt-3'>
                    <input type='hidden' name='parent_id' value="{{ $message->id }}" />
                    <input type="hidden" id='reciever' name='reciever' value="{{ $message->full_name }}">
                    <input type="hidden" id='email' name='email' value="{{ $message->email }}">
                    <input type='hidden' name='_token' value="{{ Session::token() }}" />
                    <input type="submit" class="btn btn-success" value='Send Message' />
                </div>
            </form>

        </div>

    @endif

@endsection
