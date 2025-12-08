<!-- Sidebar Start -->
<aside class="left-sidebar with-vertical">
    <div>
        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <!-- Sidebar scroll-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <!-- ---------------------------------- -->
                <!-- Home -->
                <!-- ---------------------------------- -->

                <li class="nav-small-cap">
                    <iconify-icon
                        icon="solar:menu-dots-bold"
                        class="nav-small-cap-icon fs-4"
                    ></iconify-icon>
                    <span class="hide-menu">Checklist</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                        <iconify-icon
                            icon="solar:screencast-2-linear"
                            class="aside-icon"
                        ></iconify-icon>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                @if (Auth::user()->role == "admin")  
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('userchecklist*') ? 'active' : '' }}" href="{{ route('userchecklist.index') }}">
                        <iconify-icon
                        icon="solar:user-circle-linear"
                        class="aside-icon"
                        ></iconify-icon>
                        <span class="hide-menu">User Checklist</span>
                    </a>
                </li>
                @endif

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('formchecklist*') ? 'active' : '' }}" href="{{ route('formchecklist.index') }}">
                        <iconify-icon
                            icon="solar:file-text-linear"
                            class="aside-icon"
                        ></iconify-icon>
                        <span class="hide-menu">Form Checklist</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('isichecklist*') ? 'active' : '' }}" href="{{ route('isichecklist.create') }}">
                        <iconify-icon
                            icon="solar:document-add-linear"
                            class="aside-icon"
                        ></iconify-icon>
                        <span class="hide-menu">Isi Checklist</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('hasilchecklist*') ? 'active' : '' }}" href="{{ route('hasilchecklist.index') }}">
                        <iconify-icon
                            icon="solar:checklist-minimalistic-linear"
                            class="aside-icon"
                        ></iconify-icon>
                        <span class="hide-menu">Hasil Checklist</span>
                    </a>
                </li>
                @if (Auth::user()->role == "admin")  
                <li class="nav-small-cap">
                    <iconify-icon
                        icon="solar:menu-dots-bold"
                        class="nav-small-cap-icon fs-4"
                    ></iconify-icon>
                    <span class="hide-menu">Master Data</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('akun*') ? 'active' : '' }}" href="{{ route('akun.index') }}">
                        <iconify-icon
                            icon="solar:user-linear"
                            class="aside-icon"
                        ></iconify-icon>
                        <span class="hide-menu">Manajemen Akun</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="">
                        <iconify-icon
                            icon="solar:file-linear"
                            class="aside-icon"
                        ></iconify-icon>
                        <span class="hide-menu">Dealer</span>
                    </a>
                </li>
                @endif
            </ul>
        </nav>

        <!-- End Sidebar scroll-->
    </div>
</aside>
<!--  Sidebar End -->
