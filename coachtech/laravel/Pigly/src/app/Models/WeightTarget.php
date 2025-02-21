<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeightTarget extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','target_weight'];
    protected $table = 'Weight_target';


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
