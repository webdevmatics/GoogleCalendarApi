@extends('layouts.base')

@section('content')
    <form action="{{route('cal.store')}}" method="POST" role="form">
        {{csrf_field()}}
        <legend>
            Create Event
        </legend>
        <div class="form-group">
            <label for="title">
                Title
            </label>
            <input class="form-control" name="title" placeholder="Title" type="text">
        </div>
        <div class="form-group">
            <label for="description">
                Description
            </label>
            <input class="form-control" name="description" placeholder="Description" type="text">
        </div>
        <div class="form-group">
            <label for="start_date">
                Start Date
            </label>
            <input class="form-control" name="start_date" placeholder="Start Date" type="text">
        </div>
        <div class="form-group">
            <label for="end_date">
                End Date
            </label>
            <input class="form-control" name="end_date" placeholder="End Date" type="text">
        </div>
        <button class="btn btn-primary" type="submit">
            Submit
        </button>
    </form>
@endsection
