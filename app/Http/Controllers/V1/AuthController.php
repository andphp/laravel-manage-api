<?php

namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use App\Models\SysUser;
use App\Rules\AccountIsEmailOrPhone;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * 登录
     * @param Request $request
     */
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'account'   => ['required', new AccountIsEmailOrPhone()],
            'password' => ['required', "between:6,18"],
        ]);
        $account = $validatedData['account'];
        $password = $validatedData['password'];

        // 登录

        return $this->success();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
