<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $partners = Partner::where('name', 'LIKE', '%' . $search . '%')
                        ->latest()
                        ->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo_url' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $image = $request->file('logo_url')->store('partners', 'public');

        Partner::create([
            'name' => $request->name,
            'logo_url' => $image
        ]);

        return redirect('/admin/partners')
                ->with('success', 'Partner berhasil ditambahkan');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->name
        ];

        if ($request->hasFile('logo_url')) {

            $image = $request->file('logo_url')
                            ->store('partners', 'public');

            $data['logo_url'] = $image;
        }

        $partner->update($data);

        return redirect('/admin/partners')
                ->with('success', 'Partner berhasil diupdate');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect('/admin/partners')
                ->with('success', 'Partner berhasil dihapus');
    }
}
