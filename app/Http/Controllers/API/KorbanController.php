<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Korban;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\KorbanResource;

class KorbanController extends Controller
{
    public function index()
    {
        $Korbans = Korban::all();
        return response(['Korbans' => KorbanResource::collection($Korbans), 'message' => 'Data berhasil ditampilkan', 200]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data,[
            'Browserd' => 'required|max:255',
            'ipAddrs' => 'required',
        ]);

        if ($validator->fails()){
            return response(['error'=>$validator->errors(), 'Validasi data Browserd atau ipAddrs salah!']);
        }

        $Korban = Korban::create($data);
        return response(["Korban" =>new KorbanResource($Korban), "message"=>"Data Korban berhasil ditambahkan."],200);
    }

    public function show(Korban $Korban)
    {
        return response(["Korban" =>new KorbanResource($Korban), "message"=>"Data Korban berhasil diambil."],200);
    }

    public function update(Request $request, Korban $Korban)
    {
        $Korban->update($request->all());
        return response(["Korban" =>new KorbanResource($Korban), "message"=>"Data Korban berhasil diubah."],200);
    }

    public function destroy(Korban $Korban)
    {
        $Korban->delete();
        return response(["message"=>"Data terhapus"], 200);
    }
}
