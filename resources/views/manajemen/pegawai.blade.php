@extends('layout.laporan2')
@section('title laporan', 'Manajemen Pegawai')

<head>
    <title>Manajemen Pegawai</title>
</head>

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-28 mt-10">
    <div class="flex items-center justify-between" style="background:#EEF0F4">
        <div class="col p-3">
            <a href="{{ route('pegawai.create')}}" class="col items-center text-blue-600 hover:underline" style="font-weight:bold; font-size:13px">Tambah</a>
            <a href="/edit-barang" class="col p-3 items-center text-blue-600 hover:underline" style="font-weight:bold; font-size:13px">Edit</a>
        </div>
        <div class="relative col p-3">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <form action="{{ route('pegawai.search') }}" method="GET">
                <input type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-72 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
            </form>
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-white uppercase bg-[#324150]">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Password
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_user as $index => $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $index+1 }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $user->email }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->password }}
                </td>

                <td class="px-6 py-4">
                    <a href="{{ route('pegawai.edit', $user->user_id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('pegawai.destroy', $user->user_id) }}" method="POST" onsubmit="return confirmDelete();">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function confirmDelete() {
        const confirmed = confirm('Delete this user?');
        if (!confirmed) return false;

        console.log('Delete confirmed. Submitting form.');
        return true;
    }

    function confirmUpdate() {
        const confirmed = confirm('Update this user?');
        if (!confirmed) return false;

        console.log('Update confirmed. Submitting form.');
        return true;
    }
</script>

@endsection