<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLocataireRequest;
use App\Http\Requests\UpdateLocataireRequest;
use App\Repositories\ChambreRepository;
use App\Repositories\LocataireRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LoyerRepository;
use Illuminate\Http\Request;
use Flash;
use Response;

class LocataireController extends AppBaseController
{
    /** @var  LocataireRepository */
    private $locataireRepository;
    private $chambreRepository;
    private $loyerRepository;

    public function __construct(LocataireRepository $locataireRepo, ChambreRepository $chambreRepository, LoyerRepository $loyerRepository)
    {
        $this->locataireRepository = $locataireRepo;
        $this->chambreRepository = $chambreRepository;
        $this->loyerRepository = $loyerRepository;
    }

    /**
     * Display a listing of the Locataire.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $locataires = $this->locataireRepository->all();

        return view('locataires.index')
            ->with('locataires', $locataires);
    }

    /**
     * Show the form for creating a new Locataire.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $id = $request->id;
        $cham = $this->chambreRepository->all();
        $chambres = [];

        foreach ($cham as $c){
            $chambres[$c->id] = $c->code .' ('. $c->montant_loyer.')';
        }
        return view('locataires.create', compact('chambres', 'id'));
    }

    /**
     * Store a newly created Locataire in storage.
     *
     * @param CreateLocataireRequest $request
     *
     * @return Response
     */
    public function store(CreateLocataireRequest $request)
    {
        $locInput = $request->except('montant', 'fin');
        $locataire = $this->locataireRepository->create($locInput);
        
        $loyInput = $request->only('montant', 'fin');
        $loyInput['date_versement'] = $loyInput['debut'] = $request['date_entree'];
        $loyInput['locataire_id'] = $locataire->id;

        $loyer = $this->loyerRepository->create($loyInput);


        Flash::success('Locataire saved successfully.');

        return redirect(route('locataires.index'));
    }

    /**
     * Display the specified Locataire.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $locataire = $this->locataireRepository->find($id);

        if (empty($locataire)) {
            Flash::error('Locataire not found');

            return redirect(route('locataires.index'));
        }

        return view('locataires.show')->with('locataire', $locataire);
    }

    /**
     * Show the form for editing the specified Locataire.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $locataire = $this->locataireRepository->find($id);

        if (empty($locataire)) {
            Flash::error('Locataire not found');

            return redirect(route('locataires.index'));
        }
        $cham = $this->chambreRepository->all();
        $chambres = [];

        foreach ($cham as $c){
            $chambres[$c->id] = $c->code;
        }

        return view('locataires.edit', compact('chambres', 'locataire'));
    }

    /**
     * Update the specified Locataire in storage.
     *
     * @param int $id
     * @param UpdateLocataireRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLocataireRequest $request)
    {
        $locataire = $this->locataireRepository->find($id);

        if (empty($locataire)) {
            Flash::error('Locataire not found');

            return redirect(route('locataires.index'));
        }

        $locataire = $this->locataireRepository->update($request->all(), $id);

        Flash::success('Locataire updated successfully.');

        return redirect(route('locataires.index'));
    }

    /**
     * Remove the specified Locataire from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $locataire = $this->locataireRepository->find($id);

        if (empty($locataire)) {
            Flash::error('Locataire not found');

            return redirect(route('locataires.index'));
        }

        $this->locataireRepository->delete($id);

        Flash::success('Locataire deleted successfully.');

        return redirect(route('locataires.index'));
    }
}
