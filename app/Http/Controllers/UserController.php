<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use session;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function index()
    {
        return view('backend.users.index');
    }
}
