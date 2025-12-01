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
                            <h4 class="card-title">User Checklist</h4>
                            <a href="{{ route('userchecklist.create') }}" class="btn btn-outline-danger mt-2">
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
                                            <th>Auditor</th>
                                            <th>User</th>
                                            <th>Opsi</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>
                                    <tbody>
                                        @foreach ($user_checklist as $row)
                                        <tr>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->auditor }}</td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>
                                                <a href="{{ route('userchecklist.edit', $row->id) }}" class="btn btn-sm btn-dark rounded-circle"><i class="ti ti-search"></i></a>
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