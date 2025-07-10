<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>RTI Task Manager</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')
</head>

<body>
    <div class="container py-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    </script>


    <script>
        function confirmDelete(taskId) {
            const confirmModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            document.getElementById('deleteForm').action = `/tasks/${taskId}`;
            confirmModal.show();
        }
    </script>



    @stack('scripts')
</body>

</html>
