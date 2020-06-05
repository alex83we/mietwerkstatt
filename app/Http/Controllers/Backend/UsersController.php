<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('backend.users.index')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        if (Gate::denies('edit-users')) {
            return redirect(route('backend.users.index'));
        }
        $roles = Role::all();

        return view('backend.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        if ($user->save()) {
            toastr()->success('Der Benutzer ' . $user->vorname . ' ' . $user->name . ' wurde aktualisiert!');
        } else {
            toastr()->error('Beim Aktualisieren des Benutzers ' . $user->vorname . ' ' . $user->name . 'ist ein Fehler aufgetreten!');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        if (Gate::denies('delete-users')) {
            return redirect(route('backend.users.index'));
        }
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('backend.users.index');
    }
}
