<?php

namespace App\Http\Controllers\Bo;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();

        return view('bo.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bo.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'client' => 'required', // VALIDAR SE EXISTE
            ]
        );

        Client::create(['name' => $request->client]);

        return redirect()->route('clients.index')->with('status-success', 'Cliente criado com sucesso');
    }
}
