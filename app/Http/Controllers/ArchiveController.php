<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateArchiveAddressRequest;
use App\Models\Archive;
use App\Models\Document;
use App\View\Components\ArchivedDocumentComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::join('archives as ar', 'ar.document_id', 'documents.id')->where('documents.status', Document::ARCHIVE_DOCUMENT)->paginate(5);
        return view('archive.index', compact('documents'));
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
    public function store($documentId)
    {
        try {
            DB::beginTransaction();

            Archive::storeArchive($documentId);

            Document::changeDocumentStatus($documentId, Document::ARCHIVE_DOCUMENT);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show(Archive $archive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit(Archive $archive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArchiveAddressRequest $request, $archiveId)
    {
        try {
            DB::beginTransaction();

            Archive::find($archiveId)->update([
                'location' => $request->location
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        $documents = Document::join('archives as ar', 'ar.document_id', 'documents.id')->where('documents.status', Document::ARCHIVE_DOCUMENT)->paginate(5);
        $archiveDocumentComponent = new ArchivedDocumentComponent($documents);

        return response()->json(['success' => $archiveDocumentComponent->resolveView()->render()],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archive $archive)
    {
        //
    }
}
