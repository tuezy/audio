@if ($errors->any())
        <script type="text/javascript">
            @foreach ($errors->all() as $error)
                Toastify({
                    text: "{{ $error }}",
                    duration: 3000000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "center", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    className: 'bg-danger',
                }).showToast();
            @endforeach
        </script>
@endif
@if(session()->has('success'))
    <script type="text/javascript">
        Toastify({
            text: "{{ session()->get('success') }}",
            duration: 3000000,
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            className: 'bg-success',
        }).showToast();
    </script>
@endif
