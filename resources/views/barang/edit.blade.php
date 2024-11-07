<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
</head>
<body>
    <form method="post" action="{{ route('barang.update', $expense->expense_id) }}">
        @csrf
        <label for="date">Tanggal</label>
        <input type="date" class="form-control" id="date" name="date" value="{{ \Carbon\Carbon::parse($expense->date)->format('d-m-Y') }}
">

        <label for="amount">Total Harga</label>
        <input type="number" class="form-control" id="amount" name="amount" 
            value="{{ number_format($expense->amount, 0, ',', '.') }}" step="0.01" min="0">

        <label for="description">Keterangan</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $expense->description }}">

        <button type="submit" class="btn btn-primary">Update Barang</button>
    </form>
</div>  