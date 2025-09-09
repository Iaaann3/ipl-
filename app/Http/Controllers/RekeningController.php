<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekeningController extends Controller
{
    public function index()
    {
        $rekenings = Rekening::latest()->paginate(10);
        return view('admin.rekening.index', compact('rekenings'));
    }

    public function create()
    {
        return view('admin.rekening.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bank'   => 'required|string|max:100',
            'no_rekening' => 'required|string|max:50|unique:rekenings',
            'atas_nama'   => 'required|string|max:100',
        ]);

        try {
            DB::beginTransaction();

            Rekening::create($request->only(['nama_bank', 'no_rekening', 'atas_nama']));

            DB::commit();
            return redirect()->route('admin.rekening.index')->with('success', 'Rekening berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Rekening $rekening)
    {
        return view('admin.rekening.edit', compact('rekening'));
    }

    public function update(Request $request, Rekening $rekening)
    {
        $request->validate([
            'nama_bank'   => 'required|string|max:100',
            'no_rekening' => 'required|string|max:50|unique:rekenings,no_rekening,' . $rekening->id,
            'atas_nama'   => 'required|string|max:100',
        ]);

        try {
            DB::beginTransaction();

            $rekening->update($request->only(['nama_bank', 'no_rekening', 'atas_nama']));

            DB::commit();
            return redirect()->route('admin.rekening.index')->with('success', 'Rekening berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Rekening $rekening)
    {
        try {
            DB::beginTransaction();

            $rekening->delete();

            DB::commit();
            return redirect()->route('admin.rekening.index')->with('success', 'Rekening berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
