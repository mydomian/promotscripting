@extends('admin.layout.master')

@section('title')
    Blogs List
@endsection

@section('content')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blogs List</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-3"></div>
                            <div class="col-md-6"><input type="text" onkeyup="myFunction()" id="FIlterBlog"
                                                         class="form-control MyInput w-100"
                                                         placeholder="Filter Blog By Title or Category Name . . . . ">
                            </div>
                            <div class="col-md-3"></div>
                        </div>

                        <div class="row">
                            @forelse($blogs as $blog)

                                <div class="col-12 col-md-6 col-xl-4 mb-4 cardsearch">
                                    <div class="card shadow h-100">
                                        <img src="{{ asset('storage/blog/'.$blog->image )}}"
                                             class="card-img-top"
                                             alt="..." style="width:100%;height:260px">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-7"><p
                                                            class="card-title category-title">{{ $blog->category->category_name }}</p>
                                                </div>
                                                <div class="col-md-2">
                                                    @if($blog->status=="Active")
                                                        <a href="{{route('admin.blogstatusupdate',[ encrypt($blog->id)])}}" class="badge bg-success">Active</a>
                                                    @else
                                                        <a href="{{route('admin.blogstatusupdate', [encrypt($blog->id)])}}" class="badge bg-danger">Inactive</a>
                                                    @endif
                                                </div>
                                               
                                            </div>
                                            <h5 class="card-text mb-3 small">{{ $blog->title }}</h5>
                                            <center>
                                                {{-- <a href="#"
                                                   class="btn btn-primary"><i class="link-icon"
                                                                              data-feather="eye"></i></a> --}}
                                                <a href="{{ route('admin.editblog',[encrypt($blog->id)]) }}"
                                                   class="btn btn-info"><i class="link-icon"
                                                                           data-feather="edit"></i></a>
                                                <a href="javascript:;"
                                                   getUrl="{{ route('admin.deleteblog',[encrypt($blog->id)]) }}"
                                                   class="btn btn-danger onBlogDelete"><i class="link-icon" data-feather="trash"></i></a>
                                            </center>
                                        </div>
                                    </div>
                                </div>

                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.tiny.cloud/1/slqzq9p4jfyu3f1nzvbomd2qq198chen520bsjv05lggwszl/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#detail',
            height: "450"
        });

        function myFunction() {
            var input, filter, cards, cardContainer, title, i, categoryTitle;
            input = document.getElementById("FIlterBlog");
            filter = input.value.toUpperCase();
            cards = document.getElementsByClassName("cardsearch");
            for (i = 0; i < cards.length; i++) {
                title = cards[i].querySelector(".small");
                categoryTitle = cards[i].querySelector(".category-title");
                if (title.innerText.toUpperCase().indexOf(filter) > -1 || categoryTitle.innerText.toUpperCase().indexOf(filter) > -1) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }

    </script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <script>
         $(document).on("click", ".onBlogDelete", function () {
              
              var url = $(this).attr('getUrl');
              Swal.fire({
              title: 'Are you sure?',
              text: "Do you want to delete this blog!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Delete it!'
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href=url
                  }
              })
        
        });
    </script>
@endsection
