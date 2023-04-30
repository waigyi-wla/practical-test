<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <div class="d-flex justify-content-center mt-5">
        <div class="card col-md-4 p-2">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{$survey->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$survey->description}}</h6>
                
                <form method="POST" action="{{ url('submit_answer') }}">
                    @csrf
                    @foreach($survey->questions as $question)
                    <hr>
                    <fieldset>
                        <legend>{{$question->title}}:</legend>
                        @foreach($question->options as $option)
                        <label class="form-label">{{$option->title}}</label>
                        <input class="form-control" type="{{$option->form_setting->type}}">
                        @endforeach
                    </fieldset>
                    @endforeach

                    <button type="submit" class="btn btn-primary mt-3">Submit</button>

                </form>
                   
                
            </div>
          </div>
    </div>
</body>
</html>