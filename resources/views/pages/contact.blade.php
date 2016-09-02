@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Contact Us!
@stop
@section('description')
    @parent
    Fill out the form to contact the management of AomGuides
@stop

@section('content')
        <div class="row">
            <div class="col-lg-3">
                {!! Html::image('img/bannersmall.png', '', array('class' => 'img-responsive img-rounded')) !!}
            </div>

            <!-- /.col-md-8 -->
            <div class="col-md-6">
                <h1>Contact!</h1>
                <p>Don't hesitate to contact us with any question you might encounter. Our support service will help you with everything you may desire.
            </div>

            <div class="col-lg-3">
                {!! Html::image('img/happygirl.png', '', array('class' => 'img-responsive img-rounded')) !!}
            </div>

            <!-- /.col-md-4 -->
        </div>

        <hr>
        <div class="row">
        <div class="col-md-6">
        {!! Form:: open(array('action' => 'MailController@getContactUsForm')) !!}

        <ul class="errors">
            @if(Session::has('error'))
                {!! Session::get('error') !!}
            @endif
        </ul>
        <div class="form-group">
            {!! Form:: text ('name', '', array('placeholder' => 'Name', 'class' => 'form-control', 'id' => 'name', 'rows' => '1' )) !!}
        </div>

        <div class="form-group">
            {!! Form:: email ('email', '', array('placeholder' => 'Email', 'class' => 'form-control', 'id' => 'email', 'rows' => '1' )) !!}
        </div>

        <div class="form-group">
            {!! Form:: text ('subject', '', array('placeholder' => 'Subject', 'class' => 'form-control', 'id' => 'subject', 'rows' => '1' )) !!}
        </div>

        <div class="form-group">
            {!! Form:: textarea ('textmessage', '', array('placeholder' => 'Message', 'class' => 'form-control', 'id' => 'textmessage', 'rows' => '4' )) !!}
        </div>

        <div class="modal-footer">
            {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
            {!! Form:: close() !!}
        </div>
    </div>
    </div>
@stop