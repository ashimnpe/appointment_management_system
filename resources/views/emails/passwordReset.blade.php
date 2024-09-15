<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        .card {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
            width: 25%;
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Password Reset</div>
        </div>
        <div class="card-body">
            <p>Dear {{ $doctor->user->name }},</p>
            Email: <b>{{ $doctor->email }}</b>
            <p>
                Your new password is: <b> {{ $doctor->password }}</b> <br>
                Please change your password when received. <br>
                Thank you !!!
            </p>
        </div>
    </div>

</body>

</html>
