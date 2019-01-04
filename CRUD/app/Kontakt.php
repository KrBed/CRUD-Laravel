<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontakt extends Model
{
    protected $table = 'kontakty';
    protected $fillable = [ 'imie', 'nazwisko', 'firma', 'oddzial', 'dzial', 'stanowisko', 'telefonStacjonarny', 'telefonKomorkowy', 'email'];
}
