@extends('layout.main')
@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Sales Overview -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="" class="btn p-0 rounded-circle">
                                <i class="ti ti-arrow-left fs-8 me-4"></i>
                            </a>
                            Tambah Data Karyawan Baru
                        </h4>
                        <form class="floating-labels mt-4 pt-2">
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama_lengkap"
                                />
                                <span class="bar"></span>
                                <label for="nama_lengkap">Nama Lengkap</label>
                            </div>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                />
                                <span class="bar"></span>
                                <label for="">NIK</label>
                            </div>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                />
                                <span class="bar"></span>
                                <label for="">Email</label>
                            </div>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                />
                                <span class="bar"></span>
                                <label for="">Telepon</label>
                            </div>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                />
                                <span class="bar"></span>
                                <label for="">Alamat</label>
                            </div>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                />
                                <span class="bar"></span>
                                <label for="">Status</label>
                            </div>
                            <div class="form-group mb-4">
                                <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                />
                                <span class="bar"></span>
                                <label for="">Keterangan</label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger">
                                    <i class="ti ti-send me-2"></i>Simpan
                                </button>
                                <button class="btn btn-light">
                                    <i class="ti ti-arrow-back-up fs-4 me-2"></i
                                    >Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection