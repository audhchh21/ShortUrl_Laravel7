<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Shorturl;

class ShorturlController extends Controller
{
    //
    public function shorturlRedirect(Shorturl $shorturl, $path)
    {
        $data = $shorturl->where('shortCode', $path)->first();
        $data->shortClick = $data->shortClick + 1;
        try {
            $data->save();
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('main');
        }
        return redirect()->away($data->shortLink);
    }

    //
    public function shorturlPassword()
    {
        return view('checkpwd');
    }

    //
    public function shorturlCheckPassword(Request $request, Shorturl $shorturl, $path)
    {
        $data = $shorturl->where('shortCode', $path)->first();
        if(Hash::check($request->password, $data->shortPwd)){
            return redirect()->away($data->shortLink);
        }
        return redirect()->route('path.pass', ['path' => $path])->with('status', 'Incorrect password!!');
    }
}
