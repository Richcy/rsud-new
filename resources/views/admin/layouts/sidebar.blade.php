<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="#"><span class="brand-logo">
                    <h2 class="brand-text fw-bolder" style="color: #089544 !important;">RSUD CIMACAN</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header"><span data-i18n="Forms &amp; Tables">Beranda</span><i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.slider.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.slider.index') }}">
                    <i data-feather='image'></i>
                    <span class="menu-title text-truncate" data-i18n="Slider">Slider</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.running-text.index') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.running-text.index') }}">
                    <i data-feather='list'></i>
                    <span class="menu-title text-truncate" data-i18n="Running Text">Running Text</span>
                </a>
            </li>
            <li class="navigation-header"><span data-i18n="Forms &amp; Tables">Konten</span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="bi bi-hospital" style="padding-top: 0; margin-top: -15px;"></i><span class="menu-title text-truncate" data-i18n="Invoice">Tentang</span></a>
                <ul class="menu-content">
                    <li class="ps-1 navigation-header"><span data-i18n="Forms &amp; Tables" style="font-size: 80% !important;">TENTANG MODUL RUMAH SAKIT</span><i data-feather="more-horizontal"></i>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Profil</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Sambutan Direktur</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Sambutan Organisasi</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Denah</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Penilaian Mutu</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Makluman Pelayanan</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Standar Pelayanan</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Hak Dan Kewajiban</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="bi bi-briefcase" style="padding-top: 0; margin-top: -15px;"></i><span class="menu-title text-truncate" data-i18n="Invoice">Pelayanan</span></a>
                <ul class="menu-content">
                    <li class="ps-1 navigation-header"><span data-i18n="Forms &amp; Tables" style="font-size: 80% !important;">MODUL PELAYANAN  </span><i data-feather="more-horizontal"></i>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Layanan Unggulan</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Instalasi Rawat Jalan</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Instalasi Rawat Inap</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Instalasi Gawat Darurat</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Labotarium</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Radiology</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Hemodialis</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Farmasi</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Rehab Medik</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Ambulans</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="bi bi-person" style="padding-top: 0; margin-top: -15px; transform: scale(1.2)"></i><span class="menu-title text-truncate" data-i18n="Dokter">Dokter</span></a>
                <ul class="menu-content">
                    <li class="ps-1 navigation-header"><span data-i18n="Forms &amp; Tables" style="font-size: 80% !important;">MODUL DOKTER</span><i data-feather="more-horizontal"></i>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Bidang Dokter</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Dokter</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Dokter Unggulan</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Jadwal Dokter</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="bi bi-calendar-check" style="padding-top: 0; margin-top: -15px;"></i><span class="menu-title text-truncate" data-i18n="Dokter">Acara</span></a>
                <ul class="menu-content">
                    <li class="ps-1 navigation-header"><span data-i18n="Forms &amp; Tables" style="font-size: 80% !important;">MODUL ACARA</span><i data-feather="more-horizontal"></i>
                    </li>
                    <li class="{{ request()->routeIs('admin.category-event.*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.category-event.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Kategori Acara</span></a>
                    </li>
                    <li class="{{ request()->routeIs('admin.event.*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('admin.event.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Acara</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="bi bi-newspaper" style="padding-top: 0; margin-top: -15px;"></i><span class="menu-title text-truncate" data-i18n="Dokter">Artikel</span></a>
                <ul class="menu-content">
                    <li class="ps-1 navigation-header"><span data-i18n="Forms &amp; Tables" style="font-size: 80% !important;">MODUL ARTIKEL</span><i data-feather="more-horizontal"></i>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Kategori Artikel</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Artikel</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Cimanews</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.career.*') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('admin.career.index') }}">
                    <i class="bi bi-binoculars" style="padding-top: 0; margin-top: -15px;"></i>
                    <span class="menu-title text-truncate" data-i18n="Karir">Karir</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i class="bi bi-person-gear" style="padding-top: 0; margin-top: -15px; transform: scale(1.2)"></i>
                    <span class="menu-title text-truncate" data-i18n="Karir">Kelola Admin</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
