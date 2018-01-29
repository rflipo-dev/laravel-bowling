<?php

namespace Bowling\Http\Controllers\Api;

use Illuminate\Http\Request;
use Fractal;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Gate;

use Bowling\Http\Controllers\Api\ApiController;
use Bowling\Http\Requests\GameRequest;
use Bowling\Transformers\GameTransformer;
use Bowling\Entity\Game;
use Bowling\Entity\User;

/**
 * @resource Game
 */
class GameController extends ApiController
{
    /**
    * Game - Get All
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        if (Gate::denies('index', Game::class)) {
            return $this->respondForbidden('Vous ne pouvez pas récupérer la liste des entités');
        }

        $games = Game::paginate();

        return Fractal::collection($games)
            ->transformWith(new GameTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($games))
            ->respond();
    }

    /**
    * Game - Store
    * Store a newly created resource in storage.
    *
    * @param  \Bowling\Http\Requests\GameRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(GameRequest $request)
    {
        if (Gate::denies('store', Game::class)) {
            return $this->respondForbidden('Vous ne pouvez pas créer l\'entité');
        }

        $inputs = $request->all();

        $game = Game::create($inputs);
        if (array_key_exists('frames', $inputs)) {
            $game->frames()->createMany($inputs['frames']);
        }

        return Fractal::item($game)
            ->transformWith(new GameTransformer())
            ->respond();
    }

    /**
    * Game - Get one by Id 
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $game = Game::find($id);

        if(!$game) {
            return $this->respondNotFound();
        }

        if (Gate::denies('show', $game)) {
            return $this->respondForbidden('Vous ne pouvez pas récupérer cette entité');
        }

        return Fractal::item($game)
            ->transformWith(new GameTransformer())
            ->respond();
    }

    /**
    * Game - Update
    * Update the specified resource in storage.
    *
    * @param  \Bowling\Http\Requests\GameRequest  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(GameRequest $request, $id)
    {
        $game = Game::find($id);

        if(!$game) {
            return $this->respondNotFound();
        }

        if (Gate::denies('update', $game)) {
            return $this->respondForbidden('Vous ne pouvez pas éditer cette entité');
        }

        $inputs = $request->all();

        $game->update($inputs);

        return Fractal::item($game)
            ->transformWith(new GameTransformer())
            ->respond();
    }

    /**
    * Game - Delete
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $game = Game::find($id);

        if(!$game) {
            return $this->respondNotFound();
        }

        if (Gate::denies('destroy', $game)) {
            return $this->respondForbidden('Vous ne pouvez pas supprimer cette entité');
        }

        $game->delete();

        return $this->respondSuccess();
    }



}
