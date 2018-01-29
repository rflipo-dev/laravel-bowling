<?php

namespace Bowling\Http\Controllers\Api;

use Bowling\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

use Symfony\Component\HttpFoundation\File\File;
use Mail;
use Route;
use Illuminate\Support\Facades\Storage;

abstract class ApiController extends Controller
{
    protected $statusCode = 200;

    /**
     * Gets the value of statusCode.
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Sets the value of statusCode.
     *
     * @param mixed $statusCode the status code
     *
     * @return self
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function respondSuccess($message = 'Bonne requête') {
        return $this->respond([
            'message' => $message,
            'status_code' => $this->getStatusCode()
        ]);
    }

    public function respondCreated($message = 'Entité crée', $data = null) {
        return $this->setStatusCode(201)->respond([
            'message' => $message,
            'status_code' => $this->getStatusCode(),
            'data' => $data
        ]);
    }

    /**
     * Used to indicate that some passed parameters are missing or not valid.
     */
    public function respondBadRequest($message = 'Mauvaise requête') {
        return $this->setStatusCode(400)->responseWithError($message);
    }

    /**
     * Used to indicate that user needs to be fully authenticated to perform this action.
     */
    public function respondBadCredentials($message = 'Droits insuffisants') {
        return $this->setStatusCode(401)->respondWithError($message);
    }

    /**
     * Used to indicate that user is not allowed to perform this action.
     */
    public function respondForbidden($message = 'Interdit') {
        return $this->setStatusCode(403)->respondWithError($message);
    }

    public function respondNotFound($message = 'Non trouvé') {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    public function respondGone($message = 'indisponible') {
        return $this->setStatusCode(410)->respondWithError($message);
    }

    public function respondUnprocessableEntity($message = 'Mauvais arguments') {
        return $this->setStatusCode(422)->respondWithError($message);
    }

    public function respondInternalError($message = 'Erreur interne') {
        return $this->setStatusCode(500)->respondWithError($message);
    }

    public function respond($data, $headers = []) {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    public function respondWithError($message) {

        $error = [
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ];
        return $this->respond($error);
    }

    public function uploadFile($request, $name, $destination, $visibility = 'public')
    {
        $path = Storage::putFile($destination, $request->file($name), $visibility);

        return $path;
    }

}
