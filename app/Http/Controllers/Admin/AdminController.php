<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{

    use AuthorizesRequests, ValidatesRequests;

    public function downloadBackup()
    {
        Artisan::call('app:backup-database-command');

        $databaseName = config('database.connections.mysql.database');
        $date = date('Y-m-d_H-i-s');
        $file = storage_path("app/{$databaseName}_{$date}_backup.sql");

        return Response::download($file);
    }

    //Admin DashBoard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    //AdminProfile
    public function AdminProfile()
    {
        $id = Auth::guard('admin')->user()->id;
        $profileData = Admin::find($id);

        $roles = Role::latest()->get();

        return view('admin.pages.profile.admin_profile', compact('profileData','roles'));
    }

    //AdminProfileUpdate
    public function AdminProfileUpdate(Request $request)
    {

        $id = Auth::guard('admin')->user()->id;
        $update = Admin::findOrFail($id);

        $update->name = $request->name;
        $update->company_name = $request->company_name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;
        $update->degination = $request->degination;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $update->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/'), $filename);
            $update['photo'] = $filename;
        }

        $update->save();

        return redirect()->back()->with('success', 'Profile Update Succeesfully');
    }

    //Admin Password
    public function AdminPasswordPage()
    {
        $id = Auth::guard('admin')->user()->id;
        $profileData = Admin::find($id);

        $roles = Role::latest()->get();

        return view('admin.pages.profile.admin_password', compact('profileData','roles'));
    }

    //Admin Password Update
    public function AdminPasswordUpdateSubmit(Request $request)
    {
        // Validate the incoming data
        $request->validate([

            'old_password' => 'required', // Old password is required
            'new_password' => [
                'required',
                'confirmed', // Ensure password confirmation is correct
                Rules\Password::min(8)->mixedCase()->symbols()->letters()->numbers(), // Password rules
            ],
        ]);

        // Match Old Password
        if (!Hash::check($request->old_password, Auth::guard('admin')->user()->password)) {
            return redirect()->back()->with('error', 'Old Password Does Not Match!');
        }

        // Update New Password
        Admin::whereId(Auth::guard('admin')->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success', 'Password Successfully Updated');
    }

}
