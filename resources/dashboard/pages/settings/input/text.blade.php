@isset($config['key'])
    <div class="row align-items-center mb-3">
        <div class="col-lg-2">
            <label for="{{$config['key']}}" class="form-label">{{ __($config['key']) }}</label>
        </div>
        <div class="col-lg-10">
            <div class="input-group">
            <input name="{{ core()->formatKey($config['key']) }}"
                   type="{{\Illuminate\Support\Str::remove('input.', $config['key'])}}" class="form-control"
                   id="{{$config['key']}}"
                   value="{{ core()->getData(core()->formatKey($config['key']))}}"
            >
                @isset($config['with'])
                    <span class="input-group-text">{{ $config['with'] }}</span>
                @endisset
            </div>
        </div>
    </div>
@endisset
