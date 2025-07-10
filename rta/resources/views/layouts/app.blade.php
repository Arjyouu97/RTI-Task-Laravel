<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- This will inject DataTables CSS and any other styles pushed by child views --}}
    @stack('styles')
</head>

<body>
    <div class="container py-4">
        @yield('content')
    </div>

    {{-- Bootstrap JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- CSRF Token setup for any AJAX (optional if you already set it in your scripts) --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>

    {{-- Confirmation modal JS --}}
    <script>
        function confirmDelete(taskId) {
            const confirmModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            document.getElementById('deleteForm').action = `/tasks/${taskId}`;
            confirmModal.show();
        }
    </script>

    {{-- Delete Confirmation Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Task</h5>
                    </div>
                    <div class="modal-body">Are you sure you want to delete this task?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- This will inject jQuery, DataTables JS, and any custom scripts pushed by child views --}}
    @stack('scripts')
</body>

</html>
