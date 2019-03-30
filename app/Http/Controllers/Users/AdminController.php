<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Model\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $getAdmin = User::query()
            ->whereHas('roles' , function ($query) {
                $query->where('nama_role' , '!=' , 'pelanggan');
            })
            ->orderBy('id' ,'DESC')
            ->get();

        $data['selection'] = 1;

        return response()->view('content.admin.index' , compact('getAdmin' , 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getRoles = Roles::query()->where('nama_role' , '!=' , 'pelanggan')->get();
        $data['selection'] = 1;

        return response()->view('content.admin.add' , compact('data' , 'getRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $array_address = [
                "address" => $request->address,
                "city" => $request->city,
                "state" => $request->state,
                "postcode" => $request->postcode,
                "country" => $request->country
            ];

            User::query()->create([
                "name" => $request->name,
                "password" => Hash::make($request->password),
                "username" => $request->username,
                "nomor_kwh" => 0,
                "alamat" => json_encode($array_address),
                "id_role" => $request->id_role,
            ]);

            return redirect('/admin');

        }catch (\Exception $exception){
            return redirect('/admin')->withErrors(['cannot create data']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
