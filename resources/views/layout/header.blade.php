<!--  Header Start -->
<header class="topbar bg-danger">
    <div class="with-vertical">
        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Header -->
        <!-- ---------------------------------- -->
        <nav class="navbar navbar-expand-lg px-lg-0 px-3 py-0">
            <div class="d-none d-lg-block">
                <div
                    class="brand-logo d-flex align-items-center justify-content-between"
                >
                    <a
                        href="{{ url('/') }}"
                        class="text-nowrap logo-img d-flex align-items-center gap-2 text-white"
                    >
                        <b class="logo-icon">GENBA </b>v1.0
                        <!--End Logo icon -->
                    </a>
                </div>
            </div>

            <ul class="navbar-nav gap-2">
                <li class="nav-item nav-icon-hover-bg rounded-circle">
                    <a
                        class="nav-link nav-icon-hover sidebartoggler"
                        id="headerCollapse"
                        href="javascript:void(0)"
                    >
                        <iconify-icon icon="solar:list-bold"></iconify-icon>
                    </a>
                </li>
            </ul>

            <div class="d-block d-lg-none">
                <div
                    class="brand-logo d-flex align-items-center justify-content-between"
                >
                    <a
                        href="../main/index.html"
                        class="text-nowrap logo-img d-flex align-items-center gap-2"
                    >
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Light Logo icon -->
                            <img
                                src="{{ asset('assets/images/logos/logo-light-icon.svg') }}"
                                alt="homepage"
                                class=""
                            />
                        </b>
                        <!--End Logo icon -->
                    </a>
                </div>
            </div>
            <ul
                class="navbar-nav flex-row gap-2 align-items-center justify-content-center d-flex d-lg-none"
            >
                <li class="nav-item dropdown nav-icon-hover-bg rounded-circle">
                    <a
                        class="navbar-toggler nav-link text-white nav-icon-hover border-0"
                        href="javascript:void(0)"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="">
                            <i class="ti ti-dots fs-7"></i>
                        </span>
                    </a>
                </li>
            </ul>
            <div
                class="collapse navbar-collapse justify-content-end"
                id="navbarNav"
            >
                <div
                    class="d-flex align-items-center justify-content-between py-2 py-lg-0"
                >
                    <ul
                        class="navbar-nav gap-2 flex-row ms-auto align-items-center justify-content-center"
                    >
                        <!-- ------------------------------- -->
                        <!-- start profile Dropdown -->
                        <!-- ------------------------------- -->
                        <li class="nav-item hover-dd dropdown">
                            <a
                                class="nav-link nav-icon-hover"
                                href="javascript:void(0)"
                                id="drop2"
                                aria-expanded="false"
                            >
                                <img
                                    src="{{ asset('assets/images/profile/user-1.jpg') }}"
                                    alt="user"
                                    class="profile-pic rounded-circle round-30"
                                />
                            </a>
                            <div class="dropdown-menu pt-0 content-dd overflow-hidden pt-0 dropdown-menu-end user-dd" aria-labelledby="drop2">
                                <div class="profile-dropdown position-relative" data-simplebar>
                                    <div class="py-3 border-bottom">
                                        <div class="d-flex align-items-center px-3">
                                            <img src="{{ asset('assets/images/profile/user-1.jpg') }}" class="rounded-circle round-50" alt=""/>
                                            <div class="ms-3">
                                                <h5 class="mb-1 fs-4">
                                                    {{ Auth::user()->name }}
                                                </h5>
                                                <p class="mb-0 fs-2 d-flex align-items-center text-muted">
                                                    {{ Auth::user()->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-body pb-3">
                                        <div class="px-3">
                                            <div class="h6 mb-0 dropdown-item py-8 px-3 rounded-2 link">
                                                <a href="{{ route('profil.password') }}" class="d-flex align-items-center">
                                                    <i class="ti ti-lock me-2 fs-7"></i>
                                                    Ubah Password
                                                </a>
                                            </div>
                                            <div class="h6 mb-0 dropdown-item py-8 px-3 rounded-2 link">
                                            @if(Auth::check())
                                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="border-0 bg-transparent p-0 d-flex align-items-center text-danger">
                                                        <i class="ti ti-power me-2 fs-7"></i>
                                                        Logout
                                                    </button>
                                                </form>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- ------------------------------- -->
                        <!-- end profile Dropdown -->
                        <!-- ------------------------------- -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ---------------------------------- -->
        <!-- End Vertical Layout Header -->
        <!-- ---------------------------------- -->
    </div>
</header>
<!--  Header End -->
