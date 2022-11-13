@extends('template.master')
@section('konten')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data User</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Alamat</th>
                                                <th>Agama</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td><img src="{{ url("public/photo/{$item->foto}") }}" alt=""
                                                            width="150px" height="100px">
                                                    </td>

                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->detail->alamat }}</td>

                                                  	<td style="width: 125px">
                                                        <form action="{{ url("/update92/user/{$item->id}/agama") }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-12 mb-2">

                                                                    <select class="form-control" name="agama">
                                                                        @foreach ($agama as $religion)
                                                                            <option value="{{ $religion->id }}"
                                                                                {{ $religion->id == $item->detail->agama->id ? 'selected' : '' }}>
                                                                                {{ $religion->nama_agama }}</option>
                                                                        @endforeach
                                                                    </select>


                                                                </div>
                                                                <div class="col-12">
                                                                    <button class="btn btn-warning btn-block"
                                                                        type="submit">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>

                                                    <td>
                                                        @if ($item->is_active == 1)
                                                            <a class="btn btn-danger btn-block"
                                                                href="{{ url("/update92/user/{$item->id}/status/") }}">
                                                                Nonaktif
                                                            </a>
                                                        @else
                                                            <a class="btn btn-success btn-block"
                                                                href="{{ url("/update92/user/{$item->id}/status/") }}">
                                                                Aktifkan
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td><a class="btn btn-success btn-block"
                                                            href="{{ url("detail92/$item->id") }}">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Alamat</th>
                                                <th>Agama</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
@endsection