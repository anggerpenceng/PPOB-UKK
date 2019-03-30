<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Model\Tarif;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getUser = User::with('roles')
            ->with('tarif')
            ->orderBy('id' ,'DESC')
            ->get();

        $data['selection'] = 1;

        return response()->view('content.users.index' , compact('getUser' , 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['selection'] = 1;
        $getTarif = Tarif::query()->get();

        return response()->view('content.users.add' , compact('data' , 'getTarif'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array_address = [
            "address" => $request->address,
            "city" => $request->city,
            "state" => $request->state,
            "postcode" => $request->postcode,
            "country" => $request->country
        ];

        $create = User::query()->create([
            "name" => $request->name,
            "password" => Hash::make($request->password),
            "username" => $request->username,
            "nomor_kwh" => $request->nomer_kwh,
            "alamat" => json_encode($array_address),
            "id_tarif" => $request->id_tarif,
            "id_role" => 2,
        ]);

        if ( ! $create){

            return redirect('/users')->withErrors(['cannot create data']);

        }

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getUser = User::with('roles')
            ->with('tarif')
            ->find($id);
        $getTarif = Tarif::query()->get();

        $data['selection'] = 1;

        return response()->view('content.users.edit' , compact('getUser' , 'data' , 'getTarif'));
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
        if (empty($request->password)){

            $array_address = [
                "address" => $request->address,
                "city" => $request->city,
                "state" => $request->state,
                "postcode" => $request->postcode,
                "country" => $request->country
            ];

            $create = User::query()->find($id)->update([
                "name" => $request->name,
                "username" => $request->username,
                "nomor_kwh" => $request->nomer_kwh,
                "id_tarif" => $request->id_tarif,
                "alamat" => json_encode($array_address),
            ]);

            if ( ! $create){

                return redirect('/users')->withErrors(['cannot update data']);

            }

            return redirect('/users');

        }

        $array_address = [
            "address" => $request->address,
            "city" => $request->city,
            "state" => $request->state,
            "postcode" => $request->postcode,
            "country" => $request->country
        ];

        $create = User::query()->find($id)->update([
            "name" => $request->name,
            "password" => Hash::make($request->password),
            "username" => $request->username,
            "nomor_kwh" => $request->nomer_kwh,
            "id_tarif" => $request->id_tarif,
            "alamat" => json_encode($array_address),
        ]);

        if ( ! $create){

            return redirect('/users')->withErrors(['cannot update data']);

        }

        return redirect('/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            User::query()->find($id)->delete();

            return redirect('/users');

        }catch (\Exception $exception){

            return redirect('/users')->withErrors(['Cannot delete data']);

        }
    }
}
