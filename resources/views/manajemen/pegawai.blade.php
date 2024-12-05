@extends('layout.laporan2')
@section('title laporan', 'Manajemen Pegawai')

<head>
    <title>Manajemen Pegawai</title>
</head>

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-28 my-10">
    <div class="flex items-center justify-between" style="background:#EEF0F4">
        <div class="col">
            <a href="{{ route('pegawai.create')}}" class="col pl-3 items-center text-blue-600 hover:underline" style="font-weight:bold; font-size:13px">Tambah</a>
        </div>
        <div class="relative">
            <form action="{{ route('pegawai.search') }}" method="GET">
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative py-3">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" name="nama" id="search" class="mr-3 block w-72 h-5 p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search" required />
                </div>
            </form>
            @if (!empty($cari))
            @if (count($data_user))
            <div class="alert alert-success">
                Ditemukan <strong>{{ count($data_user) }}</strong> user dengan nama: <h4>{{ $cari }}</h4>
            </div>
            @else
            <div class="alert alert-warning">
                <h4>User {{ $cari }} tidak ditemukan</h4>
            </div>
            @endif
            @endif
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-white uppercase bg-[#324150]">
            <tr>
                <th scope="col" class="px-3 py-3">
                    Name
                </th>
                <th scope="col" class="px-3 py-3">
                    Email
                </th>
                <th scope="col" class="px-3 py-3">
                    Password
                </th>
                <th scope="col" class="px-3 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_user as $index => $user)
            <tr class="bg-white border-b hover:bg-gray-50">
                <th scope="row" class="px-3 py-1 font-medium text-gray-900 whitespace-nowrap">
                    {{ $user->name }}
                </th>
                <td class="px-3 py-1">
                    {{ $user->email }}
                </td>
                <td class="px-3 py-1">
                    ********
                </td>

                <td class="flex items-center px-3 py-1 justify-end">
                    <a href="{{ route('pegawai.edit', $user->user_id) }}" class="border-2 border-[#A3A3A3] rounded p-1 hover:bg-green-100 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="#B3BE1A" fill-rule="evenodd" d="M17.204 10.793L19 9c.545-.545.818-.818.934-1.112a2 2 0 0 0 0-1.773C19.818 5.818 19.545 5.545 19 5s-.818-.818-1.112-.934a2 2 0 0 0-1.773 0c-.294.143-.537.419-1.112.934l-1.819 1.819a10.9 10.9 0 0 0 4.023 3.977m-5.477-2.523l-3.87 3.87c-.423.423-.338.338-.778.9c-.14.23-.199.555-.313 1.145l-.313 3.077c-.03.332-.1.498-.005.593s.23.031.593-.005l3.077-.313c.59-.117.885-.173 1.143-.313s.473-.352.898-.777l3.89-3.89a12.9 12.9 0 0 1-4.02-3.98" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <form action="{{ route('pegawai.destroy', $user->user_id) }}" method="POST" onsubmit="return confirmDelete();">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border-2 border-[#A3A3A3] rounded p-1 hover:bg-red-100 ml-1" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g fill="none">
                                    <path fill="#C50505" fill-rule="evenodd" d="M21 3H3v3a2 2 0 0 1 2 2v4c0 2.828 0 4.243.879 5.121C3.757 21 8.172 21 11 21h2c2.829 0 4.243 0 5.121-.879c.88-.878.88-2.293.88-5.121v-4a2 2 0 0 1 2-2zm-10.5 5a1 1 0 0 0-2 0v5a1 1 0 1 0 2 0zm5 0a1 1 0 0 0-2 0v5a1 1 0 1 0 2 0z" clip-rule="evenodd" />
                                    <path stroke="#C50505" stroke-linecap="round" stroke-width="2" d="M10.038 3.37c.114-.103.335-.2.715-.237A3.7 3.7 0 0 1 12 3c.44 0 .838.033 1.217.103s.3.131.715.238" />
                                </g>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-between bg-[#E8E8E8]">
        <form method="GET" action="{{ route('pegawai.index') }}" class="flex items-center mt-1 ml-2">
            <label for="per_page" class="block text-sm font-medium text-gray-700 pr-2">Items per page:</label>
            <select name="per_page" id="per_page" class="mt-1 block text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" onchange="this.form.submit()">
                <option value="1" {{ request('per_page') == 1 ? 'selected' : '' }}>1</option>
                <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15</option>
                <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>30</option>
                <option value="35" {{ request('per_page') == 35 ? 'selected' : '' }}>35</option>
                <option value="40" {{ request('per_page') == 40 ? 'selected' : '' }}>40</option>
                <option value="45" {{ request('per_page') == 45 ? 'selected' : '' }}>45</option>
                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
            </select>
        </form>
        <div class="mt-2 mr-2">
            {{ $data_user->links('pagination::tailwind') }}
        </div>
    </div>
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