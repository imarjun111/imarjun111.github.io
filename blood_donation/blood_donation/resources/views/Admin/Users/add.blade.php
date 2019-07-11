 @extends('Layout.default')
@section('title','| Add User')
@section('content')   
    <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add User </h1>
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
               {!! Form::open(['url'=>'admin/users/addUser','enctype'=>'multipart/form-data']) !!}
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
                          
                          {!! Form::text('name','',['class'=>'form-control','placeholder'=>'Enter Name']) !!}
                          <?php echo($errors->first('name',"<li class='error' style='color:red;list-style-type:none;'>:message</li>") ); ?>
                        </div>
                          
                       <div class="form-group">
                          {!! Form::label('email') !!}
                          
                          {!! Form::text('email','',['class'=>'form-control','placeholder'=>'Enter Email']) !!}
                            <?php echo($errors->first('email',"<li class='error' style='color:red;list-style-type:none;'>:message</li>")); ?>
                        </div>

                        <div class="form-group">
                          {!! Form::label('mobile') !!}
                          
                          {!! Form::text('mobile','',['class'=>'form-control','placeholder'=>'Enter phone number']) !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('password') !!}
                          
                          {!! Form::password('password',['class'=>'form-control','placeholder'=>'Enter password']) !!}
                        </div>

                          <div class="form-group">
                          {!! Form::label('File') !!}
                          
                          {!! Form::file('image',['class'=>'form-control','placeholder'=>'select image']) !!}
                        </div>
                       
                        
                        
                            </div>
                            </div>
                    </div>
                    
                </div>
              {!! Form::close() !!}
        </div>
        @endsection