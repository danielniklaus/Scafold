<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetempatAPIRequest;
use App\Http\Requests\API\UpdatetempatAPIRequest;
use App\Models\tempat;
use App\Repositories\tempatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class tempatController
 * @package App\Http\Controllers\API
 */

class tempatAPIController extends AppBaseController
{
    /** @var  tempatRepository */
    private $tempatRepository;

    public function __construct(tempatRepository $tempatRepo)
    {
        $this->tempatRepository = $tempatRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tempats",
     *      summary="Get a listing of the tempats.",
     *      tags={"tempat"},
     *      description="Get all tempats",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/tempat")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->tempatRepository->pushCriteria(new RequestCriteria($request));
        $this->tempatRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tempats = $this->tempatRepository->all();

        return $this->sendResponse($tempats->toArray(), 'Tempats retrieved successfully');
    }

    /**
     * @param CreatetempatAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tempats",
     *      summary="Store a newly created tempat in storage",
     *      tags={"tempat"},
     *      description="Store tempat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="tempat that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/tempat")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/tempat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatetempatAPIRequest $request)
    {
        $input = $request->all();

        $tempats = $this->tempatRepository->create($input);

        return $this->sendResponse($tempats->toArray(), 'Tempat saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tempats/{id}",
     *      summary="Display the specified tempat",
     *      tags={"tempat"},
     *      description="Get tempat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tempat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/tempat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var tempat $tempat */
        $tempat = $this->tempatRepository->findWithoutFail($id);

        if (empty($tempat)) {
            return $this->sendError('Tempat not found');
        }

        return $this->sendResponse($tempat->toArray(), 'Tempat retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatetempatAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tempats/{id}",
     *      summary="Update the specified tempat in storage",
     *      tags={"tempat"},
     *      description="Update tempat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tempat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="tempat that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/tempat")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/tempat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatetempatAPIRequest $request)
    {
        $input = $request->all();

        /** @var tempat $tempat */
        $tempat = $this->tempatRepository->findWithoutFail($id);

        if (empty($tempat)) {
            return $this->sendError('Tempat not found');
        }

        $tempat = $this->tempatRepository->update($input, $id);

        return $this->sendResponse($tempat->toArray(), 'tempat updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tempats/{id}",
     *      summary="Remove the specified tempat from storage",
     *      tags={"tempat"},
     *      description="Delete tempat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of tempat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var tempat $tempat */
        $tempat = $this->tempatRepository->findWithoutFail($id);

        if (empty($tempat)) {
            return $this->sendError('Tempat not found');
        }

        $tempat->delete();

        return $this->sendResponse($id, 'Tempat deleted successfully');
    }
}
