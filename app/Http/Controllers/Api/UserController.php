<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::select('id', 'name', 'email', 'age')->get();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (is_null($user)) {
            return response()->json(['status' => 'User not found'], 404);
        }

        return $user;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->only([
        //     'name',
        //     'email',
        //     'age',
        //     'password',
        // ]);

        // $data['password'] = Hash::make($data['password']);

        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'age' => ['nullable', 'integer'],
            'password' => ['required'],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $newUser = new User($validatedData);

        // TODO User exists

        if ($newUser->save()) {
            return response()->json(['status' => 'New user created successfully'], 201);
        } else {
            return response()->json(['status' => 'Could not add a user'], 422);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'age' => ['nullable', 'integer']
        ]);

        $user->update($validatedData);

        return response()->json(['message' => 'User updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return response()->json(['status' => 'User not found'], 404);
        }

        if ($user->delete()) {
            return response()->json(['status' => 'The user was deleted successfully'], 200);
        } else {
            return response()->json(['status' => 'Could not to delete the user'], 422);
        }
    }
}
