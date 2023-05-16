<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Validator;

class PrizeController extends Controller
{
    public function index ()
    {
        $response = Http::get('https://fakestoreapi.com/products');
        $response->json();
        $response = $response->json();
        foreach ($response as $key => $value) {
            $prize = DB::table('prize')->where('id_product', $value['id'])->exists();
            if ($prize) {
                $response[$key]['prize'] =  DB::table('prize')->where('id_product',$value['id'])->first();;
            } else {
                $response[$key]['prize'] =0;
            }
        }
        return view( 'prize/index',compact('response'));
    }

    public function create (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email|unique:prize'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                "message" => "email ya existe"
            ], 403);
        }
         DB::table('prize')->insert($request->except('_token'));
        return response()->json([
            "message" => "prize record created"
        ], 201);
    }
    public function edit(Request $request)
    {
        $prize = DB::table('prize')->where('id',$request->id)->first();
        return response()->json([
            "data" => $prize
        ], 201);
    }

    public function update( Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:prize,email,'.$request->id,
        ]);
        if ($validator->fails())
        {
            return response()->json([
                "message" => "email ya existe"
            ], 403);
        }
          DB::table('prize')
            ->where('id',$request->id)
            ->update($request->except('id_product','token', 'id'));
        return response()->json([
            "message" => "prize record updated"
        ], 201);
    }



}
