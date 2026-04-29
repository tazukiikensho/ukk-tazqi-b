<!DOCTYPE html>
<html>
<head>
    <title>Struk</title>
    <style>
        body {
            font-family: monospace;
            width: 220px;
            margin: auto;
        }

        .center { text-align: center; }
        .flex { display: flex; justify-content: space-between; }
        hr { border-top: 1px dashed black; margin: 6px 0; }
        small { font-size: 10px; }
    </style>
</head>

<body onload="window.print()">

<div class="center">
    <b>☕ Cafe Bisa Ngopi</b><br>
    <small>{{ date('d M Y H:i') }}</small>
</div>

<hr>

<div class="flex">
    <div>Date<br><b>{{ date('M d Y') }}</b></div>
    <div>Cashier<br><b>{{ $transaksi->kasir ?? '-' }}</b></div>
</div>

<br>

<div class="flex">
    <div>Trx ID<br><b>{{ $transaksi->trx_id ?? '-' }}</b></div>
    <div>Customer<br><b>{{ $transaksi->customer ?? '-' }}</b></div>
</div>

<hr>

<div class="center">
    @if($transaksi->tipe == 'dinein')
        Dine In / Table {{ $transaksi->meja ?? '-' }}
    @else
        Take Away
    @endif
</div>

<hr>

@foreach($transaksi->detail as $d)
<div>
    {{ $d->menu->nama }} x{{ $d->qty }}
    <div class="flex">
        <span></span>
        <span>Rp {{ number_format($d->subtotal) }}</span>
    </div>
</div>
@endforeach

<hr>

<div><b>Payment Details</b></div>

<div class="flex">
    Subtotal
    <span>Rp {{ number_format($transaksi->total) }}</span>
</div>

<div class="flex">
    Payment Method
    <span>{{ strtoupper($transaksi->metode_pembayaran ?? '-') }}</span>
</div>

<div class="flex">
    Bayar
    <span>Rp {{ number_format($transaksi->bayar ?? 0) }}</span>
</div>

<div class="flex">
    Kembali
    <span>Rp {{ number_format($transaksi->kembali ?? 0) }}</span>
</div>

<hr>

<div class="center">
    <b>PAID</b><br>
    <small>{{ date('d M Y H:i') }}</small><br>
    <small>Thank you 🙏</small>
</div>

</body>
</html>