<!DOCTYPE html>
<html>
<head>
    <title>Data Toko Buku</title>
</head>
<body>
    <h1>Daftar Genre</h1>
    <ul>
        @foreach($genres as $g)
            <li><strong>{{ $g['name'] }}</strong>: {{ $g['description'] }}</li>
        @endforeach
    </ul>

    <h1>Daftar Penulis (Author)</h1>
    <ul>
        @foreach($authors as $a)
            <li>{{ $a['name'] }} - ({{ $a['country'] }})</li>
        @endforeach
    </ul>
</body>
</html>