<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>URL</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
          integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>
<body class="antialiased">
<div class="card-body">
    <form class="needs-validation" method="POST" action="{{ route('encode') }}" novalidate>
        @csrf
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="link">Paste Link Below</label>
                <input name="link" type="text" class="form-control" id="link" required>
                <div class="invalid-feedback">
                    Please provide link.
                </div>
            </div>
        </div>
        <button id="surveyButton" class="btn btn-primary" type="submit">Shorten Link</button>
    </form>
    <script src="{{ asset('js/form.js') }}" defer></script>
</div>
</body>
</html>
