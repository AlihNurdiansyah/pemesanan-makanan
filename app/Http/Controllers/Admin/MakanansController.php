<?php

namespace App\Http\Controllers\Admin;

use App\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMakanansRequest;
use App\Http\Requests\Admin\UpdateMakanansRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class MakanansController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Makanan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('makanan_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('makanan_delete')) {
                return abort(401);
            }
            $makanans = Makanan::onlyTrashed()->get();
        } else {
            $makanans = Makanan::all();
        }

        return view('admin.makanans.index', compact('makanans'));
    }

    /**
     * Show the form for creating new Makanan.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('makanan_create')) {
            return abort(401);
        }
        return view('admin.makanans.create');
    }

    /**
     * Store a newly created Makanan in storage.
     *
     * @param  \App\Http\Requests\StoreMakanansRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMakanansRequest $request)
    {
        if (! Gate::allows('makanan_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $makanan = Makanan::create($request->all());



        return redirect()->route('admin.makanans.index');
    }


    /**
     * Show the form for editing Makanan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('makanan_edit')) {
            return abort(401);
        }
        $makanan = Makanan::findOrFail($id);

        return view('admin.makanans.edit', compact('makanan'));
    }

    /**
     * Update Makanan in storage.
     *
     * @param  \App\Http\Requests\UpdateMakanansRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMakanansRequest $request, $id)
    {
        if (! Gate::allows('makanan_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $makanan = Makanan::findOrFail($id);
        $makanan->update($request->all());



        return redirect()->route('admin.makanans.index');
    }


    /**
     * Display Makanan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('makanan_view')) {
            return abort(401);
        }
        $makanan = Makanan::findOrFail($id);

        return view('admin.makanans.show', compact('makanan'));
    }


    /**
     * Remove Makanan from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('makanan_delete')) {
            return abort(401);
        }
        $makanan = Makanan::findOrFail($id);
        $makanan->delete();

        return redirect()->route('admin.makanans.index');
    }

    /**
     * Delete all selected Makanan at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('makanan_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Makanan::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Makanan from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('makanan_delete')) {
            return abort(401);
        }
        $makanan = Makanan::onlyTrashed()->findOrFail($id);
        $makanan->restore();

        return redirect()->route('admin.makanans.index');
    }

    /**
     * Permanently delete Makanan from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('makanan_delete')) {
            return abort(401);
        }
        $makanan = Makanan::onlyTrashed()->findOrFail($id);
        $makanan->forceDelete();

        return redirect()->route('admin.makanans.index');
    }
}
