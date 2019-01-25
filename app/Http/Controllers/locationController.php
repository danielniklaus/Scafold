<?php

namespace App\Http\Controllers;

use App\DataTables\locationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatelocationRequest;
use App\Http\Requests\UpdatelocationRequest;
use App\Repositories\locationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class locationController extends AppBaseController
{
    /** @var  locationRepository */
    private $locationRepository;

    public function __construct(locationRepository $locationRepo)
    {
        // $this->middleware('auth');
        $this->middleware('permission:locations-list');
         $this->middleware('permission:locations-create', ['only' => ['create','store']]);
         $this->middleware('permission:locations-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:locations-delete', ['only' => ['destroy']]);

        $this->locationRepository = $locationRepo;
    }

    /**
     * Display a listing of the location.
     *
     * @param locationDataTable $locationDataTable
     * @return Response
     */
    public function index(locationDataTable $locationDataTable)
    {
        return $locationDataTable->render('locations.index');
    }

    /**
     * Show the form for creating a new location.
     *
     * @return Response
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created location in storage.
     *
     * @param CreatelocationRequest $request
     *
     * @return Response
     */
    public function store(CreatelocationRequest $request)
    {
        $input = $request->all();

        $location = $this->locationRepository->create($input);

        Flash::success('Location saved successfully.');

        return redirect(route('locations.index'));
    }

    /**
     * Display the specified location.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $location = $this->locationRepository->findWithoutFail($id);

        if (empty($location)) {
            Flash::error('Location not found');

            return redirect(route('locations.index'));
        }

        return view('locations.show')->with('location', $location);
    }

    /**
     * Show the form for editing the specified location.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $location = $this->locationRepository->findWithoutFail($id);

        if (empty($location)) {
            Flash::error('Location not found');

            return redirect(route('locations.index'));
        }

        return view('locations.edit')->with('location', $location);
    }

    /**
     * Update the specified location in storage.
     *
     * @param  int              $id
     * @param UpdatelocationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelocationRequest $request)
    {
        $location = $this->locationRepository->findWithoutFail($id);

        if (empty($location)) {
            Flash::error('Location not found');

            return redirect(route('locations.index'));
        }

        $location = $this->locationRepository->update($request->all(), $id);

        Flash::success('Location updated successfully.');

        return redirect(route('locations.index'));
    }

    /**
     * Remove the specified location from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $location = $this->locationRepository->findWithoutFail($id);

        if (empty($location)) {
            Flash::error('Location not found');

            return redirect(route('locations.index'));
        }

        $this->locationRepository->delete($id);

        Flash::success('Location deleted successfully.');

        return redirect(route('locations.index'));
    }
}
