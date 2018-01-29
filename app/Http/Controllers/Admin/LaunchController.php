<?php

namespace Bowling\Http\Controllers\Admin;

use Bowling\Entity\Launch;
use Illuminate\Http\Request;

class LaunchController extends AdminController
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
        $launches = $this->filterLaunches($request);
        $request->flash();

        return view('admin.launch.list', [
          'launches' => $launches
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
        $launch = new Launch();
        return view('admin.launch.create', [
          'launch' => $launch
        ]);
    }

    /**
     * Store a new launch
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $item = Launch::create($inputs);
        $this->log($this->userEmail().' created launch '.$item->id);
        $request->session()->flash('status', 'Un élément a été ajouté !');

        return \Redirect::to(route('admin::launches.show', ['id' => $item->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $launch = Launch::findOrFail($id);

        return view('admin.launch.edit', ['launch' => $launch]);
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
        $item = Launch::findOrFail($id);

        $inputs = $request->all();

        $item->update($inputs);
        $this->log($this->userEmail().' updated launch '.$item->id);
        $request->session()->flash('status', 'Un élément a été modifié !');

        return \Redirect::to(route('admin::launches.show', ['id' => $id]));
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
        $launch = Launch::findOrFail($id);
        $this->log($this->userEmail().' destroyed launch '.$launch->id);
        $launch->delete();

        $request->session()->flash('status', 'Un élément a été supprimé !');
  
        return \Redirect::to(route('admin::launches.index'));
    }

    private function filterLaunches($request)
    {
        $query = Launch::select('launches.*');

        /**
         * Filter result by user full name and email.
         */
        // if ($request->get('s') && $request->get('s') != '') {
        //   $search = trim($request->get('s'));
        //   $query = $query->orWhere('launches.title', 'LIKE', '%'.$search.'%')
        //                  ->join('travels', 'launches.travel_id', '=', 'travels.id')
        //                  ->join('users', 'travels.user_id', '=', 'users.id')
        //                  ->orWhereRaw('CONCAT(users.firstname, " ", users.lastname) LIKE ?', array('%'.$search.'%'));
        // }

        return $query->paginate();
    }
}
