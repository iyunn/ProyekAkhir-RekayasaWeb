<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru; // Pastikan Model Guru di-import

class GuruController extends Controller
{
    public function read()
    {
        $data = Guru::all();
        return response()->json([
            'message' => 'Data Guru Berhasil Diambil',
            'data' => $data
        ], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:gurus,nip',
            'nama_guru' => 'required',
            'mapel' => 'required'
        ]);

        $guru = Guru::create($request->all());

        return response()->json([
            'message' => 'Data Guru Berhasil Ditambahkan',
            'data' => $guru
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json(['message' => 'Guru Tidak Ditemukan'], 404);
        }

        $request->validate([
            'nama_guru' => 'required',
            'mapel' => 'required'
        ]);

        $guru->update($request->all());

        return response()->json([
            'message' => 'Data Guru Berhasil Diupdate',
            'data' => $guru
        ], 200);
    }

    
    public function delete($id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json(['message' => 'Guru Tidak Ditemukan'], 404);
        }

        $guru->delete();

        return response()->json([
            'message' => 'Data Guru Berhasil Dihapus'
        ], 200);
    }
}