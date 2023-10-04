<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\CommentHistories;
use App\View\Components\CommentHistoriesComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentHistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CommentStoreRequest $request, $documentAssignedDepartmentId)
    {
        try {
            DB::beginTransaction();

            CommentHistories::storeComment($request,$documentAssignedDepartmentId);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->action([CommentHistoriesController::class,'show'],['documentAssignedDepartmentId' => $documentAssignedDepartmentId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommentHistories  $commentHistories
     * @return \Illuminate\Http\Response
     */
    public function show($documentAssignedDepartmentId)
    {
        $commentHistories = CommentHistories::join('users','users.id','comment_histories.user_id')->where('docment_assigned_department_id',$documentAssignedDepartmentId)->get();

        $commentHistoriesComponent = new CommentHistoriesComponent($commentHistories, $documentAssignedDepartmentId);

        return response()->json(['success' => $commentHistoriesComponent->resolveView()->render()],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommentHistories  $commentHistories
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentHistories $commentHistories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommentHistories  $commentHistories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentHistories $commentHistories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommentHistories  $commentHistories
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentHistories $commentHistories)
    {
        //
    }
}
