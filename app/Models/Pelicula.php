<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pelicula
 * 
 * @property int $id
 * @property string $titulo
 * @property Carbon|null $estreno
 * @property float|null $taquilla
 * @property string|null $pais
 * @property int|null $id_estudio
 * @property int|null $id_director
 * 
 * @property Estudio|null $estudio
 * @property Directore|null $directore
 * @property Collection|PeliculaActor[] $pelicula_actors
 * @property Collection|Genero[] $generos
 *
 * @package App\Models
 */
class Pelicula extends Model
{
	protected $table = 'peliculas';
	public $timestamps = false;

	protected $casts = [
		'estreno' => 'datetime',
		'taquilla' => 'float',
		'id_estudio' => 'int',
		'id_director' => 'int'
	];

	protected $fillable = [
		'titulo',
		'estreno',
		'taquilla',
		'pais',
		'id_estudio',
		'id_director'
	];

	public function estudio()
	{
		return $this->belongsTo(Estudio::class, 'id_estudio');
	}

	public function directore()
	{
		return $this->belongsTo(Directore::class, 'id_director');
	}

	public function pelicula_actors()
	{
		return $this->hasMany(PeliculaActor::class, 'id_pelicula');
	}

	public function generos()
	{
		return $this->belongsToMany(Genero::class, 'pelicula_genero', 'id_pelicula', 'id_genero');
	}
}