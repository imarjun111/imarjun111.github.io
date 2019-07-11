@desktop 
	<h1>Desktop view</h1>
@elsedesktop
	<h1>Mobile view</h1>
@enddesktop

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
@include('Admin.Elements._head')
   
</head>
<body>
   <!-- menu section-->
@include('Admin.Elements._login_header')
  
   <!-- end menu section-->
<div class="content-wrapper">
    @yield('content')
</div>
     <!--footer-->
 @include('Admin.Elements._footer')
     <!--end footer-->
</body>
</html>
