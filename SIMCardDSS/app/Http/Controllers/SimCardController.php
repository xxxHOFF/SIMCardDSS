<?php

namespace App\Http\Controllers;

use App\Models\SimCard;
use App\Models\TariffPlan;
use Illuminate\Http\Request;

class SimCardController extends Controller
{
    public function index()
    {
        $simCards = SimCard::all();
        return view('sim-cards.index', compact('simCards'));
    }

    public function create()
    {
        $tariffs = TariffPlan::all();
        return view('sim-cards.create', compact('tariffs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'imei' => 'required|numeric|digits_between:1,9|unique:sim_cards',
            'phone_number' => 'required',
            'client_name' => 'required',
            'registration_date' => 'required',
            'tariff_id' => 'required|exists:tariff_plans,id',
        ]);

        SimCard::create($validatedData);

        return redirect()->route('sim-cards.index')->with('success', 'SIM-карта успешно добавлена.');
    }

    public function edit(SimCard $simCard)
    {
        $tariffs = TariffPlan::all();
        return view('sim-cards.edit', compact('simCard', 'tariffs'));
    }

    public function update(Request $request, SimCard $simCard)
    {
        $validatedData = $request->validate([
            'imei' => 'required|integer|unique:sim_cards,imei,' . $simCard->id,
            'phone_number' => 'required',
            'client_name' => 'required',
            'registration_date' => 'required',
            'tariff_id' => 'required|exists:tariff_plans,id',
        ]);

        $simCard->update($validatedData);

        return redirect()->route('sim-cards.index')->with('success', 'SIM-карта успешно обновлена.');
    }

    public function destroy(SimCard $simCard)
    {
        $simCard->delete();

        return redirect()->route('sim-cards.index')->with('success', 'SIM-карта успешно удалена.');
    }
}
