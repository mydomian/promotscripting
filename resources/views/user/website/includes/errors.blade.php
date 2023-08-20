@if ($message = Session::get('success'))
    <link rel="stylesheet" href="{{ URL::asset('storage/admin/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ URL::asset('storage/admin/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('storage/admin/assets/js/sweet-alert.js') }}"></script>
    <script>
        SuccessMessage('{{ Session::get('success') }}');

        function SuccessMessage(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                closeButton: true,
                timer: 3000,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'success',
                title: message,
                showCloseButton: true
            })
        }
    </script>
@elseif($message = Session::get('error'))
    <link rel="stylesheet" href="{{ URL::asset('storage/admin/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ URL::asset('storage/admin/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('storage/admin/assets/js/sweet-alert.js') }}"></script>
    <script>
        ErrorMessage('{{ Session::get('error') }}');

        function ErrorMessage(message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                showCloseButton: true,
            });

            Toast.fire({
                icon: 'error',
                title: message,
                showCloseButton: true
            })
        }
    </script>

@endif

