<!DOCTYPE html>
<html lang="en">

<head>
      @include('layouts.head')

</head>
    
<body>



<header id="header" class="flex-top">
 
      @include('layouts.header')
 
</header>
  

  <main id="main">
    @yield('content')
    
   
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
     @include('layouts.footer')
  </footer><!-- End Footer -->
 
  @include('layouts.scripts')

</body>

</html>