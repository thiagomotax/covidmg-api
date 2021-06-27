<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|Response|object
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users|email',
            'password' => 'required|string|confirmed',
            'is_admin' => 'integer',
            'is_active' => 'integer',
            'diffRoles' => 'nullable|array'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'is_admin' => $validated['is_admin'] ?? 0,
            'is_active' => $validated['is_active'] ?? 0,
            'password' => bcrypt($validated['password'])
        ]);
        if (isset($validated['diffRoles'])) {

            collect($validated['diffRoles'])->each(function ($item) use ($user) {
                $role = Role::where('name', $item)->first();
                $user->roles()->attach($role->id);
            });
        }

        return $user->load('roles');
    }

    /**
     * Update user
     *
     * @param Request $request
     * @param User $user
     * @return User
     */
    public function update(Request $request, User $user): User
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'is_admin' => 'required|integer',
            'is_active' => 'required|integer',
            'diffRoles' => 'nullable|array'
        ]);

        try {
            $user->update([
                'name' => $validated['name'],
                'is_admin' => $validated['is_admin'],
            ]);
            if (isset($validated['diffRoles'])) {
                collect($validated['diffRoles'])->each(function ($item) use ($user) {
                    $role = Role::where('name', $item)->first();
                    if ($user->hasRole($item)) {
                        $user->roles()->detach($role->id);
                    } else {
                        $user->roles()->attach($role->id);
                    }
                    $user->touch();
                });
            }

            return $user->load('roles');
        } catch (Exception $e) {
        }
        return response()->json(['success' => true]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response((User::with('roles')->get()));
    }

    /**
     * Logout user (delete tokens)
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Login user and create token
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();
        $user->last_login = now();
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $user->save();

        return response()->json([
            'access_token' => $token,
            'user' => $user,
            'message' => 'Successfully logged in'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @param Request $request
     * @return JsonResponse [json] user object
     */
    public function user(Request $request): JsonResponse
    {
        return response()->json($request->user());
    }

    /**
     * Get permissions of the authenticated User
     *
     * @param Request $request
     * @return JsonResponse [json] user object
     */
    public function permissions(Request $request): JsonResponse
    {
        $permissions = $request->user()->load('roles')->roles->map(function ($role) {
            return $role->name;
        });


        return response()->json([
            'permissions' => $permissions,
            'is_admin' => $request->user()->isAdmin(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user): Response
    {
        return response($user->delete());
    }
}
