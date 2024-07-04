<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diri</title>
    <!-- Integrasikan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tambahkan CSS kustom di sini */
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #007bff;
            color: #fff;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Diri</h2>

    <a href="{{ route('datadiri.create') }}" class="btn mb-3">Tambah Data Diri</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataDiris as $dataDiri)
                <tr>
                    <td>{{ $dataDiri->name }}</td>
                    <td>{{ $dataDiri->email }}</td>
                    <td>{{ $dataDiri->address }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Integrasikan Bootstrap JS (jika diperlukan) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
