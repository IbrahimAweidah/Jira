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

        <div style="text-align: center" >
            <h1>Jira</h1>

            <h2>Open Jiras</h2>

            @foreach($listItems as $listItem)
                @if($listItem->is_open == 1)
                <div class="flex" style="align-items: center">
                    <p>Title: {{ $listItem->title }}</p>
                    <p>Description: {{ $listItem->description }}</p>
                    <form method="post" action="{{ route('markClose', $listItem->id) }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <button type="submit" style="max-height: 25px; margin-left: 20px;">Mark Close</button>
                    </form>
                    <form method="post" action="{{ route('markDelete', $listItem->id) }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <button type="submit" style="max-height: 25px; margin-left: 20px;">Delete</button>
                    </form>
                </div>
                @endif

            @endforeach

            <br>


            <h2>All Jiras</h2>

            @foreach($listItems as $listItem)
                <div class="flex" style="align-items: center">
                    <p>Title: {{ $listItem->title }}</p>
                    <p>Description: {{ $listItem->description }}</p>
                    @if($listItem->is_open)
                    <p>Status: Open</p>
                    @else
                        <p>Status: Closed</p>
                    @endif

                    <form method="post" action="{{ route('markClose', $listItem->id) }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <button type="submit" style="max-height: 25px; margin-left: 20px;">Mark Close</button>
                    </form>
                    <form method="post" action="{{ route('markDelete', $listItem->id) }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <button type="submit" style="max-height: 25px; margin-left: 20px;">Delete</button>
                    </form>
                    <form method="post" action="{{ route('markOpen', $listItem->id) }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <button type="submit" style="max-height: 25px; margin-left: 20px;">Mark Open</button>
                    </form>
                </div>
            @endforeach

            <br>

            <h2>Create a new Jira Ticket</h2>
            <form method="post" action="{{ route('saveItem') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <label for="listItem">New Jira Issue</label> <br>
                <input type="text" name="title">
                <input type="text" name="description">
                <button type="submit">Create new ticket</button>
            </form>

        </div>
    </div>

    </body>
</html>
