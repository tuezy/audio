<div class="tab-pane" id="kolsSettings" role="tabpanel">
        <div class="row align-items-center mb-3">
            <div class="col-lg-2">
                <label for="kols_commission_tiers" class="form-label">Kols Commission Tiers</label>
            </div>
            <div class="col-lg-10">
                <input name="kols_commission_tiers" type="number" class="form-control" id="kols_commission_tiers" value="{{ $data['kols_commission_tiers'] ?? 3 }}">
            </div>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col-lg-2">
                <label for="base_affiliate_price" class="form-label">Base Affiliate price:</label>
            </div>
            <div class="col-lg-10">
                <input name="base_affiliate_price" type="number" class="form-control" id="base_affiliate_price" value="{{ $data['base_affiliate_price'] ?? '2760000' }}">
            </div>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col-lg-2">
                <label for="base_shop_price" class="form-label">Base Shop price:</label>
            </div>
            <div class="col-lg-10">
                <input name="base_shop_price" type="number" class="form-control" id="base_shop_price" value="{{ $data['base_shop_price'] ?? '2760000' }}">
            </div>
        </div>
        <hr />
@for($i = 1; $i <= ($data['kols_commission_tiers'] ?? 3);$i++)
        <div class="row align-items-center mb-3">
            <div class="col-lg-2">
                <label for="base_affiliate_price_lv{{$i}}" class="form-label">Affiliate LV {{$i}}:</label>
            </div>
            <div class="col-lg-10">
                <input name="base_affiliate_price_lv{{$i}}" type="number" class="form-control" id="base_affiliate_price_lv{{$i}}" value="{{ $data['base_affiliate_price_lv'.$i] }}">
            </div>
        </div>
        <div class="row align-items-center mb-3">
            <div class="col-lg-2">
                <label for="base_shop_price_lv{{$i}}" class="form-label">Shop LV {{$i}}:</label>
            </div>
            <div class="col-lg-10">
                <input name="base_shop_price_lv{{$i}}" type="number" class="form-control" id="base_shop_price_lv{{$i}}" value="{{ $data['base_shop_price_lv'.$i] }}">
            </div>
        </div>
    <hr />
@endfor

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

