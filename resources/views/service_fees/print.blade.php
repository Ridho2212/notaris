<!DOCTYPE html>
<html>
<head>
    <title>Biaya Layanan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        h2 { text-align: center; }
        .box { border: 1px solid #ccc; padding: 20px; }
    </style>
</head>
<body onload="window.print()">
    <h2>Detail Biaya Layanan</h2>
    <div class="box">
        <p><strong>Klien:</strong> {{ $fee->client_name }}</p>
        <p><strong>Layanan:</strong> {{ $fee->service_type }}</p>
        <p><strong>Total:</strong> Rp {{ number_format($fee->total_amount, 2, ',', '.') }}</p>
        <p><strong>Rincian:</strong> {!! nl2br(e($fee->cost_details)) !!}</p>
        <p><strong>Status:</strong> {{ $fee->payment_status }}</p>
        <p><strong>Metode:</strong> {{ $fee->payment_method }}</p>
        <p><strong>Tanggal Bayar:</strong> {{ $fee->payment_date }}</p>
    </div>
</body>
</html>
