<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Laravel</title>
    </head>
    <body>
        <div class="container p-5">
            <div class="row justify-content-center mt-5">
                <div class="col-6 bg-warning p-5">

        <form action="{{ route('question.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="question">Question</label>

              <textarea name="question" class="form-control" cols="30" rows="3"  placeholder="Enter question"></textarea>

            </div>

            <div class="form-group">
            <label for="option1">Option 1</label>
              <textarea name="options[]" class="form-control" cols="30" rows="2"  placeholder="Enter Option1"></textarea>
            </div>

            <div class="form-group">
              <label for="option2">Option 2</label>
              <textarea name="options[]" class="form-control" cols="30" rows="2"  placeholder="Enter Option2"></textarea>
            </div>

            <div class="form-group">
              <label for="option3">Option 3</label>
              <textarea name="options[]" class="form-control" cols="30" rows="2"  placeholder="Enter Option3"></textarea>
            </div>

            <div class="form-group">
              <label for="correct">Correct Answer</label>
              <textarea name="correct" class="form-control" cols="30" rows="2"  placeholder="Enter Correct Answer"></textarea>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
</div>
    </body>
</html>

