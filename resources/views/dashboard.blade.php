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
                                            Welcome
                                        </h4>
                                        <p class="card-subtitle">
                                            Genba System
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if (Auth::user()->role == "auditor")
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center flex-wrap">
                                    <div>
                                        <h4 class="card-title">
                                            Checklist Saya
                                        </h4>
                                        <p class="card-subtitle mt-3">
                                            @foreach ($user_checklist as $row)
                                            <span class="badge bg-light-subtle px-3 py-2 rounded-2 text-dark">{{ $row->nama }}</span>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection