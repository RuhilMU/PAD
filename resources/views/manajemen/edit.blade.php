<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <form method="post" action="{{ route('pegawai.update', $user->user_id) }}">
        @csrf
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">

            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">

            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}">

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>  