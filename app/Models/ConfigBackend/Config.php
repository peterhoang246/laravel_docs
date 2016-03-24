<?php
namespace App\Models\ConfigBackend;
use Illuminate\Database\Eloquent\Model;
class Config extends Model
{
	protected $table = 'config';

    protected $primaryKey = 'ID';

    public function scopePublish() {
        return $this->where('status','1');
    }
}	