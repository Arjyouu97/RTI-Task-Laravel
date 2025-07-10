@extends('layouts.app')

@section('content')
    <h2>RTI Task Manager</h2>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Add New Task</button>

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
            <input type="date" id="filter-due-date" class="form-control" />
        </div>
        <div class="col-md-2">
            <button id="btn-filter" class="btn btn-secondary">Filter</button>
            <button id="btn-reset" class="btn btn-outline-secondary">Reset</button>
        </div>
    </div>

    <table class="table table-bordered" id="tasks-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>

    @include('tasks.modals.create')
    @include('tasks.modals.edit')
    @include('tasks.modals.delete')
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('js/tasks.js') }}"></script>
@endpush
