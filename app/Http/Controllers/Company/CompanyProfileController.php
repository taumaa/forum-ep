<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class companyProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        if ($user->type !== 'company') {
            return redirect('/');
        }
        
        $company = Company::find($user->company_id);
        return view('company.profile', ['user' => $user, 'company' => $company]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if ($user->type !== 'company') {
            return redirect('/');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'siret' => 'required|string|max:255',
            'description' => 'required|string|max:3000',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id() . ',user_id',
            'sector' => 'sometimes|exists:sectors,sector_id',
            'website' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'logo' => 'nullable|file|mimes:jpg,png,jpeg,svg|max:200000',
        ]);

        $company = Company::find($user->company_id);

        // Update company information
        $company->name = $request->name;
        $company->siret = $request->siret;
        $company->sector_id = $request->sector ?? $company->sector_id;
        $company->description = $request->description;
        $company->location = $request->location;
        $company->website = $request->website;
        $company->email = $request->email;
        $company->phone = $request->phone;

        // Handle logo upload if provided
        if ($request->hasFile('company-logo')) {
            // Delete old logo if exists
            if ($company->logo) {
                Storage::delete($company->logo);
            }

            // Store new CV
            $ogoPath = $request->file('company-logo')->store('company-logos', 'public');
            $company->logo = $ogoPath;
        }

        $company->save();

        // Update user email if changed
        if ($user->email !== $request->email) {
            $user->email = $request->email;
            $user->save();
        }

        return redirect()->route('company.profile')->with('success', 'Profil mis à jour avec succès');
    }
}
