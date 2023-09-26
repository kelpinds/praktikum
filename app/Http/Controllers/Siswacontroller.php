<?php

namespace App\Http\Controllers;

use App\Models\Siswamodel;
use Illuminate\Http\Request;

class Siswacontroller extends Controller
{
    public function utama(){
        $s = new Siswamodel();
        return view('siswa',['datasiswa'=>$s->all()]);

    }
    public function tambah(){
        return view('tambahsiswa');
    }
    public function simpan(Request $request){
        $s = new Siswamodel();
        $validasi =$request->validate([
            'nisn'=> 'required|unique:tb_siswa',
            'nama'=> 'required',
            'alamat'=> 'required',
            'no_tlp'=> 'required',
            'kode_kelas'=> 'required',
        ]);
        $s->create($request ->all());
        return redirect('siswa')->with('pesan','Data berhasil Di simpan');
    }
    public function edit($nisn){
        $s = new Siswamodel();
        return view('editsiswa',['datasiswa'=>$s->find($nisn)]);
    }
    public function update(Request $request,$nisn){
        $validasi =$request->validate([
            'nisn'=> 'required',
            'nama'=> 'required',
            'alamat'=> 'required',
            'no_tlp'=> 'required',
            'kode_kelas'=> 'required',
        ]);
        $s = new Siswamodel();
        $s = $s->find($nisn);
        $s->update($request->all());
        return redirect('siswa');
    }
    public function hapus($nisn){
        $s = new Siswamodel();
        $s = $s->find($nisn);
        $s->delete();
        return redirect('siswa');
    }
}
