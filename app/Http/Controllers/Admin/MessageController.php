<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Message::latest()->get();
        return view('admin.pages.message.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.message.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'subject' => 'required|string|max:255',  // Subject is required and should be a string with a max length
            'message' => 'required|string',  // Message is required and should be a string
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'status' => 'nullable|in:active,inactive',  // Status is required and should be either 'active' or 'inactive'
        ]);

        $uploadedFiles = [];

        // Array of files to upload
        $files = [
            'file' => $request->file('file'),
        ];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'message/' . $key;
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Create the event in the database
        Message::create([

            'subject' => $request->subject,
            'message' => $request->message,
            'status' => $request->status,

            'file' => $uploadedFiles['file']['status'] == 1 ? $uploadedFiles['file']['file_path'] : null,
        ]);


        // Redirect with a success message
        return redirect()->route('admin.message.index')->with('success', 'Message sent successfully.');
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
        $item = Message::findOrFail($id);
        return view('admin.pages.message.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255',  // Subject is required and should be a string with a max length
            'message' => 'required|string',  // Message is required and should be a string
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'status' => 'nullable|in:active,inactive',  // Status is required and should be either 'active' or 'inactive'
        ]);

        $item = Message::findOrFail($id);

        // Define upload paths
        $uploadedFiles = [];

        // Array of files to upload
        $files = [
            'file' => $request->file('file'),
        ];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'message/' . $key;
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

            'subject' => $request->subject,
            'message' => $request->message,
            'status' => $request->status,

            'file' => $uploadedFiles['file']['status'] == 1 ? $uploadedFiles['file']['file_path'] : $item->file,

        ]);

        return redirect()->route('admin.message.index')->with('success', 'Message again sent Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Message::findOrFail($id);

        $files = [
            'file' => $item->file,
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

        return redirect()->route('admin.message.index')->with('success', 'Message Delete Successfully!!');
    }
}
