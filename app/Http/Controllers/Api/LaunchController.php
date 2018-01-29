<?php

namespace Bowling\Http\Controllers\Api;

use Illuminate\Http\Request;
use Fractal;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Gate;

use Bowling\Http\Controllers\Api\ApiController;
use Bowling\Http\Requests\LaunchRequest;
use Bowling\Transformers\LaunchTransformer;
use Bowling\Entity\Launch;
use Bowling\Entity\User;

/**
 * @resource Launch
 */
class LaunchController extends ApiController
{
    /**
    * Launch - Get All
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        if (Gate::denies('index', Launch::class)) {
            return $this->respondForbidden('Vous ne pouvez pas récupérer la liste des entités');
        }

        $launches = Launch::paginate();

        return Fractal::collection($launches)
            ->transformWith(new LaunchTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($launches))
            ->respond();
    }

    /**
    * Launch - Store
    * Store a newly created resource in storage.
    *
    * @param  \Bowling\Http\Requests\LaunchRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(LaunchRequest $request)
    {
        if (Gate::denies('store', Launch::class)) {
            return $this->respondForbidden('Vous ne pouvez pas créer l\'entité');
        }

        $inputs = $request->all();

        $launch = Launch::create($inputs);

        return Fractal::item($launch)
            ->transformWith(new LaunchTransformer())
            ->respond();
    }

    /**
    * Launch - Get one by Id 
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $launch = Launch::find($id);

        if(!$launch) {
            return $this->respondNotFound();
        }

        if (Gate::denies('show', $launch)) {
            return $this->respondForbidden('Vous ne pouvez pas récupérer cette entité');
        }

        return Fractal::item($launch)
            ->transformWith(new LaunchTransformer())
            ->respond();
    }

    /**
    * Launch - Update
    * Update the specified resource in storage.
    *
    * @param  \Bowling\Http\Requests\LaunchRequest  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(LaunchRequest $request, $id)
    {
        $launch = Launch::find($id);

        if(!$launch) {
            return $this->respondNotFound();
        }

        if (Gate::denies('update', $launch)) {
            return $this->respondForbidden('Vous ne pouvez pas éditer cette entité');
        }

        $inputs = $request->all();

        $launch->update($inputs);

        return Fractal::item($launch)
            ->transformWith(new LaunchTransformer())
            ->respond();
    }

    /**
    * Launch - Delete
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $launch = Launch::find($id);

        if(!$launch) {
            return $this->respondNotFound();
        }

        if (Gate::denies('destroy', $launch)) {
            return $this->respondForbidden('Vous ne pouvez pas supprimer cette entité');
        }

        $launch->delete();

        return $this->respondSuccess();
    }



}
