<?php

namespace Bowling\Http\Controllers\Admin;

use Bowling\Entity\User;
use Illuminate\Http\Request;

class UserController extends AdminController
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
        $users = $this->filterUsers($request);
        $request->flash();

        return view('admin.user.list', [
          'users' => $users
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
        $user = new User();
        return view('admin.user.create', [
          'user' => $user
        ]);
    }

    /**
     * Store a new user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $item = User::create($inputs);
        $this->log($this->userEmail().' created user '.$item->id);
        $request->session()->flash('status', 'Un élément a été ajouté !');

        return \Redirect::to(route('admin::users.show', ['id' => $item->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', ['user' => $user]);
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
        $item = User::findOrFail($id);

        $inputs = $request->all();

        $item->update($inputs);
        $this->log($this->userEmail().' updated user '.$item->id);
        $request->session()->flash('status', 'Un élément a été modifié !');

        return \Redirect::to(route('admin::users.show', ['id' => $id]));
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
        $user = User::findOrFail($id);
        $this->log($this->userEmail().' destroyed user '.$user->id);
        $user->delete();

        $request->session()->flash('status', 'Un élément a été supprimé !');
  
        return \Redirect::to(route('admin::users.index'));
    }

    private function filterUsers($request)
    {
        $query = User::select('users.*');

        /**
         * Filter result by user full name and email.
         */
        // if ($request->get('s') && $request->get('s') != '') {
        //   $search = trim($request->get('s'));
        //   $query = $query->orWhere('users.title', 'LIKE', '%'.$search.'%')
        //                  ->join('travels', 'users.travel_id', '=', 'travels.id')
        //                  ->join('users', 'travels.user_id', '=', 'users.id')
        //                  ->orWhereRaw('CONCAT(users.firstname, " ", users.lastname) LIKE ?', array('%'.$search.'%'));
        // }

        return $query->paginate();
    }
}
