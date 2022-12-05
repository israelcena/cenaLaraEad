<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReplySupportRequest;
use App\Http\Requests\UpdateReplySupportRequest;
use App\Http\Resources\ReplySupportResource;
use App\Models\ReplySupport;
use App\Repositories\SupportRepository;

class ReplySupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(SupportRepository $supportRepository)
    {
        $this->supportRepository = $supportRepository;
    }

    public function index()
    {
        return ReplySupportResource::collection(ReplySupport::All());
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
     * @param  \App\Http\Requests\StoreReplySupportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($supportId, StoreReplySupportRequest $request)
    {
        return new ReplySupportResource($this->supportRepository->createReplyToSupportId($supportId, $request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReplySupport  $replySupport
     * @return \Illuminate\Http\Response
     */
    public function show(ReplySupport $replySupport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReplySupport  $replySupport
     * @return \Illuminate\Http\Response
     */
    public function edit(ReplySupport $replySupport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReplySupportRequest  $request
     * @param  \App\Models\ReplySupport  $replySupport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReplySupportRequest $request, ReplySupport $replySupport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReplySupport  $replySupport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReplySupport $replySupport)
    {
        //
    }
}
