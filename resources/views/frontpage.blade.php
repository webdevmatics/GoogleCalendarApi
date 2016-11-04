@extends('layouts.base')


@section('content')
<!-- Main component for call to action -->
<div class="jumbotron">
    <h1>
        Notebook
    </h1>
    <p>
        Store and organise your thoughts in notebook and NoteBook web app makes this easier than ever
    </p>
    <p>
        <a class="btn btn-lg btn-primary" href="{{route('notebooks.index')}}" role="button">
            Your NoteBooks
        </a>
    </p>
</div>
<!-- /container -->
@endsection
