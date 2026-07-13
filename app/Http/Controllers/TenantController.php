<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::latest()->paginate(10);

        return view('tenants.index', compact('tenants'));
    }

    public function create()
    {
        return view('tenants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|unique:tenants,email',
        ]);

        Tenant::create($request->only('name', 'phone', 'email'));

        return redirect()->route('tenants.index')
            ->with('success', 'Data penyewa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tenant = Tenant::findOrFail($id);

        return view('tenants.edit', compact('tenant'));
    }

    public function update(Request $request, $id)
    {
        $tenant = Tenant::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|unique:tenants,email,' . $tenant->id,
        ]);

        $tenant->update($request->only('name', 'phone', 'email'));

        return redirect()->route('tenants.index')
            ->with('success', 'Data penyewa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Tenant::findOrFail($id)->delete();

        return redirect()->route('tenants.index')
            ->with('success', 'Data penyewa berhasil dihapus.');
    }
}
