<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Mail\TeamMemberMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Team::orderBy('order', 'asc')->get(); // Change 'asc' to 'desc' for descending order
        return view('admin.pages.team.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer|unique:teams,order'
        ]);

        $uploadedFiles = [];

        // Array of files to upload
        $files = [
            'image' => $request->file('image'),
        ];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'team/' . $key;
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Create the event in the database
        Team::create([

            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'twitter' => $request->twitter,
            'order' => $request->order,
            'description' => $request->description,
            'status' => $request->status,

            'image' => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : null,
        ]);

        return redirect()->route('admin.team.index')->with('success', 'Data Inserted Successfully!');
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
        $item = Team::findOrFail($id);
        return view('admin.pages.team.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'order' => 'required|integer|unique:teams,order,' . $id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $item = Team::findOrFail($id);

        // Define upload paths
        $uploadedFiles = [];

        // Array of files to upload
        $files = [
            'image' => $request->file('image'),
        ];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'team/' . $key;
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
            'designation' => $request->designation,
            'email' => $request->email,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'twitter' => $request->twitter,
            'order' => $request->order,
            'description' => $request->description,
            'status' => $request->status,

            'image' => $uploadedFiles['image']['status'] == 1 ? $uploadedFiles['image']['file_path'] : $item->image,

        ]);

        return redirect()->route('admin.team.index')->with('success', 'Data Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Team::findOrFail($id);

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

        return redirect()->route('admin.team.index')->with('success', 'Data Delete Successfully!!');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send the email to the team member
        Mail::to($request->to)->send(new TeamMemberMessage($request->name, $request->subject, $request->message));

        return back()->with('success', 'Message sent successfully!');
    }

    
}
