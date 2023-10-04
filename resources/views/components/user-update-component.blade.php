<form id="userUpdateForm" action="{{ route('users.update', $user->id) }}" method="PUT">
    @empty($user)
        <span class="text-danger" style="text-align: center;" id="userNotFound">یوزر دریافت نشد</span>
    @endempty
    @if ($user)
        <div class="modal-body">
            <div class="row pb-1">
                <div class="col-6">
                    <label for="name">اسم یوزر</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                        placeholder="اسم یوزر">
                    <span class="text-danger" id="name"></span>
                </div>
                <div class="col-6">
                    <label for="email">ایمیل</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ $user->email }}" placeholder="ایمیل">
                    <span class="text-danger" id="email"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="password">رمز جدید</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="رمز جدید">
                    <span class="text-danger" id="password"></span>
                </div>
                <div class="col-6">
                    <label for="password_confirmation">تکرار رمز جدید</label>
                    <input type="password" class="form-control" id="password_confirmation"
                        name="password_confirmation" placeholder="تکرار رمز جدید">
                    <span class="text-danger" id="password_confirmation"></span>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between pb-1">
            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
            <input type="reset" hidden>
            <a class="btn btn-success" type="submit" href="{{ route('users.update', $user->id) }}"
                name="updateUser">ثپت <i class="fas fa-save"></i></a>
        </div>
    @endif
</form>
