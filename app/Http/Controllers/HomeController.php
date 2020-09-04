<?php

namespace App\Http\Controllers;

use App\Repositories\ChambreRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $chambreRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(ChambreRepository $chambreRepository)
    {
        $this->middleware('auth');
        $this->chambreRepository = $chambreRepository;
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
}
