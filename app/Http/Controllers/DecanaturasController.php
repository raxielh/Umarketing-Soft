<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDecanaturasRequest;
use App\Http\Requests\UpdateDecanaturasRequest;
use App\Repositories\DecanaturasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DecanaturasController extends AppBaseController
{
    /** @var  DecanaturasRepository */
    private $decanaturasRepository;

    public function __construct(DecanaturasRepository $decanaturasRepo)
    {
        $this->decanaturasRepository = $decanaturasRepo;
    }

    /**
     * Display a listing of the Decanaturas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $decanaturas =  DB::table('decanaturas')
                ->join('campuses', 'decanaturas.campus_id', '=', 'campuses.id')
                ->selectRaw('decanaturas.*,campuses.descripcion as des')
                ->orderBy('campuses.descripcion', 'desc')
                ->get();

        return view('decanaturas.index')
            ->with('decanaturas', $decanaturas);
    }

    /**
     * Show the form for creating a new Decanaturas.
     *
     * @return Response
     */
    public function create()
    {
        $campus =  DB::table('campuses')
                     ->pluck('descripcion','id');

        $datos = ['campus' => $campus];

        return view('decanaturas.create')->with('datos',$datos);
    }

    /**
     * Store a newly created Decanaturas in storage.
     *
     * @param CreateDecanaturasRequest $request
     *
     * @return Response
     */
    public function store(CreateDecanaturasRequest $request)
    {
        $input = $request->all();

        $decanaturas = $this->decanaturasRepository->create($input);

        Flash::success('Decanaturas Guardado exitosamente.');

        //return redirect(route('decanaturas.index'));
        return back();
    }

    /**
     * Display the specified Decanaturas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $decanaturas = $this->decanaturasRepository->findWithoutFail($id);

        if (empty($decanaturas)) {
            Flash::error('Decanaturas not found');

            return redirect(route('decanaturas.index'));
        }

        return view('decanaturas.show')->with('decanaturas', $decanaturas);
    }

    /**
     * Show the form for editing the specified Decanaturas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $decanaturas = $this->decanaturasRepository->findWithoutFail($id);

        if (empty($decanaturas)) {
            Flash::error('Decanaturas not found');

            return redirect(route('decanaturas.index'));
        }

        return view('decanaturas.edit')->with('decanaturas', $decanaturas);
    }

    /**
     * Update the specified Decanaturas in storage.
     *
     * @param  int              $id
     * @param UpdateDecanaturasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDecanaturasRequest $request)
    {
        $decanaturas = $this->decanaturasRepository->findWithoutFail($id);

        if (empty($decanaturas)) {
            Flash::error('Decanaturas not found');

            return redirect(route('decanaturas.index'));
        }

        $decanaturas = $this->decanaturasRepository->update($request->all(), $id);

        Flash::success('Decanaturas Actualizado con exito.');

        return redirect(route('decanaturas.index'));
    }

    /**
     * Remove the specified Decanaturas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $decanaturas = $this->decanaturasRepository->findWithoutFail($id);

        if (empty($decanaturas)) {
            Flash::error('Decanaturas not found');

            return redirect(route('decanaturas.index'));
        }

        $this->decanaturasRepository->delete($id);

        Flash::success('Decanaturas Borrado con exito.');

        return redirect(route('decanaturas.index'));
    }
}
