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
        /** @var Form $form */
        $form = \FormBuilder::create(LotteryForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $data['kina'] = str_replace(',', '.', $data['kina']);
        $data['keno'] = str_replace(',', '.', $data['keno']);
        $data['price'] = str_replace(',', '.', $data['price']);

        Lottery::create($data);

        $request->session()->flash('success', 'Sorteio cadastrado com sucesso!');

        return redirect()->route('admin.lotteries.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function show(Lottery $lottery)
    {
        return view ('admin.lotteries.show', compact('lottery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function edit(Lottery $lottery)
    {
        $form = \FormBuilder::create(LotteryForm::class,[
            'url' => route('admin.lotteries.update', ['lottery' => $lottery->id]),
            'method' => 'PUT',
            'model' => $lottery
        ]);

        return view('admin.lotteries.edit', compact(['form', 'lottery']));
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
        /** @var Form $form */
        $form = \FormBuilder::create(LotteryForm::class, [
            'data' => ['id' => $lottery->id]
        ]);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $data['kina'] = str_replace(',', '.', $data['kina']);
        $data['keno'] = str_replace(',', '.', $data['keno']);
        $data['price'] = str_replace(',', '.', $data['price']);

        $lottery->update($data);

        $request->session()->flash('success', 'Sorteio atualizado com sucesso!');

        return redirect()->route('admin.lotteries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lottery $lottery)
    {
        $lottery->delete();
        $request->session()->flash('success', 'Sorteio excluído com sucesso!');
        return redirect()->route('admin.lotteries.index');
    }

    public function delete(Request $request, $id){
        $lottery = Lottery::findOrFail($id);

        $lottery->delete();
        $request->session()->flash('success', 'Sorteio excluído com sucesso!');
        return redirect()->route('admin.lotteries.index');

    }

    public function winners()
    {
        $lotteries = Lottery::where([
            ['card_kina', '!=', ''],
            ['card_keno', '!=', ''],
            ])
            ->orderBy('date')
            ->orderBy('time')
            ->get();

        return view('admin.lotteries.winners', compact('lotteries'));
    }

    public function results()
    {
        $lotteries = Lottery::where('results', '!=', '')
            ->orderBy('date')
            ->orderBy('time')
            ->get();

        return view('admin.lotteries.results', compact('lotteries'));
    }
}
