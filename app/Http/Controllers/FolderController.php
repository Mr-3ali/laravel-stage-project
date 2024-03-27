<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Folder::all();
        return view('admin.folders.index', compact('folders'));
    }

    public function create()
    {
        return view('admin.folders.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Folder::create([
            'name' => $request->name,
            'user_id' => auth()->id()
        ]);
        return redirect()->route('admin.folders.index')->with('success', 'Folder created successfully.');
    }

    public function edit(Folder $folder)
    {
        return view('admin.folders.edit', compact('folder'));
    }

    public function update(Request $request, Folder $folder)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $folder->update(['name' => $request->name]);
        return redirect()->route('admin.folders.index')->with('success', 'Folder updated successfully.');
    }

    public function destroy(Folder $folder)
    {
        $folder->delete();
        return redirect()->route('admin.folders.index')->with('success', 'Folder deleted successfully.');
    }

    public function files(Folder $folder)
    {
        $files = $folder->files;
        return view('user.files', compact('files', 'folder'));
    }

    public function assign(Request $request)
    {
        $users = User::where('is_admin', false)->get();
        $folders = Folder::all();
        $selectedUserId = $request->input('user_id', $users->first()?->id ?? null);
        $selectedUserFolders = [];

        if ($selectedUserId) {
            $selectedUser = User::with('folders')->findOrFail($selectedUserId);
            $selectedUserFolders = $selectedUser->folders->pluck('id')->toArray();
        }

        return view('admin.folders.assign', compact('users', 'folders', 'selectedUserId', 'selectedUserFolders'));
    }

    public function store_assign(Request $request)
    {
        $userId = $request->input('user_id');
        $folderIds = $request->input('folder_ids') ?: [];

        $user = User::findOrFail($userId);
        $user->folders()->sync($folderIds);

        return redirect()->route('admin.users-folders')->with('success', 'Folders assigned successfully.');
    }
}
