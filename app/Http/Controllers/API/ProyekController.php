<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Proyek;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Resource\ProyekResource;

class ProyekController extends Controller
{
    public function index()
    {
        $proyek = Proyek::all();
        return response(['proyeks' => ProyekResource::collection($proyeks), 'message' => 'Data berhasil ditampilkan', 200]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data,[
            'nama' => 'required|max:255',
            'harga' => 'required',
        ]);

        if ($validator->fails()){
            return response(['error'=>$validator->errors(), 'Validasi data nama atau harga salah!']);
        }

        $proyek = Proyek::create($data);
        return response(["proyek" =>new ProyekResource($proyek), "message"=>"Data proyek berhasil ditambahkan."],200);
    }

    public function show(Proyek $proyek)
    {
        return response(["proyek" =>new ProyekResource($proyek), "message"=>"Data proyek berhasil diambil."],200);
    }

    public function update(Request $request, Proyek $proyek)
    {
        $proyek->update($request->all());
        return response(["proyek" =>new ProyekResource($proyek), "message"=>"Data proyek berhasil diubah."],200);
    }

    public function destroy(Proyek $proyek)
    {
        $proyek->delete();
        return response(["message"=>"Data terhapus"], 200);
    }
}
