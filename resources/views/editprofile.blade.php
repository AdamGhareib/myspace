@extends('layouts.header')

@section('content')

<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-3">
            <div class="text-center">
            	<br>
                <img src="{{ asset('/uploads/avatars/'. $user->avatar) }}" style="width: 150px; height: 150px; border-radius: 50%; display: block; margin-left: auto; margin-right: auto;" class="card-img-top" alt="Card image cap">
                <form enctype="multipart/form-data" action="{{ route('profile.update_avatar', $user->id) }}" method="POST">
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Update profile image" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
            <br>
            {!! Form::open(['route' => ['profile.update', Auth::user()->id], 'method' => 'PUT']) !!}
            <div class="card">
                <h5 class="card-header">Biography</h5>
                <div class="card-body">
                    {!! Form::text('biography', $user->biography, ['class' => 'form-control', 'placeholder' => 'biography status','autocomplete' => 'off']); !!}
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-info">save</button>
        </div>
    	<div class="col-sm-9">
    		<br>

            	<label for="first_name"><h4>Firstname:</h4></label>
	    		{!! Form::text('first_name', $user->first_name, ['class' => 'form-control', 'placeholder' => 'first_name','autocomplete' => 'off']); !!}
	    		<br>
	    		<label for="last_name"><h4>Lastname:</h4></label>
	    		{!! Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' => 'last_name','autocomplete' => 'off']); !!}
	    		<br>
	    		<label for="phone"><h4>Username:</h4></label>
	    		{!! Form::text('username', $user->username, ['class' => 'form-control', 'placeholder' => 'username','autocomplete' => 'off']); !!}
	    		<br>
	    		<label for="mobile"><h4>E-mail:</h4></label>
	    		{!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'email','autocomplete' => 'off']); !!}
	    		<br>
	    		<label for="email"><h4>Address:</h4></label>
	    		{!! Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' => 'address','autocomplete' => 'off']); !!}
	    		<br>
	    		<label for="email"><h4>Zipcode:</h4></label>
	    		{!! Form::text('zipcode', $user->zipcode, ['class' => 'form-control', 'placeholder' => 'zipcode','autocomplete' => 'off']); !!}
	    		<br>
	    		<label for="password"><h4>Relationship Status:</h4></label>
	    		{!! Form::text('relation_status', $user->relation_status, ['class' => 'form-control', 'placeholder' => 'relationship status','autocomplete' => 'off']); !!}
	    		<br>
            {!! Form::close() !!}
            <p>
			    {!! Form::open(['route' => ['profile.destroy', $user->id], 'method' => 'DELETE']) !!}
				<button type="submit" class="btn btn-danger">delete profile</button>
				{!! Form::close() !!}
			</p>
        </div>
    </div>
</div>

@endsection
