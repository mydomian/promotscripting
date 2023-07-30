@extends('user.website.includes.master')

@section('title')
  | Home
@endsection
@section('home','active')


@section('content')
<!-- >>>>>>>>>> Main Sections <<<<<<<<< -->
<main class="flex-shrink-0">

    <!-- Hero Home -->
    <section class="hero-home page-header bg-body">
      <div
        class="bg-holder bg-holder--lg"
        style="background-image: url('{{asset("storage/website/assets")}}/frontend_assets/images/home/hero-home-bg.png')"
      ></div>
      <div
        class="bg-holder bg-holder--sm"
        style="
          background-image: url('{{asset("storage/website/assets")}}/frontend_assets/images/home/hero-home-figure.png');
        "
      ></div>
      <!--// bg-holder  -->
      <div class="container">
        <div class="row gy-5 gx-4 align-items-center">
          <div class="col-lg-7 col-xl-8">
            <h1 class="text-white fw-bold mb-4">
              <span class="fw-bolder">
                Introducing Prompt<span class="text-primary bubble-gradient"
                  >Scripting</span
                >.ai
                <br class="d-none d-sm-block" />
                A Revolution in AI <br class="d-none d-sm-block" />
                Collaboration
              </span>
            </h1>
            <p class="text-body-secondary fs-5">
              Find unique prompts to work with every project.
            </p>
            <div
              class="d-flex align-items-center gap-4 gap-xl-5 pt-4 mt-4 pt-xxl-5 mt-xl-5"
            >
              <a href="#" class="btn btn-primary">
                Find a Prompt
                <i class="fa-solid fa-arrow-right-long"></i>
              </a>
              <a href="#" class="link-light"> Sell a prompt </a>
            </div>
          </div>
          <div class="col-lg-5 col-xl-4">
            <div class="prompt-grid">
              <div
                class="prompt-grid--item bg-image bg-dark-deep"
                style="
                  background-image: url('https://images.unsplash.com/photo-1589526261866-ab0d34f8dc19?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8YmVlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
                "
              >
                <div
                  class="prompt-grid--header text-gray-light bg-black bg-opacity-50"
                >
                  <h6 class="fw-normal">⛵ Midjourney</h6>
                  <p class="mb-0">Abstract Halftone Risograph Prints</p>
                </div>
              </div>
              <div
                class="prompt-grid--item bg-image"
                style="
                  background-image: url('https://images.unsplash.com/photo-1601039727490-458d3e7f2799?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8YmVlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
                "
              >
                <div
                  class="prompt-grid--header text-gray-light bg-black bg-opacity-75"
                >
                  <h6 class="fw-normal">⛵ Midjourney</h6>
                  <p class="mb-0">Lego Minifigures</p>
                </div>
              </div>
              <div
                class="prompt-grid--item bg-image"
                style="
                  background-image: url('https://images.unsplash.com/photo-1572551798500-53e7d9513aa8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGJlZXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
                "
              >
                <div
                  class="prompt-grid--header text-gray-light bg-black bg-opacity-75"
                >
                  <h6 class="fw-normal">⛵ Midjourney</h6>
                  <p class="mb-0">Lego Minifigures</p>
                </div>
              </div>

              <div
                class="prompt-grid--item bg-image"
                style="background-color: #567d70"
              >
                <div class="propmt-grid--testimonial text-light">
                  <p>
                    "You won't regret it. I was amazed at the quality of it. I
                    am really satisfied with my it."
                  </p>
                  <div
                    class="d-flex align-items-center gap-2 justify-content-between mt-4"
                  >
                    <h6 class="fw-bold mb-0">-Nathan-</h6>
                    <i class="fa-solid fa-quote-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Hero Home -->

    <!-- Partners -->
    <div class="partners section bg-body">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="partners-slider">
              <div class="slick-slide partner-slide">
                <img
                  src="{{asset("storage/website/assets")}}/frontend_assets/images/home/partners/partner-1.png"
                  alt="Partner"
                  width="180"
                  height="26"
                  class="img-fluid"
                />
              </div>
              <div class="slick-slide partner-slide">
                <img
                  src="{{asset("storage/website/assets")}}/frontend_assets/images/home/partners/partner-2.png"
                  alt="Partner"
                  width="180"
                  height="26"
                  class="img-fluid"
                />
              </div>
              <div class="slick-slide partner-slide">
                <img
                  src="{{asset("storage/website/assets")}}/frontend_assets/images/home/partners/partner-3.png"
                  alt="Partner"
                  width="180"
                  height="26"
                  class="img-fluid"
                />
              </div>
              <div class="slick-slide partner-slide">
                <img
                  src="{{asset("storage/website/assets")}}/frontend_assets/images/home/partners/partner-4.png"
                  alt="Partner"
                  width="180"
                  height="26"
                  class="img-fluid"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Partners -->

    <!-- Features Prompts -->
    <section class="prompts-section section">
      <div class="container">
        <h2 class="text-center text-capitalize mb-4">
          Our Featured AI
          <span class="fw-semibold text-lime-green">Prompts</span>
        </h2>
        <p class="text-body-emphasis text-center mb-5">
          Browse our unique prompts for Data Engineering, Programmers,
          Developers, Engineers, Cloud Architecture, and more..
        </p>
        <nav class="isotope-navbar mb-5">
          <ul
            class="navbar-nav flex-row flex-wrap justify-content-center isotope-navbar-nav prompt-isotope-navbar-nav"
          >
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="*">
                Show All
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=".midjourney"> Midjourney </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=".testimonial"> Testimonial </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=".chatgpt"> Chat GPT </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=".midjourney"> Midjourney </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=".testimonial"> Testimonial </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=".chatgpt"> Chat GPT </a>
            </li>
          </ul>
        </nav>
        <div class="prompt-isotope-grid">
          <div
            class="prompt-isotope--item midjourney"
            style="
              background-color: #aaaaaa;
              background-image: url('https://images.unsplash.com/photo-1541356665065-22676f35dd40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjR8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item testimonial"
            style="
              background-color: #222222;
              background-image: url('https://images.unsplash.com/photo-1488554378835-f7acf46e6c98?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item chatgpt"
            style="
              background-color: #aaaaaa;
              background-image: url('https://images.unsplash.com/photo-1553356084-58ef4a67b2a7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjl8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item midjourney"
            style="
              background-color: #c4c4c4;
              background-image: url('https://images.unsplash.com/photo-1537237858032-3ad1b513cbcc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDB8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item chatgpt"
            style="
              background-color: #aaaaaa;
              background-image: url('https://images.unsplash.com/photo-1553356084-58ef4a67b2a7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjl8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item midjourney"
            style="
              background-color: #c4c4c4;
              background-image: url('https://images.unsplash.com/photo-1537237858032-3ad1b513cbcc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDB8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item midjourney"
            style="
              background-color: #aaaaaa;
              background-image: url('https://images.unsplash.com/photo-1541356665065-22676f35dd40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjR8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item testimonial"
            style="
              background-color: #222222;
              background-image: url('https://images.unsplash.com/photo-1488554378835-f7acf46e6c98?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Features Prompts -->

    <!-- Hottest Prompts -->
    <section class="hottest-prompts section">
      <div class="container">
        <h2 class="text-center text-capitalize mb-4">
          Hottest
          <span class="fw-semibold text-lime-green">Prompts</span>
        </h2>
        <p class="text-body-emphasis text-center mb-5">
          We make your events smart & impactful by personalised event
          management services
        </p>
        <div class="row gx-4 gy-5">
          <div class="col-lg-6">
            <div class="hottest-prompts--item">
              <div
                class="hottest-prompts--preview bg-image"
                style="
                  background-color: #c4c4c4;
                  background-image: url('https://images.unsplash.com/photo-1623194466839-7e314f961c8f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fG5hdHVyZSUyMGJhY2tncm91bmR8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60');
                "
              >
                <div
                  class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
                >
                  <h6 class="fw-normal">⛵ Midjourney</h6>
                  <p class="mb-0">Abstract Halftone Risograph Prints</p>
                </div>
              </div>
              <div class="hottest-prompts--desc">
                <h5 class="text-body-emphasis mb-0">Lorem Ipsum</h5>
                <small class="fw-bold text-body d-inline-block mb-3"
                  >lorem ipsum</small
                >
                <p class="mb-5">
                  Eorem ipsum dolor sit ame adipisicn elit sed do eiusmod
                  tempor incidida labore dolor magna
                </p>
                <ul class="social-media">
                  <li class="social-media--item">
                    <a href="https://twitter.com" class="social-media--link">
                      <i class="fa-brands fa-twitter"></i>
                    </a>
                  </li>
                  <li class="social-media--item">
                    <a href="https://facebook.com" class="social-media--link">
                      <i class="fa-brands fa-facebook-f"></i>
                    </a>
                  </li>
                  <li class="social-media--item">
                    <a
                      href="https://plus.google.com"
                      class="social-media--link"
                    >
                      <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                  </li>
                  <li class="social-media--item">
                    <a
                      href="https://instagram.com"
                      class="social-media--link"
                    >
                      <i class="fa-brands fa-instagram"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="hottest-prompts--item">
              <div
                class="hottest-prompts--preview bg-image"
                style="
                  background-color: #c4c4c4;
                  background-image: url('https://images.unsplash.com/photo-1623194466839-7e314f961c8f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fG5hdHVyZSUyMGJhY2tncm91bmR8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60');
                "
              >
                <div
                  class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
                >
                  <h6 class="fw-normal">⛵ Midjourney</h6>
                  <p class="mb-0">Abstract Halftone Risograph Prints</p>
                </div>
              </div>
              <div class="hottest-prompts--desc">
                <h5 class="text-body-emphasis mb-0">Lorem Ipsum</h5>
                <small class="fw-bold text-body d-inline-block mb-3"
                  >lorem ipsum</small
                >
                <p class="mb-5">
                  Eorem ipsum dolor sit ame adipisicn elit sed do eiusmod
                  tempor incidida labore dolor magna
                </p>
                <ul class="social-media">
                  <li class="social-media--item">
                    <a href="https://twitter.com" class="social-media--link">
                      <i class="fa-brands fa-twitter"></i>
                    </a>
                  </li>
                  <li class="social-media--item">
                    <a href="https://facebook.com" class="social-media--link">
                      <i class="fa-brands fa-facebook-f"></i>
                    </a>
                  </li>
                  <li class="social-media--item">
                    <a
                      href="https://plus.google.com"
                      class="social-media--link"
                    >
                      <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                  </li>
                  <li class="social-media--item">
                    <a
                      href="https://instagram.com"
                      class="social-media--link"
                    >
                      <i class="fa-brands fa-instagram"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="hottest-prompts--item">
              <div
                class="hottest-prompts--preview bg-image"
                style="
                  background-color: #c4c4c4;
                  background-image: url('https://images.unsplash.com/photo-1623194466839-7e314f961c8f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fG5hdHVyZSUyMGJhY2tncm91bmR8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60');
                "
              >
                <div
                  class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
                >
                  <h6 class="fw-normal">⛵ Midjourney</h6>
                  <p class="mb-0">Abstract Halftone Risograph Prints</p>
                </div>
              </div>
              <div class="hottest-prompts--desc">
                <h5 class="text-body-emphasis mb-0">Lorem Ipsum</h5>
                <small class="fw-bold text-body d-inline-block mb-3"
                  >lorem ipsum</small
                >
                <p class="mb-5">
                  Eorem ipsum dolor sit ame adipisicn elit sed do eiusmod
                  tempor incidida labore dolor magna
                </p>
                <ul class="social-media">
                  <li class="social-media--item">
                    <a href="https://twitter.com" class="social-media--link">
                      <i class="fa-brands fa-twitter"></i>
                    </a>
                  </li>
                  <li class="social-media--item">
                    <a href="https://facebook.com" class="social-media--link">
                      <i class="fa-brands fa-facebook-f"></i>
                    </a>
                  </li>
                  <li class="social-media--item">
                    <a
                      href="https://plus.google.com"
                      class="social-media--link"
                    >
                      <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                  </li>
                  <li class="social-media--item">
                    <a
                      href="https://instagram.com"
                      class="social-media--link"
                    >
                      <i class="fa-brands fa-instagram"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="hottest-prompts--item">
              <div
                class="hottest-prompts--preview bg-image"
                style="
                  background-color: #c4c4c4;
                  background-image: url('https://images.unsplash.com/photo-1623194466839-7e314f961c8f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fG5hdHVyZSUyMGJhY2tncm91bmR8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60');
                "
              >
                <div
                  class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
                >
                  <h6 class="fw-normal">⛵ Midjourney</h6>
                  <p class="mb-0">Abstract Halftone Risograph Prints</p>
                </div>
              </div>
              <div class="hottest-prompts--desc">
                <h5 class="text-body-emphasis mb-0">Lorem Ipsum</h5>
                <small class="fw-bold text-body d-inline-block mb-3"
                  >lorem ipsum</small
                >
                <p class="mb-4">
                  Eorem ipsum dolor sit ame adipisicn elit sed do eiusmod
                  tempor incidida labore dolor magna
                </p>
                <ul class="social-media">
                  <li class="social-media--item">
                    <a href="https://twitter.com" class="social-media--link">
                      <i class="fa-brands fa-twitter"></i>
                    </a>
                  </li>
                  <li class="social-media--item">
                    <a href="https://facebook.com" class="social-media--link">
                      <i class="fa-brands fa-facebook-f"></i>
                    </a>
                  </li>
                  <li class="social-media--item">
                    <a
                      href="https://plus.google.com"
                      class="social-media--link"
                    >
                      <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                  </li>
                  <li class="social-media--item">
                    <a
                      href="https://instagram.com"
                      class="social-media--link"
                    >
                      <i class="fa-brands fa-instagram"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center mt-5">
          <a
            href="#"
            class="btn btn-lg btn-primary text-capitalize rounded-0 px-lg-5 py-lg-3"
          >
            Explore All
            <i class="fa-solid fa-arrow-right-long"></i>
          </a>
        </div>
      </div>
    </section>
    <!-- Hottest Prompts -->

    <!-- Newest Prompts -->
    <section class="prompts-section section">
      <div class="container">
        <h2 class="text-center text-capitalize mb-4">
          Newest
          <span class="fw-semibold text-lime-green">Prompts</span>
        </h2>
        <p class="text-body-emphasis text-center mb-5">
          We make your events smart & impactful by personalised event
          management services
        </p>
        <nav class="isotope-navbar mb-5">
          <ul
            class="navbar-nav flex-row flex-wrap justify-content-center isotope-navbar-nav prompt-isotope-navbar-nav"
          >
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="*">
                Show All
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=".midjourney"> Midjourney </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=".testimonial"> Testimonial </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=".chatgpt"> Chat GPT </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=".midjourney"> Midjourney </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=".testimonial"> Testimonial </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=".chatgpt"> Chat GPT </a>
            </li>
          </ul>
        </nav>
        <div class="prompt-isotope-grid">
          <div
            class="prompt-isotope--item midjourney"
            style="
              background-color: #aaaaaa;
              background-image: url('https://images.unsplash.com/photo-1541356665065-22676f35dd40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjR8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item testimonial"
            style="
              background-color: #222222;
              background-image: url('https://images.unsplash.com/photo-1488554378835-f7acf46e6c98?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item chatgpt"
            style="
              background-color: #aaaaaa;
              background-image: url('https://images.unsplash.com/photo-1553356084-58ef4a67b2a7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjl8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item midjourney"
            style="
              background-color: #c4c4c4;
              background-image: url('https://images.unsplash.com/photo-1537237858032-3ad1b513cbcc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDB8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item chatgpt"
            style="
              background-color: #aaaaaa;
              background-image: url('https://images.unsplash.com/photo-1553356084-58ef4a67b2a7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjl8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item midjourney"
            style="
              background-color: #c4c4c4;
              background-image: url('https://images.unsplash.com/photo-1537237858032-3ad1b513cbcc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDB8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item midjourney"
            style="
              background-color: #aaaaaa;
              background-image: url('https://images.unsplash.com/photo-1541356665065-22676f35dd40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjR8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
          <div
            class="prompt-isotope--item testimonial"
            style="
              background-color: #222222;
              background-image: url('https://images.unsplash.com/photo-1488554378835-f7acf46e6c98?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
            "
          >
            <div
              class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
            >
              <h6 class="fw-normal">⛵ Midjourney</h6>
              <p class="mb-0">Abstract Halftone Risograph Prints</p>
            </div>
          </div>
        </div>
        <div class="text-center mt-5 pt-5">
          <a
            href="#"
            class="btn btn-lg btn-primary text-capitalize rounded-0 px-lg-5 py-lg-3"
          >
            Browse Marketplace
          </a>
        </div>
      </div>
    </section>
    <!-- Newest Prompts -->

    <!-- PromptScripting -->
    <section class="prompt-scripting section">
      <div class="bg-holder bg-primary bg-opacity-50"></div>
      <!--// bg-holder  -->
      <div class="container">
        <h2 class="text-center text-capitalize mb-4">
          What is
          <span class="fw-semibold text-lime-green">PromptScripting</span>
        </h2>
        <p class="text-body-emphasis text-center">
          Prompts are becoming a powerful new way of programming AI models
          like DALL·E, Midjourney & GPT.
        </p>
        <p class="text-body-emphasis text-center">
          However, it's hard to find good quality prompts online.
        </p>
        <p class="text-body-emphasis text-center">
          If you're good at prompt engineering, there's also no clear way to
          make a living from your skills.
        </p>
        <p class="text-body-emphasis text-center">
          PromptScripting is a marketplace for buying and selling quality prompts
          that produce the best results, and save you money on API costs.
        </p>
      </div>
    </section>
    <!-- PromptScripting -->

    <!-- Favorite Prompts -->
    <section class="favorite-prompts section">
      <div class="container">
        <h2 class="text-center text-capitalize mb-4">
          Our favorite
          <span class="fw-semibold text-lime-green">prompts this week</span>
        </h2>
        <p class="text-body-emphasis text-center mb-5">
          We make your events smart & impactful by personalised event
          management services
        </p>
        <div class="favorite-prompts--slider">
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1667835949430-a2516cc93d27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bWlkam91cm5leXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1567095761054-7a02e69e5c43?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8YWJzdHJhY3R8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1552083974-186346191183?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1667835949430-a2516cc93d27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bWlkam91cm5leXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1567095761054-7a02e69e5c43?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8YWJzdHJhY3R8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1552083974-186346191183?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1667835949430-a2516cc93d27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bWlkam91cm5leXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1567095761054-7a02e69e5c43?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8YWJzdHJhY3R8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1552083974-186346191183?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Favorite Prompts -->

    <!-- Popular Prompts -->
    <section class="popular-prompts section">
      <div class="container">
        <h2 class="text-center text-capitalize mb-4">
          Most Popular
          <span class="fw-semibold text-lime-green">Prompts This Month</span>
        </h2>
        <p class="text-body-emphasis text-center mb-5">
          We make your events smart & impactful by personalised event
          management services
        </p>
        <div class="favorite-prompts--slider">
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1667835949430-a2516cc93d27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bWlkam91cm5leXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1567095761054-7a02e69e5c43?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8YWJzdHJhY3R8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1552083974-186346191183?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1667835949430-a2516cc93d27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bWlkam91cm5leXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1567095761054-7a02e69e5c43?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8YWJzdHJhY3R8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1552083974-186346191183?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1667835949430-a2516cc93d27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bWlkam91cm5leXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1567095761054-7a02e69e5c43?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8YWJzdHJhY3R8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
          <div class="slick-slide">
            <div
              class="favorite-propmts--item bg-image"
              style="
                background-color: #c4c4c4;
                background-image: url('https://images.unsplash.com/photo-1552083974-186346191183?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGFic3RyYWN0fGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60');
              "
            >
              <div
                class="prompt-grid--header rounded-0 text-gray-light bg-black bg-opacity-50"
              >
                <h6 class="fw-normal">⛵ Midjourney</h6>
                <p class="mb-0">Lego Minifigures</p>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-5 pt-5">
          <a
            href="#"
            class="btn btn-lg btn-primary text-capitalize rounded-0 px-lg-5 py-lg-3"
          >
            Browse Marketplace
          </a>
        </div>
      </div>
    </section>
    <!-- Popular Prompts -->

    <!-- Prompt Engineering -->
    <section class="prompt-engineering section">
      <div class="container">
        <h2 class="text-center text-capitalize mb-4">
          Earn from your
          <span class="fw-semibold text-lime-green">
            Prompt Engineering skills
          </span>
        </h2>
        <p class="text-body-emphasis text-center mb-5">
          We make your events smart & impactful by personalised event
          management services
        </p>
        <div class="row justify-content-center">
          <div class="col-sm-11 col-lg-12 col-xl-10 col-xxl-9">
            <div class="prompt-engineering--slider">
              <div class="slick-slide">
                <div class="prompt-engineering--item">
                  <div
                    class="prompt-engineering--preview bg-image"
                    style="
                      background-color: #c4c4c4;
                      background-image: url('https://images.unsplash.com/photo-1642427749670-f20e2e76ed8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bWlkam91cm5leXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
                    "
                  >
                    <div class="prompt-engineering--countdown shadow-sm">
                      <div class="countdown-block">
                        <span class="countdown--count">25</span>
                        <span class="countdown--title">Days</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">16</span>
                        <span class="countdown--title">Hours</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">47</span>
                        <span class="countdown--title">Mins</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">38</span>
                        <span class="countdown--title">Secs</span>
                      </div>
                    </div>
                  </div>
                  <div class="hottest-prompts--desc">
                    <h5 class="text-body-emphasis mb-0">Lorem Ipsum</h5>
                    <small class="fw-bold text-body d-inline-block mb-3"
                      >Lorem ipsum, dolor sit amet</small
                    >
                    <p>
                      Adipisicing elit. Similique enim praesentium est
                      blanditiis? Animi soluta commodi, enim ipsa iusto
                      voluptas in obcaecati, facilis placeat quas modi
                      sapiente atque repellendus, voluptates reprehenderit
                      eligendi sed minus repudiandae ab voluptatum odit sit
                      ipsum nulla praesentium. Quidem delectus nostrum dolorem
                      maiores, repellendus eius non!
                    </p>
                    <p class="mb-5">
                      Reprehenderit eligendi sed minus repudiandae ab
                      voluptatum odit sit ipsum nulla praesentium. Quidem
                      delectus nostrum dolorem maiores, repellendus eius non!
                    </p>
                    <div class="mb-3">
                      <a href="#" class="link-primary text-capitalize"
                        >More Details</a
                      >
                    </div>
                    <div class="mb-3">
                      <small class="fw-bold">loremipsum</small>
                    </div>
                    <div><small class="fw-bold">loremipsum</small></div>
                    <div class="mt-5">
                      <a
                        href="#"
                        class="btn btn-lg btn-primary text-capitalize rounded-0 px-lg-5 py-lg-3"
                      >
                        Sell a prompt
                        <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="slick-slide">
                <div class="prompt-engineering--item">
                  <div
                    class="prompt-engineering--preview bg-image"
                    style="
                      background-color: #c4c4c4;
                      background-image: url('https://images.unsplash.com/photo-1659468480453-f04eb04661cb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8bWlkam91cm5leXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
                    "
                  >
                    <div class="prompt-engineering--countdown shadow-sm">
                      <div class="countdown-block">
                        <span class="countdown--count">25</span>
                        <span class="countdown--title">Days</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">16</span>
                        <span class="countdown--title">Hours</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">47</span>
                        <span class="countdown--title">Mins</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">38</span>
                        <span class="countdown--title">Secs</span>
                      </div>
                    </div>
                  </div>
                  <div class="hottest-prompts--desc">
                    <h5 class="text-body-emphasis mb-0">Lorem Ipsum</h5>
                    <small class="fw-bold text-body d-inline-block mb-3"
                      >Lorem ipsum, dolor sit amet</small
                    >
                    <p>
                      Adipisicing elit. Similique enim praesentium est
                      blanditiis? Animi soluta commodi, enim ipsa iusto
                      voluptas in obcaecati, facilis placeat quas modi
                      sapiente atque repellendus, voluptates reprehenderit
                      eligendi sed minus repudiandae ab voluptatum odit sit
                      ipsum nulla praesentium. Quidem delectus nostrum dolorem
                      maiores, repellendus eius non!
                    </p>
                    <p class="mb-5">
                      Reprehenderit eligendi sed minus repudiandae ab
                      voluptatum odit sit ipsum nulla praesentium. Quidem
                      delectus nostrum dolorem maiores, repellendus eius non!
                    </p>
                    <div class="mb-3">
                      <a href="#" class="link-primary text-capitalize"
                        >More Details</a
                      >
                    </div>
                    <div class="mb-3">
                      <small class="fw-bold">loremipsum</small>
                    </div>
                    <div><small class="fw-bold">loremipsum</small></div>
                    <div class="mt-5">
                      <a
                        href="#"
                        class="btn btn-lg btn-primary text-capitalize rounded-0 px-lg-5 py-lg-3"
                      >
                        Sell a prompt
                        <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="slick-slide">
                <div class="prompt-engineering--item">
                  <div
                    class="prompt-engineering--preview bg-image"
                    style="
                      background-color: #c4c4c4;
                      background-image: url('https://images.unsplash.com/photo-1642427749670-f20e2e76ed8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bWlkam91cm5leXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
                    "
                  >
                    <div class="prompt-engineering--countdown shadow-sm">
                      <div class="countdown-block">
                        <span class="countdown--count">25</span>
                        <span class="countdown--title">Days</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">16</span>
                        <span class="countdown--title">Hours</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">47</span>
                        <span class="countdown--title">Mins</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">38</span>
                        <span class="countdown--title">Secs</span>
                      </div>
                    </div>
                  </div>
                  <div class="hottest-prompts--desc">
                    <h5 class="text-body-emphasis mb-0">Lorem Ipsum</h5>
                    <small class="fw-bold text-body d-inline-block mb-3"
                      >Lorem ipsum, dolor sit amet</small
                    >
                    <p>
                      Adipisicing elit. Similique enim praesentium est
                      blanditiis? Animi soluta commodi, enim ipsa iusto
                      voluptas in obcaecati, facilis placeat quas modi
                      sapiente atque repellendus, voluptates reprehenderit
                      eligendi sed minus repudiandae ab voluptatum odit sit
                      ipsum nulla praesentium. Quidem delectus nostrum dolorem
                      maiores, repellendus eius non!
                    </p>
                    <p class="mb-5">
                      Reprehenderit eligendi sed minus repudiandae ab
                      voluptatum odit sit ipsum nulla praesentium. Quidem
                      delectus nostrum dolorem maiores, repellendus eius non!
                    </p>
                    <div class="mb-3">
                      <a href="#" class="link-primary text-capitalize"
                        >More Details</a
                      >
                    </div>
                    <div class="mb-3">
                      <small class="fw-bold">loremipsum</small>
                    </div>
                    <div><small class="fw-bold">loremipsum</small></div>
                    <div class="mt-5">
                      <a
                        href="#"
                        class="btn btn-lg btn-primary text-capitalize rounded-0 px-lg-5 py-lg-3"
                      >
                        Sell a prompt
                        <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="slick-slide">
                <div class="prompt-engineering--item">
                  <div
                    class="prompt-engineering--preview bg-image"
                    style="
                      background-color: #c4c4c4;
                      background-image: url('https://images.unsplash.com/photo-1659468480453-f04eb04661cb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8bWlkam91cm5leXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
                    "
                  >
                    <div class="prompt-engineering--countdown shadow-sm">
                      <div class="countdown-block">
                        <span class="countdown--count">25</span>
                        <span class="countdown--title">Days</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">16</span>
                        <span class="countdown--title">Hours</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">47</span>
                        <span class="countdown--title">Mins</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">38</span>
                        <span class="countdown--title">Secs</span>
                      </div>
                    </div>
                  </div>
                  <div class="hottest-prompts--desc">
                    <h5 class="text-body-emphasis mb-0">Lorem Ipsum</h5>
                    <small class="fw-bold text-body d-inline-block mb-3"
                      >Lorem ipsum, dolor sit amet</small
                    >
                    <p>
                      Adipisicing elit. Similique enim praesentium est
                      blanditiis? Animi soluta commodi, enim ipsa iusto
                      voluptas in obcaecati, facilis placeat quas modi
                      sapiente atque repellendus, voluptates reprehenderit
                      eligendi sed minus repudiandae ab voluptatum odit sit
                      ipsum nulla praesentium. Quidem delectus nostrum dolorem
                      maiores, repellendus eius non!
                    </p>
                    <p class="mb-5">
                      Reprehenderit eligendi sed minus repudiandae ab
                      voluptatum odit sit ipsum nulla praesentium. Quidem
                      delectus nostrum dolorem maiores, repellendus eius non!
                    </p>
                    <div class="mb-3">
                      <a href="#" class="link-primary text-capitalize"
                        >More Details</a
                      >
                    </div>
                    <div class="mb-3">
                      <small class="fw-bold">loremipsum</small>
                    </div>
                    <div><small class="fw-bold">loremipsum</small></div>
                    <div class="mt-5">
                      <a
                        href="#"
                        class="btn btn-lg btn-primary text-capitalize rounded-0 px-lg-5 py-lg-3"
                      >
                        Sell a prompt
                        <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="slick-slide">
                <div class="prompt-engineering--item">
                  <div
                    class="prompt-engineering--preview bg-image"
                    style="
                      background-color: #c4c4c4;
                      background-image: url('https://images.unsplash.com/photo-1642427749670-f20e2e76ed8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bWlkam91cm5leXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
                    "
                  >
                    <div class="prompt-engineering--countdown shadow-sm">
                      <div class="countdown-block">
                        <span class="countdown--count">25</span>
                        <span class="countdown--title">Days</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">16</span>
                        <span class="countdown--title">Hours</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">47</span>
                        <span class="countdown--title">Mins</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">38</span>
                        <span class="countdown--title">Secs</span>
                      </div>
                    </div>
                  </div>
                  <div class="hottest-prompts--desc">
                    <h5 class="text-body-emphasis mb-0">Lorem Ipsum</h5>
                    <small class="fw-bold text-body d-inline-block mb-3"
                      >Lorem ipsum, dolor sit amet</small
                    >
                    <p>
                      Adipisicing elit. Similique enim praesentium est
                      blanditiis? Animi soluta commodi, enim ipsa iusto
                      voluptas in obcaecati, facilis placeat quas modi
                      sapiente atque repellendus, voluptates reprehenderit
                      eligendi sed minus repudiandae ab voluptatum odit sit
                      ipsum nulla praesentium. Quidem delectus nostrum dolorem
                      maiores, repellendus eius non!
                    </p>
                    <p class="mb-5">
                      Reprehenderit eligendi sed minus repudiandae ab
                      voluptatum odit sit ipsum nulla praesentium. Quidem
                      delectus nostrum dolorem maiores, repellendus eius non!
                    </p>
                    <div class="mb-3">
                      <a href="#" class="link-primary text-capitalize"
                        >More Details</a
                      >
                    </div>
                    <div class="mb-3">
                      <small class="fw-bold">loremipsum</small>
                    </div>
                    <div><small class="fw-bold">loremipsum</small></div>
                    <div class="mt-5">
                      <a
                        href="#"
                        class="btn btn-lg btn-primary text-capitalize rounded-0 px-lg-5 py-lg-3"
                      >
                        Sell a prompt
                        <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="slick-slide">
                <div class="prompt-engineering--item">
                  <div
                    class="prompt-engineering--preview bg-image"
                    style="
                      background-color: #c4c4c4;
                      background-image: url('https://images.unsplash.com/photo-1659468480453-f04eb04661cb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8bWlkam91cm5leXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60');
                    "
                  >
                    <div class="prompt-engineering--countdown shadow-sm">
                      <div class="countdown-block">
                        <span class="countdown--count">25</span>
                        <span class="countdown--title">Days</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">16</span>
                        <span class="countdown--title">Hours</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">47</span>
                        <span class="countdown--title">Mins</span>
                      </div>
                      <div class="countdown-block">
                        <span class="countdown--count">38</span>
                        <span class="countdown--title">Secs</span>
                      </div>
                    </div>
                  </div>
                  <div class="hottest-prompts--desc">
                    <h5 class="text-body-emphasis mb-0">Lorem Ipsum</h5>
                    <small class="fw-bold text-body d-inline-block mb-3"
                      >Lorem ipsum, dolor sit amet</small
                    >
                    <p>
                      Adipisicing elit. Similique enim praesentium est
                      blanditiis? Animi soluta commodi, enim ipsa iusto
                      voluptas in obcaecati, facilis placeat quas modi
                      sapiente atque repellendus, voluptates reprehenderit
                      eligendi sed minus repudiandae ab voluptatum odit sit
                      ipsum nulla praesentium. Quidem delectus nostrum dolorem
                      maiores, repellendus eius non!
                    </p>
                    <p class="mb-5">
                      Reprehenderit eligendi sed minus repudiandae ab
                      voluptatum odit sit ipsum nulla praesentium. Quidem
                      delectus nostrum dolorem maiores, repellendus eius non!
                    </p>
                    <div class="mb-3">
                      <a href="#" class="link-primary text-capitalize"
                        >More Details</a
                      >
                    </div>
                    <div class="mb-3">
                      <small class="fw-bold">loremipsum</small>
                    </div>
                    <div><small class="fw-bold">loremipsum</small></div>
                    <div class="mt-5">
                      <a
                        href="#"
                        class="btn btn-lg btn-primary text-capitalize rounded-0 px-lg-5 py-lg-3"
                      >
                        Sell a prompt
                        <i class="fa-solid fa-arrow-right-long"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-center">
              <div class="prompt-engineering--controls"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Prompt Engineering -->

    <!-- Network Prompt -->
    <section class="network-prompt section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-11 col-xxl-10">
            <div class="card network-prompt--card text-white rounded-3">
              <div class="card-body">
                <div class="network-prompt--desc fw-semibold">
                  <h2>Build your network of Prompt Engineers.</h2>
                  <p class="mb-5">Sign up today to get started.</p>
                  <a href="#" class="btn btn-outline-light text-capitalize">
                    Register Now
                  </a>
                </div>
                <div class="network-prompt--grid">
                  <div class="network-prompt--item">
                    <img
                      src="https://images.unsplash.com/photo-1685194926944-9750afc26e39?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHw1fHx8ZW58MHx8fHx8&auto=format&fit=crop&w=500&q=60"
                      alt=""
                      class="img-fluid"
                      width="165"
                      height="165"
                      style="background-color: #c4c4c4"
                    />
                  </div>
                  <div
                    class="network-prompt--item network-prompt--item-bordered"
                  >
                    <img
                      src="https://images.unsplash.com/photo-1684872305252-ca5c9e1947fd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxOHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                      alt=""
                      class="img-fluid"
                      width="165"
                      height="165"
                      style="background-color: #c4c4c4"
                    />
                  </div>
                  <div
                    class="network-prompt--item network-prompt--item-bordered"
                  >
                    <img
                      src="https://images.unsplash.com/photo-1685276151314-7fe5f99650ee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwzfHx8ZW58MHx8fHx8&auto=format&fit=crop&w=500&q=60"
                      alt=""
                      class="img-fluid"
                      width="165"
                      height="165"
                      style="background-color: #c4c4c4"
                    />
                  </div>
                  <div class="network-prompt--item">
                    <img
                      src="https://plus.unsplash.com/premium_photo-1677362425101-a11ef7eaae03?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHx8&auto=format&fit=crop&w=500&q=60"
                      alt=""
                      class="img-fluid"
                      width="165"
                      height="165"
                      style="background-color: #c4c4c4"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Network Prompt -->
  </main>
  <!-- >>>>>>>>>> Main Sections <<<<<<<<< -->
@endsection
