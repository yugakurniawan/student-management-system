<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Student;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.main');
    }
}
