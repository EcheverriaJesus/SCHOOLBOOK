<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticeStoreRequest;
use App\Http\Requests\NoticeUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $roles = Role::all();
        return view('user.edit', compact('user','roles'));
    }

    /* public function edit(User $user): View
    {
        $roles = Role::all();
        return view('user.edit', compact('user','roles'));
    } */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('user.index', $user)->with('info', 'Se asignaron los roles correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user): Response
    {
        $user->delete();
        return redirect()->route('user.index');

    }
}
