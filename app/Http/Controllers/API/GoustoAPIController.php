<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGoustoAPIRequest;
use App\Http\Requests\API\UpdateGoustoAPIRequest;
use App\Models\Gousto;
use App\Repositories\GoustoRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Controller\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class GoustoController
 * @package App\Http\Controllers\API
 */

class GoustoAPIController extends AppBaseController
{
    /** @var  GoustoRepository */
    private $goustoRepository;

    function __construct(GoustoRepository $goustoRepo)
    {
        $this->goustoRepository = $goustoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/goustos",
     *      summary="Get a listing of the Goustos.",
     *      tags={"Gousto"},
     *      description="Get all Goustos",
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
     *                  @SWG\Items(ref="#/definitions/Gousto")
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
        $this->goustoRepository->pushCriteria(new RequestCriteria($request));
        $this->goustoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $goustos = $this->goustoRepository->all();

        return $this->sendResponse($goustos->toArray(), "Goustos retrieved successfully");
    }

    /**
     * @param CreateGoustoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/goustos",
     *      summary="Store a newly created Gousto in storage",
     *      tags={"Gousto"},
     *      description="Store Gousto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Gousto that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Gousto")
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
     *                  ref="#/definitions/Gousto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateGoustoAPIRequest $request)
    {
        $input = $request->all();

        $goustos = $this->goustoRepository->create($input);

        return $this->sendResponse($goustos->toArray(), "Gousto saved successfully");
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/goustos/{id}",
     *      summary="Display the specified Gousto",
     *      tags={"Gousto"},
     *      description="Get Gousto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Gousto",
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
     *                  ref="#/definitions/Gousto"
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
        /** @var Gousto $gousto */
        $gousto = $this->goustoRepository->find($id);

        if(empty($gousto)) {
            return Response::json(ResponseUtil::makeError("Gousto not found"), 400);
        }

        return $this->sendResponse($gousto->toArray(), "Gousto retrieved successfully");
    }

    /**
     * @param int $id
     * @param UpdateGoustoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/goustos/{id}",
     *      summary="Update the specified Gousto in storage",
     *      tags={"Gousto"},
     *      description="Update Gousto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Gousto",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Gousto that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Gousto")
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
     *                  ref="#/definitions/Gousto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateGoustoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Gousto $gousto */
        $gousto = $this->goustoRepository->find($id);

        if (empty($gousto)) {
            return Response::json(ResponseUtil::makeError("Gousto not found"), 400);
        }

        $gousto = $this->goustoRepository->update($input, $id);

        return $this->sendResponse($gousto->toArray(), "Gousto updated successfully");
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/goustos/{id}",
     *      summary="Remove the specified Gousto from storage",
     *      tags={"Gousto"},
     *      description="Delete Gousto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Gousto",
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
        /** @var Gousto $gousto */
        $gousto = $this->goustoRepository->find($id);

        if(empty($gousto)) {
            return Response::json(ResponseUtil::makeError("Gousto not found"), 400);
        }

        $gousto->delete();

        return $this->sendResponse($id, "Gousto deleted successfully");
    }
}
