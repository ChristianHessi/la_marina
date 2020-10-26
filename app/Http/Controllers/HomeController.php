<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Repositories\ChambreRepository;
use App\Repositories\LoyerRepository;
use App\Repositories\ReparationRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $chambreRepository;
    private $reparationRepository;
    private $loyerRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(ChambreRepository $chambreRepository, ReparationRepository $reparationRepository, LoyerRepository $loyerRepository)
    {
        $this->middleware('auth');
        $this->chambreRepository = $chambreRepository;
        $this->reparationRepository = $reparationRepository;
        $this->loyerRepository = $loyerRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chambres = $this->chambreRepository->all();
        return view('home', compact('chambres'));
    }

    public function dashboard(){
        $reparations = $this->reparationRepository->all();
        $loyers = $this->loyerRepository->all();
        $chambres = Chambre::with(['locataires', 'reparations', 'loyers'])->get();
//        dd($chambres);

        return view('dashboard', compact('reparations', 'loyers', 'chambres'));
    }
}
