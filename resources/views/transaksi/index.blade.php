@extends('layouts.app')

@section('content')

<div class="grid grid-cols-3 gap-4">

   <!-- 🍔 LIST MENU -->
<div class="col-span-2 grid grid-cols-3 gap-4">

    @foreach($menu as $m)
    <div 
        class="bg-white p-3 rounded-xl shadow cursor-pointer hover:scale-105 transition"
        onclick="tambahMenu({{ $m->id }}, '{{ $m->nama }}', {{ $m->harga }})"
    >

        <!-- 🖼️ GAMBAR -->
        @if($m->gambar)
            <img src="{{ asset('storage/' . $m->gambar) }}" 
                 class="w-full h-24 object-cover rounded mb-2">
        @else
            <div class="w-full h-24 bg-gray-200 rounded mb-2 flex items-center justify-center text-xs text-gray-500">
                No Image
            </div>
        @endif

        <!-- 📛 NAMA -->
        <h3 class="font-bold text-sm">{{ $m->nama }}</h3>

        <!-- 💰 HARGA -->
        <p class="text-gray-500 text-sm">
            Rp {{ number_format($m->harga) }}
        </p>

    </div>
    @endforeach

</div>

    <!-- 🧾 KERANJANG -->
    <div class="bg-white p-4 rounded-xl shadow">

        <h2 class="font-bold mb-3">Keranjang</h2>

<form method="POST" action="/transaksi">
@csrf

<!-- CART -->
<div id="cart"></div>

<hr class="my-3">

<h3 class="font-bold">Total: Rp <span id="total">0</span></h3>

<!-- TIPE -->
<select name="tipe" class="border w-full p-2 mt-3 rounded">
    <option value="dinein">Dine In</option>
    <option value="takeaway">Take Away</option>
</select>

<!-- MEJA -->
<input type="text" name="meja" placeholder="No Meja"
    class="border w-full p-2 mt-2 rounded">

<!-- CUSTOMER -->
<input type="text" name="customer" placeholder="Nama Customer"
    class="border w-full p-2 mt-2 rounded">

<!-- METODE -->
<select name="metode" class="border w-full p-2 mt-2 rounded">
    <option value="cash">Cash</option>
    <option value="qris">QRIS</option>
</select>

<!-- BAYAR (WAJIB ADA NAME) -->
<input 
    type="number" 
    name="bayar"
    id="bayar"
    placeholder="Uang Bayar"
    class="border w-full p-2 mt-3 rounded"
>

<p class="mt-2">
    Kembalian: Rp <span id="kembalian">0</span>
</p>

<button 
    type="submit"
    class="bg-green-500 w-full mt-3 text-white p-2 rounded hover:bg-green-600"
>
    Bayar
</button>

</form>
    </div>

</div>

<script>

let cart = [];
let total = 0;

// ➕ TAMBAH MENU
function tambahMenu(id, nama, harga) {

    let existing = cart.find(item => item.id === id);

    if (existing) {
        existing.qty++;
    } else {
        cart.push({id, nama, harga, qty: 1});
    }

    renderCart();
}

// 🔄 RENDER CART
function renderCart() {

    let html = '';
    total = 0;

    cart.forEach((item, index) => {

        let subtotal = item.qty * item.harga;
        total += subtotal;

        html += `
        <div class="flex justify-between items-center mb-2">

            <div>${item.nama}</div>

            <div class="flex items-center gap-2">
                <button type="button" onclick="kurang(${index})" class="px-2 bg-gray-200 rounded">-</button>
                ${item.qty}
                <button type="button" onclick="tambah(${index})" class="px-2 bg-gray-200 rounded">+</button>
            </div>

            <div>Rp ${subtotal.toLocaleString()}</div>

        </div>

        <input type="hidden" name="menu[${index}][id]" value="${item.id}">
        <input type="hidden" name="menu[${index}][qty]" value="${item.qty}">
        <input type="hidden" name="menu[${index}][harga]" value="${item.harga}">
        `;
    });

    document.getElementById('cart').innerHTML = html;
    document.getElementById('total').innerText = total.toLocaleString();
}

// ➕ TAMBAH QTY
function tambah(i){
    cart[i].qty++;
    renderCart();
}

// ➖ KURANG QTY
function kurang(i){
    cart[i].qty--;
    if(cart[i].qty <= 0) cart.splice(i,1);
    renderCart();
}


// 💰 HITUNG KEMBALIAN
document.getElementById('bayar').addEventListener('input', function(){
    let bayar = this.value;
    let kembali = bayar - total;
    document.getElementById('kembalian').innerText =
        kembali > 0 ? kembali.toLocaleString() : 0;
});

</script>

@endsection