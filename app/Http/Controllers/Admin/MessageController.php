<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MessageSent;
use App\Models\Employee;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Message::insert([

            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Prepare the data
        $data = [
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        // Send email to active employees
        $employees = Employee::where('status', 'active')->get();
        foreach ($employees as $employee) {
            // Pass the data array to the Mailable
            Mail::to($employee->email)->send(new MessageSent($data));
        }

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
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $item = Message::findOrFail($id);
        // Update the item with new values
        $item->update([

            'subject' => $request->subject,
            'message' => $request->message,

        ]);

        // Prepare the data
        $data = [
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        // Send email to active employees
        $employees = Employee::where('status', 'active')->get();
        foreach ($employees as $employee) {
            Mail::to($employee->email)->send(new MessageSent($data));
        }

        return redirect()->route('admin.message.index')->with('success', 'Message again sent Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Message::findOrFail($id);

        $item->delete();

        return redirect()->route('admin.message.index')->with('success', 'Message Delete Successfully!!');
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids');

        if (empty($ids)) {
            return response()->json(['success' => false, 'message' => 'No IDs provided.']);
        }

        // Delete the messages
        Message::whereIn('id', $ids)->delete();

        return response()->json(['success' => true]);
    }
}
