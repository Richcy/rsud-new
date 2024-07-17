@if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: "{!! session('success') !!}",
                showConfirmButton: true,
                timer: 10000
            });
        </script>
    @endif

    @if (session('warning'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan!',
                text: "{!! session('warning') !!}",
                showConfirmButton: true,
                timer: 10000
            });
        </script>
    @endif

    @if (session('error'))
    <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{!! session('error') !!}",
                showConfirmButton: true,
                timer: 10000
            });
        </script>
    @endif


    @if (session('errors'))
        @if (session('errors')->login->has('email'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: "{!! session('errors')->login->first('email') !!}",
                    showConfirmButton: true,
                    timer: 10000
                });
            </script>
        @endif
    @endif
