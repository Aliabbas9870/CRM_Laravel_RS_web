<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use App\Models\backend\Admin;
use App\Models\backend\AdminEnquireModel;
use App\Models\backend\Task;
use App\Models\User;

class AdminController extends Controller
{
    // Show the admin login form


    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index'); // Redirect to user dashboard if already logged in
        }
        return view('backend.adminLogin'); // Return the admin login view
    }

    // Handle admin login
    public function login(Request $request)
    {


        $admin = Admin ::where('email', $request->input('email'))->where('password', $request->input('password'))->first();
        if($admin){
            session()->put('id', $admin->id);
            session()->put('name', $admin->name);
            session()->put('email', $admin->email);
            return redirect('/admin')->with('success', 'Login Success');

        } else {
            return redirect('admin/login')->with('error', 'Invalid Credentials.');
        }
        // Validate incoming request

        // Attempt to authenticate the admin using the credentials


        // Authentication failed, redirect back with error

    }

    public function logout()
    {
        session()->forget('id');
        session()->forget('name');

        session()->forget('email');
        Auth::logout(); // Log the admin out
        return redirect('/admin/login')->with('success', 'You have been logged out.'); // Redirect to the login page with a success message
    }

    // Display admin dashboard
    public function index(Request $request)
    {
        // Get the sorting order from the URL query parameter (default to 'desc')
        $sortOrder = $request->get('sort', 'desc');

        // Fetch the enquiries with sorting by created_at field
        $enquiry = AdminEnquireModel::orderBy('created_at', $sortOrder)->get();

        if (session()->has('email')) {
            $tasks = Task::orderBy('created_at', 'desc')->get();
            $Name = session('name') . " " . session('email');
            $TotalAdminModel = Admin::count();
            $taskTotal = Task::count();
            $TotalTeamMember = User::count();
            // $TotalEnqury = AdminEnquireModel::count();

            $allEnquiries = AdminEnquireModel::all();

$unique = [];
$uniqueEnquiries = $allEnquiries->filter(function ($item) use (&$unique) {
    $email = strtolower(trim($item->email));
    $phone = preg_replace('/\D+/', '', $item->phone);
    $key = $email . '-' . $phone;

    if (in_array($key, $unique)) {
        return false;
    }

    $unique[] = $key;
    return true;
});

$TotalEnqury = $uniqueEnquiries->count();

            $completedTasksCount = $tasks->where('is_completed', true)->count();
            $incompleteTasksCount = $tasks->where('is_completed', false)->count();

            return view('backend.index', [
                // 'enquirey' => AdminEnquireModel::get(),
                'enquiry' => $enquiry, // Pass the sorted enquiries to the view
                'TotalEnqury' => $TotalEnqury,
                'TotalTeamMember' => $TotalTeamMember,
                'TotalAdminModel' => $TotalAdminModel,
                'tasks' => $tasks,
                'taskTotal' => $taskTotal,
                'incompleteTasksCount' => $incompleteTasksCount,
                'completedTasksCount' => $completedTasksCount
            ]);
        } else {
            return view('backend.adminLogin');
        }
    }



}
