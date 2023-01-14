<div class="tab-pane" id="audioSettings" role="tabpanel">
        <div class="row align-items-center mb-3">
            <div class="col-lg-2">
                <label for="files_auto_delete" class="form-label">{{ __('audio.files.auto-delete') }}:</label>
            </div>
            <div class="col-lg-10">
                <input name="files_auto_delete" type="number" class="form-control" id="files_auto_delete" value="{{ $data['files_auto_delete'] ?? 3 }}">
            </div>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col-lg-2">
                <label for="storage_per_user" class="form-label">{{ __('audio.files.storage-per-user') }}:</label>
            </div>
            <div class="col-lg-10">
                <input name="storage_per_user" type="number" class="form-control" id="storage_per_user" value="{{ $data['storage_per_user'] ?? '2760000' }}">
            </div>
        </div>

</div>

@push('scripts')
    <script>
        let commissionTiers = document.getElementById('kols_commission_tiers');
        let oldCommissionTiers = commissionTiers.value;
        commissionTiers.addEventListener('change', function (e){
            let newValue = this.value;
            if(newValue > commissionTiers){

            }

        })

    </script>
@endpush

