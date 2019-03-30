<?php

namespace App\Http\Controllers\Tarif;

use App\Http\Controllers\Controller;
use App\Model\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getTarif = Tarif::query()->get();

        $data['selection'] = 3;

        return response()->view('content.tarif.index' , compact('getTarif' , 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = Tarif::query()->create([
            "daya" => $request->daya,
            "tarifperkwh" => $request->tarifperkwh,
        ]);

        if ( ! $create){

            return redirect('/tarif')->withErrors(['cannot create data']);

        }

        return redirect('/tarif');
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
        $create = Tarif::query()->find($id)->update([
            "daya" => $request->daya,
            "tarifperkwh" => $request->tarifperkwh,
        ]);

        if ( ! $create){

            return redirect('/tarif')->withErrors(['cannot update data']);

        }

        return redirect('/tarif');
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

            Tarif::query()->find($id)->delete();

            return redirect('/tarif');

        }catch (\Exception $exception){

            return redirect('/tarif')->withErrors(['Cannot delete data']);

        }
    }
}
