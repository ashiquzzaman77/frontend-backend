<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MultiImage;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultiImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = MultiImage::latest()->get();
        return view('admin.pages.multiimage.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::where('status', 'active')->latest()->get();
        return view('admin.pages.multiimage.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'multi_image' => 'nullable|array',
            'multi_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'project_id' => 'required|exists:projects,id|unique:multi_images,project_id',
        ], [
            'project_id.required' => 'Please select a project.',
            'project_id.exists' => 'The selected project does not exist.',
            'project_id.unique' => 'This project has already been used & update section here & update it.',
        ]);

        $uploadedFiles = [];

        // Handle the uploaded files
        foreach ($request->file('multi_image') as $key => $file) {
            // Ensure the file is valid
            if ($file && $file->isValid()) {
                // Define the path where images will be stored
                $filePath = 'multiImage/' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Move the file to the storage folder
                $file->storeAs('public', $filePath);

                // Store the file path
                $uploadedFiles[] = $filePath;
            }
        }

        // Create the event or data in the database
        MultiImage::create([
            'project_id' => $request->project_id,
            'status' => $request->status,
            'multi_image' => json_encode($uploadedFiles), // Store image paths as JSON
        ]);

        return redirect()->route('admin.multiImage.index')->with('success', 'Data Inserted Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = MultiImage::findOrFail($id);
        $projects = Project::where('status', 'active')->latest()->get();

        return view('admin.pages.multiImage.edit', compact('item', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'multi_image' => 'nullable|array',
            'multi_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the existing multi image item
        $item = MultiImage::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'multi_image' => 'nullable|array', // Allow an array of files
            'multi_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each file if present
            'delete_images' => 'nullable|array', // Check for images to be deleted
        ]);

        // Handle image deletion if any
        if ($request->has('delete_images')) {
            $deleteImages = $request->delete_images;

            // Decode the existing images
            $existingImages = json_decode($item->multi_image, true);

            // Loop through the selected images to delete
            foreach ($deleteImages as $imagePath) {
                // Only delete if the image exists in the array and exists in storage
                if (in_array($imagePath, $existingImages) && Storage::exists('public/' . $imagePath)) {
                    Storage::delete('public/' . $imagePath);

                    // Remove from the images array
                    $existingImages = array_filter($existingImages, fn($image) => $image !== $imagePath);
                }
            }

            // Update the item with the remaining images after deletion
            $item->multi_image = json_encode(array_values($existingImages));
        }

        // Handle new image uploads if any
        $uploadedFiles = json_decode($item->multi_image, true) ?? [];

        if ($request->hasFile('multi_image')) {
            foreach ($request->file('multi_image') as $file) {
                if ($file->isValid()) {
                    $filePath = 'multiImage/' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public', $filePath);

                    // Append the new file path to the existing images array
                    $uploadedFiles[] = $filePath;
                }
            }
        }

        // Update the item with the new images and other fields
        $item->update([
            'project_id' => $request->project_id,
            'status' => $request->status,
            'multi_image' => json_encode(array_values($uploadedFiles)), // Ensure the array is re-indexed and updated
        ]);

        return redirect()->route('admin.multiImage.index')->with('success', 'Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the MultiImage record by its ID
        $item = MultiImage::findOrFail($id);

        // Decode the existing images if needed (assuming multi_image is stored as JSON)
        $images = json_decode($item->multi_image, true);

        // Delete the images from storage
        foreach ($images as $imagePath) {
            // Check if the image exists in storage before deleting
            if (Storage::exists('public/' . $imagePath)) {
                Storage::delete('public/' . $imagePath);
            }
        }

        // Finally, delete the record from the database
        $item->delete();

        // Redirect back with success message
        return redirect()->route('admin.multiImage.index')->with('success', 'Images and data deleted successfully!');
    }
}
