<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('admin.files.index', compact('files'));
    }

    public function create()
    {
        $folders = Folder::all();

        if ($folders->isEmpty()) {
            return redirect()->route('admin.folders.create')
                ->with('info', 'You must create a folder before uploading a file.');
        }

        return view('admin.files.create', compact('folders'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'path' => 'required|file|mimes:pdf|max:10240',
            'folder_id' => 'required|exists:folders,id'
        ]);

        $file = $request->file('path');
        $path = $file->store('files', 'public');

        $fileModel = new File([
            'title' => $request->title,
            'type' => $file->getClientOriginalExtension(),
            'path' => $path,
            'user_id' => auth()->id(),
            'folder_id' => $request->folder_id
        ]);

        $fileModel->save();


        return redirect()->route('admin.files.index')->with('success', 'File uploaded successfully.');
    }

    public function edit(File $file)
    {
        $folders = Folder::all();
        return view('admin.files.edit', compact('file', 'folders'));
    }

    public function update(Request $request, File $file)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'folder_id' => 'required|exists:folders,id'
        ]);

        $file->update([
            'title' => $request->title,
            'folder_id' => $request->folder_id,
        ]);

        return redirect()->route('admin.files.index')->with('success', 'File updated successfully.');
    }

    public function destroy(File $file)
    {
        $file->delete();
        return redirect()->route('admin.files.index')->with('success', 'File deleted successfully.');
    }

    

    public function preview(File $file)
    {
        if (!Storage::disk('public')->exists($file->path)) {
            abort(404, 'File not found');
        }    
        $path = Storage::disk('public')->path($file->path);

        return response()->file($path);
    }

    
}
