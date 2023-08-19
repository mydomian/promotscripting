<?php
$system = App\Models\Setting::first();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- favicon -->
      <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/storage/images/favicon/'.$system->favicon) }}">
      <link rel="icon" type="image/png" href="{{ asset('/storage/images/favicon/'.$system->favicon) }}" sizes="32x32">
      <link rel="icon" type="image/png" href="{{ asset('/storage/images/favicon/'.$system->favicon) }}" sizes="16x16">

    <title>{{ config('app.name') }} | Verify Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="margin-top: 7rem">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6 col-sm-12">
                <div class="card bg-black p-3 rounded-3">
                   <img src="{{ asset('storage/images/logo/'.$system->logo)}}" alt="" style="width: 13rem; height:auto; margin:auto">
                   <p class="text-light">Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                   
                   @if (session('status') == 'verification-link-sent')
                    <small class="mb-4 text-sm " style="color: #178f67">
                        A new verification link has been sent to the email address you provided in your profile settings.
                    </small>
                   @endif
                   
                   
                   <div class="d-flex justify-content-between">
                       <form action="{{ route('verification.send') }}" method="post">
                        @csrf
                        <button class="btn" style="background: #9ac6b7; color:white">Resend Verification Email</button>
                       </form>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn" style="color: white">
                                <u> Log Out</u>
                            </button>
                        </form>
                    </div>
                </div>
                
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>





{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            
           
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 items-center">
            <div>
                <x-authentication-card-logo />
            </div>
            <div style="color: white">
                {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 ">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <div>
              
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2" style="color: white">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout> --}}
