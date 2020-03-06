<!DOCTYPE html>
<html dir="ltr" lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/icon-50x30.png">
    <title>@yield('title')</title>
    @yield('css')
  	@include('commons.css')
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
 	
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
  

        <!-- header  -->
       @include('commons.header')
        <!-- // header -->
       
      	<!-- left-sidebar -->
		 @include('commons.sidebar')
      	<!-- //left-sidebar -->
        <div class="page-wrapper">
    
            <!-- content -->
			@yield('contents')
           <!--  //content -->

            <!-- footer -->
			 @include('commons.footer')
            <!-- //footer -->

        </div>
    </div>
    @include('commons.js')
    @yield('js')
</body>

</html>