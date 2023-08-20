<?php
$system = App\Models\Setting::first();
?>

<title>{{ config('chatify.name') }}</title>

<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/storage/images/favicon/'.$system->favicon) }}">
<link rel="icon" type="image/png" href="{{ asset('/storage/images/favicon/'.$system->favicon) }}" sizes="32x32">
<link rel="icon" type="image/png" href="{{ asset('/storage/images/favicon/'.$system->favicon) }}" sizes="16x16">



{{-- Meta tags --}}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="id" content="{{ $id }}">
<meta name="messenger-color" content="{{ $messengerColor }}">
<meta name="messenger-theme" content="{{ $dark_mode }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="url" content="{{ url('').'/'.config('chatify.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

{{-- scripts --}}
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('/storage/js/chatify/font.awesome.min.js') }}"></script>
<script src="{{ asset('/storage/js/chatify/autosize.js') }}"></script>
<script src="{{ asset('/storage/js/app.js') }}"></script>
<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> --}}


<link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/>
<link href="{{ asset('/storage/css/chatify/style.css') }}" rel="stylesheet" />
<link href="{{ asset('/storage/css/chatify/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
<link href="{{ asset('/storage/css/app.css') }}" rel="stylesheet" />


<style>
    :root {
        --primary-color: {{ $messengerColor }};
    }
</style>
