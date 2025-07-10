<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="title" class="form-control mb-2" placeholder="Title" required>
                    <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
                    <select name="status" class="form-select mb-2">
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                    <input type="date" name="due_date" class="form-control mb-2">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
