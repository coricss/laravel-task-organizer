<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Organizer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="main">
        <div class="container">
            <form class="p-3" method="POST" action="{{route('todolist.store')}}">
                @csrf
                <div class="title text-center">
                    <h3 class="text-primary fw-bold">Task Organizer</h3>
                </div>
                <div class="form-group d-flex gap-2">
                    <input type="text" class="form-control" id="task" placeholder="Enter task" name="title" maxlength="20" required>
                    <button type="submit" class="btn btn-primary">
                        <i class='bx bx-plus'></i>
                    </button>
                </div>
            </form>
            @if ($todos->count() > 0)
                @foreach ($todos as $todo)
                    <div class="mt-3 p-3 rounded-3 task-item bg-light border-top border-primary border-5 d-flex justify-content-between align-items-center">
                        <div class="task-info d-flex align-items-center gap-3">
                            <div class="task-done">
                                <form class="task-done-form" action="{{route('todolist.update_done', $todo->id)}}" method="POST">
                                    @csrf
                                    <input type="checkbox" name="is_done" class="form-check-input task-checkbox" onclick="this.form.submit();" {{$todo->is_done == 1 ? 'checked' : ''}}>
                                </form>
                            </div>
                            <div>
                                <div class="task-title">
                                    <h5 class="{{$todo->is_done == 1 ? 'text-danger' : 'text-primary'}} {{$todo->is_done == 1 ? 'text-decoration-line-through' : ''}} fw-bold m-0">{{$todo->title}}</h5>
                                </div>
                                <div class="task-date">
                                    <small class="text-muted">{{$todo->created_at->format('m/d/y - h:i:a')}}</small>
                                </div>
                            </div>
                        </div>
                        <div class="task-action d-flex gap-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$todo->id}}">
                                <i class='bx bx-edit'></i>
                            </button>
                            <a href="{{route('todolist.delete', $todo->id)}}" type="button" class="btn btn-danger">
                                <i class='bx bx-trash'></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <img src="{{asset('assets/images/no_tasks.png')}}" alt="No Task" class="img-fluid" width="450px">
            @endif
        </div>
    </div>
    @foreach ($todos as $todo)
        <div class="modal fade" id="modal{{$todo->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
              <div class="modal-content">
                <form action="{{route('todolist.update_title', $todo->id)}}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="modalTitleId">Edit task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group d-flex gap-2">
                                <input type="text" class="form-control" id="task" placeholder="Enter task" name="title" maxlength="20" value="{{$todo->title}}" autofocus required>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
    @endforeach

    <script src="{{asset('js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
