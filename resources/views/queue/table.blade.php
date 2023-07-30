<table id="example1" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Nomor Antrian</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($queues as $queue)
        <tr data-widget="expandable-table" aria-expanded="false">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $queue->patient->patient_name}}</td>
            <td>{{ $queue->queue_number}}</td>
            <td>
                <a href="#" class="badge badge-success" onclick="call({{ $queue->id}})"><i class="fas fa-phone"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>