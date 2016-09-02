@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Guide Creation
@stop
@section('description')
    @parent
    Create or submit a guide to Aom Guides
@stop

@section('content')
    <div class="row">
            {!! Form::open(array('action' => 'RecsController@store', 'files'=>true) ) !!}

            <h2>New Recorded Game</h2>
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!} <br/>
            {!! Form::label('gods_id', 'God', ['class' => 'control-label']) !!}
            {!! Form::select('gods_id', $gods, null, ['class' => 'form-control'] ) !!} <br/> <br/>
            {!! Form::label('description', 'description', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            {!! Form::label('author', 'Author', ['class' => 'control-label']) !!}
            {!! Form::text('author', null, ['class' => 'form-control']) !!}
            {!! Form::label('patch', 'Patch', ['class' => 'control-label']) !!}
            {!! Form::select('patch', array('Voobly Balance Patch 1.01' => 'Voobly Balance Patch 1.01', 'Steam' => 'Steam'), null, ['class' => 'form-control'])  !!}
            {!! Form::label('file_path', 'Recorded Game', ['class' => 'control-label']) !!}
            {!! Form::file('file_path', ['class' => 'form-control']) !!}
            <br/><br/>
            {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

            {!! Form::close() !!}
            <br/><br/>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea"
        });
    </script>
@stop

