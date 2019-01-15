<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Forms\FaqForm;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\Form;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::paginate(10);
        return view('admin.faqs.faqs', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(FaqForm::class,[
            'url' => route('admin.faqs.store'),
            'method' => 'POST'
        ]);

        return view('admin.faqs.create', compact('form'));
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
        $form = \FormBuilder::create(FaqForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();

        Faq::create($data);

        $request->session()->flash('success', 'Dúvida frequente cadastrada com sucesso!');

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faqs
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return view ('admin.faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faqs
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $form = \FormBuilder::create(FaqForm::class,[
            'url' => route('admin.faqs.update', ['faq' => $faq->id]),
            'method' => 'PUT',
            'model' => $faq
        ]);

        return view('admin.faqs.edit', compact(['form', 'faq']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faqs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        /** @var Form $form */
        $form = \FormBuilder::create(FaqForm::class, [
            'data' => ['id' => $faq->id]
        ]);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();

        $faq->update($data);

        $request->session()->flash('success', 'Dúvida frequente atualizada com sucesso!');

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faqs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Faq $faq)
    {
        $faq->delete();
        $request->session()->flash('success', 'Dúvida frequente excluída com sucesso!');
        return redirect()->route('admin.faqs.index');
    }

    public function delete(Request $request, $id){
        $faq = Faq::findOrFail($id);

        $faq->delete();
        $request->session()->flash('success', 'Dúvida frequente excluída com sucesso!');
        return redirect()->route('admin.faqs.index');

    }
}
