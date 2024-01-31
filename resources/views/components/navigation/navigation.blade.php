<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="javascript:void(0)" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                            class="fas fa-bars"></i></a>
            </li>
            <li>
                <a href="javascript:void(0)" data-toggle="search" class="nav-link nav-link-lg d-sm-none">
                    <i class="fas fa-search"></i>
                </a>
            </li>
        </ul>
        <x-navigation.search-navigation/>
    </form>
    <ul class="navbar-nav navbar-right">
        <x-navigation.mail-navigation/>
        <x-navigation.notification-navigation/>
        <livewire:layout.user-navigation/>
    </ul>
</nav>
