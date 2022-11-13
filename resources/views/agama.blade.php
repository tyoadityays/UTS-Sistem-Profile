@extends('template.master')
@section('konten')
        <!-- Content Wrapper. Contains page content -->
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
                        <div class="col-8">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">CRUD Agama</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Agama</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($all_agama as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->nama_agama }}</td>
                                                    <td style="width: 150px">
                                                        <a href="{{ url("agama92/{$item->id}/edit") }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <a href="{{ url("agama92/{$item->id}/delete") }}"
                                                            class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Agama</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        @if (isset($agama))
                                            Edit Agama
                                        @else
                                            Tambah Agama
                                        @endif
                                    </h3>
                                </div>

                                <div class="card-body">
                                    @error('nama_agama')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror



                                    <form
                                        @if (isset($agama)) action="{{ url("agama92/{$agama->id}/update") }}"
                                    @else
                                        action="{{ url('agama92') }}" @endif
                                        method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Agama</label>
                                            @if (isset($agama))
                                                <input type="hidden" name="id" value="{{ $agama->id }}">
                                            @endif
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Nama Agama" name="nama_agama"
                                                @if (isset($agama)) value="{{ $agama->nama_agama }}" @endif>
                                        </div>
                                        @if (isset($agama))
                                            <button type="submit" class="btn btn-warning">Update</button>
                                        @else
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        @endif
                                    </form>
                                </div>

                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
@endsection