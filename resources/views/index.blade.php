<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo App</title>
    <link rel="stylesheet" href="{{ asset('main.css') }}">
  </head>
  <body>
    <!-- Make New Task -->
    <div class="todo-container">
      <div class="add-task">
        <form action="{{ route('task.store') }}" method="POST">
        @csrf
            <input type="text" name="task" class="task" placeholder="Ener Your Task Name">
            <input class="plus" type="submit" value="+">
        </form>
      </div>
      <div class="tasks-content">
        @if ($tasks->isNotEmpty())
            @foreach ($tasks as $task)
            <span class="task-box   unfinished">
                {{$task->task}}
                <form action="{{ route('task.forceDelete', ['task' => $task->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" class="delete" value="Delete">
                </form>
                <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" class="done" value="Done">
                </form>
            </span>
            @endforeach
        @else
        <span class="no-tasks-message">No Tasks To Show</span>
        @endif
      </div>
    </div>
    <div class="task-stats">
      <div class="tasks-count">
        Tasks <span>0</span>
      </div>
      <div class="tasks-completed">
        Completed <span>0</span>
      </div>
    </div>

    <!-- Finished Tasks -->
    <div class="todo-container">
    <div class="add-task">
        <input type="text" name="task" value="Completed Tasks" disabled>
      </div>
      <div class="tasks-content">
        @if ($doneTasks->isNotEmpty())
            @foreach ($doneTasks as $doneTask)
            <span class="task-box finished">
                {{$doneTask->task}}
                <form action="{{ route('task.forceDelete', ['task' => $doneTask->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" class="delete" value="Delete">
                </form>
                <form action="{{ route('task.restore', ['task' => $doneTask->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="submit" class="done" value="UnDone">
                </form>
            </span>
            @endforeach
        @else
        <span class="no-tasks-message">No Tasks Finished Yet</span>
        @endif
      </div>
    </div>
    <script src="{{ asset('main.js') }}"></script>
  </body>
</html>