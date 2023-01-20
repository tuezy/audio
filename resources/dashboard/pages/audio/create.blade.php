@extends('dashboard::layouts.master')
@section('title') @lang('translation.dashboard')  @endsection
@section('content')
    <form action="" method="POST">
    @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label">Broadcast Date</label>
                            <div class="input-group">

                                <input type="text" name="broadcast_date" id="broadcast_date"
                                       class="form-control border-0 dash-filter-picker shadow"
                                       data-provider="flatpickr"
                                       data-date-format="d-m-Y"
                                       data-deafult-date="{{ date('d-m-Y') }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label">Type</label>

                            <select name="type" class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false>
                                <option value="morning" selected>Sáng</option>
                                <option value="afternoon">Trưa</option>
                                <option value="evening">Tối</option>
                            </select>
                        </div>

                        <div class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple="multiple">
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                </div>

                                <h5>Drop files here or click to upload.</h5>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                            <li class="mt-2" id="dropzone-preview-list">
                                <!-- This is used as the file preview template -->
                                <div class="border rounded">
                                    <div class="d-flex p-2">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm bg-light rounded">
                                                <img data-dz-thumbnail class="img-fluid rounded d-block" src="#" alt="Product-Image" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="pt-1">
                                                <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ms-3">
                                            <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-end my-3">
                            <a href="{{ route('dashboard.playlist.index') }}" class="btn btn-success w-sm">Playlist</a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/assets/dashboard/libs/dropzone/dropzone.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/dashboard/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/dashboard/js/app.min.js') }}"></script>
    <script>
        // Dropzone
        var broadcast_date = document.querySelector("#broadcast_date");
        var broadcast_type = document.querySelector("#choices-publish-status-input");
        var dropzonePreviewNode = document.querySelector("#dropzone-preview-list");
        dropzonePreviewNode.itemid = "";
        var previewTemplate = dropzonePreviewNode.parentNode.innerHTML;
        dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode);
        var dropzone = new Dropzone(".dropzone", {
            url: '{{route('dashboard.audio.store')}}',
            method: "post",
            previewTemplate: previewTemplate,
            previewsContainer: "#dropzone-preview",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            init:function(){
                this.on('sending', function (file, xhr, formData) {
                    formData.append("broadcast_date", broadcast_date.value);
                    formData.append("type", broadcast_type.value);
                    formData.append("name", file.name);
                });
                this.on("addedfile", function(file) {
                    this.emit("thumbnail", file, " {{ asset('assets/dashboard/images/logo-sm.png') }}");
                });
                this.on("success", function(file, response) {
                    file.previewTemplate.appendChild(document.createTextNode(response));
                });
                this.on("complete", function(file, response) {
                    this.removeFile(file);
                });
            },
            uploadprogress: function(file, progress, bytesSent) {
                console.log(file);
                    console.log(progress);
                console.log(bytesSent);
            }
        });
    </script>
@endpush
