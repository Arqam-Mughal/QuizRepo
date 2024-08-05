<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container p-5">
        <div class="row justify-content-center mt-5">
            <div class="col-10">


    <table class="table table-dark">
        <a href="{{ route('question.create') }}" class="btn btn-warning">Add New</a>
        <thead>
          <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Option1</th>
            <th>Option2</th>
            <th>Option3</th>
            <th>Correct</th>
            <th>Edit</th>
            <th>Delete</th>

          </tr>
        </thead>
        <tbody>
            @if($questions->isNotEmpty())
            @foreach ($questions as $question)

            <tr>
              <td>{{ $question->id }}</td>
              <td>{{ $question->question }}</td>
              @foreach ($question->options as $option)

              <td>{{ $option }}</td>

              @endforeach
              <td>{{ $question->correct }}</td>

              <td><a href="{{ route('question.edit', $question->id) }}" class="btn btn-sm btn-success">Edit</a></td>
              <form action="{{ route('question.destroy', $question->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this question?');">
                @csrf
                @method('DELETE')
                <td><button type="submit" class="btn btn-sm btn-danger">Delete</button></td>
            </form>


            </tr>
            @endforeach
            @endif

        </tbody>
      </table>
            </div>
            </div>
        </div>
</body>
</html>
