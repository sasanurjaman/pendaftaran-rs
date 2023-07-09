@extends('layouts.main')
@section('content')
@section('title', 'Profile')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profil Pasien</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content row">
    <!-- Default box -->
    <div class="col-md-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    @if ($patient->patient_image)
                    <img class="profile-user-img img-fluid img-circle" src="{{ $patient->patient_image}}"
                        alt="{{ $patient->patient_name}}">
                    @else
                    <img class="profile-user-img img-fluid img-circle" src="/dist/img/user.png"
                        alt="{{ $patient->patient_name}}">
                    @endif
                </div>

                <h3 class="profile-username text-center">{{ $patient->name}}</h3>

                <p class="text-muted text-center">{{ $patient->role_name}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $patient->email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Nama</b> <a class="float-right">{{ $patient->patient_name}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Kelamin</b> <a class="float-right">{{ $patient->patient_gender}}</a>
                    </li>
                </ul>
                @if ($patient->patient_is_bpjs == 1)
                <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-bpjs"><b>Lihat
                        photo BPJS</b></a>
                @endif

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col -->
    <div class="col-md-8">
        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title d-inline">About Me</h3>
                @if (auth()->user()->role_id == 3)
                <a href="{{ route('patient.edit', $patient->id)}}" class="float-right"><i
                        class="fas fa-user-edit"></i></a>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fas fa-location-arrow"></i></i> Tempat Lahir</strong>
                <p class="text-muted">
                    {{ $patient->patient_born}}
                </p>
                <hr>

                <strong><i class="far fa-calendar-alt"></i> Tanggal Lahir</strong>
                <p class="text-muted">
                    {{ $patient->patient_brithday}}
                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i> Umur</strong>
                <p class="text-muted">
                    {{ $patient->patient_age}}
                </p>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                <p class="text-muted">{{ $patient->patient_address}}</p>

                <hr>

                <strong><i class="fas fa-info-square"></i> Status</strong>

                <p class="text-muted">
                    {{ $patient->patient_status}}
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i>Anggta BPJS</strong>
                @if ($patient->patient_is_bpjs == 1)
                <p class="text-muted">Ya</p>
                @else
                <p class="text-muted">Bukan</p>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->

</section>
<!-- /.content -->

<div class="modal fade" id="modal-bpjs">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Phot BPJS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <img class="card-img-top" src="{{ $patient->patient_file }}" alt="Card image cap">
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection