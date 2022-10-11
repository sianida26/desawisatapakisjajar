<?php

namespace App\Http\Controllers;

use App\Models\Umkm;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UmkmController extends Controller
{

    public function all(Request $request){
        $key = $request->query('q');
        $userId = $request->user()->id;
        return DB::table('umkms')
            ->where('owner_id',$userId)
            ->leftJoin('users','users.id','=','umkms.owner_id')
            ->select('umkms.id as id', 'users.name as pemilik', 'umkms.name as name', 'umkms.jenis_usaha as jenisUsaha')
            ->get();
    }

    public function getById($id){
        return DB::table('umkms')
            ->select('id','name','jenis_usaha as jenisUsaha', 'address', 'whatsapp', 'phone', 'ig')
            ->where('id','=',$id)
            ->first();
    }

    //
    public function create(Request $request){

        $rules = [
            'name' => 'required',
            'jenisUsaha' => 'required',
            'address' => 'required',
            'whatsapp' => ['nullable','regex:/^\+?[0-9]{10,14}$/'],
            'phone' => ['nullable','regex:/^\+?[0-9]{10,14}$/'],
            'ig' => 'nullable' 
        ];

        $messages = [
            'required' => 'Harus diisi',
            'regex' => 'Format tidak sesuai',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors(), 'messages' => 'Terdapat data yang tidak sesuai. Silakan coba lagi.'], 422);
        }

        $umkm  = Umkm::create([
            'name' => $request->name,
            'jenis_usaha' => $request->jenisUsaha,
            'address' => $request->address,
            'whatsapp' => $request->whatsapp,
            'phone' => $this->formatPhone($request->phone),
            'whatsapp' => $this->formatPhone($request->phone),
            'ig' => $request->ig,
            'owner_id' => Auth::id(),
        ]);

        return $umkm;

    }

    public function update(Request $request, $id){

        $rules = [
            'name' => 'required',
            'jenisUsaha' => 'required',
            'address' => 'required',
            'whatsapp' => ['nullable','regex:/^\+?[0-9]{10,14}$/'],
            'phone' => ['nullable','regex:/^\+?[0-9]{10,14}$/'],
            'ig' => 'nullable' 
        ];

        $messages = [
            'required' => 'Harus diisi',
            'regex' => 'Format tidak sesuai',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors(), 'messages' => 'Terdapat data yang tidak sesuai. Silakan coba lagi.'], 422);
        }

        $umkm  = Umkm::findOrFail($id)->update([
            'name' => $request->name,
            'jenis_usaha' => $request->jenisUsaha,
            'address' => $request->address,
            'whatsapp' => $request->whatsapp,
            'phone' => $this->formatPhone($request->phone),
            'whatsapp' => $this->formatPhone($request->phone),
            'ig' => $request->ig,
        ]);

        return $umkm;

    }

    public function delete($id){
        return Umkm::findOrFail($id)->delete();
    }

    private function formatPhone($phone){

        //jika sesuai format atau kosong, return $phone
        if (Str::startsWith($phone, '62') || !$phone) return $phone;

        //mengubah 0812345678 --> 62812345678
        if (Str::startsWith($phone, '0')) return "62" . Str::after($phone, '0');

        //mengubah 812345678 --> 62812345678
        return "62" . $phone;
    }
}
