<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentAssignedDepartmentsStoreRequest;
use App\Models\CommentHistories;
use App\Models\Department;
use App\Models\DocmentAssignedDepartment;
use App\Models\Document;
use App\View\Components\DepartmentDocumentWholeInformationComponent;
use App\View\Components\DepartmentsModelForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocmentAssignedDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DB::enableQueryLog();
        $documents = Document::join('docment_assigned_departments as dad', 'dad.document_id', 'documents.id')
            ->join('requested_from_to_sources as rfts', 'rfts.id', 'documents.requested_from_to_source_id')
            ->selectRaw('documents.id as document_id, dad.department_id,documents.document_no,documents.title,rfts.source_name,dad.status')
            ->where('dad.department_id', Auth::user()->department_id)
            // ->withTrashed()
            ->paginate(5);
        // dd(DB::getQueryLog());
        return view('departmentDocuments.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentAssignedDepartmentsStoreRequest $request, $documentId)
    {
        try {
            DB::beginTransaction();

            DocmentAssignedDepartment::storeDocumentAssignedDepartments($request, $documentId);

            Document::changeDocumentStatusToAssign($documentId);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->action([DocumentController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocmentAssignedDepartment  $docmentAssignedDepartment
     * @return \Illuminate\Http\Response
     */
    public function show($documentNo)
    {
        $documentAssignedDepartments = DocmentAssignedDepartment::where('document_id', $documentNo)
            ->whereNotIn('status', [Document::REJECTED_DOCUMENT])
            ->selectRaw('department_id as id')->get()->pluck('id')->toArray();
        $departments = Department::get()->except($documentAssignedDepartments);

        $documentDepartments = new DepartmentsModelForm($departments, $documentNo);

        return response()->json(['success' => $documentDepartments->resolveView()->render()], 200);
    }

    public function departmentDocumentShow($departmentId, $documentId)
    {
        // DB::enableQueryLog();
        $document = Document::join('docment_assigned_departments as dad', 'dad.document_id', 'documents.id')
            ->selectRaw('documents.*,dad.*,documents.attachments as primary_attachments, dad.attachments as secondry_attachments')
            ->where('dad.department_id', Auth::user()->department_id)
            ->where('dad.document_id', $documentId)
            ->first();
        // dd($document);
        // dd(DB::getQueryLog());
        $commentHistories = CommentHistories::join('docment_assigned_departments as dad', 'dad.id', 'comment_histories.docment_assigned_department_id')
            ->join('users', 'users.id', 'comment_histories.user_id')
            ->where('dad.document_id', $documentId)
            ->get();

        return view('departmentDocuments.show', compact('document', 'commentHistories', 'departmentId'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocmentAssignedDepartment  $docmentAssignedDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit(DocmentAssignedDepartment $docmentAssignedDepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocmentAssignedDepartment  $docmentAssignedDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $documentId)
    {
        try {
            DB::beginTransaction();

            DocmentAssignedDepartment::changeDepartmentDocumentStatus(Auth::user()->department_id, $documentId, $request);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        $document = Document::join('docment_assigned_departments as dad', 'dad.document_id', 'documents.id')
            ->selectRaw('documents.*,dad.*,documents.attachments as primary_attachments, dad.attachments as secondry_attachments')
            ->where('dad.department_id', Auth::user()->department_id)
            ->where('dad.document_id', $documentId)
            ->first();
        $departmentDocumentWholeInformation = new DepartmentDocumentWholeInformationComponent($document);
        return response()->json(['success' => $departmentDocumentWholeInformation->resolveView()->render()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocmentAssignedDepartment  $docmentAssignedDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocmentAssignedDepartment $docmentAssignedDepartment)
    {
        //
    }
}
