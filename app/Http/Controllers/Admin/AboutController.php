<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = About::latest()->get();
        return view('admin.pages.about.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'image_one' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_two' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $uploadedFiles = [];

        // Array of files to upload
        $files = [
            'image_one' => $request->file('image_one'),
            'image_two' => $request->file('image_two'),
        ];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'about/' . $key;
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Create the event in the database
        About::create([

            'badge' => $request->badge,
            'name' => $request->name,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'status' => $request->status,

            'image_one' => $uploadedFiles['image_one']['status'] == 1 ? $uploadedFiles['image_one']['file_path'] : null,
            'image_two' => $uploadedFiles['image_two']['status'] == 1 ? $uploadedFiles['image_two']['file_path'] : null,
        ]);

        return redirect()->route('admin.about.index')->with('success', 'Data Inserted Successfully!');
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
        $item = About::findOrFail($id);
        return view('admin.pages.about.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = About::findOrFail($id);

        // Define upload paths
        $uploadedFiles = [];

        // Array of files to upload
        $files = [
            'image_one' => $request->file('image_one'),
            'image_two' => $request->file('image_two'),
        ];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'about/' . $key;
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

            'badge' => $request->badge,
            'name' => $request->name,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'status' => $request->status,

            'image_one' => $uploadedFiles['image_one']['status'] == 1 ? $uploadedFiles['image_one']['file_path'] : $item->image_one,
            'image_two' => $uploadedFiles['image_two']['status'] == 1 ? $uploadedFiles['image_two']['file_path'] : $item->image_two,

        ]);

        return redirect()->route('admin.about.index')->with('success', 'Data Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = About::findOrFail($id);

        $files = [
            'image_one' => $item->image_one,
            'image_two' => $item->image_two,
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

        return redirect()->route('admin.about.index')->with('success', 'Data Delete Successfully!!');
    }
}
