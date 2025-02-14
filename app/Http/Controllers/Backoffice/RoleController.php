<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function indexPage()
    {
        return Inertia::render('Backoffice/Roles/Index');
    }

    public function index()
    {
        $roles = Role::get();

        return response()->json([
            'data' => $roles,
        ]);
    }

    public function create()
    {
        return Inertia::render('Backoffice/Roles/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:roles,name'],
        ]);

        $role = new Role($request->only('name'));
        $role->slug = Str::slug($request->input('name'));

        $role->save();

        return response()->json([
            'message' => 'Rol registrado correctamente',
            'role' => $role,
        ]);
    }

    public function destroy(string $role)
    {
        $role = Role::find($role);

        abort_if(is_null($role), 404);

        $role->delete();

        return response()->json([
            'message' => 'Rol eliminado correctamente'
        ]);
    }
}
