<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Factory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'factory_id',
        'email',
        'phone',
    ];
     public static function boot()
    {
        parent::boot();
        // protected $user_id =  Auth::id();
        static::created(function ($item){
            Log::info("A new Employee was added by user ". Auth::id() . " with record_id:".$item->id);
        });
        static::updated(function ($item){
            $originalAttributes = $item->getOriginal();
            $originalAttributes = json_encode($originalAttributes);
            Log::info("Employee record id ".$item->id. " was updated from {$originalAttributes} to {$item} by user_id ".Auth::id());
        });
        static::deleted(function ($item){
            Log::info("Employee record id ".$item->id. " was Deleted by " .Auth::id());
        });

    }

    public function factories()
    {
        return $this->belongsTo(Factory::class);
    }
}
