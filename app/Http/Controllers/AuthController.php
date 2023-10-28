<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class AuthController extends Controller {
    public function index() {
        $user = auth()->user();
        if ($user->role == 1 || $user->role == 2) {
            return view('management-dashboard');
        } else if ($user->role == 3 || $user->role == 4 || $user->role == 5) {
            return view('sales-dashboard');
        } else if ($user->role == 6 || $user->role == 7 || $user->role == 8) {
            return view('service-desk-dashboard');
        }
    }
}
