<!DOCTYPE html>
<html
    lang="en"
    dir="ltr"
    data-bs-theme="light"
    data-color-theme="Blue_Theme"
    data-layout="vertical"
>
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Favicon icon-->
        <link
            rel="shortcut icon"
            type="image/png"
            href="{{ asset('assets/images/logos/logo.png') }}"
        />

        <!-- Core Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

        <title>Login</title>
    </head>

    <body>
        <div id="main-wrapper" class="auth-customizer-none">
            <div
                class="position-relative overflow-hidden radial-gradient min-vh-100 w-100"
            >
                <div class="position-relative z-index-5">
                    <div class="row">
                        <div class="col-xl-5 col-xxl-4">
                            <div
                                class="authentication-login min-vh-100 bg-body row justify-content-center"
                            >
                                <div class="col-12">
                                    <a
                                        href="{{ url('/') }}"
                                        class="text-nowrap logo-img d-flex align-items-center gap-2 px-4 py-9 w-100"
                                    >
                                        <b class="logo-icon">
                                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                            <!-- Light Logo icon -->
                                            <img
                                                src="{{ asset('assets/images/logos/kemakmuran.webp') }}"
                                                alt="homepage"
                                                width="60%"
                                            />
                                        </b>
                                        <!--End Logo icon -->
                                    </a>
                                </div>
                                <div class="auth-max-width col-md-12 px-4">
                                    <h2 class="mb-1 fs-7 fw-bolder">
                                        GENBA CHECKLIST
                                    </h2>
                                    <p class="mb-7">
                                        Silahkan login terlebih dahulu
                                    </p>
                                    @error('failed')
                                    <div
                                        id="global-error" 
                                        class="alert customize-alert alert-dismissible rounded-0 alert-light-danger bg-danger-subtle text-danger fade show remove-close-icon"
                                        role="alert"
                                    >
                                        <div class="d-flex align-items-center me-3 me-md-0">
                                            <i class="ti ti-info-circle fs-5 me-2 text-danger"></i>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                    </div>
                                    @enderror
                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputEmail1"
                                                class="form-label"
                                                >Email</label
                                            >
                                            <input
                                                type="text"
                                                name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                style="border: 1px solid #d0d0d0;"
                                                id="exampleInputEmail1"
                                                aria-describedby="emailHelp"
                                            />
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputPassword1"
                                                class="form-label"
                                                >Password</label
                                            >
                                            <input
                                                type="password"
                                                name="password"
                                                autocomplete="off"
                                                class="form-control @error('password') is-invalid @enderror"
                                                style="border: 1px solid #d0d0d0;"
                                                id="exampleInputPassword1"
                                            />
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        {{-- CAPTCHA MEWS --}}
                                        <div class="mb-4">
                                            <div class="d-flex captcha">
                                                <span>{!! captcha_img() !!}</span>
                                                <button type="button" id="reload" class="btn btn-danger rounded-2 ms-1">
                                                    <i class="ti ti-reload"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="captcha" class="form-control mt-2  @error('captcha') is-invalid @enderror" placeholder="Masukkan kode Captcha" style="border: 1px solid #d0d0d0;">
                                            @error('captcha') <small class="text-danger">Kode captcha tidak sesuai</small> @enderror
                                        </div>

                                        <button type="submit" id="btn-login" class="btn btn-danger rounded-2 w-100 py-8 mb-4">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-xxl-8 d-none d-xl-block">
                            <div
                                class="d-none d-xl-flex align-items-center justify-content-center h-100"
                            >
                                <img
                                    src="{{ asset('assets/images/backgrounds/user-login.png') }}"
                                    alt=""
                                    class="img-fluid"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('reload').addEventListener('click', function () {
                        fetch('/reload-captcha')
                            .then(res => res.json())
                            .then(data => {
                                document.querySelector('.captcha span').innerHTML = data.captcha;
                            });
                    });

                    document.getElementById('btn-login').addEventListener('click', function() {
                        this.disabled = true;
                        this.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Sedang verifikasi...'; // opsional
                        this.closest('form').submit();
                    });
                </script>
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
        <!-- Import Js Files -->
        <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
        <script src="{{ asset('assets/js/theme/theme.js') }}"></script>
        <script src="{{ asset('assets/js/theme/app.min.js') }}"></script>
        <script src="{{ asset('assets/js/theme/feather.min.js') }}"></script>

        <!-- solar icons -->
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    </body>
</html>
