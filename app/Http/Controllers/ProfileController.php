<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function get(Request $request, $token) {
        $user = Profile::firstOrNew(['token' => $token]); 
        $user->save();
        return response()->json($user);
    }

    public function changeName(Request $request) {
        $user = Profile::firstWhere('token', $request['userToken']); 
        $user->username = $request['username'];
        $user->save();
        return response()->json($user);
    }
}
