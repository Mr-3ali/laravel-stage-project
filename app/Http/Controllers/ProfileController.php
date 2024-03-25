<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
   
    public function adminHome()
    {
        // You can pass necessary data to the view
        return view('admin.home');
    }

    public function edit(User $user): View
    {
        // For admin to edit other users' profiles
        return view('admin.profile.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        // Validate the request, excluding the current user ID from the email uniqueness check
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // Include other validation rules as necessary
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->fill($validator->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->route('admin.dashboard')->with('status', 'Profile updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return Redirect::route('admin.dashboard')->with('success', 'User deleted successfully.');
    }

    public function index()
    {
        $users = User::all(); // Get all users
        return view('admin.dashboard', compact('users'));
    }
}
