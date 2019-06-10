<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Makanan
 *
 * @package App
 * @property string $makanan
 * @property integer $stok
 * @property text $deskripsi
*/
class Makanan extends Model
{
    use SoftDeletes;

    protected $fillable = ['makanan', 'stok', 'deskripsi'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setStokAttribute($input)
    {
        $this->attributes['stok'] = $input ? $input : null;
    }
    
}
