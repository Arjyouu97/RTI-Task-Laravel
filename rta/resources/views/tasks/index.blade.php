@extends('layouts.app')

@section('content')
    <h2>Task Manager</h2>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add New Task</a>

    <div class="row mb-3">
        <div class="col-md-3">
            <select id="filter-status" class="form-select">
                <option value="">-- Filter by Status --</option>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="date" id="filter-due-date" class="form-control" placeholder="Filter by Due Date" />
        </div>
        <div class="col-md-2">
            <button id="btn-filter" class="btn btn-secondary">Filter</button>
            <button id="btn-reset" class="btn btn-outline-secondary">Reset</button>
        </div>
    </div>

    <table class="table table-bordered" id="tasks-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // Setup CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $(function() {
            // Initialize DataTable with AJAX
            var table = $('#tasks-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('tasks.data') }}',
                    type: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    data: function(d) {
                        d.status = $('#filter-status').val();
                        d.due_date = $('#filter-due-date').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'due_date',
                        name: 'due_date'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
            // Filter button click
            $('#btn-filter').click(function() {
                table.draw();
            });

            // Reset button click
            $('#btn-reset').click(function() {
                $('#filter-status').val('');
                $('#filter-due-date').val('');
                table.draw();
            });
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush
