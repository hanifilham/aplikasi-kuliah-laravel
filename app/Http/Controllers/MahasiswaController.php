<?php
namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('prodi')->get();
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('mahasiswas.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas,nim',
            'kelas' => 'required',
            'prodi_id' => 'required|exists:prodis,id',
            'angkatan' => 'required',
        ]);
        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswas.index')
                         ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function show(Mahasiswa $mahasiswa) {} // Lewati ini, tidak perlu dibahas

    public function edit(Mahasiswa $mahasiswa)
    {
        $prodis = Prodi::all();
        return view('mahasiswas.edit', compact('mahasiswa', 'prodis'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas,nim,'.$mahasiswa->id,
            'kelas' => 'required',
            'prodi_id' => 'required|exists:prodis,id',
            'angkatan' => 'required',
        ]);
        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswas.index')
                         ->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')
                         ->with('success', 'Mahasiswa berhasil dihapus.');
    }
}