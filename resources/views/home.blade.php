@extends('layouts.header')

@section('content')

<div class="container">
    <header class="jumbotron my-4">
      	<h1 class="display-3">Welcome To MySpace</h1>
      	<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
      	{{-- <a href="#" class="btn btn-primary btn-lg">Call to action!</a> --}}
    </header>

    <div class="row text-center">
        @foreach($users as $user)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset('/uploads/avatars/'. $user->avatar) }}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{ $user->username }}</h4>
                        <p class="card-text">{{ $user->biography }}</p>
                    </div>
                    <div class="card-footer">
                        {{-- <a href="{{ route('profile', $user->username) }}" class="btn btn-primary">Go To Profile!</a> --}}

                        <a href="profile/{{$user->username}}" class="btn btn-primary">Go To Profile!</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- <a href="{{ route('like', ['id']) }}"></a> --}}

@stop
