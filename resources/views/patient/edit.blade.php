@extends('layouts.main')
@section('content')
@section('title', 'Edit Profil')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Profil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Profil</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pasien</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('patient.update', $patient->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                <div class="card-body row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="patient_name">Nama Lengkap</label>
                            <input required name="patient_name" type="text"
                                class="form-control @error('patient_name') is-invalid @enderror"
                                value="{{ old('patient_name', $patient->patient_name)}}" id="patient_name">
                            @error('patient_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="patient_gender">Jenis Kelamin</label>
                            <select id="patient_gender" name="patient_gender"
                                class="custom-select form-control @error('patient_gender') is-invalid @enderror"
                                required>
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Laki-laki" {{ old('patient_gender', $patient->
                                    patient_gender)=='Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ old('patient_gender', $patient->
                                    patient_gender)=='Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('patient_gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="patient_born">Tempat Lahir</label>
                            <input required name="patient_born" type="text"
                                class="form-control @error('patient_born') is-invalid @enderror" id="patient_born"
                                value="{{ old('patient_born', $patient->patient_born) }}">
                            @error('patient_born')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="patient_brithday">Tanggal Lahir</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input required name="patient_brithday" type="text" id="patient_brithday"
                                    class="form-control datetimepicker-input @error('patient_brithday') is-invalid @enderror"
                                    value="{{ old('patient_brithday', $patient->patient_brithday)}}">
                                <div class="input-group-append">
                                    <label for="patient_brithday" class="input-group-text"><i
                                            class="far fa-calendar-alt"></i></label>
                                </div>
                                <input type="hidden" id="selected_date" name="selected_date">
                                @error('patient_brithday')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="patient_age">Umur</label>
                            <input required name="patient_age" type="number"
                                class="form-control @error('patient_age')is-invalid @enderror" id="patient_age"
                                value="{{ old('patient_age', $patient->patient_age) }}">
                            @error('patient_age')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="patient_address">Alamat Lengkap</label>
                            <textarea required name="patient_address"
                                class="form-control @error('patient_address')is-invalid @enderror"
                                rows="3">{{ old('patient_address', $patient->patient_address) }}</textarea>
                            @error('patient_address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="patient_status">Status Pernikahan</label>
                            <select name="patient_status"
                                class="custom-select form-control @error('patient_status') is-invalid @enderror"
                                id="patient_status" required>
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Menikah" {{ old('patient_status', $patient->patient_status)=='Menikah' ?
                                    'selected' : '' }}>Menikah
                                </option>
                                <option value="Belum Menikah" {{ old('patient_status', $patient->patient_status)=='Belum
                                    Menikah' ? 'selected' : ''
                                    }}>Belum
                                    Menikah</option>
                            </select>
                            @error('patient_status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="patient_image">Foto Pasien</label>
                            <div class="input-group">
                                <input name="patient_image" type="file"
                                    class="custom-file-input @error('patient_image')is-invalid @enderror"
                                    id="patient_image">
                                <label class="custom-file-label" for="patient_image">Browse</label>
                            </div>
                            @error('patient_image')
                            <div class="invalid-feedback input-group-append">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            @if ($patient->patient_image)
                            <img src="{{ $patient->patient_image }}" class="img-fluid col-sm-3 img-pasien">
                            @else
                            <img class="img-fluid col-sm-3 img-pasien">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="patient_is_bpjs">anggota BPJS</label>
                            <select name="patient_is_bpjs"
                                class="custom-select form-control @error('patient_is_bpjs')is-invalid @enderror"
                                id="patient_is_bpjs" required>
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="1" {{ old('patient_is_bpjs', $patient->patient_is_bpjs) == 1 ? 'selected'
                                    : ''}}>Ya</option>
                                <option value="0" {{ old('patient_is_bpjs', $patient->patient_is_bpjs) == 0 ? 'selected'
                                    : ''}}>
                                    Bukan</option>
                            </select>
                            @error('patient_is_bpjs')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        @if ($patient->patient_is_bpjs == 1)
                        <div class="form-group bpjs">
                            <label for="patient_file">foto BPJS</label>
                            <div class="input-group">
                                <input name="patient_file" type="file"
                                    class="custom-file-input @error('patient_file')is-invalid @enderror"
                                    id="patient_file">
                                <label class="custom-file-label" for="patient_file">Browse</label>
                            </div>
                            @error('patient_file')
                            <div class="invalid-feedback input-group-append">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{ $patient->patient_file}}" class="img-fluid col-sm-3 img-bpjs">
                        </div>
                        @else

                        <div class="form-group bpjs d-none">
                            <label for="patient_file">foto BPJS</label>
                            <div class="input-group">
                                <input name="patient_file" type="file"
                                    class="custom-file-input @error('patient_file')is-invalid @enderror"
                                    id="patient_file">
                                <label class="custom-file-label" for="patient_file">Browse</label>
                            </div>
                            @error('patient_file')
                            <div class="invalid-feedback input-group-append">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img class="img-fluid col-sm-3 img-bpjs">
                        </div>
                        @endif
                    </div>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

@endsection

@push('css')
<link rel="stylesheet" href="../../plugins/jquery-ui/jquery-ui.min.css">
@endpush

@push('script')
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
    // datefker
    $(function() {
        $("#patient_brithday").datepicker({
        dateFormat: "yy-mm-dd", // Change the date format as per your requirement
        onSelect: function(date) {
            $("#selected_date").val(date);
            }
        });
    });

    // preview image pasien
    $('#patient_image').change(function() {
        const image = this.files[0];
        const readerImage = new FileReader();

        readerImage.readAsDataURL(image);
        readerImage.onload = function(e) {
            $('.img-pasien').attr('src', e.target.result);
        }
    })

    // is_bpjs
    $('#patient_is_bpjs').change(function() {
        const value = $('#patient_is_bpjs').val();
        if (value == 1) {
            $('.bpjs').removeClass('d-none');   
        } 
        else if (value == 0) {
            $('.bpjs').addClass('d-none');
        }
    })

    // preview image bpjs
    $('#patient_file').change(function() {
        const file = this.files[0]
        const readfFle = new FileReader();

        readfFle.readAsDataURL(file);
        readfFle.onload = function(e) {
            $('.img-bpjs').attr('src', e.target.result);
        }
    })
</script>
@endpush