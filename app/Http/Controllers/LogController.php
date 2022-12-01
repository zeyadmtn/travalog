<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('create-log', [
            'logs' => Log::with('user')->latest()->get(),
        ]);
    }

    public function viewMyLogs()
    {
        $currentUserId = auth()->user()->id;

        $logs = Log::with('user')->where('user_id', '=', $currentUserId)->latest()->get();
        info(gettype(unserialize(base64_decode($logs[0]->images))));

        foreach ($logs as $log) {
            $log->images = unserialize(base64_decode($log->images));
        }

        return view('my-logs', [
            'logs' => $logs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'images' => 'required|distinct|min:1'
        ]);

        $files = $request->file('images');
        $fileNames = [];

        for ($i = 0; $i < count($files); $i++) {
            $imageName = time() . $i . '.' . $files[$i]->getClientOriginalExtension();
            $files[$i]->move(public_path('images'), $imageName);
            Array_push($fileNames, $imageName);
        }

        $images = base64_encode(serialize($fileNames));

        $validated['images'] = $images;


        $request->user()->logs()->create($validated);

        return redirect('/my-logs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        $this->authorize('delete', $log);

        $log->delete();

        return redirect('/my-logs');
    }
}
