<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>

<body>
    </br>
    <div class="container">
        <!-- JS-Grid -->
        <div id="jsGrid"></div>
    </div>

    <div class="container">
        <div class="col-md-offset-2 col-md-8">
            <div class="row">
                <h1>Todo List</h1>
            </div>

            {{-- display success message --}} @if (Session::has('success'))
            <div class="alert alert-success">
                <strong>Success:</strong> {{ Session::get('success') }}
            </div>
            @endif {{-- display error message --}} @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Error:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="row" style='margin-top: 10px; margin-bottom: 10px;'>
                <form action="{{ route('tasks.store') }}" method='POST'>
                    {{ csrf_field() }}

                    <div class="col-md-9">
                        <input type="text" name='newTaskName' class='form-control'>
                    </div>

                    <div class="col-md-3">
                        <input type="submit" class='btn btn-primary btn-block' value='Add Task'>
                    </div>
                </form>
            </div>

            {{-- display stored tasks --}} @if (count($storedTasks) > 0)
            <table class="table">
                <thead>
                    <th>Task #</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>

                <tbody>
                    @foreach ($storedTasks as $storedTask)
                    <tr>
                        <th>{{ $storedTask->id }}</th>
                        <td>{{ $storedTask->name }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', ['tasks'=>$storedTask->id]) }}" class='btn btn-default'>Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('tasks.destroy', ['tasks'=>$storedTask->id]) }}" method='POST'>
                                {{ csrf_field() }}
                                <input type="hidden" name='_method' value='DELETE'>

                                <input type="submit" class='btn btn-danger' value='Delete'>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

        </div>
    </div>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>

    <script type="text/javascript">
        var storedTasks = [
                @foreach($storedTasks as $task) 
                {
                    Name: "{{ $task->name }}",
                    Revision_Status: "{{ $task->revision_status }}",
                    Created_At: "{{ $task->created_at }}",
                    Updated_At: "{{ $task->updated_at }}"
                },
                @endforeach
            ];
        // var res = {!! json_encode($storedTasks) !!};
        console.log("res: " + JSON.stringify(storedTasks[1]));
    </script>

    <script src="{{ asset('js/jsgrid_table.js') }}"></script>
</body>

</html>
