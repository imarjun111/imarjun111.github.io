@extends('Layout.default')
@section('title','| Edit Profile')
@section('content')
	<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Edit Profile</h4>

                </div>

            </div>
            <div class="flash-message">
                       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                         @if(Session::has('alert-' . $msg))

                           <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                           </p>
                         @endif
                      @endforeach
                  </div> 


             {!! Form::open(['url'=>route('admin.updateProfile'),'enctype'=>'multipart/form-data']) !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                           <div class="col-md-6"> Your Account Detail</div>
                           <div class="col-md-6">
                            <span class="pull-right"> 
                              {!! Form::submit('Save',['class'=>'btn btn-success']) !!}
                            <a href="{{ route('admin.profile') }}" class="btn btn-danger">Cancel</a>
                           </div>
                         </div>
                        </div>
                        <div class="panel-body">
                                            
                        
                         <div class="form-group">
                          {!! Form::label('name') !!}
                          
                          {!! Form::text('name',$admin->name,['class'=>'form-control','placeholder'=>'Enter Name']) !!}
                            {!! Form::hidden('id',$admin->id,['class'=>'form-control','placeholder'=>'Enter Name']) !!}
                          <?php echo($errors->first('name',"<li class='error' style='color:red;list-style-type:none;'>:message</li>") ); ?>
                        </div>
                          
                       <div class="form-group">
                          {!! Form::label('email') !!}
                          
                          {!! Form::text('email',$admin->email,['class'=>'form-control','placeholder'=>'Enter Email']) !!}
                            <?php echo($errors->first('email',"<li class='error' style='color:red;list-style-type:none;'>:message</li>")); ?>
                        </div>

                        <div class="form-group">
                          {!! Form::label('mobile') !!}
                          
                          {!! Form::text('mobile',$admin->mobile,['class'=>'form-control','placeholder'=>'Enter phone number']) !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('Profile Image') !!}
                          
                          {!! Form::file('image',['class'=>'form-control','placeholder'=>'select image']) !!}
                        </div>

                        <div class="form-group">
                           @if(!empty($admin->image))
                                                <img src="{{ asset('public/img/admin_image/'.$admin->image) }}" width="50" height="50"/>
                                                @else
                                                    <img src="{{ asset('public/img/admin_image/avatar5.png') }}" width="50" height="50"/>
                                                @endif
                        </div>
                       
                        
                        
                            </div>
                            </div>
                </div>

            </div>
             {!! Form::close() !!}
        </div>
  
@endsection
