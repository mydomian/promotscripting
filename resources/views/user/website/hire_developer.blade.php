@extends('user.website.includes.master')

@section('title') Hire Developer @endsection
@section('hire-developer','active')

@section('content')
<main class="flex-shrink-0 bg-body">
    <!-- Hero Search -->
    <section class="hero-search page-header overflow-hidden">
      <div class="bg-holder bg-black bg-opacity-25"></div>
      <!--// bg-holder  -->
      <div class="container bubble-gradient">
        <h2 class="text-center text-capitalize text-white mb-4">
          Find your next
          <span class="fw-semibold text-primary">great tech hire</span>
        </h2>
        <p class="text-white text-center mb-0">
          Work with our top
          <span class="text-primary">Prompt</span> Engineers today, and create
          your perfect project for tomorrow.
        </p>
      </div>
    </section>
    <!-- Hero Search -->

    <!-- Search Filters -->
    <section class="search-filters py-4">
      <form action="{{ route('user.hireDeveloper') }}" method="post">
        @csrf
      <div class="container">
        <div class="card search-filters--card">
          <div class="card-body">
            <div class="search-filters--block">
              <div class="flex-grow-1">
                <label for="must-have-skills" class="form-label"
                  >Must-have skills</label
                >
                <input
                  type="text"
                  name="profession"
                  id="must-have-skills"
                  class="form-control"
                  placeholder="Search By Profession"
                />
              </div>
              <div class="flex-grow-1">
                <label for="search-keyword" class="form-label">Developer Name</label>
                <input
                  type="text"
                  name="name"
                  id="search-keyword"
                  class="form-control"
                  placeholder="Search By Developer Name"
                />
              </div>
            </div>
            <div class="vt-line d-none"></div>
            <div class="search-filters--block">
              <div class="w-100">
                <label for="nice-to-have-skills" class="form-label"
                  >Language</label
                >
                <input
                  type="text"
                  name="language"
                  id="search-keyword"
                  class="form-control"
                  placeholder="Search By Language"
                />
              </div>
            </div>
            <div class="vt-line d-none"></div>
            <div class="search-filters--block">
              <div class="flex-grow-1">
                <label for="years-of-experience" class="form-label"
                  >Year of experience</label
                >
                <input
                  type="number"
                  name="experience"
                  id="years-of-experience"
                  class="form-control"
                  placeholder="How Many Experience Do You Want"
                />
              </div>
              <button
                type="submit"
                class="btn flex-shrink-0 align-self-end mb-2"
              >
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
    </section>
    <!-- Search Filters -->

    <!-- Search Result -->
    <section class="search-result py-4">
      <div class="container">
        <div class="row align-items-center justify-content-center hire_developer_append">
            @include('user.website.includes.hire_developer_append')
        </div>
        <div class="d-flex justify-content-center mt-5">
          {!! $users->render() !!}
      </div>
      </div>
    </section>
    <!-- Search Result -->
  </main>
@endsection
@push('scripts')
    
@endpush