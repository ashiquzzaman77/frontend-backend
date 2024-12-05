<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Project::latest()->get();
        return view('admin.pages.project.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $uploadedFiles = [];

        // Array of files to upload
        $files = [
            'image' => $request->file('image'),
        ];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'project/' . $key;
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Create the event in the database
        Project::create([

            'name' => $request->name,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'status' => $request->status,

            'image' => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : null,
        ]);

        return redirect()->route('admin.project.index')->with('success', 'Data Inserted Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Project::findOrFail($id);
        return view('admin.pages.project.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Project::findOrFail($id);

        // Define upload paths
        $uploadedFiles = [];

        // Array of files to upload
        $files = [
            'image' => $request->file('image'),
        ];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'Project/' . $key;
                $oldFile = $item->$key ?? null;

                if ($oldFile) {
                    Storage::delete("public/" . $oldFile);
                }
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Update the item with new values
        $item->update([

            'name' => $request->name,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'status' => $request->status,

            'image' => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : $item->image,

        ]);

        return redirect()->route('admin.project.index')->with('success', 'Data Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Project::findOrFail($id);

        $files = [
            'image' => $item->image,
        ];
        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $oldFile = $item->$key ?? null;
                if ($oldFile) {
                    Storage::delete("public/" . $oldFile);
                }
            }
        }
        $item->delete();

        return redirect()->route('admin.project.index')->with('success', 'Data Delete Successfully!!');
    }
}
