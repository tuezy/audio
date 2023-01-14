@extends('dashboard::layouts.master')
@section('title') @lang('translation.dashboard')  @endsection
@section('content')
    <div class="row">
        <div class="col">
            <div class="h-100">
                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column justify-content-end">
                            <div class="flex-grow-1">
                                <h4 class="fs-16 mb-1">Configurations</h4>
                            </div>
                        </div><!-- end card header -->
                    </div>
                </div>
                <form action="{{ route('dashboard.settings.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#settingsIndex" role="tab" aria-selected="true">
                                                <i class="fas fa-home"></i>
                                                Settings
                                            </a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#audioSettings" role="tab" aria-selected="true">
                                                <i class="fas fa-home"></i>
                                                Audio
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                                <div class="card-body p-4">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="settingsIndex" role="tabpanel">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-lg-2">
                                                    <label for="websiteTitle" class="form-label">Website Title</label>
                                                </div>
                                                <div class="col-lg-10">
                                                    <input name="website_title" type="text" class="form-control" id="websiteTitle" value="{{ $data['website_title'] ?? 'Dashboard' }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-2">
                                                    <label for="directMessage" class="form-check-label fs-14">Website Maintenance</label>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="form-check form-switch">
                                                        <input name="website_maintenance" class="form-check-input" type="checkbox" role="switch" id="directMessage" {{ isset($data['website_maintenance'])? ($data['website_maintenance'] == 0 ? '': 'checked=""'):'' }}>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        @include('dashboard.pages.settings.audio')
                                        <div class="row align-items-center mb-3">
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Updates</button>
                                                    <button type="button" class="btn btn-soft-success">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </form>
            </div> <!-- end .h-100-->

        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/dashboard/js/app.min.js') }}"></script>
@endsection
