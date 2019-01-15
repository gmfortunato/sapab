<?php

namespace App\Http\Controllers\Admin;

use App\Forms\PlaceForm;
use App\Models\Place;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\Form;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::paginate(10);
        return view('admin.places.places', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(PlaceForm::class,[
            'url' => route('admin.places.store'),
            'method' => 'POST'
        ]);

        return view('admin.places.create', compact('form'));
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
        $form = \FormBuilder::create(PlaceForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();

        Place::create($data);

        $request->session()->flash('success', 'Ponto credenciado cadastrado com sucesso!');

        return redirect()->route('admin.places.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        return view ('admin.places.show', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        $form = \FormBuilder::create(PlaceForm::class,[
            'url' => route('admin.places.update', ['place' => $place->id]),
            'method' => 'PUT',
            'model' => $place
        ]);

        return view('admin.places.edit', compact(['form', 'place']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        /** @var Form $form */
        $form = \FormBuilder::create(PlaceForm::class, [
            'data' => ['id' => $place->id]
        ]);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();

        $place->update($data);

        $request->session()->flash('success', 'Ponto credenciado atualizado com sucesso!');

        return redirect()->route('admin.places.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Places  $places
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Place $place)
    {
        $place->delete();
        $request->session()->flash('success', 'Ponto credenciado excluído com sucesso!');
        return redirect()->route('admin.places.index');
    }

    public function delete(Request $request, $id){
        $place = Place::findOrFail($id);

        $place->delete();
        $request->session()->flash('success', 'Ponto credenciado excluído com sucesso!');
        return redirect()->route('admin.places.index');

    }
}
