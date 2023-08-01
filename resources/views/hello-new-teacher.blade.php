<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome To Management Education</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-dark h-100">
    <div class="jumbotron bg-dark text-light">
        <h1 class="display-4 text-center">Welcome To Management Education</h1>
        <br>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-8">
                <p>You have registered for a teacher account !</p>
                <p>Your CV(Curriculum Vitae) has been sent to the system !</p>
                <p class="font-italic">Please wait for our email to confirm that you have become a teacher of our system !</p>
                <a class="btn btn-light btn-lg" href="{{route('welcome')}}" role="button">Welcome To Management Education</a>
            </div>
        </div>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>