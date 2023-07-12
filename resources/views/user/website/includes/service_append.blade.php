@forelse ($services as $service)
<div class="col-md-6 col-lg-4">
    <div class="card marketplace--card rounded-3">
      <div class="card-body">
        <div class="d-flex align-items-center gap-3 mb-3">
          <div class="position-relative z-0">
            <img
              src="{{asset('uploads/seller/'.$service->user->image)}}"
              alt="Avatar"
              width="32"
              height="32"
              class="rounded-pill object-fit-cover"
            />
            <svg
              class="ps-icon position-absolute top-100 start-100 translate-middle"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              style="
                fill: rgba(
                  var(--ps-primary),
                  var(--ps-text-opacity)
                );
                margin-top: -0.375rem;
              "
            >
              <path
                d="M19.965 8.521C19.988 8.347 20 8.173 20 8c0-2.379-2.143-4.288-4.521-3.965C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.035C6.138 3.712 4 5.621 4 8c0 .173.012.347.035.521C2.802 9.215 2 10.535 2 12s.802 2.785 2.035 3.479A3.976 3.976 0 0 0 4 16c0 2.379 2.138 4.283 4.521 3.965C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.035C17.857 20.283 20 18.379 20 16c0-.173-.012-.347-.035-.521C21.198 14.785 22 13.465 22 12s-.802-2.785-2.035-3.479zm-9.01 7.895-3.667-3.714 1.424-1.404 2.257 2.286 4.327-4.294 1.408 1.42-5.749 5.706z"
              ></path>
            </svg>
          </div>
          <a
            href="#"
            class="text-white text-decoration-none fw-semibold"
            >{{$service->user->name}}
            </a>
        </div>
       
        <a
          href="{{route('gig.details', $service->id)}}"
          class="d-block rounded-3 mb-3 ratio ratio-4x3"
          style="background-color: #c4c4c4"
        >
          <img
            src="{{asset('uploads/gigs/'.$service->gig_image)}}"
            alt="Marketplace Item"
            class="img-fluid w-100 rounded-3 object-fit-cover"
          />
        </a>
        <div class="d-flex justify-content-between gap-3">
          <h5 class="card-title text-white">
            <a href="{{route('gig.details', $service->id)}}" class="link-light text-decoration-none">
              {{Str::limit($service->gig_title, 20) }}
            </a>
          </h5>
          <div class="dropdown">
            <button
              class="btn dropdown-toggle"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="fa-solid fa-ellipsis"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li>
                <a class="dropdown-item" href="#">Action</a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('gig.details',$service->id) }}"
                  >Gig Details</a
                >
              </li>
              <li>
                <a class="dropdown-item" href="#"
                  >Something else here</a
                >
              </li>
            </ul>
          </div>
        </div>
        <div class="fw-medium mb-2">
          <span class="text-body-tertiary me-2">{{'$'.$service->starting_price}}</span>
          <span class="text-white">1/1</span>
        </div>
        <div class="d-flex justify-content-between gap-3">
          <a
            href="#"
            class="fw-semibold link-primary text-decoration-none"
          >
           Hire Seller
          </a>
          <small class="text-body-tertiary">
            <i class="fa-regular fa-heart"></i>
           {{$service->reacts ?? "0"}}
          </small>
        </div>
      </div>
    </div>
  </div>
@empty
   <div class="text-white"> Nothing Found!</div>
@endforelse