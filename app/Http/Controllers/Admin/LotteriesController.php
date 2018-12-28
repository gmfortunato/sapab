<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lottery;
use Illuminate\Http\Request;
use App\Forms\LotteryForm;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\Form;

class LotteriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotteries = Lottery::paginate(10);
        return view('admin.lotteries.lotteries', compact('lotteries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(LotteryForm::class,[
            'url' => route('admin.lotteries.store'),
            'method' => 'POST'
        ]);

        return view('admin.lotteries.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function show(Lottery $lottery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function edit(Lottery $lottery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lottery $lottery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lottery $lottery)
    {
        //
    }
}
