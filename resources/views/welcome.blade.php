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
    <div class="d-flex justify-content-center align-items-center mt-5">
        <ul class="list-group col-md-6">

            @foreach($surveys as $survey)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <h5>{{$survey->title}}</h5>
                  <p>{{$survey->description}}</p>
                </div>
                
                <a href="{{url('/survey-form/' . $survey->id)}}" class="btn btn-secondary">Answer</a>
            </li>
            @endforeach
            
        </ul>
    </div>
</body>
</html>