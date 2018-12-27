<?php

namespace App\Http\Controllers;

use App\Forms\UserForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\FormBuilder;

class UsersController extends Controller
{
    public function list(){
        $users = User::all();
        return view('admin.users.users', compact('users'));
    }

    public function showForm(){
        $form = FormBuilder::create(UserForm::class,[
            'url' => route('admin.users.create'),
            'method' => 'POST'
        ]);

        return view('admin.users.create', compact('form'));
    }

    public function create(Request $request){
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        $request->session()->flash('success', 'Usuário criado com sucesso!');

        return redirect()->to('users');
    }


    public function edit(Request $request, $id){

    }

    public function delete(Request $request, $id){

        $user = User::findOrFail($id);

        if($user) {
            if($id == 1) {
                $request->session()->flash('error', 'Desculpe! O usuário principal não pode ser excluído.');
                return redirect()->to('users');

            }elseif ($id != Auth::user()->id) {
                $user->delete();
                $request->session()->flash('success', 'Usuário excluído com sucesso!');
                return redirect()->to('users');

            } else {
                $request->session()->flash('error', 'Desculpe! Este usuário não pode ser excluído.');
                return redirect()->to('users');
            }
        }
    }
}
