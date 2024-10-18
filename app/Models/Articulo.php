<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    /*
    En Laravel, no es necesario especificar el nombre de la tabla en el modelo 
    si sigues las convenciones de nomenclatura de Laravel. 
    Por defecto, Laravel asume que el nombre de la tabla es el plural en 
    minúsculas del nombre del modelo. En tu caso, si el modelo se llama Articulo,
    Laravel buscará automáticamente una tabla llamada articulos en la base de datos.

    Sin embargo, si la tabla en tu base de datos tiene un nombre diferente que no sigue
    esta convención, entonces sí necesitarías especificar el nombre de la tabla
    en el modelo usando la propiedad $table.

    protected $table = 'articulos';
    
    */

    protected $fillable = ['titulo', 'contenido', 'tipo_contenido'];

    // Accesor para obtener la primera imagen del contenido
    public function getPrimeraImagenAttribute()
    {
        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $this->contenido, $imagen);
        return $imagen['src'] ?? null;
    }
}
