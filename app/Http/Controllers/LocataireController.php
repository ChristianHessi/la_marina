<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLocataireRequest;
use App\Http\Requests\UpdateLocataireRequest;
use App\Models\Chambre;
use App\Repositories\ChambreRepository;
use App\Repositories\EtatChambreRepository;
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
    private $etatChambreRepository;

    public function __construct(LocataireRepository $locataireRepo, ChambreRepository $chambreRepository, EtatChambreRepository $etatChambreRepository, LoyerRepository $loyerRepository)
    {
        $this->locataireRepository = $locataireRepo;
        $this->chambreRepository = $chambreRepository;
        $this->loyerRepository = $loyerRepository;
        $this->etatChambreRepository = $etatChambreRepository;
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
        $chambres = Chambre::whereHas('locataires', function ($q){
            $q->where('actif', false);
        })->get();

        return view('locataires.index', compact('locataires', 'chambres'));
    }

    /**
     * Show the form for creating a new Locataire.
     *
     * @return Response
     */
    public function create($id)
    {
        $chambre = $this->chambreRepository->find($id);

        return view('locataires.create', compact('chambre'));
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
        $chambre = $this->chambreRepository->find($request->input('chambre_id'));
        if (empty($chambre)) {
            Flash::error('Chambre not found');

            return redirect(route('home'));
        }

        $loc = $chambre->locataires->where('actif', 1)->first();
        if (!empty($loc)) {
            Flash::error('La chambre '.$chambre->code .' est occupée');

            return redirect(route('home'));
        }

        $locInput = $request->except('montant', 'fin', 'description');

        $loyInput = $request->only('montant', 'fin');
        $loyInput['date_versement'] = $loyInput['debut'] = $request['date_entree'];
        $locInput['date_fin'] = $request['fin'];

        $locataire = $this->locataireRepository->create($locInput);

        $etatInput = $request->only('description', 'chambre_id');
        $etatInput['type'] = 'Entrée';
        $etatInput['locataire_id'] = $locataire->id;
        $etatInput['date'] = $request['date_entree'];

        $etatChambre = $this->etatChambreRepository->create($etatInput);

        $loyInput['locataire_id'] = $locataire->id;

        $loyer = $this->loyerRepository->create($loyInput);

        Flash::success('Locataire saved successfully.');

        return redirect(route('chambres.show', [$locataire->chambre_id]));
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

        $locataire = $this->locataireRepository->update($request->except('chambre_id'), $id);

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

    public function closeBail($id){
        $locataire = $this->locataireRepository->find($id);

        if (empty($locataire)) {
            Flash::error('Locataire not found');

            return redirect(route('locataires.index'));
        }

        return view('locataires.close', compact('locataire'));
    }

    public function close($id, Request $request){
        $locataire = $this->locataireRepository->find($id);

        if (empty($locataire)) {
            Flash::error('Locataire not found');

            return redirect(route('locataires.index'));
        }

        $etatChambre = $this->etatChambreRepository->create([
            'locataire_id' => $locataire->id,
            'chambre_id' => $locataire->chambre->id,
            'type' => 'Sortie',
            'date' => $request->date,
            'description' => $request->description
        ]);

        $locataire->actif = false;
        $locataire->save();
        return redirect(route('home'));
    }
}
