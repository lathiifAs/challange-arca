<div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Informasi</div>
<ul class="pcoded-item pcoded-left-item">
    <li class="{{ Request::segment(2) == 'home' ? 'active' : '' }}">
        <a href={{ route('admin.home') }} class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-stats-up"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Pembayaran Bonus</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
<div class="pcoded-navigation-label" data-i18n="nav.category.forms">Data</div>
<ul class="pcoded-item pcoded-left-item">
    <li class="pcoded-hasmenu {{ Request::segment(1) == 'master' ? 'active pcoded-trigger' : '' }}">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
            <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Master Data</span>
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">

            @if (auth()->user()->type == 'admin')
                <li class="{{ Request::segment(2) == 'akun' ? 'active' : '' }}">
                    <a href="{{ route('master.akun') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Akun</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="{{ Request::segment(2) == 'user' ? 'active' : '' }}">
                    <a href="{{ route('master.user') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">User Regular</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            @endif
            <li class="{{ Request::segment(2) == 'buruh' ? 'active' : '' }}">
                <a href="{{ route('master.buruh') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Buruh</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </li>
</ul>
</div>
