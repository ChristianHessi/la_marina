<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLoyerRequest;
use App\Http\Requests\UpdateLoyerRequest;
use App\Repositories\LocataireRepository;
use App\Repositories\LoyerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class LoyerController extends AppBaseController
{
    /** @var  LoyerRepository */
    private $loyerRepository;
    private $locataireRepository;

    public function __construct(LoyerRepository $loyerRepo, LocataireRepository $locataireRepository)
    {
        $this->loyerRepository = $loyerRepo;
        $this->locataireRepository = $locataireRepository;
    }

    /**
     * Display a listing of the Loyer.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $loyers = $this->loyerRepository->all();
        foreach($loyers as $loyer){
            $loyer->chambre_id = $loyer->locataire->chambre->id;
            $loyer->save();
        }

        return view('loyers.index')
            ->with('loyers', $loyers);
    }

    /**
     * Show the form for creating a new Loyer.
     *
     * @return Response
     */
    public function create($id)
    {
        $locataire = $this->locataireRepository->find($id);
        return view('loyers.create', compact('locataire'));
    }

    /**
     * Store a newly created Loyer in storage.
     *
     * @param CreateLoyerRequest $request
     *
     * @return Response
     */
    public function store(CreateLoyerRequest $request, $id)
    {
        $locataire = $this->locataireRepository->find($id);

        dd($request);
        if (empty($locataire)) {
            Flash::error('Loyer not found');

            return redirect(route('home'));
        }
        $input = $request->all();
        $input['locataire_id'] = $id;
        $input['chambre_id'] = $locataire->chambre->id;

        $loyer = $this->loyerRepository->create($input);

        Flash::success('Loyer saved successfully.');

        return redirect(route('chambres.show', [$locataire->chambre->id]));
    }

    /**
     * Display the specified Loyer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $loyer = $this->loyerRepository->find($id);

        if (empty($loyer)) {
            Flash::error('Loyer not found');

            return redirect(route('loyers.index'));
        }

        return view('loyers.show')->with('loyer', $loyer);
    }

    /**
     * Show the form for editing the specified Loyer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $loyer = $this->loyerRepository->find($id);

        if (empty($loyer)) {
            Flash::error('Loyer not found');

            return redirect(route('loyers.index'));
        }
        $locataire = $loyer->locataire;
        return view('loyers.edit', compact('loyer', 'locataire'));
    }

    /**
     * Update the specified Loyer in storage.
     *
     * @param int $id
     * @param UpdateLoyerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLoyerRequest $request)
    {
        $loyer = $this->loyerRepository->find($id);

        if (empty($loyer)) {
            Flash::error('Loyer not found');

            return redirect(route('loyers.index'));
        }

        $loyer = $this->loyerRepository->update($request->all(), $id);

        Flash::success('Loyer updated successfully.');

        return redirect(route('chambres.show', $loyer->locataire->chambre->id));
    }

    /**
     * Remove the specified Loyer from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $loyer = $this->loyerRepository->find($id);

        if (empty($loyer)) {
            Flash::error('Loyer not found');

            return redirect(route('loyers.index'));
        }

        $this->loyerRepository->delete($id);

        Flash::success('Loyer deleted successfully.');

        return redirect(route('loyers.index'));
    }

    public function recus($id){
        $loyer = $this->loyerRepository->find($id);
        if (empty($loyer)) {
            Flash::error('Loyer not found');

            return redirect(route('loyers.index'));
        }

        return view('loyers.recu', compact('loyer'));
    }
}
