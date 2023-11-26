
<!DOCTYPE html>
<html lang="en">

<head>
  @include('components.partials.head')
</head>

<body>
@include("components.partials.header")
  
    @yield("content")

  <!-- ======= Footer ======= -->
  <footer id="footer">
    @include('components.partials.footer')
  </footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 

  <!-- Vendor JS Files -->
  @include('components.partials.script')
</body>

</html>