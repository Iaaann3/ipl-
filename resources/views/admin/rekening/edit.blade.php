@extends('layouts.admin')

@section('content')
<div class="container-fluid d-flex flex-column align-items-center min-vh-100 p-3 mt-5">
    <h1 class="mb-4 text-center">Edit Rekening</h1>
    <div class="card w-100" style="max-width:600px;">
        <div class="card-body">
            <form action="{{ route('admin.rekening.update', $rekening->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_bank" class="form-label">Nama Bank</label>
                    <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" 
                           id="nama_bank" name="nama_bank" value="{{ old('nama_bank', $rekening->nama_bank) }}" required>
                    @error('nama_bank')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_rekening" class="form-label">No Rekening</label>
                    <input type="text" class="form-control @error('no_rekening') is-invalid @enderror" 
                           id="no_rekening" name="no_rekening" value="{{ old('no_rekening', $rekening->no_rekening) }}" required>
                    @error('no_rekening')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="atas_nama" class="form-label">Atas Nama</label>
                    <input type="text" class="form-control @error('atas_nama') is-invalid @enderror" 
                           id="atas_nama" name="atas_nama" value="{{ old('atas_nama', $rekening->atas_nama) }}" required>
                    @error('atas_nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.rekening.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
