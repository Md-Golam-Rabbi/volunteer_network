@extends('layouts.app')

@section('content')
<div class="container">
    <div class="w-50 mx-auto">
@foreach($posts as $post)
    <div class="card my-3">
        <div class="card-header">
        Title : {{$post['title']}}
        </div>
        <div class="card-body">
            <h5 class="card-title">Service Type : {{$post['service_type']}}</h5>
            <p class="card-text">Word Number : {{$post['word']}}</p>
            <a class="btn btn-success" href="{{route('postdetail',$post['id'])}}">See Details</a>
        </div>
    </div>
@endforeach
</div>

</div>
@endsection
