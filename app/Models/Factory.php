<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
class Factory extends Model
{
    use HasFactory;
    protected $fillable = [
        'factory_name',
        'location',
        'email',
        'website',
    ];
    public static function boot()
    {
        parent::boot();
        // protected $user_id =  Auth::id();
        static::created(function ($item){
            Log::info("A new Factory was added by user ". Auth::id() . " with record_id:".$item->id);
        });
        static::updated(function ($item){
            $originalAttributes = $item->getOriginal();
            $originalAttributes = json_encode($originalAttributes);
            Log::info("Factory record id ".$item->id. " was updated from {$originalAttributes} to {$item} by user_id ".Auth::id());
        });
        static::deleted(function ($item){
            Log::info("Factory record id ".$item->id. "was Deleted by " .Auth::id());
        });

    }
    public function employees()
    {
        return $this->hasMany(Employee::class, 'factory_id','id');
    }
}
