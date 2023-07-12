@if ($message = Session::get('success'))
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ URL::asset('admin/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/sweet-alert.js') }}"></script>
    <script>
        SuccessMessage('{{ Session::get('success') }}');

        function SuccessMessage(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'success',
                title: message
            })
        }
    </script>
@elseif($message = Session::get('error'))
    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ URL::asset('admin/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/sweet-alert.js') }}"></script>
    <script>
        ErrorMessage('{{ Session::get('error') }}');

        function ErrorMessage(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'error',
                title: message
            })
        }
    </script>

@endif

