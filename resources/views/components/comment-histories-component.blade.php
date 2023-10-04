@if ($commentHistories->isEmpty())
    <h5 class="text-center">هیڅ کار ندی شوی</h5>
@else
    @foreach ($commentHistories as $commentHistory)
        <div class="row">
            <div class="col-6 ml-0">
                @if ($commentHistory->department_comment)
                    <span style="float:right">{{ $commentHistory->name }} : </span><span class="text-primary"> <b> {{ $commentHistory->department_comment }}</b></span>
                    <span style="float: left">{{ $commentHistory->date }}</span>
                @endif
            </div>
            <div class="col-6">
                @if ($commentHistory->followup_comment)
                    <span style="float:left">: {{ $commentHistory->name }}</span><span class="text-success"> <b> {{ $commentHistory->followup_comment }}</b></span>
                    <span style="float: right">{{ $commentHistory->date }}</span>
                @endif
            </div>
        </div>
        <br>
    @endforeach
@endif

<form method="POST" id="commentsForm">
    <div class="form-group">
        <label for="outcome">نظر <span class="text-danger">*</span></label>
        <textarea name="outcome" id="outcome" cols="10" rows="5" class="form-control"></textarea>
        <span class="text-danger" name="outcome"></span>
    </div>
    <div class="card-title">
        <a href="{{ route('department.document.comment.store', $documentAssignedDepartmentId) }}"
            class="btn btn-success" id="saveComment">ثبت</a>
    </div>
</form>
