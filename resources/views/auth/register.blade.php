@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="background: #8395a7  no-repeat fixed center; height:100vh">
        <div class="row justify-content-center py-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label 
                                    class="col-md-4 col-form-label text-md-end">{{ __('Select Your Gender') }}</label>
                                <div class="col-md-6">
                                    <select name="gender" required class="form-control">
                                        <option disabled selected>Choose...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                      </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="user"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Select Your type') }}</label>
                                <div class="col-md-6">
                                    <select name="type" required id="user" class="form-select" aria-label="Default select example">
                                        <option selected>Choose...</option>
                                        <option value="user">User</option>
                                        <option value="volunteer">Volunteer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="word"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Select Your Word Number') }}</label>
                                <div class="col-md-6">
                                    <select name="word" required class="form-control">
                                        <option disabled selected>Choose...</option>
                                        {{$words = App\Models\Word::all()}}
                                        @foreach($words as $word)
                                        <option value="{{$word['id']}}">{{$word['word_no']}}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Your Phone Number') }}</label>
                                <div class="col-md-6">
                                    <input id="phone" name="phone" type="number" class="form-control" value="" required autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
