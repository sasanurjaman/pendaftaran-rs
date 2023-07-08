@extends('layouts.main')
@section('content')
@section('title', 'Tambah Dokter')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Dkter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashbard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('doctor.index')}}">Daftar Dokter</a></li>
                    <li class="breadcrumb-item active">Tambah Dokter</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content row">
    <!-- Default box -->
    <div class="card card-primary col-md-10">
        <div class="card-header">
            <h3 class="card-title">Form user Dokter</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('doctor.store')}}">
            @csrf
            <div class="card-body">
                <input type="hidden" name="role_id" value="2">
                <div class="form-group">
                    <label for="name">Username</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name">
                    @error('name')
                    <div class="invalid-feedback input-group-append">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        id="email">
                    @error('email')
                    <div class="invalid-feedback input-group-append">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        id="password">
                    @error('password')
                    <div class="invalid-feedback input-group-append">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

@endsection