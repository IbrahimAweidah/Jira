<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-800 sm:items-center">

    <form method="post" action="{{ route('saveItem') }}" accept-charset="UTF-8">
        {{ csrf_field() }}
        <div class="row">
            <div style="text-align: center" >
                <h1>Jira</h1>
                <h2>Edit Jira Ticket</h2>

                <div class="flex" style="align-items: center">
                    <input type="text" name="title" value="{{ $listItems[0]->title }}">
                    <input type="text" name="description" value="{{ $listItems[0]->description }}">
                    <button type="submit">Save ticket</button>
                </div>
        </div>
    </form>




    </div>
</div>

</body>
</html>
