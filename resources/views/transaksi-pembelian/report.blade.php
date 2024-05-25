<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi Pembelian</title>
    <style>
        body { 
            font-family: 'Arial', sans-serif; 
            margin: 0; 
            padding: 0; 
            background-color: #f4f4f9; 
            color: #333; 
        }
        .header, .footer { 
            text-align: center; 
            padding: 10px 0; 
            background-color: #696cff; 
            color: white; 
        }
        .header h1, .footer p { 
            margin: 0; 
        }
        .content { 
            margin: 20px auto; 
            width: 90%; 
            max-width: 1200px; 
            background-color: white; 
            padding: 20px; 
            box-shadow: 0 0 10px rgba(0,0,0,0.1); 
            border-radius: 8px; 
        }
        .section { 
            margin-bottom: 20px; 
        }
        .title { 
            font-size: 24px; 
            font-weight: bold; 
            color: #696cff; 
            margin-bottom: 10px; 
            border-bottom: 2px solid #696cff; 
            padding-bottom: 5px; 
        }
        .subtitle { 
            font-size: 18px; 
            font-weight: bold; 
            color: #696cff; 
            margin-bottom: 5px; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 20px; 
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 8px; 
            text-align: left; 
        }
        th { 
            background-color: #696cff; 
            color: white; 
        }
        tr:nth-child(even) { 
            background-color: #f2f2f2; 
        }
        tr:hover { 
            background-color: #ddd; 
        }
    </style>
</head>
<?php date_default_timezone_set('Asia/Jakarta') ?>
<body>
    <div class="header">
        <h1>Laporan Transaksi Pembelian</h1>
        <p>Tanggal Cetak : <span id="report-date">{{ date('d M Y H:i:s') }}</span></p>
    </div>
    <div class="content">
        <div class="section">
            <div class="title">Executive Summary</div>
            <p>Jumlah Transaksi: {{ $data->count() }}</p>
            <p>Total Nominal Keseluruhan: Rp. {{ number_format($data->sum('total_nominal'), 0, ',', '.') }}</p>
            <p>
                Tanggal Transaksi : 
                @if($data->isNotEmpty())
                    {{ $data->min('created_at')->format('d M Y') }} s/d {{ $data->max('created_at')->format('d M Y') }}
                @else
                    {{ date('d M Y') }} s/d {{ date('d M Y') }}
                @endif
            </p>
        </div>
        <div class="section">
            <div class="title">Detail Transaksi</div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi Pembelian</th>
                        <th>Supplier</th>
                        <th>Outlet</th>
                        <th>User Input</th>
                        <th>User Approval</th>
                        <th>Tanggal Transaksi</th>
                        <th>Jumlah Item</th>
                        <th>Total Nominal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data rows will be inserted here -->
                    @foreach($data as $x => $item)
                    <tr>
                        <td>{{ $x+1 }}</td>
                        <td>{{ $item->kode_transaksi_pembelian }}</td>
                        <td>{{ $item->supplier->nama }}</td>
                        <td>{{ $item->outlet->nama }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->approval->name }}</td>
                        <td>{{ $item->created_at->format('d M Y') }}</td>
                        <td>{{ number_format($item->detail_transaksi_pembelian()->count(), 0, ',', '.') }}</td>
                        <td>{{ number_format($item->total_nominal, 0, ',', '.') }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="footer">
        <p>{{ env('APP_NAME') }} | 2218103@scholar.itn.ac.id</p>
    </div>
    <script>
        document.getElementById('report-date').textContent = new Date().toLocaleDateString();
    </script>
</body>
</html>
