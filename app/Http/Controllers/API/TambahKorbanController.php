<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Korban;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\KorbanResource;

class TambahKorbanController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data,[
            'Browserd' => 'required|max:255',
        ]);

        if ($validator->fails()){
            return response(['error'=>$validator->errors(), 'Validasi data Browserd atau ipAddrs salah!']);
        }

        $Korban = Korban::create($data);
        return response(["Korban" =>new KorbanResource($Korban), "message"=>"Data Korban berhasil ditambahkan."],200);
    }
}
