 @extends('Layout.default')
@section('title','| Add User')
@section('content')   
    <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Edit User </h1>
                    </div>
                </div>
                 <!-- flash maessage-->
                <div class="flash-message">
                       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                         @if(Session::has('alert-' . $msg))

                           <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                           </p>
                         @endif
                      @endforeach
                  </div> 

                  <!--flash message end-->
               {!! Form::open(['url'=>'admin/users/editUser','enctype'=>'multipart/form-data']) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                           <div class="col-md-6"> User Detail</div>
                           <div class="col-md-6">
                            <span class="pull-right"> 
                              {!! Form::submit('Save',['class'=>'btn btn-success']) !!}
                            <a href="{{ url('admin/users') }}" class="btn btn-danger">Cancel</a>
                           </div>
                         </div>
                        </div>
                        <div class="panel-body">
                                            
                        
                         <div class="form-group">
                          {!! Form::label('name') !!}
                          
                          {!! Form::text('name',$data->name,['class'=>'form-control','placeholder'=>'Enter Name']) !!}
                           {!! Form::hidden('id',$data->id,['class'=>'form-control']) !!}
                          <?php echo($errors->first('name',"<li class='error' style='color:red;list-style-type:none;'>:message</li>") ); ?>
                        </div>
                          
                       <div class="form-group">
                          {!! Form::label('email') !!}
                          
                          {!! Form::text('email',$data->email,['class'=>'form-control','placeholder'=>'Enter Email']) !!}
                            <?php echo($errors->first('email',"<li class='error' style='color:red;list-style-type:none;'>:message</li>")); ?>
                        </div>

                        <div class="form-group">
                          {!! Form::label('mobile') !!}
                          
                          {!! Form::text('mobile',$data->mobile,['class'=>'form-control','placeholder'=>'Enter phone number']) !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('password') !!}
                          <input type="password" name="password" class="form-control" id="password" value="<?= $data->password?>" placeholder="enter password" required="required" autofocus="true">
                         
                        </div>
                        <div class="form-group">
                          {!! Form::label('File') !!}
                          
                          {!! Form::file('image',['class'=>'form-control','placeholder'=>'select image']) !!}
                        </div>
                        <div class="form-group">
                           @if(!empty($data->image))
                                                <img src="{{ asset('public/img/user_image/'.$data->image) }}" width="50" height="50"/>
                                                @else
                                                    <img src="{{ asset('public/img/user_image/avatar5.png') }}" width="50" height="50"/>
                                                @endif
                        </div>
                       
                        
                        
                            </div>
                            </div>
                    </div>
                    
                </div>
              {!! Form::close() !!}
        </div>
        @endsection