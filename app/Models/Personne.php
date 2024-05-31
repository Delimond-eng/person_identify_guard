<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Personne extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'personnes';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idnat','photo',
        'nom','postnom','prenom','date_naissance',
        'sexe','etat_civil', 'adresse','email',
        'telephone','nbre_personne_famille',
        'province_id','territoire_id','secteur_id','chefferie_id',
        'niveau_etude', 'profession',
        'profession_institution','nationalite'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at'=>'datetime:d/m/Y H:i',
        'updated_at'=>'datetime:d/m/Y H:i',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];


    /**
     * @return BelongsTo
    */
    public function province():BelongsTo
    {
        return $this->belongsTo(Province::class, foreignKey: 'province_id');
    }


    /**
     * @return BelongsTo
    */
    public function territoire():BelongsTo
    {
        return $this->belongsTo(Territoire::class, foreignKey: 'territoire_id');
    }

    /**
     * @return BelongsTo
    */
    public function secteur():BelongsTo
    {
        return $this->belongsTo(Secteur::class, foreignKey: 'secteur_id');
    }

    /**
     * @return BelongsTo
    */
    public function chefferie():BelongsTo
    {
        return $this->belongsTo(Chefferie::class, foreignKey: 'chefferie_id');
    }
}
