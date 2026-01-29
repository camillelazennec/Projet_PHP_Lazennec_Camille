<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    // Liste des offres
    public function index()
    {
        $offers = Offer::with('user')->latest()->get();

        return view('offers.index', compact('offers'));
    }

    // Formulaire de création
    public function create()
    {
        return view('offers.create');
    }

    // Enregistrement en base
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        Offer::create([
            'title' => $request->title,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('offers.index');
    }
}