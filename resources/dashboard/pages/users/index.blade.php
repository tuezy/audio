@extends('dashboard::layouts.master')
@section('title') @lang('translation.dashboard')  @endsection
@section('content')
    @php
    @endphp
    <form action="" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-4">
                        <table id="datatables-html" class="display table table-bordered dt-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10px;">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th class="px-0">ID</th>
                                    <th>Email</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="form-check-all"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{ URL::asset('/assets/dashboard/js/app.min.js') }}"></script>

@endsection
@push("styles")
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endpush
@push("scripts")
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let table = new DataTable('#datatables-html', {
                processing: true,
                serverSide: true,
                "ajax":{
                    "url": "{{ url()->current() }}",
                    "dataType": "json",
                    "type": "GET",
                    "data":{ _token: "{{csrf_token()}}"}
                },
                "columns": [
                    {data: 'checkbox', orderable: false, searchable: false},
                    {data: 'id',name: 'id', width: '50px',orderable: false, searchable: false, class: 'text-center'},
                    {data: 'email',name: 'email', searchable: true},
                    {data: 'action',name: 'action', width: '80px',orderable: false, searchable: false, class: 'text-center'},
                ]
            });
        });

        var checkAll = document.getElementById("checkAll");
        if (checkAll) {
            checkAll.onclick = function () {
                var checkboxes = document.querySelectorAll('.form-check-all input[type="checkbox"]');
                var checkedCount = document.querySelectorAll('.form-check-all input[type="checkbox"]:checked').length;
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = this.checked;
                    if (checkboxes[i].checked) {
                        checkboxes[i].closest("tr").classList.add("table-active");
                    } else {
                        checkboxes[i].closest("tr").classList.remove("table-active");
                    }
                }
                // (checkedCount > 0) ? document.getElementById("remove-actions").style.display = 'none' : document.getElementById("remove-actions").style.display = 'block';
            };
        }


    </script>
@endpush
