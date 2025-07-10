<a href="{{ route('tasks.edit', $row->id) }}" class="btn btn-sm btn-warning">Edit</a>

<form method="POST" action="{{ route('tasks.destroy', $row->id) }}" class="d-inline"
    onsubmit="return confirm('Delete this task?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>
