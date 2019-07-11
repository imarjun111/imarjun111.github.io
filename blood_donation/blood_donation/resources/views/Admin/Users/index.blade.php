@extends('Layout.default')
@section('title','| Users')
@section('content')
	        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Users</h1>
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
                <div class="row">
                <div class="col-md-12">
                     <!--    Hover Rows  -->
                     
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <div class="row">
                           <div class="col-md-6"> Users List</div>
                           <div class="col-md-6">
                             <a href="{{ url('admin/users/add') }}" class="btn btn-info pull-right">Add User</a>
                           </div>
                         </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created</th>
                                            <th>Modified</th>
                                            <th><span class="pull-right">Action</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count=1;?>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>
                                                @if(!empty($user->image))
                                                <img src="{{ asset('public/img/user_image/'.$user->image) }}" width="50" height="50"/>
                                                @else
                                                    <img src="{{ asset('public/img/user_image/avatar5.png') }}" width="50" height="50"/>
                                                @endif
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                             <td>{{ $user->created_at }}</td>
                                              <td>{{ $user->updated_at }}</td>
                                            <td><span class="pull-right"><a href="{{ url('admin/users/edit/'.base64_encode(convert_uuencode($user->id))) }}" class="btn btn-success">Edit</a>
                                            <a href ="{{ url('admin/users/delete/'.base64_encode(convert_uuencode($user->id))) }}" class="btn btn-danger">Delete</a></span></td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>
              
            </div>

        </div>
  
@endsection
