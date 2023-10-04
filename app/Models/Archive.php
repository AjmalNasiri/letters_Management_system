<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Archive extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['document_id', 'user_id','location'];

    public static function storeArchive($documentId)
    {
        Archive::create([
            'document_id' => $documentId,
            'user_id' => Auth::user()->id
        ]);
    }
}
