<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Staff $staff)
    {
        $request = $request->all;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Staff $staff)
    {
        return view('admin/form', [
            'url' => 'admin.store',
            'button' => 'Create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Staff $staff)
    {
        $validator = Validator::make($request->all(), [
            'staffname' => 'required|min:3',
            'department' => 'required|min:5',
            'position' => 'required|min:5',
            'number' => 'required|min:10',
            'currency' => 'required',
            'salary' => 'required|min:6',
            'file' => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $id = IdGenerator::generate(['table' => 'staff', 'length' => 7, 'prefix' => 'MTX-']);
            $staff = new Staff();
            $staff->id = $id;
            $staff->staffname = $request->input('staffname');
            $staff->department = $request->input('department');
            $staff->position = $request->input('position');
            $staff->number = $request->input('number');
            $staff->currency = $request->input('currency');
            $staff->salary = $request->input('salary');
            $resume = $request->file('file');
            $fresume = time() . '.' . $resume->getClientOriginalExtension();
            Storage::disk('local')->putFIleAs('public/files', $resume, $fresume);
            $staff->resume = $fresume;
            $staff->save();

            return redirect()
                ->route('admin.home')
                ->with('message', __('Data has been saved successfully'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $post = Staff::findOrFail($staff->id);
        return view('admin/form', [
            'staff' => $post,
            'url' => 'admin.update',
            'button' => 'Update',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $validator = Validator::make($request->all(), [
            'staffname' => 'required|min:3',
            'department' => 'required|min:5',
            'position' => 'required|min:5',
            'number' => 'required|min:10',
            'currency' => 'required',
            'salary' => 'required|min:6',
            'file' => 'mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $staff->staffname = $request->input('staffname');
            $staff->department = $request->input('department');
            $staff->position = $request->input('position');
            $staff->number = $request->input('number');
            $staff->currency = $request->input('currency');
            $staff->salary = $request->input('salary');
            if ($request->hasFile('file')) {
                $resume = $request->file('file');
                $fresume = time() . '.' . $resume->getClientOriginalExtension();
                Storage::disk('local')->putFileAs('public/files', $resume, $fresume);
                $staff->resume = $fresume;
            }
            $staff->save();

            return redirect()
                ->route('admin.home')
                ->with('message', __('Data has been edited successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Staff $staff)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return redirect()
            ->route('admin.home')
            ->with('message', __('Data has been deleted successfully'));
    }

    public function download($file, Staff $staff, Request $request)
    {
        //     // $resume = Staff::where('id', $id)->firstOrFail();
        //     // $url = Storage::url($file);

        //     // $fresume = time() . '.' . $resume->getClientOriginalExtension();
        //     // $file_path = storage_path('app\public\files' . $resume, $fresume);
        //     // return response()->download($file_path);
    }

}