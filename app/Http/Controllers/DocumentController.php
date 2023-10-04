<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentStoreRequest;
use App\Models\Department;
use App\Models\DocmentAssignedDepartment;
use App\Models\Document;
use App\Models\RequestedFromToSource;
use App\View\Components\DocumentComponent;
use App\View\Components\DocumentListComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::join('requested_from_to_sources as rfts', 'rfts.id', 'documents.requested_from_to_source_id')
            ->selectRaw('documents.id,documents.document_no,documents.title,documents.attachments,rfts.source_name,documents.status')
            ->paginate(5);
        if (request()->ajax()) {
            $documentListComponent = new DocumentListComponent($documents);
            return response()->json(['success' => $documentListComponent->resolveView()->render()], 200);
        }
        return view('Document.Index', compact('documents'));
    }

    public function search(Request $request)
    {
        $Documents = Document::query();
        $Documents->when($request->document_no, function ($query) use ($request) {
            return $query->where('document_no', $request->document_no);
        });
        $Documents->when($request->source, function ($query) use ($request) {
            return $query->where('source', $request->source);
        });
        $Documents->when($request->title, function ($query) use ($request) {
            return $query->where('title', $request->title);
        });
        $Documents->when($request->recieved_date, function ($query) use ($request) {
            return $query->where('recieved_date', $request->recieved_date);
        });
        return response()->json(['success' => $this->addDocumentSearch($Documents->paginate(5))], 200);
    }

    public function addDocumentSearch($Documents)
    {
        $documentsearchcomponent = new DocumentListComponent($Documents);
        return $documentsearchcomponent->resolveView()->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentRequestedToFromSources = RequestedFromToSource::all();
        return view('document.create', compact('documentRequestedToFromSources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            Document::storeDocument($request);

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
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show($documentId)
    {
        $document = Document::join('requested_from_to_sources as rfts', 'rfts.id', 'documents.requested_from_to_source_id')->find($documentId);
        $documentDetails = Document::join('docment_assigned_departments as dad', 'dad.document_id', 'documents.id')
            ->where('documents.id', $documentId)
            ->join('departments as dp', 'dp.id', 'dad.department_id')
            ->join('users as createdBy', 'createdBy.id', 'documents.user_id')
            ->selectRaw('dad.id,dad.complation_date, dad.outcome,documents.title,
                documents.document_no,documents.details,dad.status,
                documents.attachments,dp.name,createdBy.name as created_by_user_name,dp.manager_name')
            ->get();
        $documentArchiveStatus = DocmentAssignedDepartment::where('document_id', $documentId)
            ->whereIn('status', [Document::ASSINGED_DOCUMENT, Document::NEW_DOCUMENT])->whereNotIn('status', [Document::ARCHIVE_DOCUMENT])
            ->get();
        $documentStatus = Document::whereNotIn('status', [Document::ARCHIVE_DOCUMENT])
            ->find($documentId);
        // dd($documentStatus);
        return view('document.show', compact('document', 'documentDetails', 'documentArchiveStatus', 'documentStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit($documentId)
    {
        $document = Document::join('requested_from_to_sources as rfts', 'rfts.id', 'documents.requested_from_to_source_id')
            ->selectRaw('documents.id,documents.document_no,documents.recieved_date,documents.details,documents.title,rfts.id as source_id,documents.status')
            ->find($documentId);

        $documentRequestedToFromSources = RequestedFromToSource::all();


        return view('document.edit', compact('document', 'documentRequestedToFromSources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentStoreRequest $request, $documentId)
    {
        try {
            DB::beginTransaction();

            Document::updateDocument($request, $documentId);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->action([DocumentController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy($documentId)
    {
        $document = Document::find($documentId)->delete();

        return response()->json(['success' => 'مکتوب موافقانه لیری شو']);
        // return redirect()->action([DocumentController::class,'index']);
    }
}
