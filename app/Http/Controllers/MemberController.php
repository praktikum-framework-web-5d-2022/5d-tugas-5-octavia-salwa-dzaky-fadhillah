<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $members = Member::get();
        return view('member.index', ['members'=>$members]);
    }

    public function create(){
        return view('member.create');
    }

    public function store(Request $request){
        $validatemember = $request->validate([
            'npm'=>'required|numeric',
            'nama'=>'required|min:3',
            'jenis_kelamin'=>'required',
            'alamat'=>'required|min:10'
        ]);
        $buku = $request->validate([
            'judul_buku'=>'required|min:3',
            'nama_pengarang'=>'required|min:3',
            'jumlah_halaman'=>'required|numeric'
        ]);

        $member = Member::create($validatemember);
        $member -> databuku()->create($buku);
        return redirect()->route('member.index')->with('message', "Data member {$validatemember['nama']} berhasil ditambahkan");
    }

    public function destroy(member $member){
        $member->databuku()->delete($member->id);
        $member->delete($member->id);
        return redirect()->route('member.index')->with('message', "Data member $member->nama berhasil dihapus");
    }

    public function edit(member $member){
        return view('member.edit', ['member'=>$member]);
    }

    public function update(Request $request, member $member){
        $validatemember = $request->validate([
            'npm'=>'required|numeric',
            'nama'=>'required|min:3',
            'jenis_kelamin'=>'required',
            'alamat'=>'required|min:10'
        ]);

        $buku = $request->validate([
            'judul_buku'=>'required|min:3',
            'nama_pengarang'=>'required|min:3',
            'jumlah_halaman'=>'required|numeric'
        ]);

        $member1 = Member::find($member->id);
        $member1->update($validatemember);
        $member1->databuku()->update($buku);

        return redirect()->route('member.index')->with('message', "Data member $member->nama berhasil diubah");
    }
}
