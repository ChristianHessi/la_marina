<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBatimentRequest;
use App\Http\Requests\UpdateBatimentRequest;
use App\Models\Batiment;
use App\Models\Reparation;
use App\Models\User;
use App\Repositories\BatimentRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Flash;
use Response;

class BatimentController extends AppBaseController
{
    /** @var  BatimentRepository */
    private $batimentRepository;
    private $userRepository;

    public function __construct(BatimentRepository $batimentRepo, UserRepository $userRepository)
    {
        $this->batimentRepository = $batimentRepo;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the Batiment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $batiments = $this->batimentRepository->all();

        return view('batiments.index')
            ->with('batiments', $batiments);
    }

    /**
     * Show the form for creating a new Batiment.
     *
     * @return Response
     */
    public function create()
    {
        $usr = User::role('proprietaire')->get();
        $users = [];
        foreach ($usr as $u){
            $users[$u->id] = $u->name;
        }
        return view('batiments.create', compact('users'));
    }

    /**
     * Store a newly created Batiment in storage.
     *
     * @param CreateBatimentRequest $request
     *
     * @return Response
     */
    public function store(CreateBatimentRequest $request)
    {
        $input = $request->all();

        $batiment = $this->batimentRepository->create($input);

        Flash::success('Batiment saved successfully.');

        return redirect(route('batiments.index'));
    }

    /**
     * Display the specified Batiment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $batiment = $this->batimentRepository->find($id);

        if (empty($batiment)) {
            Flash::error('Batiment not found');

            return redirect(route('batiments.index'));
        }

        return view('batiments.show')->with('batiment', $batiment);
    }

    /**
     * Show the form for editing the specified Batiment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $batiment = $this->batimentRepository->find($id);

        if (empty($batiment)) {
            Flash::error('Batiment not found');

            return redirect(route('batiments.index'));
        }
        $usr = User::role('proprietaire')->get();
        $users = [];

        foreach ($usr as $u){
            $users[$u->id] = $u->name;
        }

        return view('batiments.edit', compact('batiment', 'users'));
    }

    /**
     * Update the specified Batiment in storage.
     *
     * @param int $id
     * @param UpdateBatimentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBatimentRequest $request)
    {
        $batiment = $this->batimentRepository->find($id);

        if (empty($batiment)) {
            Flash::error('Batiment not found');

            return redirect(route('batiments.index'));
        }

        $batiment = $this->batimentRepository->update($request->all(), $id);

        Flash::success('Batiment updated successfully.');

        return redirect(route('batiments.index'));
    }

    /**
     * Remove the specified Batiment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $batiment = $this->batimentRepository->find($id);

        if (empty($batiment)) {
            Flash::error('Batiment not found');

            return redirect(route('batiments.index'));
        }

        $this->batimentRepository->delete($id);

        Flash::success('Batiment deleted successfully.');

        return redirect(route('batiments.index'));
    }

    public function show_depenses($id){
        $batiment = Batiment::with(['chambres.reparations'])->where('id', $id)->first();
        $reparations = Reparation::with('reparable')->get();

//        dd($reparations);

        if (empty($batiment)) {
            Flash::error('Batiment not found');

            return redirect(route('batiments.index'));
        }

        return view('batiments.show_depenses', compact('batiment', 'reparations'));
    }

    public function show_recettes($id){
        $batiment = Batiment::with(['loyers.chambre', 'loyers.locataire'])->where('id', $id)->first();

//        dd($batiment->loyers);

        if (empty($batiment)) {
            Flash::error('Batiment not found');

            return redirect(route('batiments.index'));
        }

        return view('batiments.show_recettes', compact('batiment'));
    }
}
