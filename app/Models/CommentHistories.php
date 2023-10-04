<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class CommentHistories extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'docment_assigned_department_id', 'department_comment', 'followup_comment', 'date'];

    public static function storeComment($request, $docmentAssignedDepartmentId)
    {
        if (User::isSuperAdmin(Auth::user()->id)) {
            CommentHistories::create([
                'user_id' => Auth::user()->id,
                'docment_assigned_department_id' => $docmentAssignedDepartmentId,
                'department_comment' => null,
                'followup_comment' => $request->outcome,
                'date' => Jalalian::now()
            ]);
        } else {
            CommentHistories::create([
                'user_id' => Auth::user()->id,
                'docment_assigned_department_id' => $docmentAssignedDepartmentId,
                'department_comment' => $request->outcome,
                'followup_comment' => null,
                'date' => Jalalian::now()
            ]);
        }
    }
}
