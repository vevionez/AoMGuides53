@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
    @parent
    Champion Overview
@stop
@section('description')
    @parent
    Champion Overview of Bot of Legends scripts for League of Legends
@stop

@section('content')
    <div class="row">
            {!! Form::model($guide, ['method' => 'PATCH', 'route' => ['guides.update', $guide->slug ], 'files'=>true]) !!}

            <h2>New Guide</h2>
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!} <br/>
            {!! Form::label('gods_id', 'God', ['class' => 'control-label']) !!}
            {!! Form::select('gods_id', $gods, null, ['class' => 'form-control'] ) !!} <br/> <br/>
            {!! Form::label('description', 'description', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            {!! Form::label('author', 'Author', ['class' => 'control-label']) !!}
            {!! Form::text('author', null, ['class' => 'form-control']) !!}
            {!! Form::label('Image', 'Image', ['class' => 'control-label']) !!}
            {!! Form::file('image', ['class' => 'form-control']) !!}
            <br/><br/>
            {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

            {!! Form::close() !!}
            <br/><br/>
        </div>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            content_css: "css/content.css",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });
    </script>
@stop