<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    public function indexMeta()
    {
        return view('admin.pages.meta.index', ['meta' => Meta::get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateOrcreateMeta(Request $request)
    {
        $dataToUpdateOrCreate = [
            'name' => $request->name,
            'keyword' => $request->keyword,
            'description' => $request->description,
        ];

        Meta::updateOrCreate(
            ['id' => 1],
            $dataToUpdateOrCreate
        );

        return redirect()->route('admin.meta.indexMeta')->with('success', 'Data Inserted Or Updated Successfully!');
    }
}
