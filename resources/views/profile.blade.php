@extends('template.master')
@section('konten')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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
                        <div class="col-md-4">
                            <div class="card card-primary card-outline">

                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        @if ($is_preview)
                                            <h2>Foto Profil</h2>
                                        @endif
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ url("public/photo/{$user['foto']}") }}" alt="User profile picture"
                                            style="height: 100px; width:100px;">
                                    </div>
                                    @if (!$is_preview)
                                        <p class="text-muted text-center">{{ $user['role'] }}</p>
                                        <form enctype='multipart/form-data' action="{{ url('/uploadPhotoProfil92') }}"
                                            method="POST">
                                            @csrf
                                            <div class="mt-3 form-group">
                                                <label for="exampleInputFile">Ubah Foto Profil</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="photoProfil"
                                                            class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Pilih
                                                            Foto</label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="mt-3 btn btn-warning btn-block"><b>Edit
                                                        Foto</b></button>

                                            </div>
                                        </form>
                                    @endif
                                </div>

                                <!-- /.card-body -->
                            </div>

                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        @if ($is_preview)
                                            <h2>Foto KTP</h2>
                                        @endif
                                        <img class="profile-user-img img-fluid" style="height: 100px; width:150px;"
                                            src="{{ url("public/photo/{$user['foto_ktp']}") }}" alt="User profile picture">
                                    </div>

                                    @if (!$is_preview)
                                        <form enctype='multipart/form-data' action="{{ url('/uploadPhotoKTP92') }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-group mt-3">
                                                <label for="exampleInputFile">Ubah Foto KTP</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="photoKTP"
                                                            class="custom-file-input" id="validatedCustomFile"
                                                            required>
                                                        <label class="custom-file-label"
                                                            for="validatedCustomFile">Choose
                                                            file...</label>
                                                        <div class="invalid-feedback">Example invalid custom file
                                                            feedback
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="mt-3 btn btn-warning btn-block"><b>Edit
                                                        Foto KTP</b></button>

                                            </div>
                                        </form>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#settings"
                                                data-toggle="tab">Settings</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="settings">
                                            <form class="form-horizontal" action="{{ url('/updateProfil92') }}"
                                                method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="name" class="form-control"
                                                            id="inputName" placeholder="Name"
                                                            value={{ $user['name'] }}
                                                            {{ $is_preview ? 'disabled' : '' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" class="form-control"
                                                            id="inputEmail" placeholder="Email"
                                                            value={{ $user['email'] }}
                                                            {{ $is_preview ? 'disabled' : '' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputAlamat"
                                                        class="col-sm-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="alamat" class="form-control"
                                                            id="inputText" placeholder="Alamat"
                                                            value="{{ $user['alamat'] }}"
                                                            {{ $is_preview ? 'disabled' : '' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputTempatLahir"
                                                        class="col-sm-2 col-form-label">Tempat
                                                        Lahir</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="tempat_lahir"
                                                            class="form-control" id="inputText"
                                                            placeholder="Tempat Lahir"
                                                            value="{{ $user['tempat_lahir'] }}"
                                                            {{ $is_preview ? 'disabled' : '' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputTanggalLahir"
                                                        class="col-sm-2 col-form-label">Tanggal
                                                        Lahir</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" name="tanggal_lahir"
                                                            class="form-control" id="inputText"
                                                            placeholder="Tanggal Lahir"
                                                            value="{{ $user['tanggal_lahir'] }}"
                                                            {{ $is_preview ? 'disabled' : '' }}>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputTanggalLahir"
                                                        class="col-sm-2 col-form-label">Agama</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="id_agama" id="inputAgama"
                                                            {{ $is_preview ? 'disabled' : '' }}>
                                                            @foreach ($agama as $a)
                                                                <option value="{{ $a['id'] }}"
                                                                    @if ($a['id'] == $user['id_agama']) selected @endif>
                                                                    {{ $a['nama_agama'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>



                                                @if (!$is_preview)
                                                    <div class="form-group">
                                                        <div
                                                            style="width: 100%; display:flex; justify-content:flex-end;">
                                                            <button type="submit"
                                                                class="btn btn-warning">Edit</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection