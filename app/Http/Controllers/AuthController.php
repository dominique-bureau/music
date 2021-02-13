<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    function register(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);

        try {
            $user = new User();
            $user->fill($request->all());
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['status_code' => 200, 'message' => 'User created']);
        } catch (\Exception $ex) {
            return response()->json([
                        'message' => $ex->getMessage(),
                        'error' => $validator->errors()
                            ], 405);
        }
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                        'message' => 'Invalid input',
                        'error' => $validator->errors()
                            ], 405);
        }
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                        'message' => 'Unauthorized'
                            ], 403);
        }
        try {

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                        'token' => $tokenResult,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                        'message' => 'Internal server error',
                        'error' => $e->getMessage()
                            ], 500);
        }
    }

    function logout(Request $request) {
        try {

            $request->user()->currentAccessToken()->delete();
            return response()->json([
                        'message' => 'logout successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                        'message' => 'Internal server error',
                        'error' => $e->getMessage()
                            ], 500);
        }
    }

}
