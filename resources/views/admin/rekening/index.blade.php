@extends('layouts.admin')

@section('content')
<div class="container-fluid d-flex flex-column align-items-center min-vh-100 p-3 mt-5">
    <h1 class="mb-4 text-center">Data Rekening</h1>
    <div class="card w-100 mt-2" style="max-width:1200px;">
        <div class="card-body">
            <div class="mb-3 text-end">
                <a href="{{ route('admin.rekening.create') }}" class="btn btn-success">Tambah Rekening</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Bank</th>
                            <th>No Rekening</th>
                            <th>Atas Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse($rekenings as $rekening)
                            <tr>
                                <td>{{ $loop->iteration + ($rekenings->currentPage()-1) * $rekenings->perPage() }}</td>
                                <td>{{ $rekening->nama_bank }}</td>
                                <td>{{ $rekening->no_rekening }}</td>
                                <td>{{ $rekening->atas_nama }}</td>
                                <td>
                                    <a href="{{ route('admin.rekening.edit', $rekening->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <form action="{{ route('admin.rekening.destroy', $rekening->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus rekening ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mb-1">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data rekening</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">
                    {{ $rekenings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
