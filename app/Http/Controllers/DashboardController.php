<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategoryies = Category::count();

        return view('index', compact('totalProducts', 'totalCategoryies'));
    }

    public function purchasePlan()
    {
        return view('user-plan');
    }

    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function showTConditions()
    {
        return view('admin.dashboard_terms_condition');
    }

    public function showPPolicy()
    {
        return view('admin.dashboard_privacy_policy');
    }

    public function deleteAccount()
    {
        return view('admin.dashboard_delete_account');
    }







}

