@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Add New Task Button -->
    <div class="row mb-4">
        <div class="col text-left">
            <button class="btn btn-primary shadow-sm" id="addTaskBtn" data-toggle="modal" data-target="#taskModal">
                <i class="fa fa-plus mr-2"></i> Add New Task
            </button>
        </div>
    </div>

    <!-- Task Table Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Task Management</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Task No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ Str::limit($task->description, 50) }}</td>
                            <td class="text-center">
                                <span class="badge {{ $task->status == 'completed' ? 'badge-success' : 'badge-warning' }}">
                                    {{ ucfirst($task->status) }}
                                </span>
                            </td>
                            <td class="text-center">{{ $task->created_at->format('d M, Y') }}</td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm edit-btn shadow-sm" data-id="{{ $task->id }}">
                                    <i class="fa fa-pencil-alt"></i> Edit
                                </button>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                                        <i class="fa fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Task Modal -->
    <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="taskForm" action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <input type="hidden" id="taskMethod" name="_method" value="POST">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="taskModalLabel">Add New Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="taskTitle">Title</label>
                            <input type="text" class="form-control" id="taskTitle" name="title" placeholder="TaskTittle" required>
                        </div>
                        <div class="form-group">
                            <label for="taskDescription">Description</label>
                            <textarea class="form-control" id="taskDescription" name="description" placeholder="TaskDescription" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="taskStatus">Status</label>
                            <select class="form-control" id="taskStatus" name="status" required>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="taskDate">Date</label>
                            <input type="date" class="form-control" id="taskDate" name="date" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        // Add Task button click event
        $('#addTaskBtn').click(function() {
            $('#taskForm')[0].reset();
            $('#taskModalLabel').text('Add New Task');
            $('#taskMethod').val('POST');
        });

        // Edit Task button click event
        $('.edit-btn').click(function() {
            var taskId = $(this).data('id');
            $.ajax({
                url: '/tasks/' + taskId + '/edit',
                method: 'GET',
                success: function(data) {
                    $('#taskModalLabel').text('Edit Task');
                    $('#taskTitle').val(data.title);
                    $('#taskDescription').val(data.description);
                    $('#taskStatus').val(data.status);
                    $('#taskDate').val(data.created_at.split(' ')[0]); // Assuming created_at contains the date
                    $('#taskMethod').val('PUT');
                    $('#taskForm').attr('action', '/tasks/' + taskId);
                    $('#taskModal').modal('show');
                }
            });
        });
    });
</script>
@endsection
@endsection
