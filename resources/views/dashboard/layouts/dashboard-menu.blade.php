<li class="menu-title"><span>@lang('translation.menu')</span></li>
<x-dashboard.menu id="dashboard.index">
    <a class="nav-link menu-link" href="{{ route("dashboard.index") }}">
        <i class="ri-honour-line"></i> <span>@lang('dashboard.title')</span>
    </a>
</x-dashboard.menu>

<x-dashboard.menu id="dashboard.index">
    <a class="nav-link menu-link" href="{{ route("dashboard.roles.index") }}">
        <i class="ri-honour-line"></i> <span>@lang('dashboard.roles.title')</span>
    </a>
</x-dashboard.menu>
<x-dashboard.menu id="dashboard.index">
    <a class="nav-link menu-link" href="{{ route("dashboard.settings.index") }}">
        <i class="ri-honour-line"></i> <span>@lang('dashboard.settings.title')</span>
    </a>
</x-dashboard.menu>
