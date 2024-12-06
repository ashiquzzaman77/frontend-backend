<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MultiImage;
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Single image validation
            'multi_image[]' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Multi image validation for each image
        ]);

        $uploadedFiles = [];
        $multiImages = [];

        // Array of files to upload
        $files = [
            'image' => $request->file('image'),
            'multi_image' => $request->file('multi_image'), // Multi images field
        ];

        // Handle single image upload
        foreach (['image'] as $key) {
            $file = $files[$key];

            if ($file) {
                $filePath = 'project/' . $key;
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Handle multiple image uploads
        if ($files['multi_image']) {
            foreach ($files['multi_image'] as $file) {
                if ($file) {
                    $filePath = 'project/multi_image'; // Change path as needed
                    $uploadResult = newUpload($file, $filePath);

                    if ($uploadResult['status'] === 0) {
                        return redirect()->back()->with('error', $uploadResult['error_message']);
                    }

                    $multiImages[] = $uploadResult['file_path']; // Save file path to array
                }
            }
        }

        // Store the project data
        $project = Project::create([
            'name' => $request->name,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'status' => $request->status,
            'image' => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : null,
        ]);

        // Store each multi image as a separate record in the MultiImage table
        foreach ($multiImages as $imagePath) {
            MultiImage::create([
                'project_id' => $project->id,
                'multi_image' => $imagePath, // Save the file path for each image
            ]);
        }

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

        $multiImages = MultiImage::where('project_id', $id)->get(); // Fetch related multi images
        return view('admin.pages.project.edit', compact('item', 'multiImages'));
    }

    /**
     * Update the specified resource in storage.
     */

    // public function update(Request $request, string $id)
    // {
    //     $item = Project::findOrFail($id);

    //     // Define upload paths
    //     $uploadedFiles = [];
    //     $multiImages = [];

    //     // Single image handling
    //     $files = [
    //         'image' => $request->file('image'),
    //         'multi_image' => $request->file('multi_image'), // Multi-image files
    //     ];

    //     // Handle single image upload
    //     foreach (['image'] as $key) {
    //         $file = $files[$key];

    //         if ($file) {
    //             // Define file path for single image
    //             $filePath = 'Project/' . $key;
    //             $oldFile = $item->$key ?? null;

    //             // Delete old image if it exists
    //             if ($oldFile) {
    //                 Storage::delete("public/" . $oldFile);
    //             }

    //             // Upload the new file
    //             $uploadedFiles[$key] = newUpload($file, $filePath);
    //             if ($uploadedFiles[$key]['status'] === 0) {
    //                 return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
    //             }
    //         } else {
    //             // If no new file is uploaded, retain old file path
    //             $uploadedFiles[$key] = ['status' => 0];
    //         }
    //     }

    //     // Handle multi-image upload
    //     if ($request->hasFile('multi_image')) {
    //         // Delete old multi images from the MultiImage table
    //         MultiImage::where('project_id', $item->id)->delete();

    //         foreach ($request->file('multi_image') as $file) {
    //             if ($file) {
    //                 // Define file path for multi-image
    //                 $filePath = 'Project/multi_image';
    //                 $uploadResult = newUpload($file, $filePath);

    //                 if ($uploadResult['status'] === 0) {
    //                     return redirect()->back()->with('error', $uploadResult['error_message']);
    //                 }

    //                 // Store the uploaded multi image path in the array
    //                 $multiImages[] = $uploadResult['file_path'];
    //             }
    //         }

    //         // Save each uploaded multi image path in the MultiImage table
    //         foreach ($multiImages as $imagePath) {
    //             MultiImage::create([
    //                 'project_id' => $item->id,
    //                 'multi_image' => $imagePath,
    //             ]);
    //         }
    //     }

    //     // Update the project data with new or existing values
    //     $item->update([
    //         'name' => $request->name,
    //         'short_descp' => $request->short_descp,
    //         'long_descp' => $request->long_descp,
    //         'status' => $request->status,
    //         'image' => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : $item->image,
    //     ]);

    //     // Return to the project index page with a success message
    //     return redirect()->route('admin.project.index')->with('success', 'Data Updated Successfully!');
    // }

    public function update(Request $request, string $id)
    {
        $item = Project::findOrFail($id);

        // Define upload paths
        $uploadedFiles = [];
        $multiImages = [];

        // Single image handling
        $files = [
            'image' => $request->file('image'),
            'multi_image' => $request->file('multi_image'), // Multi-image files
        ];

        // Handle single image upload
        foreach (['image'] as $key) {
            $file = $files[$key];

            if ($file) {
                // Define file path for single image
                $filePath = 'Project/' . $key;
                $oldFile = $item->$key ?? null;

                // Delete old image if it exists
                if ($oldFile) {
                    Storage::delete("public/" . $oldFile);
                }

                // Upload the new file
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                // If no new file is uploaded, retain old file path
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Handle multi-image upload
        if ($request->hasFile('multi_image')) {
            // Handle each specific multi-image (we assume each multi-image has an 'id' in the request)
            foreach ($request->file('multi_image') as $index => $file) {
                $multiImageId = $request->input("multi_image_id.{$index}"); // Get the multi-image ID from the input
                if ($multiImageId) {
                    // Find the existing multi-image entry by ID
                    $existingMultiImage = MultiImage::where('id', $multiImageId)->where('project_id', $item->id)->first();

                    if ($existingMultiImage) {
                        // Delete the old file from storage
                        Storage::delete("public/" . $existingMultiImage->multi_image);

                        // Upload the new file and update the specific multi-image entry
                        $filePath = 'Project/multi_image';
                        $uploadResult = newUpload($file, $filePath);

                        if ($uploadResult['status'] === 0) {
                            return redirect()->back()->with('error', $uploadResult['error_message']);
                        }

                        // Update the multi-image record with the new file path
                        $existingMultiImage->update([
                            'multi_image' => $uploadResult['file_path'],
                        ]);
                    }
                } else {
                    // If no multi-image ID is provided, it's treated as a new multi-image
                    $filePath = 'Project/multi_image';
                    $uploadResult = newUpload($file, $filePath);

                    if ($uploadResult['status'] === 0) {
                        return redirect()->back()->with('error', $uploadResult['error_message']);
                    }

                    // Save the new multi-image record in the database
                    MultiImage::create([
                        'project_id' => $item->id,
                        'multi_image' => $uploadResult['file_path'],
                    ]);
                }
            }
        }

        // Update the project data with new or existing values
        $item->update([
            'name' => $request->name,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'status' => $request->status,
            'image' => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : $item->image,
        ]);

        // Return to the project index page with a success message
        return redirect()->route('admin.project.index')->with('success', 'Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the project by ID
        $project = Project::findOrFail($id);

        // Delete the main image if it exists
        if ($project->image) {
            Storage::delete('public/' . $project->image);
        }

        // Delete all associated multi-images if they exist
        $multiImages = MultiImage::where('project_id', $id)->get();
        foreach ($multiImages as $multiImage) {
            // Delete each multi-image from storage
            if ($multiImage->multi_image) {
                Storage::delete('public/' . $multiImage->multi_image);
            }

            // Delete the multi-image record from the database
            $multiImage->delete();
        }

        // Delete the project record from the database
        $project->delete();

        // Redirect with a success message
        return redirect()->route('admin.project.index')->with('success', 'Project deleted successfully!');
    }

}
