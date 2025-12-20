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
                <li class="sidebar-item" id="get-url">
                    <a class="sidebar-link {{ request()->is('/') ? 'active' : '' }} rounded-2" href="{{ url('/') }}">
                        <iconify-icon
                            icon="solar:screencast-2-linear"
                            class="aside-icon"
                        ></iconify-icon>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                @if (Auth::user()->role == "admin")  
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('userchecklist*') ? 'active' : '' }} rounded-2" href="{{ route('userchecklist.index') }}">
                        <iconify-icon
                        icon="solar:user-circle-linear"
                        class="aside-icon"
                        ></iconify-icon>
                        <span class="hide-menu">User Checklist</span>
                    </a>
                </li>
                @endif

                @if (Auth::user()->role == "auditor") 
                <!-- ---------------------------------- -->
                <!-- Form Checklist -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow rounded-2" href="javascript:void(0)" aria-expanded="false">
                        <iconify-icon icon="solar:file-text-linear" class="aside-icon"></iconify-icon>
                        <span class="hide-menu">Form Checklist</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        @foreach ($user_checklist_main as $row)
                        <li class="sidebar-item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ $row->nama }}">
                            <a href="{{ route('formchecklist.index', ['id' => $row->id]) }}" class="sidebar-link sublink {{ $row->id == session('form_checklist_id') ? 'active' : '' }}">
                                <span class="hide-menu ms-3">{{ $row->nama }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('isichecklist*') ? 'active' : '' }} rounded-2" href="{{ route('isichecklist.create') }}">
                        <iconify-icon
                            icon="solar:document-add-linear"
                            class="aside-icon"
                        ></iconify-icon>
                        <span class="hide-menu">Isi Checklist</span>
                    </a>
                </li>
                @endif

                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('hasilchecklist*') ? 'active' : '' }} rounded-2" href="{{ route('hasilchecklist.index') }}">
                        <iconify-icon
                            icon="solar:checklist-minimalistic-linear"
                            class="aside-icon"
                        ></iconify-icon>
                        <span class="hide-menu">Hasil Checklist</span>
                    </a>
                </li>

                @if (Auth::user()->role == "auditor") 
                <!-- ---------------------------------- -->
                <!-- Sumary -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow rounded-2" href="javascript:void(0)" aria-expanded="false">
                        <iconify-icon icon="solar:file-text-linear" class="aside-icon"></iconify-icon>
                        <span class="hide-menu">Summary</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        @foreach ($user_checklist_main as $row)
                        <li class="sidebar-item" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ $row->nama }}">
                            <a href="{{ route('summary.index', ['id' => $row->id]) }}" class="sidebar-link sublink ">
                                <span class="hide-menu ms-3">{{ $row->nama }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif

                @if (Auth::user()->role == "admin")  
                <li class="nav-small-cap">
                    <iconify-icon
                        icon="solar:menu-dots-bold"
                        class="nav-small-cap-icon fs-4"
                    ></iconify-icon>
                    <span class="hide-menu">Master Data</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('akun*') ? 'active' : '' }} rounded-2" href="{{ route('akun.index') }}">
                        <iconify-icon
                            icon="solar:user-linear"
                            class="aside-icon"
                        ></iconify-icon>
                        <span class="hide-menu">Manajemen Akun</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('departemen*') ? 'active' : '' }} rounded-2" href="{{ route('departemen.index') }}">
                        <iconify-icon
                            icon="solar:window-frame-linear"
                            class="aside-icon"
                        ></iconify-icon>
                        <span class="hide-menu">Departemen</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->is('dealer*') ? 'active' : '' }} rounded-2" href="{{ route('dealer.index') }}">
                        <iconify-icon
                            icon="solar:buildings-2-linear"
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
