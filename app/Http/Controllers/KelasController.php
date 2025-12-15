<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    
    public function read()
    {
        $data = Kelas::all();
        return response()->json([
            'message' => 'Data Kelas Berhasil Diambil',
            'data' => $data
        ], 200);
    }

    
    public function create(Request $request)
    {
        
        $request->validate([
            'nama_kelas' => 'required'
        ]);

        
        $kelas = Kelas::create($request->all());

        return response()->json([
            'message' => 'Data Kelas Berhasil Ditambahkan',
            'data' => $kelas
        ], 201);
    }

    
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json(['message' => 'Kelas Tidak Ditemukan'], 404);
        }

        $request->validate([
            'nama_kelas' => 'required'
        ]);

        $kelas->update($request->all());

        return response()->json([
            'message' => 'Data Kelas Berhasil Diupdate',
            'data' => $kelas
        ], 200);
    }

    
    public function delete($id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json(['message' => 'Kelas Tidak Ditemukan'], 404);
        }

        
        $kelas->delete();

        return response()->json([
            'message' => 'Data Kelas Berhasil Dihapus'
        ], 200);
    }
}