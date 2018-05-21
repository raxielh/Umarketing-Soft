<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCampusRequest;
use App\Http\Requests\UpdateCampusRequest;
use App\Repositories\CampusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CampusController extends AppBaseController
{
    /** @var  CampusRepository */
    private $campusRepository;

    public function __construct(CampusRepository $campusRepo)
    {
        $this->campusRepository = $campusRepo;
    }

    /**
     * Display a listing of the Campus.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->campusRepository->pushCriteria(new RequestCriteria($request));
        $campuses = $this->campusRepository->all();

        return view('campuses.index')
            ->with('campuses', $campuses);
    }

    /**
     * Show the form for creating a new Campus.
     *
     * @return Response
     */
    public function create()
    {
        return view('campuses.create');
    }

    /**
     * Store a newly created Campus in storage.
     *
     * @param CreateCampusRequest $request
     *
     * @return Response
     */
    public function store(CreateCampusRequest $request)
    {
        $input = $request->all();

        $campus = $this->campusRepository->create($input);

        Flash::success('Campus Guardado exitosamente.');

        return redirect(route('campuses.index'));
    }

    /**
     * Display the specified Campus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $campus = $this->campusRepository->findWithoutFail($id);

        if (empty($campus)) {
            Flash::error('Campus not found');

            return redirect(route('campuses.index'));
        }

        $decanaturas =  DB::table('decanaturas')
                ->join('campuses', 'decanaturas.campus_id', '=', 'campuses.id')
                ->where('decanaturas.campus_id',$id)
                ->selectRaw('decanaturas.*,campuses.descripcion as des')
                ->orderBy('campuses.descripcion', 'desc')
                ->get();

        return view('campuses.show')
                                    ->with('campus', $campus)
                                    ->with('decanaturas', $decanaturas);
    }

    /**
     * Show the form for editing the specified Campus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $campus = $this->campusRepository->findWithoutFail($id);

        if (empty($campus)) {
            Flash::error('Campus not found');

            return redirect(route('campuses.index'));
        }

        return view('campuses.edit')->with('campus', $campus);
    }

    /**
     * Update the specified Campus in storage.
     *
     * @param  int              $id
     * @param UpdateCampusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCampusRequest $request)
    {
        $campus = $this->campusRepository->findWithoutFail($id);

        if (empty($campus)) {
            Flash::error('Campus not found');

            return redirect(route('campuses.index'));
        }

        $campus = $this->campusRepository->update($request->all(), $id);

        Flash::success('Campus Actualizado con exito.');

        return redirect(route('campuses.index'));
    }

    /**
     * Remove the specified Campus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $campus = $this->campusRepository->findWithoutFail($id);

        if (empty($campus)) {
            Flash::error('Campus not found');

            return redirect(route('campuses.index'));
        }

        $this->campusRepository->delete($id);

        Flash::success('Campus Borrado con exito.');

        return redirect(route('campuses.index'));
    }
}
