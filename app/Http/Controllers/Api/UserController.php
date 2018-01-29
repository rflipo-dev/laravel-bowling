<?php

namespace Bowling\Http\Controllers\Api;

use Illuminate\Http\Request;
use Fractal;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Gate;

use Bowling\Http\Controllers\Api\ApiController;
use Bowling\Http\Requests\UserRequest;
use Bowling\Transformers\UserTransformer;
use Illuminate\Support\Facades\Auth;
use Bowling\Entity\User;

/**
 * @resource User
 */
class UserController extends ApiController
{
    /**
    * User - Get All
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        if (Gate::denies('index', User::class)) {
            return $this->respondForbidden('Vous ne pouvez pas récupérer la liste des entités');
        }

        $users = User::paginate();

        return Fractal::collection($users)
            ->transformWith(new UserTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($users))
            ->respond();
    }

    /**
    * User - Store
    * Store a newly created resource in storage.
    *
    * @param  \Bowling\Http\Requests\UserRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(UserRequest $request)
    {
        $inputs = $request->all();

        $user = User::create($inputs);

        return Fractal::item($user)
            ->transformWith(new UserTransformer())
            ->respond();
    }

    /**
    * User - Store and logs user
    * Store a newly created resource in storage.
    *
    * @param  \Raglum\Http\Requests\UserRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function storeAndLogin(UserRequest $request)
    {
        $inputs = $request->all();
        if ($request->file('picture')) {
            $inputs['picture'] = $this->uploadFile($request, 'picture', 'users', 'public');
        }

        $user = User::create($inputs);

        $user->lastLogin = \Carbon\Carbon::now();
        $user->save();

        return $this->respond(array(
            'token' => $user->api_token,
            'id' => $user->id
        ));
    }

    /**
    * User - Get one by Id 
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $user = User::find($id);

        if(!$user) {
            return $this->respondNotFound();
        }

        if (Gate::denies('show', $user)) {
            return $this->respondForbidden('Vous ne pouvez pas récupérer cette entité');
        }

        return Fractal::item($user)
            ->transformWith(new UserTransformer())
            ->respond();
    }

    /**
    * User - Update
    * Update the specified resource in storage.
    *
    * @param  \Bowling\Http\Requests\UserRequest  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);

        if(!$user) {
            return $this->respondNotFound();
        }

        if (Gate::denies('update', $user)) {
            return $this->respondForbidden('Vous ne pouvez pas éditer cette entité');
        }

        $inputs = $request->all();

        $user->update($inputs);

        return Fractal::item($user)
            ->transformWith(new UserTransformer())
            ->respond();
    }

    /**
    * User - Delete
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $user = User::find($id);

        if(!$user) {
            return $this->respondNotFound();
        }

        if (Gate::denies('destroy', $user)) {
            return $this->respondForbidden('Vous ne pouvez pas supprimer cette entité');
        }

        $user->delete();

        return $this->respondSuccess();
    }

    public function login(Request $request)
    {
        if (Auth::guard('web')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            $user = Auth::guard('web')->user();
            $user->lastLogin = \Carbon\Carbon::now();
            $user->save();
            return $this->respond(array(
                'token' => $user->api_token,
                'id' => $user->id
            ));
        } else {
            return $this->respondBadCredentials("vos identifiants sont incorrects, merci de vérifier votre e-mail et mot de passe");
        }
    }


}
