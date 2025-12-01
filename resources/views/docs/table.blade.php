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
                            <h4 class="card-title">Data Karyawan Honda</h4>
                            <a
                                href="form.html"
                                class="btn btn-outline-danger mt-2"
                            >
                                <i class="ti ti-plus"></i> Data Baru
                            </a>
                            <a href="" class="btn btn-light mt-2">
                                <i class="ti ti-database-export"></i> Export
                            </a>
                            <a href="" class="btn btn-light mt-2">
                                <i class="ti ti-database-import"></i> Import
                            </a>
                            <a href="" class="btn btn-light mt-2">
                                <i class="ti ti-filter"></i> Filter
                            </a>
                            <div class="table-responsive mt-3">
                                <table
                                    id="zero_config"
                                    class="table text-nowrap align-middle"
                                >
                                    <thead>
                                        <!-- start row -->
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                        <!-- end row -->
                                    </thead>
                                    <tbody>
                                        <!-- start row -->
                                        <tr>
                                            <td>Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <!-- end row -->
                                        <!-- start row -->
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <!-- end row -->
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