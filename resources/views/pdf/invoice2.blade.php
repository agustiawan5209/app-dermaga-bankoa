<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    tr td {
        border-bottom: 1px solid rgb(71, 71, 67);
    }
    top{
        display: flex;
    }
    .table-full{
        width: 100%;
    }
</style>

<body>
    <div class="top">
        <div>
            <table>
                <tr>
                    <td style="border-bottom: 0;">Invoice</td>
                </tr>
                <tr>
                    <td>Pembeli</td>
                    <td>:{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Tanggal Transaksi</td>
                    <td>:{{ $transaksi['tgl_transaksi'] }}</td>
                </tr>
                <tr>
                    <td>ID Transaksi</td>
                    <td>:{{ $transaksi['ID_transaksi'] }}</td>
                </tr>
            </table>
        </div>
        <br><br>
        <div>
            <table>
                <tr>
                    <td>Kepada</td>
                    <td>: {{ $transaksi['berangkat']->kapal->user->name }}</td>
                </tr>
            </table>
        </div>
    </div>
    <h5>Detail Pesanan</h5>
    <table cellpadding="5" cellspacing='1' border='1' align="center" class="table-full">
        <tr>
            <th>Nama</th>
            <th>ID Pesanan</th>
            <th>Bank Tujuan</th>
            <th>Jumlah Pesanan</th>
            <th>Harga</th>
        </tr>
        @php
        $total = "Rp. ". number_format($transaksi['berangkat']->harga * $transaksi['jumlah'],0,2);
    @endphp
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$transaksi['ID_transaksi']}}</td>
            <td>{{$bank}}</td>
            <td>{{$transaksi['jumlah']}}</td>
            <td>{{$total}}</td>
        </tr>

        <tr>
            <td colspan="3">Total</td>
            <td colspan="1">{{$total}}</td>
        </tr>
    </table>
    <img src="{{public_path('upload/'. $file)}}" alt="" width="300">
</body>

</html>
