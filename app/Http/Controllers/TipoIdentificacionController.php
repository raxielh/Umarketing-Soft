<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipoIdentificacionRequest;
use App\Http\Requests\UpdateTipoIdentificacionRequest;
use App\Repositories\TipoIdentificacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TipoIdentificacionController extends AppBaseController
{
    /** @var  TipoIdentificacionRepository */
    private $tipoIdentificacionRepository;

    public function __construct(TipoIdentificacionRepository $tipoIdentificacionRepo)
    {
        $this->tipoIdentificacionRepository = $tipoIdentificacionRepo;
    }

    /**
     * Display a listing of the TipoIdentificacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tipoIdentificacions =  DB::table('tipo_identificacions')
                ->join('users', 'tipo_identificacions.users_id', '=', 'users.id')
                ->selectRaw('tipo_identificacions.*,users.name')
                ->get();

        return view('tipo_identificacions.index')
            ->with('tipoIdentificacions', $tipoIdentificacions);
    }

    /**
     * Show the form for creating a new TipoIdentificacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipo_identificacions.create');
    }

    /**
     * Store a newly created TipoIdentificacion in storage.
     *
     * @param CreateTipoIdentificacionRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoIdentificacionRequest $request)
    {
        $input = $request->all();
        $input['users_id']=Auth::id();

        $tipoIdentificacion = $this->tipoIdentificacionRepository->create($input);

        Flash::success('Tipo Identificacion Guardado exitosamente.');

        return redirect(route('tipoIdentificacions.index'));
    }

    /**
     * Display the specified TipoIdentificacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoIdentificacion = $this->tipoIdentificacionRepository->findWithoutFail($id);

        if (empty($tipoIdentificacion)) {
            Flash::error('Tipo Identificacion not found');

            return redirect(route('tipoIdentificacions.index'));
        }

        return view('tipo_identificacions.show')->with('tipoIdentificacion', $tipoIdentificacion);
    }

    /**
     * Show the form for editing the specified TipoIdentificacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoIdentificacion = $this->tipoIdentificacionRepository->findWithoutFail($id);

        if (empty($tipoIdentificacion)) {
            Flash::error('Tipo Identificacion not found');

            return redirect(route('tipoIdentificacions.index'));
        }

        return view('tipo_identificacions.edit')->with('tipoIdentificacion', $tipoIdentificacion);
    }

    /**
     * Update the specified TipoIdentificacion in storage.
     *
     * @param  int              $id
     * @param UpdateTipoIdentificacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoIdentificacionRequest $request)
    {
        $tipoIdentificacion = $this->tipoIdentificacionRepository->findWithoutFail($id);

        if (empty($tipoIdentificacion)) {
            Flash::error('Tipo Identificacion not found');

            return redirect(route('tipoIdentificacions.index'));
        }

        $tipoIdentificacion = $this->tipoIdentificacionRepository->update($request->all(), $id);

        Flash::success('Tipo Identificacion Actualizado con exito.');

        return redirect(route('tipoIdentificacions.index'));
    }

    /**
     * Remove the specified TipoIdentificacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoIdentificacion = $this->tipoIdentificacionRepository->findWithoutFail($id);

        if (empty($tipoIdentificacion)) {
            Flash::error('Tipo Identificacion not found');

            return redirect(route('tipoIdentificacions.index'));
        }

        $this->tipoIdentificacionRepository->delete($id);

        Flash::success('Tipo Identificacion Borrado con exito.');

        return redirect(route('tipoIdentificacions.index'));
    }
}
