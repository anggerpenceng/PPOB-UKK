<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Model\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getRole = Roles::query()->get();

        $data['selection'] = 2;

        return response()->view('content.roles.index' , compact('getRole' , 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

            Roles::query()->create([
                "nama_role" => $request->name
            ]);

            return redirect('/roles');

        }catch (\Exception $exception){
            return redirect('/roles')->withErrors(['cannot create roles']);
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
        try{

            Roles::query()->find($id)->update([
                "nama_role" => $request->name
            ]);

            return redirect('/roles')->with('info' , 'Sukses mengubah data');

        }catch (\Exception $exception){

            return redirect('/roles')->withErrors([$exception->getMessage()]);

        }
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

            Roles::destroy($id);
            return redirect('/roles')->with('info' , 'Sukses menghapus data');

        }catch (\Exception $exception){

            return redirect('/roles')->withErrors([$exception->getMessage()]);

        }
    }
}
