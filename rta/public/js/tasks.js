$(function () {
    const table = $('#tasks-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/tasks-data',
            data: function (d) {
                d.status = $('#filter-status').val();
                d.due_date = $('#filter-due-date').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'title', name: 'title' },
            { data: 'status', name: 'status' },
            { data: 'due_date', name: 'due_date' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ]
    });

    $('#btn-filter').click(() => table.draw());
    $('#btn-reset').click(() => {
        $('#filter-status').val('');
        $('#filter-due-date').val('');
        table.draw();
    });

    $('#createTaskForm').on('submit', function (e) {
        e.preventDefault();
        $.post('/tasks', $(this).serialize(), function () {
            $('#createModal').modal('hide');
            table.draw();
        }).fail(function (xhr) {
            alert('Validation failed: ' + JSON.stringify(xhr.responseJSON.errors));
        });
    });
});

function confirmDelete(id) {
    $('#deleteForm').attr('action', `/tasks/${id}`);
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

function openEditModal(id) {
    $.get(`/tasks/${id}/edit`, function (response) {
        $('#editModalBody').html(response);
        const modal = new bootstrap.Modal(document.getElementById('editModal'));
        modal.show();
    }).fail(function (xhr) {
        alert('Error loading edit form: ' + xhr.responseText);
    });
}


$(document).on('submit', '#editTaskForm', function (e) {
    e.preventDefault();
    const form = $(this);
    const url = form.attr('action');

    $.ajax({
        type: 'POST',
        url: url,
        data: form.serialize(),
        success: function (response) {
            $('#editModal').modal('hide');
            $('#tasks-table').DataTable().draw();
        },
        error: function (xhr) {
            alert('Validation failed: ' + JSON.stringify(xhr.responseJSON.errors));
        }
    });
});
