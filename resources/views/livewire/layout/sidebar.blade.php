<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="javascript:void(0)">Laravel Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="javascript:void(0)">LS</a>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="nav-link" href="{{ route('dashboard') }}" wire:navigate><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('credits') }}" wire:navigate><i class="fas fa-pencil-ruler"></i>
                    <span>Credits</span></a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
