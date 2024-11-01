<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
</head>
<body>

        <h4>Tambah Akun</h4>
        <form method="post" action="{{ route('store') }}">
            @csrf

                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name">

                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
        
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
        
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url('/pegawai') }}" class="btn btn-secondary">Kembali</a>
        </form>

</body>
</html>