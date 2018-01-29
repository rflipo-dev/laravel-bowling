<?php

namespace Bowling\Http\Controllers\Admin;

use Bowling\Entity\Game;
use Illuminate\Http\Request;

class GameController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
    * Display a paginated listing of the resource.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $games = $this->filterGames($request);
        $request->flash();

        return view('admin.game.list', [
          'games' => $games
        ]);
    }

    /**
    * Display a form to add a new resource.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function create(Request $request)
    {
        $game = new Game();
        return view('admin.game.create', [
          'game' => $game
        ]);
    }

    /**
     * Store a new game
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $item = Game::create($inputs);
        $this->log($this->userEmail().' created game '.$item->id);
        $request->session()->flash('status', 'Un élément a été ajouté !');

        return \Redirect::to(route('admin::games.show', ['id' => $item->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::findOrFail($id);

        return view('admin.game.edit', ['game' => $game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Game::findOrFail($id);

        $inputs = $request->all();

        $item->update($inputs);
        $this->log($this->userEmail().' updated game '.$item->id);
        $request->session()->flash('status', 'Un élément a été modifié !');

        return \Redirect::to(route('admin::games.show', ['id' => $id]));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, $id)
    {
        $game = Game::findOrFail($id);
        $this->log($this->userEmail().' destroyed game '.$game->id);
        $game->delete();

        $request->session()->flash('status', 'Un élément a été supprimé !');
  
        return \Redirect::to(route('admin::games.index'));
    }

    private function filterGames($request)
    {
        $query = Game::select('games.*');

        /**
         * Filter result by user full name and email.
         */
        // if ($request->get('s') && $request->get('s') != '') {
        //   $search = trim($request->get('s'));
        //   $query = $query->orWhere('games.title', 'LIKE', '%'.$search.'%')
        //                  ->join('travels', 'games.travel_id', '=', 'travels.id')
        //                  ->join('users', 'travels.user_id', '=', 'users.id')
        //                  ->orWhereRaw('CONCAT(users.firstname, " ", users.lastname) LIKE ?', array('%'.$search.'%'));
        // }

        return $query->paginate();
    }
}
