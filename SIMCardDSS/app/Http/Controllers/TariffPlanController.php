<?php

namespace App\Http\Controllers;

use App\Models\TariffPlan;
use Illuminate\Http\Request;

class TariffPlanController extends Controller
{
    public function index()
    {
        $tariffs = TariffPlan::all();
        return view('tariffs.index', compact('tariffs'));
    }

    public function create()
    {
        return view('tariffs.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:tariff_plans',
            'available_minutes' => 'required|integer|min:0',
            'available_sms' => 'required|integer|min:0',
            'cost' => 'required|numeric|min:0',
        ]);

        TariffPlan::create($validatedData);

        return redirect()->route('tariffs.index')->with('success', 'Тарифный план успешно добавлен.');
    }

    public function edit(TariffPlan $tariff)
    {
        return view('tariffs.edit', compact('tariff'));
    }

    public function update(Request $request, TariffPlan $tariff)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:tariff_plans,name,' . $tariff->id,
            'available_minutes' => 'required|integer|min:0',
            'available_sms' => 'required|integer|min:0',
            'cost' => 'required|numeric|min:0',
        ]);

        $tariff->update($validatedData);

        return redirect()->route('tariffs.index')->with('success', 'Тарифный план успешно обновлен.');
    }

    public function destroy(TariffPlan $tariff)
    {
        $tariff->delete();

        return redirect()->route('tariffs.index')->with('success', 'Тарифный план успешно удален.');
    }
}
