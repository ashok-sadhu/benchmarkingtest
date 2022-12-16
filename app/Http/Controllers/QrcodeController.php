<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use Validator;
use App\Models\User;

class QrcodeController extends Controller
{

    public function generateqr(Request $request) {

        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'size' => 'required|numeric',
            'background_color' => 'required',
            'fill_color' => 'required',
        ]);
        if ($validator->passes()) {
            $data = $request->all();
            $dataArr['content']          = 'Test';
            $dataArr['size']             = 300;
            $dataArr['background_color'] = '';
            $dataArr['fill_color']       = '';
            if(isset($data['content']) && !empty($data['content'])) {
                $dataArr['content'] = $data['content'];
            }
            if(isset($data['size']) && !empty($data['size'])) {
                $dataArr['size'] = $data['size'];
            }
            if(isset($data['background_color'])) {
                $background_color = str_replace("rgb(", '', $data['background_color']);
                $background_color = str_replace(")", '', $background_color);
                $background_color = array_map('intval', explode(',', $background_color));
                $dataArr['background_color'] = $background_color;
            }
            if(isset($data['fill_color'])) {
                $fill_color = str_replace("rgb(", '', $data['fill_color']);
                $fill_color = str_replace(")", '', $fill_color);
                $fill_color = array_map('intval', explode(',', $fill_color));
                $dataArr['fill_color'] = $fill_color;
            }
            $returnHTML = view('qrcode')->with('dataArr', $dataArr)->render();
            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
