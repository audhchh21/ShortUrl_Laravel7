<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Shorturl;

class ShorturlController extends Controller
{
    //
    public function shorturlAll(Shorturl $shorturl)
    {
        return $this->responseSuccess($shorturl->all());
    }

    //
    public function shorturlCreate(Request $request, Shorturl $shorturl)
    {
        $input = [
            'shortUserID' => null,
            'shortCode' => Str::random(5),
            'shortLink' => $request->get('link'),
            'shortPwd' => $request->get('password') != '' ? Hash::make($request->get('password')) : null,
            'shortClick' => 0,
        ];

        try {
            $data = $shorturl->create($input);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return $this->responseError($e->getMessage());
        }
        return $this->responseSuccess($data);
    }

    //
    protected function responseSuccess($res)
    {
        return response()->json(["status" => "success", "data" => $res], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Content-Type', 'application/json')
            ->header('Access-Control-Max-Age','1000');
    }

    //
    protected function responseError($msg)
    {
        return response()->json(["status" => "error", "data" => $msg], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Content-Type', 'application/json')
            ->header('Access-Control-Max-Age','1000');
    }
}
