<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coins</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('index/css/styles.css') }}">

</head>

<body>

    <button class = "button" onclick="window.location='{!! route('getCoins') !!}'">Получить монеты</button>
    <div class="container">
        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>rank</th>
                <th>symbol</th>
                <th>slug</th>
                <th>is_active</th>
                <th>first_historical_date</th>
                <th>last_historical_date</th>
                <th>platform</th>
            </tr>
            @if (isset($coins))
                @foreach ($coins as $coin)
                    <tr>
                        <td>{{ $coin->id }}</td>
                        <td>{{ $coin->name }}</td>
                        <td>{{ $coin->rank }}</td>
                        <td>{{ $coin->symbol }}</td>
                        <td>{{ $coin->slug }}</td>
                        <td>{{ $coin->is_active }}</td>
                        <td>{{ $coin->first_historical_date }}</td>
                        <td>{{ $coin->last_historical_date }}</td>
                        @if ($coin->platform !== null)
                            <td>
                                <table>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>slug</th>
                                        <th>symbol</th>
                                        <th>token_address</th>
                                    </tr>
                                    <tr>
                                        {{-- {{dd($coin->platform)}} --}}
                                        <td>{{ $coin->platform['id'] }}</td>
                                        <td>{{ $coin->platform['name'] }}</td>
                                        <td>{{ $coin->platform['slug'] }}</td>
                                        <td>{{ $coin->platform['symbol'] }}</td>
                                        <td>{{ $coin->platform['token_address'] }}</td>
                                    </tr>
                                </table>
                            </td>
                        @else
                            <td>{{ $coin->platform }}</td>
                        @endif
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
    @if (isset($coins))
        {{ $coins->links() }}
    @endif
</body>

</html>
