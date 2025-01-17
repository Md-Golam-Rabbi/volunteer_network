@extends('layouts.app')
@section('content')
    <div class="container-fluid pt-5"
        style="background: linear-gradient(335deg, rgba(255,140,107,1) 0%, rgba(255,228,168,1) 100%);">
        <div class="container">
            <h1 class="text-center mb-3">Your Profile</h1>
            <table class="table table-striped table-dark">
                <tbody>
                    <tr>
                        <th scope="row">Your Name : </th>
                        <td>{{ Auth::User()->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Your Email : </th>
                        <td>{{ Auth::User()->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Your Gender : </th>
                        <td>{{ Auth::User()->gender }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Your phone Number : </th>
                        <td>{{ Auth::User()->phone }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Your word Number : </th>
                        <td>{{ Auth::User()->word }}</td>
                    </tr>
                    <tr>
                        <th scope="row">You logged in as : </th>
                        <td>{{ Auth::User()->type }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="w-50 mx-auto">
                @if (Auth::user()->type == 'user')
                <div class="container">
                    <div class="mx-auto">
                        <h1>Services You Are getting</h1>
                        <div class="row">
                            <div class="col-md-8 offset-2 d-flex justify-content-between">
                                <a href="{{ route('profile', 'processing') }}"
                                    class="btn btn-outline-dark">Processing</a>
                                <a href="{{ route('profile', 'completed') }}"
                                    class="btn btn-outline-dark">Completed</a>
                            </div>
                        </div>
                        @foreach ($posts as $post)
                        @if($post!=null)
                            <div class="card my-3">
                                <div class="card-header">
                                    <h5 class="card-title">Service Type :
                                        {{App\Models\ServiceType::find($post['service_type'])['name'] }}</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Word Number : {{ $post['word'] }}</p>
                                    <p class="card-text">Email : {{ $post['email'] }}</p>
                                    <p class="card-text">Description : {{ $post['description'] }}</p>
                                    <p class="card-text">Posted : {{ $post['created_at']->diffForHumans() }}</p>
                                    <div class="d-flex justify-content-between">

                                        <a class="btn btn-success" href="{{route('edit',$post['id'])}}">Edit</a> 
                                        <form method="post" action="{{route('destroy',$post['id'])}}" onsubmit="return confirm('Sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Delete" class="btn btn-danger"/>
                                         </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div>
                </div>
                @endif
            </div>
        </div>
    @endsection
