<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateGoustoRequest;
use App\Http\Requests\UpdateGoustoRequest;
use App\Repositories\GoustoRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GoustoController extends AppBaseController
{
	/** @var  GoustoRepository */
	private $goustoRepository;

	function __construct(GoustoRepository $goustoRepo)
	{
		$this->goustoRepository = $goustoRepo;
	}

	/**
	 * Display a listing of the Gousto.
	 *
     * @param Request $request
	 * @return Response
	 */
    public function index(Request $request)
	{
        $this->goustoRepository->pushCriteria(new RequestCriteria($request));
		$goustos = $this->goustoRepository->all();

		return view('goustos.index')
			->with('goustos', $goustos);
	}

	/**
	 * Show the form for creating a new Gousto.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('goustos.create');
	}

	/**
	 * Store a newly created Gousto in storage.
	 *
	 * @param CreateGoustoRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateGoustoRequest $request)
	{
		$input = $request->all();

		$gousto = $this->goustoRepository->create($input);

		Flash::success('Gousto saved successfully.');

		return redirect(route('goustos.index'));
	}

	/**
	 * Display the specified Gousto.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$gousto = $this->goustoRepository->findWithoutFail($id);

		if (empty($gousto)) {
			Flash::error('Gousto not found');

			return redirect(route('goustos.index'));
		}

		return view('goustos.show')->with('gousto', $gousto);
	}

	/**
	 * Show the form for editing the specified Gousto.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$gousto = $this->goustoRepository->findWithoutFail($id);

		if (empty($gousto)) {
			Flash::error('Gousto not found');

			return redirect(route('goustos.index'));
		}

		return view('goustos.edit')->with('gousto', $gousto);
	}

	/**
	 * Update the specified Gousto in storage.
	 *
	 * @param  int              $id
	 * @param UpdateGoustoRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateGoustoRequest $request)
	{
		$gousto = $this->goustoRepository->findWithoutFail($id);

		if (empty($gousto)) {
			Flash::error('Gousto not found');

			return redirect(route('goustos.index'));
		}

		$gousto = $this->goustoRepository->update($request->all(), $id);

		Flash::success('Gousto updated successfully.');

		return redirect(route('goustos.index'));
	}

	/**
	 * Remove the specified Gousto from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$gousto = $this->goustoRepository->findWithoutFail($id);

		if (empty($gousto)) {
			Flash::error('Gousto not found');

			return redirect(route('goustos.index'));
		}

		$this->goustoRepository->delete($id);

		Flash::success('Gousto deleted successfully.');

		return redirect(route('goustos.index'));
	}
}
