<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Ras Hewan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Roboto', sans-serif; margin: 0; padding: 0; background-color: #f4f7f6; color: #333; }
        .container { width: 90%; max-width: 1000px; margin: 30px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); overflow: hidden; }
        h2 { padding: 20px 30px; margin: 0; background-color: #2E86C1; color: white; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 15px 30px; text-align: left; border-bottom: 1px solid #ddd; }
        thead tr { background-color: #f9f9f9; color: #555; font-weight: 700; }
        tbody tr:nth-child(even) { background-color: #fcfcfc; }
        tbody tr:hover { background-color: #f1f1f1; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Manajemen Ras Hewan (Admin)</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ras</th>
                    <th>Jenis Hewan</th> </tr>
            </thead>
            <tbody>
                @foreach ($rasHewan as $index => $ras)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ras->nama_ras }}</td>
                    <td>{{ $ras->jenisHewan->nama_jenis_hewan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>