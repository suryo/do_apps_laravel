@extends('layouts.app')

@section('content')
    <h1>Order - Get Shipping</h1>

    <div class="mb-3">
        <label for="destination_postal_code" class="form-label">Setiap pengiriman dikirim dari PT. MOTASA INDONESIA KODE POS 61382</label>
        <br>
        <label for="destination_postal_code" class="form-label">Destination Postal Code:</label>
        <input type="text" class="form-control" id="destination_postal_code" name="destination_postal_code">
        <small id="postal_code_error" class="text-danger" style="display:none;">Postal code is empty!</small>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Value</th>
                <th>Length</th>
                <th>Width</th>
                <th>Height</th>
                <th>Weight</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
                <tr>
                    <td>{{ $cart->product_name }}</td>
                    <td>{{ $cart->product_detail }}</td>
                    <td>{{ $cart->product_price }}</td>
                    <td>{{ $cart->product_length }}</td>
                    <td>{{ $cart->product_width }}</td>
                    <td>{{ $cart->product_height }}</td>
                    <td>{{ $cart->product_weight }}</td>
                    <td>{{ $cart->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="shipping_prices" class="mb-3">
        <!-- Daftar harga pengiriman akan ditampilkan di sini -->
    </div>

    <div class="mb-3" id="proceed_btn" style="display: none;">
        <form id="payment_form" action="{{ route('checkout.CheckDeliveryOrder') }}" method="POST">
            @csrf
            <input type="hidden" name="itemsubtotal" value="{{ $totalPrice }}">
            <input type="hidden" id="shipping_price_input" name="shippingprice" value="">
            <input type="hidden" id="shipping_courier_input" name="pengiriman" value="">
            <input type="hidden" id="post_destination_postal_code" name="post_destination_postal_code" value="">
            <div id="shipping_price_options">
                <!-- Tombol radio untuk memilih harga pengiriman -->
            </div>
            <button type="submit" class="btn btn-success mt-2">Check Delivery Order</button>
        </form>
    </div>

    <button type="button" id="get_shipping_btn" class="btn btn-primary mt-2" onclick="getShippingPrice()">Get Shipping</button>

    <script>
        function getShippingPrice() {
            var destinationPostalCode = document.getElementById("destination_postal_code").value;
            
            // Periksa apakah kode pos tujuan kosong
            if (destinationPostalCode.trim() === "") {
                // Tampilkan pesan error
                document.getElementById("postal_code_error").style.display = "block";
                return; // Hentikan eksekusi jika kode pos kosong
            } else {
                // Sembunyikan pesan error jika kode pos tidak kosong
                document.getElementById("postal_code_error").style.display = "none";
            }
            
            document.getElementById("post_destination_postal_code").value = destinationPostalCode;
            
            // Data untuk dikirim ke API biteship
            var data = {
                "origin_postal_code": 61382, // Kode POS asal
                "destination_postal_code": destinationPostalCode, // Kode POS tujuan
                "couriers": "anteraja,jne,sicepat", // Kurir yang dipilih
                "items": []
            };

            // Ambil data dari tabel barang di keranjang
            var items = {!! $carts !!};
            items.forEach(item => {
                data.items.push({
                    "name": item.product_name,
                    "description": item.product_detail,
                    "value": item.product_price,
                    "length": item.product_length,
                    "width": item.product_width,
                    "height": item.product_height,
                    "weight": item.product_weight,
                    "quantity": item.quantity
                });
            });

            // Kirim permintaan ke API biteship
            fetch('https://api.biteship.com/v1/rates/couriers', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'biteship_test.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoibW90YXNhLXRlc3QiLCJ1c2VySWQiOiI2NjIzNDg1NjY5NDBiZjAwMTIwMDk2MzIiLCJpYXQiOjE3MTM2NzU2MTl9.FdCJ4-rXa-xogujZ13U1OjIVMcHh9t8bo0oRXjcJLto'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                // Tampilkan harga pengiriman untuk setiap kurir
                var shippingPricesHtml = '<h2>Shipping Prices</h2>';
                data.pricing.forEach((price, index) => {
                    shippingPricesHtml += '<div class="form-check">';
                    shippingPricesHtml += '<input class="form-check-input" type="radio" name="shipping_price" id="shipping_price_' + index + '" value="' + price.price + '" onclick="setShippingPrice(' + price.price + ', \'' + price.courier_name + ' - ' + price.courier_service_name + '\')">';
                    shippingPricesHtml += '<label class="form-check-label" for="shipping_price_' + index + '">';
                    shippingPricesHtml += '<strong>Courier Name:</strong> ' + price.courier_name + ', ';
                    shippingPricesHtml += '<strong>Courier Service Name:</strong> ' + price.courier_service_name + ', ';
                    shippingPricesHtml += '<strong>Duration:</strong> ' + price.duration + ', ';
                    shippingPricesHtml += '<strong>Price:</strong> ' + price.price;
                    shippingPricesHtml += '</label>';
                    shippingPricesHtml += '</div>';
                });
                document.getElementById("shipping_prices").innerHTML = shippingPricesHtml;

                // Tampilkan tombol Proceed to Payment dan tombol radio
                document.getElementById("proceed_btn").style.display = 'block';
                // Sembunyikan tombol "Get Shipping"
                document.getElementById("get_shipping_btn").style.display = 'none';
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }

        function setShippingPrice(price, courier) {
            document.getElementById("shipping_price_input").value = price;
            document.getElementById("shipping_courier_input").value = courier;           
        }
    </script>
@endsection
