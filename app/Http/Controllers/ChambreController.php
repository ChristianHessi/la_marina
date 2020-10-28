<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChambreRequest;
use App\Http\Requests\UpdateChambreRequest;
use App\Models\Batiment;
use App\Models\Chambre;
use App\Repositories\BatimentRepository;
use App\Repositories\ChambreRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ChambreController extends AppBaseController
{
    /** @var  ChambreRepository */
    private $chambreRepository;
    private $batimentRepository;

    public function __construct(ChambreRepository $chambreRepo, BatimentRepository $batimentRepository)
    {
        $this->chambreRepository = $chambreRepo;
        $this->batimentRepository = $batimentRepository;
    }

    /**
     * Display a listing of the Chambre.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $chambres = $this->chambreRepository->all();

        return view('chambres.index')
            ->with('chambres', $chambres);
    }

    /**
     * Show the form for creating a new Chambre.
     *
     * @return Response
     */
    public function create()
    {
        $bat = $this->batimentRepository->all();
        $batiments = [];
        foreach ($bat as $b){
            $batiments[$b->id] = $b->nom;
        }
        return view('chambres.create', compact('batiments'));
    }

    /**
     * Store a newly created Chambre in storage.
     *
     * @param CreateChambreRequest $request
     *
     * @return Response
     */
    public function store(CreateChambreRequest $request)
    {
        $input = $request->all();
        $chambre = $this->chambreRepository->create($input);

        Flash::success('Chambre saved successfully.');

        return redirect(route('chambres.index'));
    }

    /**
     * Display the specified Chambre.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $chambre = $this->chambreRepository->find($id);

        if (empty($chambre)) {
            Flash::error('Chambre not found');

            return redirect(route('chambres.index'));
        }

        return view('chambres.show')->with('chambre', $chambre);
    }

    /**
     * Show the form for editing the specified Chambre.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $chambre = $this->chambreRepository->find($id);
        $bat = $this->batimentRepository->all();
        $batiments = [];
        foreach ($bat as $b){
            $batiments[$b->id] = $b->nom;
        }

        if (empty($chambre)) {
            Flash::error('Chambre not found');

            return redirect(route('chambres.index'));
        }

        return view('chambres.edit')->with(['chambre' => $chambre, 'batiments' => $batiments]);
    }

    /**
     * Update the specified Chambre in storage.
     *
     * @param int $id
     * @param UpdateChambreRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChambreRequest $request)
    {
        $chambre = $this->chambreRepository->find($id);

        if (empty($chambre)) {
            Flash::error('Chambre not found');

            return redirect(route('chambres.index'));
        }

        $chambre = $this->chambreRepository->update($request->all(), $id);

        Flash::success('Chambre updated successfully.');

        return redirect(route('chambres.index'));
    }

    /**
     * Remove the specified Chambre from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $chambre = $this->chambreRepository->find($id);

        if (empty($chambre)) {
            Flash::error('Chambre not found');

            return redirect(route('chambres.index'));
        }

        $this->chambreRepository->delete($id);

        Flash::success('Chambre deleted successfully.');

        return redirect(route('chambres.index'));
    }

    public function show_depenses($id){
        $chambre = Chambre::with(['reparations'])->find($id);
        if (empty($chambre)) {
            Flash::error('Chambre not found');

            return redirect(route('chambres.index'));
        }

        return view('chambres.depenses', compact('chambre'));
    }

    public function show_recettes($id){
        $chambre = Chambre::with('loyers.locataire')->find($id);
        if (empty($chambre)) {
            Flash::error('Chambre not found');

            return redirect(route('chambres.index'));
        }

        return view('chambres.recettes', compact('chambre'));
    }
}
