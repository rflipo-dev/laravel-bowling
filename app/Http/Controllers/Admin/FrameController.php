<?php

namespace Bowling\Http\Controllers\Admin;

use Bowling\Entity\Frame;
use Illuminate\Http\Request;

class FrameController extends AdminController
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
        $frames = $this->filterFrames($request);
        $request->flash();

        return view('admin.frame.list', [
          'frames' => $frames
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
        $frame = new Frame();
        return view('admin.frame.create', [
          'frame' => $frame
        ]);
    }

    /**
     * Store a new frame
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $item = Frame::create($inputs);
        $this->log($this->userEmail().' created frame '.$item->id);
        $request->session()->flash('status', 'Un élément a été ajouté !');

        return \Redirect::to(route('admin::frames.show', ['id' => $item->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $frame = Frame::findOrFail($id);

        return view('admin.frame.edit', ['frame' => $frame]);
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
        $item = Frame::findOrFail($id);

        $inputs = $request->all();

        $item->update($inputs);
        $this->log($this->userEmail().' updated frame '.$item->id);
        $request->session()->flash('status', 'Un élément a été modifié !');

        return \Redirect::to(route('admin::frames.show', ['id' => $id]));
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
        $frame = Frame::findOrFail($id);
        $this->log($this->userEmail().' destroyed frame '.$frame->id);
        $frame->delete();

        $request->session()->flash('status', 'Un élément a été supprimé !');
  
        return \Redirect::to(route('admin::frames.index'));
    }

    private function filterFrames($request)
    {
        $query = Frame::select('frames.*');

        /**
         * Filter result by user full name and email.
         */
        // if ($request->get('s') && $request->get('s') != '') {
        //   $search = trim($request->get('s'));
        //   $query = $query->orWhere('frames.title', 'LIKE', '%'.$search.'%')
        //                  ->join('travels', 'frames.travel_id', '=', 'travels.id')
        //                  ->join('users', 'travels.user_id', '=', 'users.id')
        //                  ->orWhereRaw('CONCAT(users.firstname, " ", users.lastname) LIKE ?', array('%'.$search.'%'));
        // }

        return $query->paginate();
    }
}
