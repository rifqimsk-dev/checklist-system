@extends('layout.main')
@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <!-- -------------------------------------------------------------- -->
        <!-- Breadcrumb -->
        <!-- -------------------------------------------------------------- -->
        <div
            class="font-weight-medium shadow-none position-relative overflow-hidden mb-7"
        >
            <div class="card-body px-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-medium mb-0">Dashboard</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a
                                        class="text-muted text-decoration-none"
                                        href=""
                                        >Home
                                    </a>
                                </li>
                                <li
                                    class="breadcrumb-item text-muted"
                                    aria-current="page"
                                >
                                    Dashboard
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- -------------------------------------------------------------- -->
        <!-- Breadcrumb End -->
        <!-- -------------------------------------------------------------- -->
        <!-- Row -->
        <div class="row">
            <!-- Sales Overview -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div
                                    class="d-flex align-items-center flex-wrap"
                                >
                                    <div>
                                        <h4 class="card-title">
                                            Sales Overview
                                        </h4>
                                        <p class="card-subtitle">
                                            Ample Admin Vs Pixel Admin
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection