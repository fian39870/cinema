<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" href="{{asset('assetsClient/css/styleTicket.css')}}">
</head>

<body>
    @foreach($ticket as $tickets)
    <div class="cardWrap">
        <div class="card cardLeft">
            <h1>Cinema <span>Cinema</span></h1>
            <div class="title">
                <h2>{{$tickets->movie->title}}</h2>
                <span>Film</span>
            </div>
            <div class="name">
                <h2>{{$tickets->user->name}}</h2>
                <span>Nama</span>
            </div>
            <div class="seat">
                <h2>{{$tickets->seat_number}}</h2>
                <span>Nomor Kursi</span>
            </div>
            <div class="time">
                <h2>{{$tickets->created_at}}</h2>
                <span>Waktu</span>
            </div>

        </div>
        <div class="card cardRight">
            <div class="eye"></div>
            <div class="number">
                <h3>{{$tickets->seat_number}}</h3>
                <span>Nomor Kursi</span>
            </div>
        </div>

    </div>
    @endforeach
</body>

</html>