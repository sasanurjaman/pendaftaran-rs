@extends('layouts.main')
@section('content')
@section('title', 'Jadwal Doktor')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>Jadwal Doktor</h1> --}}
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Jadwal Doktor</li>
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
            <h4 class="d-inline">Jadwal Doktor</h4>

            @if (auth()->user()->role_id == 2)
            <div class="card-tools">
                <button class="btn btn-primary modal-create"><i class="fas fa-plus"></i> Tambah Jadwal</button>
            </div>
            @endif
        </div>
        @if (auth()->user()->role_id == 2)
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Waktu Kegiatan</th>
                        @if (auth()->user()->role_id == 2)
                        <th>#</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $schedule->schedule_name}}</td>
                        <td>{{ $schedule->schedule_date}}</td>
                        @if (auth()->user()->role_id == 2)
                        <td>
                            <button class="badge badge-warning border-0" data-toggle="tooltip" data-placement="top"
                                title="Edit"
                                onclick="edit({{ $doctor->id}}, '{{$schedule->schedule_name}}', '{{ $schedule->schedule_date}}')"><i
                                    class="fas fa-edit"></i></button>
                            <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('apakah yakin hapus?');"
                                    class="badge badge-danger border-0" data-toggle="tooltip" data-placement="top"
                                    title="delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Nama Doktor</th>
                        <th>Spesialisasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>
                            <a href="{{ route('doctor.show', $doctor->id)}}" class="badge badge-info"><i
                                    class="far fa-eye"></i></a>
                        </td>
                        <td>
                            @if ($doctor->doctor_image)
                            <img height="40px" class="img-circle elevation-2"
                                src="{{ asset('storage/' . $doctor->doctor_image)}}" alt="{{ $doctor->doctor_name}}">
                            @else
                            <img height="40px" class="img-circle elevation-2" src="{{ asset('/dist/img/user.png') }}"
                                alt="{{ $doctor->doctor_name}}">
                            @endif
                        </td>
                        <td>{{ $doctor->doctor_name}}</td>
                        <td>{{ $doctor->doctor_gender}}</td>
                        <td>{{ $doctor->doctor_specialization}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

@if (auth()->user()->role_id == 2)
<div class="modal fade" id="modal-schedule">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" class="modal-form">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="_method" class="method">
                    <input type="hidden" value="{{ $doctor->id }}" name="doctor_id">
                    <div class="form-group">
                        <label for="schedule_name">Nama Kegiatan</label>
                        <input required type="text" name="schedule_name" id="schedule_name"
                            class="form-control @error('schedule_name') is-invalid @enderror">
                        @error('schedule_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="schedule_date">Waktu Kegiatan</label>
                        <div class="input-group">
                            <input required name="schedule_date" type="text" id="schedule_date"
                                class="form-control @error('schedule_date') is-invalid @enderror"
                                value="{{ old('schedule_date')}}" autocomplete="off">
                            <label for="schedule_date" class="input-group-text"><i
                                    class="far fa-calendar-alt"></i></label>
                        </div>
                        @error('schedule_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary btn-modal"></button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endif
<!-- /.modal -->

@endsection

@push('css')
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
@endpush

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
</script>

<script>
    // datetimeficker
    jQuery('#schedule_date').datetimepicker({
        startDate: "{{ now() }}"
    });

    // show modal-create
    $('.modal-create').click(function() {
        $('.modal-form').attr('action', "{{ route('schedule.store')}}");
        $('.method').val('POST');
        $('.modal-title').html('Tambah Jadwal');
        $('.btn-modal').html('Simpan Jadwal');
        $('#schedule_name').val('');
        $('#schedule_date').val('');
        $('#modal-schedule').modal('show');
    })

    // show modal-edit
    function edit(id, schedule_name, schedule_date) {
        $('.modal-form').attr('action', '/schedule/' + id);
        $('.method').val('PUT');
        $('.modal-title').html('Edit Jadwal');
        $('.btn-modal').html('Edit Jadwal');
        $('#schedule_name').val(schedule_name);
        $('#schedule_date').val(schedule_date);
        $('#modal-schedule').modal('show');
    }
</script>
@endpush