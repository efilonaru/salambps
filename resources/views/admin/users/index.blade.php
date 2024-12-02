<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4">Daftar Pengguna</h3>

                    <table class="min-w-full border-collapse border border-gray-200">
                        <thead>
                            <tr>
                                <th class="border border-gray-200 px-4 py-2">Nama</th>
                                <th class="border border-gray-200 px-4 py-2">Email</th>
                                <th class="border border-gray-200 px-4 py-2">Juz Saat Ini</th>
                                <th class="border border-gray-200 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border border-gray-200 px-4 py-2">{{ $user->name }}</td>
                                    <td class="border border-gray-200 px-4 py-2">{{ $user->email }}</td>
                                    <td class="border border-gray-200 px-4 py-2">
                                        @if ($user->readingTracks->isNotEmpty())
                                            {{ $user->readingTracks->first()->juz }}
                                        @else
                                            Tidak Ada
                                        @endif
                                    </td>
                                    <td class="border border-gray-200 px-4 py-2">
                                        <form action="{{ route('admin.assign.juz', $user) }}" method="POST">
                                            @csrf
                                            <input type="number" name="juz" min="1" max="30" required placeholder="Juz">
                                            <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">Assign</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
