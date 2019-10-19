@extends('layouts.header')

@section('content')

@guest
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-3">
                <div class="text-center">
                    <br>
                    <img src="{{ asset('/uploads/avatars/'. $user->avatar) }}" style="width: 150px; height: 150px; border-radius: 50%; display: block; margin-left: auto; margin-right: auto;" class="card-img-top" alt="Card image cap">
                </div>
                <br>
                <div class="card">
                    <h5 class="card-header">Biography</h5>
                    <div class="card-body">
                        <p class="card-text">{{ $user->biography }}</p>
                    </div>
                </div>
                <div class="col-sm-9">
                    <br>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="first_name"><h4>Username:</h4></label>
                            <h5>{{ $user->username }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endguest

@auth
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-3">
            <div class="text-center">
                <br>
                <img src="{{ asset('/uploads/avatars/'. $user->avatar) }}" style="width: 150px; height: 150px; border-radius: 50%; display: block; margin-left: auto; margin-right: auto;" class="card-img-top" alt="Card image cap">
            </div>
            <br>
            <div class="card">
                <h5 class="card-header">Biography</h5>
                <div class="card-body">
                    <p class="card-text">{{ $user->biography }}</p>
                </div>
            </div>
            <br>
            @if (Auth::user()->id == $user->id)
            <form action="{{ asset('editprofile') }}">
                <input type="submit" class="btn btn-info" value="Edit profile" />
            </form>
            @endif
        </div>
        <div class="col-sm-9">
            <br>
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="first_name"><h4>Firstname:</h4></label>
                    <h5>{{ $user->first_name }}</h5>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="last_name"><h4>Lastname:</h4></label>
                    <h5>{{ $user->last_name }}</h5>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="username"><h4>Username:</h4></label>
                    <h5>{{ $user->username }}</h5>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="e-mail"><h4>E-mail:</h4></label>
                    <h5>{{ $user->email }}</h5>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="address"><h4>Address:</h4></label>
                    <h5>{{ $user->address }}</h5>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="zipcode"><h4>Zipcode:</h4></label>
                    <h5>{{ $user->zipcode }}</h5>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <label for="relationstatus"><h4>Relationship Status:</h4></label>
                    <h5>{{ $user->relation_status }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth

@stop
