<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function read() {
        $data = Siswa::all();
        return response()->json(['message' => 'Data Siswa', 'data' => $data]);
    }

    public function create(Request $request) {
        // Validasi input
        $request->validate([
            'nis' => 'required|unique:siswas',
            'nama_siswa' => 'required',
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        $siswa = Siswa::create($request->all());
        return response()->json(['message' => 'Siswa Created', 'data' => $siswa]);
    }

    // UPDATE
    public function update(Request $request, $id) {
        $siswa = Siswa::find($id);
        if(!$siswa) return response()->json(['message' => 'Not Found'], 404);

        $siswa->update($request->all());
        return response()->json(['message' => 'Siswa Updated', 'data' => $siswa]);
    }

    // DELETE
    public function delete($id) {
        $siswa = Siswa::find($id);
        if(!$siswa) return response()->json(['message' => 'Not Found'], 404);

        $siswa->delete();
        return response()->json(['message' => 'Siswa Deleted']);
    }
}
