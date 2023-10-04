<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\View\Components\UserUpdateComponent;
use App\View\Components\UserUpdateTbodyComponent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $userUpdateComponent = new UserUpdateComponent($user);
        return response()->json(['success' => $userUpdateComponent->resolveView()->render()], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user->name = $request->name;
            if ($this->uniqueEmail($request, $id, $user->email)) $user->email = $request->email;
            if (array_key_exists('password', $request->all()) && !empty($request->password)) $user->password = Hash::make($request->password);
            $user->update();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return response()->json(['success' => $this->addUserToTbody()], Response::HTTP_OK);
    }

    private function uniqueEmail($request, $userId, $userEmail)
    {
        $uniqueUser = User::where('email', $request->email)->first();
        if ($uniqueUser && $uniqueUser->id !== $userId && $userEmail !== $request->email) throw ValidationException::withMessages(['email' => 'ایمیل باید خاص باشد']);

        return true;
    }

    public function addUserToTbody()
    {
        $users = User::all();
        $userTbodyComponent = new UserUpdateTbodyComponent($users);
        return $userTbodyComponent->resolveView()->render();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        $user = User::find($userId);
        try {
            DB::beginTransaction();

            User::find($userId)->update([
                'status' => $user->status == User::LOCK_ACCOUNT ? User::UNLOCK_ACCOUNT : User::LOCK_ACCOUNT
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        $users = User::all();
        $userTbodyComponent = new UserUpdateTbodyComponent($users);
        return response()->json(['success' => $userTbodyComponent->resolveView()->render()], Response::HTTP_OK);
    }
}
