<?php

namespace Bowling\Http\Controllers\Api;

use Illuminate\Http\Request;
use Fractal;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Gate;

use Bowling\Http\Controllers\Api\ApiController;
use Bowling\Http\Requests\FrameRequest;
use Bowling\Transformers\FrameTransformer;
use Bowling\Entity\Frame;
use Bowling\Entity\User;

/**
 * @resource Frame
 */
class FrameController extends ApiController
{
    /**
    * Frame - Get All
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        if (Gate::denies('index', Frame::class)) {
            return $this->respondForbidden('Vous ne pouvez pas récupérer la liste des entités');
        }

        $frames = Frame::paginate();

        return Fractal::collection($frames)
            ->transformWith(new FrameTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($frames))
            ->respond();
    }

    /**
    * Frame - Store
    * Store a newly created resource in storage.
    *
    * @param  \Bowling\Http\Requests\FrameRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(FrameRequest $request)
    {
        if (Gate::denies('store', Frame::class)) {
            return $this->respondForbidden('Vous ne pouvez pas créer l\'entité');
        }

        $inputs = $request->all();

        $frame = Frame::create($inputs);

        return Fractal::item($frame)
            ->transformWith(new FrameTransformer())
            ->respond();
    }

    /**
    * Frame - Get one by Id 
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $frame = Frame::find($id);

        if(!$frame) {
            return $this->respondNotFound();
        }

        if (Gate::denies('show', $frame)) {
            return $this->respondForbidden('Vous ne pouvez pas récupérer cette entité');
        }

        return Fractal::item($frame)
            ->transformWith(new FrameTransformer())
            ->respond();
    }

    /**
    * Frame - Update
    * Update the specified resource in storage.
    *
    * @param  \Bowling\Http\Requests\FrameRequest  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(FrameRequest $request, $id)
    {
        $frame = Frame::find($id);

        if(!$frame) {
            return $this->respondNotFound();
        }

        if (Gate::denies('update', $frame)) {
            return $this->respondForbidden('Vous ne pouvez pas éditer cette entité');
        }

        $inputs = $request->all();

        $frame->update($inputs);

        return Fractal::item($frame)
            ->transformWith(new FrameTransformer())
            ->respond();
    }

    /**
    * Frame - Delete
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $frame = Frame::find($id);

        if(!$frame) {
            return $this->respondNotFound();
        }

        if (Gate::denies('destroy', $frame)) {
            return $this->respondForbidden('Vous ne pouvez pas supprimer cette entité');
        }

        $frame->delete();

        return $this->respondSuccess();
    }



}
