@extends('layout.main')
@section('content')
    
<div class="body-wrapper">
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Sales Overview -->
            <div class="col-lg-12">
                <div class="datatables">
                    <!-- start Zero Configuration -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Manajemen Akun</h4>
                            <a href="{{ route('akun.create') }}" class="btn btn-outline-danger rounded-2 mt-2">
                                <i class="ti ti-plus"></i> Data Baru
                            </a>
                            <div class="table-responsive mt-3">
                                <table
                                    id="zero_config"
                                    class="table text-nowrap table-hover align-middle"
                                >
                                    <thead>
                                        <!-- start row -->
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Role</th>
                                            <th>Departemen</th>
                                            <th>Opsi</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>
                                    <tbody>
                                        @foreach ($akun as $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->telepon }}</td>
                                            <td>{{ $row->role }}</td>
                                            <td>{{ $row->departemen->nama }}</td>
                                            <td>
                                                <a href="{{ route('akun.edit', $row->id) }}" class="btn btn-sm btn-dark rounded-circle"><i class="ti ti-search"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end Zero Configuration -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection