<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Profile;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PengembalianController extends Controller
{
    public function index()
    {
        $iduser = Auth::id();
        $profile = Profile::where('users_id', $iduser)->first();
        $buku = Buku::where('status', 'DIPINJAM')->get();
        $user = User::all();
        $peminjam = Profile::where('users_id', '>', '1')->get();

        return view('pengembalian.pengembalian', ['profile' => $profile, 'users' => $user, 'buku' => $buku, 'peminjam' => $peminjam]);
    }

    public function pengembalian(Request $request)
    {

        $pinjaman = Peminjaman::where('users_id', $request->users_id)->where('buku_id', $request->buku_id)
            ->where('tanggal_pengembalian', null);
        $dataPinjaman = $pinjaman->first();
        $count = $pinjaman->count();

        if ($count == 1) {
            try {
                DB::beginTransaction();

                $deadline = Carbon::parse($dataPinjaman->tanggal_wajib_kembali);
                $hari_ini = Carbon::now();

                if ($hari_ini->greaterThan($deadline)) {
                    $selisih = $hari_ini->diffInDays($deadline);
                    $dataPinjaman->total_denda = $selisih * 2000;
                } else {
                    $dataPinjaman->total_denda = 0;
                }

                //update data tanggal pengembalian
                $dataPinjaman->tanggal_pengembalian = Carbon::now()->toDateString();
                $dataPinjaman->save();
                //update status buku
                $buku = Buku::findOrFail($request->buku_id);
                $buku->status = 'TERSEDIA';
                $buku->save();
                DB::commit();
                Alert::success('Berhasil', 'Berhasil Mengembalikan Buku');
                return redirect('/peminjaman');
            } catch (\Throwable $th) {
                DB::rollback();
            }
        } else {
            Alert::warning('Gagal', 'Buku yang dipinjam salah atau tidak ada');
            return redirect('/pengembalian');
        }
    }
}
