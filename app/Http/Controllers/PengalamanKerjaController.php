<?php

namespace App\Http\Controllers;

use App\Models\PengalamanKerja;
use App\Models\User;
use Illuminate\Http\Request;

class PengalamanKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengalaman_kerja = PengalamanKerja::all();
        return view('pengalaman_kerja.index', [
        'pengalaman_kerja' => $pengalaman_kerja
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengalaman_kerja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'sometimes|nullable'
        ]);
        $array = $request -> only([
            'nama', 'jabatan', 'tahun_masuk', 'tahun_keluar'
        ]);
        $pengalamankerja = PengalamanKerja::create($array);
        return redirect()->route('pengalaman_kerja.index')
            ->with('success_message', 'Data pengalaman kerja baru telah berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengalamankerja = PengalamanKerja::find($id);
        if (!$pengalamankerja) return redirect()->route('pengalaman_kerja.index')
            ->with('error_message', 'Pengalaman kerja dengan id'.$id.' tidak ditemukan');
        return view('pengalaman_kerja.edit', [
            'pengalamankerja' => $pengalamankerja
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'sometimes|nullable'
        ]);
        $pengalamankerja = PengalamanKerja::find($id);
        $pengalamankerja->nama = $request->nama;
        $pengalamankerja->jabatan = $request->jabatan;
        $pengalamankerja->tahun_masuk = $request->tahun_masuk;
        $pengalamankerja->tahun_keluar = $request->tahun_keluar;
        $pengalamankerja->save();
        return redirect()->route('pengalaman_kerja.index')
            ->with('success_message', 'Berhasil mengubah Pengalaman Kerja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if ($id == $request->user()->id) return redirect()->route('users.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($user) $user->delete();
        return redirect()->route('users.index')
            ->with('success_message', 'Berhasil menghapus user');
    }
}
