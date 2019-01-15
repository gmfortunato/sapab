<?php

namespace App\Http\Controllers\Admin;

use App\Forms\UserForm;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\Form;

class UsersController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return view('admin.users.users', compact('users'));
    }

    public function create(){
        $form = \FormBuilder::create(UserForm::class,[
            'url' => route('admin.users.store'),
            'method' => 'POST'
        ]);

        return view('admin.users.create', compact('form'));

    }

    public function store(Request $request){

        /** @var Form $form */
        $form = \FormBuilder::create(UserForm::class);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        $request->session()->flash('success', 'Usuário criado com sucesso!');

        return redirect()->route('admin.users.index');

    }

    public function show(User $user){
        return view ('admin.users.show', compact('user'));
    }


    public function edit(User $user){
        $form = \FormBuilder::create(UserForm::class,[
            'url' => route('admin.users.update', ['user' => $user->id]),
            'method' => 'PUT',
            'model' => $user
        ]);

        return view('admin.users.edit', compact(['form', 'user']));
    }

    public function update(Request $request, User $user){

        /** @var Form $form */
        $form = \FormBuilder::create(UserForm::class, [
            'data' => ['id' => $user->id]
        ]);

        if(!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $data['password'] = bcrypt($data['password']);

        $user->update($data);

        $request->session()->flash('success', 'Usuário alterado com sucesso!');

        return redirect()->route('admin.users.index');
    }

    public function destroy(Request $request, User $user){

        $id = $user->id;

        if($id == 1) {
            $request->session()->flash('error', 'Desculpe! O usuário principal não pode ser excluído.');
            return redirect()->route('admin.users.index');

        }elseif ($id != Auth::user()->id) {
            $user->delete();
            $request->session()->flash('success', 'Usuário excluído com sucesso!');
            return redirect()->route('admin.users.index');

        } else {
            $request->session()->flash('error', 'Desculpe! Este usuário não pode ser excluído.');
            return redirect()->route('admin.users.index');
        }
    }

    public function delete(Request $request, $id){
        $user = User::findOrFail($id);

        if($user->id == 1) {
            $request->session()->flash('error', 'Desculpe! O usuário principal não pode ser excluído.');
            return redirect()->route('admin.users.index');

        }elseif ($user->id != Auth::user()->id) {
            $user->delete();
            $request->session()->flash('success', 'Usuário excluído com sucesso!');
            return redirect()->route('admin.users.index');

        } else {
            $request->session()->flash('error', 'Desculpe! Este usuário não pode ser excluído.');
            return redirect()->route('admin.users.index');
        }

    }
}
