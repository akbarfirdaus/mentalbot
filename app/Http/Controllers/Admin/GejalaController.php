<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\gejala;
use App\Models\gejalaLainnya;
use MongoDB\Client as Mongo;
use MongoDB\BSON\ObjectId;

class GejalaController extends Controller
{
    protected $db;

    public function __construct()
    {
        $this->db = (new Mongo)->{env('DB_DATABASE')};
    }

    function index()
    {
        $gejala = $this->db->gejala->find()->toArray();
        $gejalaLainnya = $this->db->gejalalainnya->find()->toArray();
        return view('pointakses.admin.data_gejala.index', compact('gejala', 'gejalaLainnya'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_gejala' => 'required|string|min:3|max:8',
            'nama_gejala' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        $this->db->gejala->insertOne([
            'kode_gejala' => $request->kode_gejala,
            'nama_gejala' => $request->nama_gejala,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('data_gejala')->with('success', 'Gejala Berhasil ditambahkan');
    }

    public function deleteGejala($_id)
    {

        $result = $this->db->gejala->deleteOne(['_id' => new ObjectId($_id)]);

        if ($result) {
            return redirect()->route('data_gejala')->with('success', 'Gejala Berhasil dihapus');
        } else {
            return redirect()->route('data_gejala')->with('error', 'Gejala tidak ditemukan atau gagal dihapus');
        }
    }

    public function edit($id)
    {
        try {
            $objectId = new ObjectId($id);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gejala tidak valid'], 400);
        }

        $gejala = $this->db->gejala->findOne(['_id' => $objectId]);

        if (!$gejala) {
            return response()->json(['error' => 'Gejala tidak ditemukan'], 404);
        }

        return response()->json($gejala);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_gejala' => 'required|string|min:3|max:8',
            'nama_gejala' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        try {
            $objectId = new ObjectId($id);
        } catch (\Exception $e) {
            return redirect()->route('data_gejala')->with('error', 'Gejala tidak valid');
        }

        $updateResult = $this->db->gejala->updateOne(
            ['_id' => $objectId],
            ['$set' => [
                'kode_gejala' => $request->kode_gejala,
                'nama_gejala' => $request->nama_gejala,
                'keterangan' => $request->keterangan,
            ]]
        );

        if ($updateResult) {
            return redirect()->route('data_gejala')->with('success', 'Gejala berhasil diperbarui');
        } else {
            return redirect()->route('data_gejala')->with('error', 'Gejala tidak berhasil diperbarui');
        }
    }

    // Gejala Lainnya
    public function storeGejalaLainnya(Request $request)
    {
        $request->validate([
            'kode_gejala' => 'required|string|min:2|max:8',
            'nama_gejala' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        $this->db->gejalalainnya->insertOne([
            'kode_gejala' => $request->kode_gejala,
            'nama_gejala' => $request->nama_gejala,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('data_gejala')->with('success', 'Gejala Berhasil ditambahkan');
    }

    public function deleteGejalaLainnya($_id)
    {
        try {
            $gejalaLainnya = gejalaLainnya::findOrFail($_id);
            $gejalaLainnya->delete();
            return redirect()->route('data_gejala')->with('success', 'Gejala Lainnya Berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('data_gejala')->with('error', 'Gejala Lainnya tidak ditemukan atau gagal dihapus');
        }
    }

    public function editGejalaLainnya($id)
    {
        try {
            $objectId = new ObjectId($id);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gejala tidak valid'], 400);
        }

        $gejalaLainnya = $this->db->gejalalainnya->findOne(['_id' => $objectId]);

        if (!$gejalaLainnya) {
            return response()->json(['error' => 'Gejala tidak ditemukan'], 404);
        }

        return response()->json($gejalaLainnya);
    }

    public function updateGejalaLainnya(Request $request, $id)
    {
        $request->validate([
            'kode_gejala' => 'required|string|min:2|max:8',
            'nama_gejala' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        try {
            $objectId = new ObjectId($id);
        } catch (\Exception $e) {
            return redirect()->route('data_gejala')->with('error', 'Gejala tidak valid');
        }

        $updateResult = $this->db->gejalalainnya->updateOne(
            ['_id' => $objectId],
            ['$set' => [
                'kode_gejala' => $request->kode_gejala,
                'nama_gejala' => $request->nama_gejala,
                'keterangan' => $request->keterangan,
            ]]
        );

        if ($updateResult) {
            return redirect()->route('data_gejala')->with('success', 'Gejala berhasil diperbarui');
        } else {
            return redirect()->route('data_gejala')->with('error', 'Gejala tidak berhasil diperbarui');
        }
    }
}
