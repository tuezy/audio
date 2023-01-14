@if(\Illuminate\Support\Facades\Auth::user()->checkAccess($id))
<li class="nav-item">
    {{ $slot }}
</li>
@endif
