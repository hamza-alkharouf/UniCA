<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Controller;
use App\Models\User;
use App\Rules\alpha_spaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->adminTemplate('users.index',__('users'),['users'=>user::all()]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->adminTemplate('users.create',__('Create user'),['user'=>new User()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type_username_id' => ['required','max:22','min:3','unique:users,type_username_id'],
            'name' => ['required','max:250','min:3','unique:users,name',new alpha_spaces],
            'type' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        ]);
        $validator->validate();
        $user = new User;
        $user->type_username_id = $request->post('type_username_id');
        $user->name = $request->post('name');
        $user->type = $request->post('type');
        $user->email = $request->post('email');
        $userPassword = Str::random(10);
        $user->password = Hash::make($userPassword);
        $user->save();



        Password::sendResetLink(
            $request->only('email')
        );
        Password::RESET_LINK_SENT;

        return redirect()->back()->with('success',__('Go to email to change reset password'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $this->adminTemplate('users.edit',__('Edit user'),['user'=>$user]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return  redirect()->route('admin.users.index')->with('success', __('Success Deleted'));
    }

}
