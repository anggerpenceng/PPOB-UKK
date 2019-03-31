<?php

namespace App\Http\Controllers\Penggunaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\PenggunaanRequest;
use App\Model\Penggunaan;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PenggunaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getUser = User::with('tarif')
            ->whereHas('roles' , function ($query){
                $query->where('nama_role' , '=' , 'pelanggan');
            })
            ->where('id_tarif' , '!=' , null)
            ->orderBy('id' ,'DESC')
            ->get();

        $data['selection'] = 4;

        return response()->view('content.penggunaan.index' , compact('getUser' , 'data'));
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
     * @param PenggunaanRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function store(PenggunaanRequest $request)
    {
        try{

            $awal = $request->meter_awal;
            $akhir = $request->meter_akhir;

            $penggunaan = new Penggunaan;

            $penggunaan->id_pelanggan = $request->id_user;
            $penggunaan->bulan = $request->month;
            $penggunaan->tahun = $request->year;
            $penggunaan->meter_awal = $awal;
            $penggunaan->meter_akhir = $akhir;
            $penggunaan->jumlah_meter = $akhir - $awal;
            $penggunaan->status = 0;

            $penggunaan->saveOrFail();
            return redirect('/penggunaan');

        }catch (\Exception $exception){

            if ($exception instanceof ModelNotFoundException){

                return redirect('/penggunaan/'.$request->id_user)->withErrors([$exception->getMessage()]);

            }else if ($exception instanceof ValidationException){

                return redirect('/penggunaan/'.$request->id_user)->withErrors([$exception->getMessage()]);

            }
            return redirect('/penggunaan/'.$request->id_user)->withErrors([$exception->getMessage()]);

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
        $data['selection'] = 4;
        $month = [
            "Januari" , "Februari" ,
            "Maret" , "April" ,
            "Mei" , "Juni" ,
            "Juli" , "Agustus" ,
            "September" , "Oktober" ,
            "November" , "Desember"
        ];

        $yearNow = Carbon::now()->year + 10;
        $getUser = User::query()->find($id);

        return response()->view('content.penggunaan.add' , compact('data' , 'month' , 'yearNow' , 'getUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getPenggunaan = User::with('penggunaan')
            ->find($id);

        $data['selection'] = 4;

        return response()->view('content.penggunaan.edit' , compact('getPenggunaan' , 'data'));

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
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        try{

            Penggunaan::destroy($id);

            return redirect('/penggunaan/'.$request->id_user.'/edit');

        }catch (\Exception $exception){

            return redirect('/penggunaan/'.$request->id_user.'/edit')->withErrors([$exception->getMessage()]);

        }
    }

    /**
     * View detail tagihan of some users
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function tagihan(Request $request){

        $getPenggunaan = User::with('penggunaan')
            ->find($request->id_user);

        $data['selection'] = 4;

        return response()->view('content.penggunaan.tagihan' , compact('getPenggunaan' , 'data'));

    }

}
