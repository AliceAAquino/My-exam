<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFactoryRequest;
use App\Http\Requests\UpdateFactoryRequest;
use App\Models\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check())
        {
            return view('factories.index', [
                'factories' => Factory::latest()->paginate(10)
            ]);
        }
            return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check())
        {
            return view('factories.create');
        }
            return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Factory::create($request->all());
        return redirect()->route('factories.index')
                ->withSuccess('New Factory is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Factory $factory)
    {
        if(Auth::check())
        {
            return view('factories.show', [
                'factory' => $factory
            ]);
        }
            return redirect()->route('login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factory $factory)
    {
        if(Auth::check())
        {
            return view('factories.edit', [
                'factory' => $factory
            ]);

        }
            return redirect()->route('login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factory $factory)
    {
        $factory->update($request->all());
        return redirect()->route('factories.index')
                ->withSuccess('Factory is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factory $factory)
    {
        $factory->delete();
        return redirect()->route('factories.index')
                ->withSuccess('Factory is deleted successfully.');
    }
}
