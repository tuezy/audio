<div class="row mb-3">
    <div class="col-lg-2">
        <label for="{{$key}}" class="form-check-label fs-14">{{ __($key) }}</label>
    </div>
    <div class="col-auto">
        <div class="form-check form-switch">
            <input name="{{ core()->formatKey($config['key']) }}"
                   class="form-check-input"
                   type="checkbox"
                   role="switch"
                   id="{{$key}}"
                {{ core()->getData(core()->formatKey($key)) == false ? '' : 'checked' }}>
        </div>
    </div>
</div>

