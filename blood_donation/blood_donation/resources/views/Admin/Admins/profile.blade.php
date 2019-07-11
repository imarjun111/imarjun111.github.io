@extends('Layout.default')
@section('title','| Profile')

@section('content')
	
	<div class="container">
		<div class="flash-message">
                       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                         @if(Session::has('alert-' . $msg))

                           <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                           </p>
                         @endif
                      @endforeach
                  </div> 
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">My Account</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('public/img/admin_image/'. Auth::user()->image) }}" width="200px" heigh="200px" class="thumbnail">
                    <a href="{{ route('admin.edit_profile')}}" class=" btn btn-danger" style="width:200px;text-align: center;">Edit Profile</a>
                </div>
                 <div class="col-md-9 alert alert-danger">
                    <h4 class="page-head-line">{{ Auth::user()->name }}</h4>

                    <table class="table">
                    	<tr>
                    		<td><b>Email:- &nbsp;</b></td>
                    		<td>{{ Auth::user()->email }}</td>
                    	</tr>
                    	<tr>
                    		<td><b>Mobile:- &nbsp;</b></td>
                    		<td>{{ Auth::user()->mobile }}</td>
                    	</tr>
                    	<tr>
                    		<td><b>Created:- &nbsp;</b></td>
                    		<td>{{ Auth::user()->created_at }}</td>
                    	</tr>
                    	<tr>
                    		<td><b>Last Update:- &nbsp;</b></td>
                    		<td>{{ Auth::user()->updated_at }}</td>
                    	</tr>
                    </table>
                </div>

            </div>
        </div>

@endsection()