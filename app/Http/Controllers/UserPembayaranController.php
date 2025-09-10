<?php
namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserPembayaranController extends Controller
{
    
    public function index()
    {
        $pembayarans = Pembayaran::where('id_user', Auth::id())
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('users.pembayaran.index', compact('pembayarans'));
    }
    public function riwayat()
    {
        $pembayarans = Pembayaran::where('id_user', Auth::id())
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('users.pembayaran.index', compact('pembayarans'));
    }
    // public function konfirmasi($id)
    // {
    //     $pembayaran = Pembayaran::where('id', $id)
    //         ->where('id_user', auth()->id())
    //         ->firstOrFail();

    //     return view('users.pembayaran.konfirmasi', compact('pembayaran'));
    // }
    public function detail($id)
    {
        $pembayaran = Pembayaran::where('id_user', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        return view('users.pembayaran.detail', compact('pembayaran'));
    }

   
public function bayar(Request $request, $id)
{
    $request->validate([
        'rekening_id' => 'required|exists:rekenings,id',
        'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $pembayaran = Pembayaran::where('id', $id)
    ->where('id_user', Auth::id())
    ->firstOrFail();


    if ($request->hasFile('bukti_pembayaran')) {
        $file = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        $pembayaran->bukti_pembayaran = $file;
    }

    $pembayaran->rekening_id = $request->rekening_id;
    $pembayaran->status = 'menunggu konfirmasi';
    $pembayaran->save();

    return response()->json(['success' => true, 'message' => 'Bukti pembayaran berhasil diupload']);
}

    
}
