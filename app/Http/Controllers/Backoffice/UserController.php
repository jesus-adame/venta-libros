<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function indexPage()
    {
        return Inertia::render('Backoffice/Users/Index');
    }

    public function index()
    {
        $users = User::with('role')->get();

        return response()->json([
            'data' => $users,
        ]);
    }

    public function create()
    {
        return Inertia::render('Backoffice/Users/Create');
    }

    public function store(CreateUserRequest $request)
    {
        $user = new User($request->all());
        $user->save();

        return response()->json([
            'message' => 'Editado correctamente',
            'data' => $user,
        ]);
    }

    public function edit(string $user)
    {
        $user = User::with('role')->find($user);

        abort_if(is_null($user), 404);

        return Inertia::render('Backoffice/Users/Edit', [
            'user' => $user,
        ]);
    }

    public function update(string $user, UpdateUserRequest $request)
    {
        $user = User::with('role')->find($user);

        abort_if(is_null($user), 404);

        $user->update($request->except(['password']));

        if ($request->input('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return response()->json([
            'message' => 'Editado correctamente',
            'data' => $user,
        ]);
    }

    public function destroy(string $user)
    {
        $user = User::find($user);

        abort_if(is_null($user), 404);

        $user->delete();

        return response()->json([
            'message' => 'Eliminado correctamente',
        ]);
    }
}
