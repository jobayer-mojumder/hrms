<?php
/**
 * Created by PhpStorm.
 * User: jobayer
 * Date: 9/16/18
 * Time: 1:39 PM
 */

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Image;
use app\User;

class Company_admin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function check_user() {
        if (Auth::check()) {
            if (Auth::user()->group == 1 || Auth::user()->group == 2) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

}