<div class="card-body table-responsive p-0">
    @if ($users->isEmpty())
        <h1 style="text-align: center;">هیچ یوزر موجود نیست</h1>
    @else
        <table class="table table-head-fixed text-nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم یوزر</th>
                    <th>ایمیل</th>
                    <th style="text-align: center">اکشن/عمل</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="text-align: center">
                            <a href="{{ route('users.edit', $user->id) }}"data-toggle="modal"
                                data-target="#userUpdateModal" title="د یوزر معلومات تفیرول">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('users.destroy', $user->id) }}" id="lockUnlockAccount" title="د یوزر اکونټ بتدول یا خلاصول">
                                @if ($user->status == App\Models\User::LOCK_ACCOUNT)
                                    <i class="fas fa-lock text-danger"></i>
                                @else
                                    <i class="fas fa-unlock text-success"></i>
                                @endif
                            </a>
                            {{-- <a href="{{ route('user.permissions', $user->id) }}" data-toggle="modal"
                                data-target="#userPermissionsModal" title="صلاحیت یوزر">
                                <i class="fas fa-eye"></i>
                            </a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
