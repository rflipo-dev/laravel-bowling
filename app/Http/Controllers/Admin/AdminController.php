<?php

namespace Bowling\Http\Controllers\Admin;

use Bowling\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Log;

abstract class AdminController extends Controller
{
    public function __construct()
    {
        $user = Auth::user();
        if ($user && !$user->canAccessAdmin()) {
            Redirect::to(route('login'))->send();
        }
    }

    protected function log($message = '')
    {
        Log::info($message);
    }

    protected function userEmail()
    {
        return Auth::user()->email;
    }

    protected function handleSortingRequest($request, $query, $allowedFields)
    {
        if ($request->get('sorting') && $request->get('sorting') != '') {
            $order = 'asc';
            if ($request->get('order') && in_array(strtolower($request->get('order')), ['asc', 'desc'])) {
                $order = strtolower($request->get('order'));
            }
            $field = strtolower($request->get('sorting'));
            
            if (array_key_exists($field, $allowedFields)) {
                $array = [];
                if (is_array($allowedFields[$field])) {
                    $array = $allowedFields[$field];
                } else {
                    $array[] = $allowedFields[$field];
                }
                foreach ($array as $item) {
                    $query = $query->orderBy($item, strtoupper($order));
                }
            }
        }
        return $query;
    }

    public function uploadFile($request, $name, $destination, $visibility = 'public')
    {
        $path = Storage::putFile($destination, $request->file($name), $visibility);

        return $path;
    }
}
