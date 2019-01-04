<?php

namespace App\Http\Controllers;

use App\Http\Requests\KontaktRequest;
//use Illuminate\Contracts\Validation\Validator;
use App\Kontakt;

class KontaktController extends Controller
{
    public function index()
    {
        $contacts = Kontakt::all();
        return view('kontakt.index', compact('contacts'));
    }

    public function create($kontakt = [])
    {
        return view('kontakt.create', $kontakt);
    }

    public function store(KontaktRequest $request)
    {
        $kontakt = new Kontakt();

        $created = Kontakt::create($request->all());
        if (!$created) {
            return redirect()->back()->withInput($request->all())->with('error', 'Nie udało sie dodać kontaktu');
        }

        return redirect()->route('kontakt.index')->with('success', 'Dodano nowy konatakt');
    }
    public function edit($id)
    {
        $contact = Kontakt::findOrFail($id);

        return view('kontakt.edit', compact('contact'));
    }

    public function update(KontaktRequest $request, $id)
    {
        $contact = Kontakt::findOrFail($id);

        $updated = $contact->update($request->all());
        if (!$updated) {
            return redirect()->back()->withInput($request->all())->with('error', 'Kontakt nie został zaktualizowany');
        }

        return redirect()->route('kontakt.index')->with('success', 'Kontakt został zaktualizowany');
    }
    public function destroy($id)
    {
        
        $contact = Kontakt::findOrFail($id);
        $delete = $contact->delete();
        if($delete)
        {
            return redirect()->route('kontakt.index')->with('success', 'Kontakt został usunięty');
        }
    }

}
