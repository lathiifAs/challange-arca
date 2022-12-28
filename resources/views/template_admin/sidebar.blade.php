<div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Informasi</div>
<ul class="pcoded-item pcoded-left-item">
    <li class="">
        <a href={{ route('admin.home') }} class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
            <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li class="{{ Request::segment(2) == 'tentang' ? 'active' : '' }}">
        <a href="{{ route('admin.tentang') }}" class="waves-effect waves-dark ">
            <span class="pcoded-micon"><i class="ti-layers-alt"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Tentang</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li class="{{ Request::segment(2) == 'kontak' ? 'active' : '' }}">
        <a href="{{ route('admin.kontak') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-id-badge"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kontak</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
    <li>
        <a href="bs-basic-table.html" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-email"></i><b>FC</b></span>
            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Pesan</span>
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
            <li class="{{ Request::segment(2) == 'akun' ? 'active' : '' }}">
                <a href="{{ route('master.akun') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Akun</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'teknologi' ? 'active' : '' }}">
                <a href="{{ route('master.teknologi') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Teknologi</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'layanan' ? 'active' : '' }}">
                <a href="{{ route('master.layanan') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Layanan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'partner' ? 'active' : '' }}">
                <a href="{{ route('master.partner') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Partner</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'portofolio' ? 'active' : '' }}">
                <a href="{{ route('master.portofolio') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Protofolio</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'kategori-artikel' ? 'active' : '' }}">
                <a  href="{{ route('master.kategori-artikel') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Kategori Artikel</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'artikel' ? 'active' : '' }}">
                <a href="color.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Artikel</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </li>
</ul>
</div>
