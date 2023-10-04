<div class="card-body p-0">
    <span id="PermissionsError" class="text-danger"></span>
    @if ($permissions->isEmpty())
        <h1 style="text-align: center;">هیچ صلاحیت موجود نیست</h1>
    @else
        @if ($userPermissions->permissions->isEmpty())
            <h5 style="text-align: center;">یوزر تا به حال هیچ صلاحیت ندارد</h5>
        @else
            @foreach ($userPermissions->permissions as $userPermission)
                <a href="{{ route('user.permission.revoke', ['userId' => $userId, 'permissionId' => $userPermission->id]) }}"
                    class="btn btn-danger m-2">
                    {{ $userPermission->name }}
                </a>
            @endforeach
        @endif
        @if ($permissions->isEmpty())
            <h5>هیچ صلاحیت موجود نیست</h5>
        @else
            <form id="permissionForm">
                <div class="form-group">
                    <label for="permission">افزودن صلاحیت جدید</label>
                    <select name="permission" class="form-control">
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger" id="permission"></span>
                </div>
            </form>
        @endif
    @endif
</div>
@if ($permissions->isNotEmpty())
    <div class="modal-footer justify-content-between pb-1">
        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
        <input type="reset" hidden>
        <a class="btn btn-success" type="submit" href="{{ route('user.permission.grant', $userId) }}"
            name="grantPermissionToUser">ثپت
            <i class="fas fa-save"></i></a>
    </div>
@endif
