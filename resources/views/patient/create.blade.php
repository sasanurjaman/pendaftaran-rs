<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name')}} | Pasien</title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../plugins/jquery-ui/jquery-ui.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="../../index3.html" class="navbar-brand">
                    <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
                </a>

            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- general form elements -->
                            <div class="card card-primary mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pasien</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('patient.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                    <div class="card-body row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="patient_name">Nama Lengkap</label>
                                                <input required name="patient_name" type="text"
                                                    class="form-control @error('patient_name') is-invalid @enderror"
                                                    value="{{ old('patient_name')}}" id="patient_name">
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
                                                    <option value="male" {{ old('patient_gender')=='male' ? 'selected'
                                                        : '' }}>Pria</option>
                                                    <option value="female" {{ old('patient_gender')=='female'
                                                        ? 'selected' : '' }}>Wanita</option>
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
                                                    class="form-control @error('patient_born') is-invalid @enderror"
                                                    id="patient_born" value="{{ old('patient_born') }}">
                                                @error('patient_born')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="patient_brithday">Tanggal Lahir</label>
                                                <div class="input-group date" id="reservationdate"
                                                    data-target-input="nearest">
                                                    <input required name="patient_brithday" type="text"
                                                        id="patient_brithday"
                                                        class="form-control datetimepicker-input @error('patient_brithday') is-invalid @enderror"
                                                        value="{{ old('patient_brithday')}}">
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
                                                    class="form-control @error('patient_age')is-invalid @enderror"
                                                    id="patient_age" value="{{ old('patient_age') }}">
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
                                                    rows="3">{{ old('patient_address') }}</textarea>
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
                                                    <option value="married" {{ old('patient_status')=='married'
                                                        ? 'selected' : '' }}>Menikah</option>
                                                    <option value="not married" {{ old('patient_status')=='not married'
                                                        ? 'selected' : '' }}>Belum Menikah</option>
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
                                                    <input required name="patient_image" type="file"
                                                        class="custom-file-input @error('patient_image')is-invalid @enderror"
                                                        id="patient_image">
                                                    <label class="custom-file-label" for="patient_image">Browse</label>
                                                </div>
                                                @error('patient_image')
                                                <div class="invalid-feedback input-group-append">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                                <img class="img-fluid col-sm-3 img-pasien">
                                            </div>
                                            <div class="form-group">
                                                <label for="patient_is_bpjs">anggota BPJS</label>
                                                <select name="patient_is_bpjs"
                                                    class="custom-select form-control @error('patient_is_bpjs')is-invalid @enderror"
                                                    id="patient_is_bpjs" required>
                                                    <option value="">-- Silahkan Pilih --</option>
                                                    <option value="1">Ya</option>
                                                    <option value="0">
                                                        Bukan</option>
                                                </select>
                                                @error('patient_is_bpjs')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
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
                                                <img class="img-fluid col-sm-3 img-bpjs">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->

                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

    <script>
        // datefiker
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
                $('#patient_file').attr("required", true);
            } 
            else if (value == 0) {
                $('.bpjs').addClass('d-none');
                $('#patient_file').attr("required", false);
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
</body>

</html>