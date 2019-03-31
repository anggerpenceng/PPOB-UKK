<?php

namespace App\Http\Controllers\Penggunaan;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class TagihanController extends Controller
{

    /**
     * Open and list data tagihan users
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $id = Auth::id();
        $getUser = User::with('penggunaan')
            ->with('tarif')
            ->find($id);
        $data['selection'] = 1;

        return response()->view('users_content.tagihan' , compact('getUser' , 'data'));

    }

}