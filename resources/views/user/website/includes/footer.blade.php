<?php
$system = App\Models\Setting::first();
?>

<!-- >>>>>>>>>> Footer Main <<<<<<<<< -->
<footer id="footerMain" class="footer-main section bg-body">
    <div class="bg-holder"></div>
    <!--// bg-holder -->
    <!-- >>>>>>>>>> Footer Widgets <<<<<<<<< -->
    <div class="footer-widgets mb-5">
      <div class="container">
        <div class="row g-4 justify-content-between">
          <div class="col-md-6 col-lg-4">
            <a class="navbar-brand" href="./index.html">
              <img
                src="{{asset('/storage/images/logo/'.$system->logo)}}"
                alt="Prompt Scripting"
                width="316"
                height="118"
                class="img-fluid"
              />
            </a>
            <p class="mt-5 text-white">
              Join us on our collaborative platform working with top prompt
              engineers!
            </p>
            <p class="text-white">We are glad to make you part of our team.</p>
          </div>
          <div class="col-md-5 col-lg-6">
            <ul
              class="navbar-nav flex-lg-row justify-content-lg-end gap-lg-5 mt-md-5"
            >
              <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="{{ route('home') }}"> Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('aboutus') }}"> About Us </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('blogs') }}"> Blogs </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('contactus') }}"> Contact </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- >>>>>>>>>> Footer Widgets <<<<<<<<< -->

    <!-- >>>>>>>>>> Footer Copyright <<<<<<<<< -->
    <div class="footer-copyright">
      <div class="container">
        <p class="text-capitalize text-white">
          Copyright &copy;
          <script>
            document.write(new Date().getFullYear());
          </script>
          - All rights reserved.
        </p>
      </div>
    </div>
    <!-- >>>>>>>>>> Footer Copyright <<<<<<<<< -->
  </footer>
  <!-- >>>>>>>>>> Footer Main <<<<<<<<< -->

  <!-- jQuery -->
  <script src="{{asset("storage/website/assets")}}/libs/jQuery/jquery-3.7.0.min.js"></script>
  <!-- bootstrap -->
  <script src="{{asset("storage/website/assets")}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jquery nice select -->
  <script src="{{asset("storage/website/assets")}}/libs/jquery-nice-select/js/jquery.nice-select.min.js"></script>
  <!-- isotope -->
  <script src="{{asset("storage/website/assets")}}/libs/isotope/isotope.pkgd.min.js"></script>
  <!-- slick -->
  <script src="{{asset("storage/website/assets")}}/libs/slick/slick.min.js"></script>
  <!-- emoji mart -->
  <script src="{{asset("storage/website/assets")}}/libs/emoji-mart/emoji-mart.js"></script>
  <!-- scripts -->
  <script src="{{asset("storage/website/assets")}}/scripts/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
 <script>
      $(document).ready(function() {
          //summernote
          $('.summernote').summernote();
      });
      
  </script>
@stack('scripts')
@stack('all-modals')

  

</body>
</html>
