<div class="row justify-content-center">
    @foreach ($documentDetails as $documentDetail)
        <div class="col-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">ډیپارتمنټ</h3>
                    <p class="text-muted text-center">{{ $documentDetail->name }}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>د تکمیل نیټه</b> <a class="float-right">{{ $documentDetail->complation_date }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>پایله</b> <a class="float-right">{{ $documentDetail->outcome }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>د چا لخوا</b> <a class="float-right">{{ $documentDetail->created_by_user_name }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>چاته</b> <a class="float-right">{{ $documentDetail->manager_name }}</a>
                        </li>
                    </ul>
                    @if ($documentDetail->status == App\Models\Document::NEW_DOCUMENT)
                        <td><span class="btn btn-info btn-block">نوی</span></td>
                        </td>
                    @endif
                    @if ($documentDetail->status == App\Models\Document::COMPLETED_DOCUMENT)
                        <td><span class="btn btn-success btn-block">تکمیل شوی</span></td>
                    @endif
                    @if ($documentDetail->status == App\Models\Document::ON_GOING_DOCUMENT)
                        <td><span class="btn btn-warning btn-block">د کار په جریان کی</span></td>
                    @endif
                    @if ($documentDetail->status == App\Models\Document::REJECTED_DOCUMENT)
                        <td><span class="btn btn-danger btn-block">رد شوی</span></td>
                    @endif
                    {{-- {{ dd($documentDetails) }} --}}
                    <!-- <a href="{{ route('department.document.comments.show',$documentDetail->id) }}" class="btn btn-primary btn-block" id="showComments">details</a> -->
                    <div id="details">
                        
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
