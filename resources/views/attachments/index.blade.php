@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-purple-900 mb-6">Semua Lampiran</h1>
        <a href="{{ route('attachments.create') }}"
            class="inline-block mb-6 px-4 py-2 bg-purple-900 text-white rounded-xl shadow hover:bg-purple-800">
            Create Attachment
        </a>
    </div>

    <div class="overflow-x-auto bg-purple-100 rounded-2xl">
        @if($attachments->isEmpty())
            <p class="px-6 py-4 text-gray-600">Tidak ada lampiran.</p>
        @else
            <table class="min-w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-purple-300">
                        <th class="px-6 py-3 text-purple-900 font-semibold">Nama File</th>
                        <th class="px-6 py-3 text-purple-900 font-semibold">Tugas</th>
                        <th class="px-6 py-3 text-purple-900 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-purple-300">
                    @foreach($attachments as $attachment)
                        <tr class="hover:bg-purple-100">
                            <td class="px-6 py-4">{{ $attachment->filename }}</td>
                            <td class="px-6 py-4">{{ $attachment->task->title ?? 'Tidak Ada' }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <!-- Tombol Download -->
                                <a href="{{ Storage::url('attachments/' . $attachment->filename) }}" 
                                   download 
                                   class="px-3 py-1 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-500">
                                    Download
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('attachments.destroy', $attachment->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus lampiran ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-sm text-white bg-red-600 rounded-lg hover:bg-red-500">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
