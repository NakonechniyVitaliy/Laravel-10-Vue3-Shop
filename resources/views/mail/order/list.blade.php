
@component('mail::message')
        <h1 style="color: #F69C63">Karte</h1>
        <h3>Hello, {{$user_name}}!
        You ordered : </h3>@foreach(json_decode($order['products'], true) as $product)
            <h3><b>${{ $product['price'] }}</b> {{ $product['title'] }} - <b>{{ $product['qty'] }}</b> pcs.</h3>
                    @endforeach
        <h2>Total: <b>${{ $order['total_price'] }}</b></h2>
@endcomponent
