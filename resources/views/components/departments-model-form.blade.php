<form id="documentDepartments" action="{{ route('document.assigned.departments.store', $documentId) }}" method="POST">
    <span class="text-danger" style="text-align: center;" id="carNotFound"></span>
    <div class="modal-body">
        <div class="row pb-1">
            <div class="col-4">
                <label for="department">د ډیپارټمنټونو لیست <span class="text-danger">*</span></label>
                <select multiple name="department[]" class="form-control">
                    <option selected>انتخاب کړی</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                <span class="text-danger" name="department"></span>
            </div>
            <div class="col-4">
                <label for="attachment">
                    د مکتوب ضمیمه
                </label>
                <input type="file" class="form-control" name="attachments">
                <span class="text-danger" name="attachments"></span>
            </div>
            <div class="col-4">
                <label for="deadline">د پای نیټه <span class="text-danger">*</span></label>
                <input type="date" class="form-control date" name="deadline">
                <span class="text-danger" name="deadline"></span>
            </div>
            <div class="col-12">
                <label for="supervisor_decision">د رییس حکم<span class="text-danger">*</span></label>
                <textarea name="supervisor_decision" id="supervisor_decision" class="form-control" cols="30" rows="10"></textarea>
                <span class="text-danger" name="supervisor_decision"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between pb-1">
        <button type="button" class="btn btn-default" data-dismiss="modal">بندول</button>
        <input type="reset" hidden>
        <a href="{{ route('document.assigned.departments.store',$documentId) }}" class="btn btn-success" type="submit" name="saveDocumentDepartments">ثبت <i
                class="fas fa-save"></i></a>
    </div>
</form>
