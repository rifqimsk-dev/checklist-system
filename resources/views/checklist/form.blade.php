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
                            <h4 class="card-title">Form Checklist - {{ $user_checklist->nama }}</h4>
                            <a href="" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-outline-danger rounded-2 mt-2">
                                <i class="ti ti-plus"></i> Tambah Pertanyaan
                            </a>

                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>

                            <div class="table-responsive mt-3">
                                <table
                                    id="zero_config"
                                    class="table table-hover align-middle"
                                >
                                    <thead>
                                        <!-- start row -->
                                        <tr>
                                            <th width="1">No</th>
                                            <th>Pertanyaan</th>
                                            <th>Opsi</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>
                                    <tbody>
                                        @foreach ($form_checklist as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{!! $row->pertanyaan !!}</td>
                                            <td>
                                                <a href="" data-bs-toggle="modal" data-bs-target="#ubah{{ $row->id }}" class="btn btn-sm btn-light rounded-circle"><i class="ti ti-search"></i></a>

                                                <div class="modal fade" id="ubah{{ $row->id }}" tabindex="-1" aria-labelledby="ubah" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header d-flex align-items-center">
                                                                <h4 class="modal-title" id="myModalLabel">
                                                                    Ubah Pertanyaan
                                                                </h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('formchecklist.update', $row->id) }}" method="POST" class="floating-labels">
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input id="content{{ $loop->iteration }}" type="hidden" name="pertanyaan">
                                                                    <trix-editor input="content{{ $loop->iteration }}">{!! $row->pertanyaan !!}</trix-editor>
                                                                    @error('pertanyaan')
                                                                        <span class="invalid-feedback">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-danger rounded-2">
                                                                        <i class="ti ti-check"></i> 
                                                                        Simpan
                                                                    </button>
                                                                </form>
                                                                <form action="{{ route('formchecklist.destroy', $row->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn bg-danger-subtle rounded-2 text-danger">
                                                                        <i class="ti ti-trash"></i> 
                                                                        Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>

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

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Tambah Pertanyaan Baru
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('formchecklist.store') }}" method="POST" class="floating-labels">
                <div class="modal-body">
                    @csrf
                    <input id="content" type="hidden" name="pertanyaan">
                    <trix-editor input="content"></trix-editor>
                    @error('pertanyaan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger rounded-2" id="btn-save">
                        <i class="ti ti-check"></i> 
                        Simpan
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    document.getElementById('btn-save').addEventListener('click', function() {
        this.disabled = true;
        this.innerHTML = 'Saving...'; // opsional
        this.closest('form').submit();
    });

</script>

@endsection