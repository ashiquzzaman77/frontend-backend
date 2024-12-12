<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Employee::latest()->get();
        return view('admin.pages.employee.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
            'document' => 'mimes:pdf,docx,doc|max:1024',
        ]);

        $uploadedFiles = [];

        // Array of files to upload
        $files = [
            'image' => $request->file('image'),
            'document' => $request->file('document'),
        ];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'employee/' . $key;
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Create the event in the database
        Employee::create([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nid_number' => $request->nid_number,
            'blood_group' => $request->blood_group,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'designation' => $request->designation,
            'salary' => $request->salary,
            'job_type' => $request->job_type,
            'joining_date' => $request->joining_date,
            'closeing_date' => $request->closeing_date,
            'status' => $request->status,

            'image' => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : null,
            'document' => $uploadedFiles['document']['status'] == 1 ? $uploadedFiles['document']['file_path'] : null,
        ]);

        return redirect()->route('admin.employee.index')->with('success', 'Data Inserted Successfully!');
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
        $item = Employee::findOrFail($id);
        return view('admin.pages.employee.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
            'document' => 'mimes:pdf,docx,doc|max:1024',
        ]);

        $item = Employee::findOrFail($id);

        // Define upload paths
        $uploadedFiles = [];

        // Array of files to upload
        $files = [
            'image' => $request->file('image'),
            'document' => $request->file('document'),
        ];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'employee/' . $key;
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
            'email' => $request->email,
            'phone' => $request->phone,
            'nid_number' => $request->nid_number,
            'blood_group' => $request->blood_group,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'designation' => $request->designation,
            'salary' => $request->salary,
            'job_type' => $request->job_type,
            'joining_date' => $request->joining_date,
            'closeing_date' => $request->closeing_date,
            'status' => $request->status,

            'image' => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : $item->image,
            'document' => $uploadedFiles['document']['status'] == 1 ? $uploadedFiles['document']['file_path'] : $item->document,

        ]);

        return redirect()->route('admin.employee.index')->with('success', 'Data Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Employee::findOrFail($id);

        $files = [
            'image' => $item->image,
            'document' => $item->document,
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

        return redirect()->route('admin.employee.index')->with('success', 'Data Delete Successfully!!');
    }
}
