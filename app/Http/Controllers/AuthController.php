<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UserTransformer;
use Auth;
class AuthController extends Controller
{
  public function show(){
    $users = User::all();

    // return fractal()
    //   ->collection($users)
    //   ->transformWith(new UserTransformer)
    //   ->toArray();
     return response()->json($users);
  }

    public function register(Request $request,User $user){
      $this->validate($request,[
        'name'      => 'required|min:5',
        'email'     => 'required|email|unique:users',
        'password'  => 'required|min:6',
      ]);

      $user = $user->create([
        'name'      => $request->name,
        'email'     => $request->email,
        'password'  => bcrypt($request->password),
        'api_token' => bcrypt($request->email),
      ]);

      // $response = fractal()
      //       ->item($user)
      //       ->transformWith(new UserTransformer)
      //       ->toArray();
      // return response()->json($response, 201);

      return [
        'message' => 'register successful',
        'status'  => '1',
        'data' => $user
      ];
    }

    public function login(Request $request, User $user){
      if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return response()->json([
          'message' => 'Login Failed',
          'status' => '0'],401);
      }

      $user = $user->find(Auth::user()->id);
      // $response = fractal()
      // ->item($user)
      // ->transformWith(new UserTransformer)
      // ->toArray();

      // return response()->json($response, 200);


      return [
        'message' => 'login successful',
        'status'  => '1',
        'data' => $user
      ];
    }
}
