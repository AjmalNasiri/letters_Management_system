<div class="card">
    <div class="card-header">
        <div class="card-tools">
            <h6>د مکتوب په اړه معلومات ورکول</h6>
        </div>
    </div>
    <div class="card-body">
        <form method="post" id="statusChangeForm">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="form-group">
                        <label for="status">حالات <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control">
                            <option selected>انتخاب کړی</option>
                            <option value="{{ App\Models\Document::ON_GOING_DOCUMENT }}">په جریان کی</option>
                            <option value="{{ App\Models\Document::REJECTED_DOCUMENT }}">رد شوی</option>
                            <option value="{{ App\Models\Document::COMPLETED_DOCUMENT }}">تکمیل شوی</option>
                        </select>
                        <span class="text-danger" name="status"></span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="outcome">د ډیپارټمنټ نظر <span class="text-danger">*</span></label>
                        <textarea name="outcome" id="outcome" cols="15" rows="5" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <div class="card-title mb-0">
            <div class="form-group">
                <a type="submit" href="{{ route('department.document.status.update',$document->document_id) }}" id="submitStatusForm" class="btn btn-success">ثبت</a>
            </div>
        </div>
    </div>
</div>