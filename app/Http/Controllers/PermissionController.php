<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionGrantRequest;
use App\Models\User;
use App\View\Components\UserPermissionsComponent;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:super_admin');
    }
    public function userPermissions($userId)
    {
        $userPermissions = User::with(['permissions'])->find($userId);
        $this->convertPermissionToLocal($userPermissions->permissions);
        $permissions = Permission::whereNotIn('id', $userPermissions->permissions->pluck('id'))->get();
        $this->convertPermissionToLocal($permissions);
        $userPermissionComponent = new UserPermissionsComponent($userPermissions, $permissions, $userId);
        return response()->json(['success' => $userPermissionComponent->resolveView()->render()], Response::HTTP_OK);
    }

    private function convertPermissionToLocal(&$permissions)
    {
        foreach ($permissions as $key => $permission) {
            $permission->name = $this->localPermission($permission->name);
        }
    }

    private function localPermission($permission)
    {
        switch ($permission) {
            case 'create order':
                return 'ثپت واسطه';
                break;
            case 'super_admin':
                return 'مدیر عمومی';
                break;
            case 'print report':
                return 'چاپ کننده راپور';
                break;
            case 'print order':
                return 'چاپ کننده معلومات واسطه';
                break;
            case 'create parts':
                return 'ثپت کننده پرزه';
                break;
            case 'create parts_distribution':
                return 'توزیع کننده پرزه';
                break;
            case 'create correcting_actions':
                return 'ثپت کننده عملکرد اصلاحی';
                break;
            default:
                break;
        }
    }

    public function grantPermissions(PermissionGrantRequest $request, $userId)
    {
        $user = User::find($userId);
        if (!$user) throw new ModelNotFoundException('یوزر در سیستم موجود نیست');

        $user->givePermissionTo($request->permission);

        return response()->json(['success' => 'صلاحیت موفقانه به یوزر داده شد'], Response::HTTP_OK);
    }

    public function revokePermission($userId, $permissionId)
    {
        User::find($userId)->revokePermissionTo($permissionId);

        return response()->json(['success' => 'صلاحیت موفقانه حدف شد'], Response::HTTP_OK);
    }
}
