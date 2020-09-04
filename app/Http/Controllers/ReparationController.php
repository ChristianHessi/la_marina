<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReparationRequest;
use App\Http\Requests\UpdateReparationRequest;
use App\Repositories\ChambreRepository;
use App\Repositories\ReparationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ReparationController extends AppBaseController
{
    /** @var  ReparationRepository */
    private $reparationRepository;
    private $chambreRepository;

    public function __construct(ReparationRepository $reparationRepo, ChambreRepository $chambreRepository)
    {
        $this->reparationRepository = $reparationRepo;
        $this->chambreRepository = $chambreRepository;
    }

    /**
     * Display a listing of the Reparation.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $reparations = $this->reparationRepository->all();

        return view('reparations.index')
            ->with('reparations', $reparations);
    }

    /**
     * Show the form for creating a new Reparation.
     *
     * @return Response
     */
    public function create($id)
    {
        $chambre = $this->chambreRepository->find($id);
        return view('reparations.create', compact('chambre'));
    }

    /**
     * Store a newly created Reparation in storage.
     *
     * @param CreateReparationRequest $request
     *
     * @return Response
     */
    public function store(CreateReparationRequest $request, $id)
    {
        $input = $request->all();
        $chambre = $this->chambreRepository->find($id);

        if (empty($chambre)) {
            Flash::error('Chambre Introuvable');

            return redirect(route('home'));
        }

        $input['chambre_id'] = $id;

        $reparation = $this->reparationRepository->create($input);

        Flash::success('Reparation saved successfully.');

        return redirect(route('chambres.show', $chambre->id));
    }

    /**
     * Display the specified Reparation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reparation = $this->reparationRepository->find($id);

        if (empty($reparation)) {
            Flash::error('Reparation not found');

            return redirect(route('reparations.index'));
        }

        return view('reparations.show')->with('reparation', $reparation);
    }

    /**
     * Show the form for editing the specified Reparation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reparation = $this->reparationRepository->find($id);

        if (empty($reparation)) {
            Flash::error('Reparation not found');

            return redirect(route('reparations.index'));
        }

        return view('reparations.edit')->with('reparation', $reparation);
    }

    /**
     * Update the specified Reparation in storage.
     *
     * @param int $id
     * @param UpdateReparationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReparationRequest $request)
    {
        $reparation = $this->reparationRepository->find($id);

        if (empty($reparation)) {
            Flash::error('Reparation not found');

            return redirect(route('reparations.index'));
        }

        $reparation = $this->reparationRepository->update($request->all(), $id);

        Flash::success('Reparation updated successfully.');

        return redirect(route('chambres.show', $reparation->chambre_id));
    }

    /**
     * Remove the specified Reparation from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reparation = $this->reparationRepository->find($id);

        if (empty($reparation)) {
            Flash::error('Reparation not found');

            return redirect(route('reparations.index'));
        }

        $this->reparationRepository->delete($id);

        Flash::success('Reparation deleted successfully.');

        return redirect(route('reparations.index'));
    }
}
