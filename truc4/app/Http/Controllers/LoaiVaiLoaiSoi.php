<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoaiVaiLoaiSoi extends Controller
{
    public function index(Request $request)
    {
        $items = \App\LoaiVai::withTrashed()->get();

        return view('/loaivailoaisoi/index')->withLoaivais($items);
    }

    public function create()
    {
        return view('/loaivailoaisoi/create')
        ->withLoaivais(\App\LoaiVai::get())
        ->withLoaisois(\App\LoaiSoi::get());
    }

    public function store(Request $request)
    {
        //Tạo loại vải loại sợi
        $this->validate($request, [
            'loai_vai_id' => 'required',
            'loai_soi_id' => 'required',
        ]);
        $loaivai = \App\LoaiVai::findOrFail($request->input('loai_vai_id'));
        $loaisoi = \App\LoaiSoi::findOrFail($request->input('loai_soi_id'));

        if ($loaivai->loai_sois->contains($loaisoi))
        {
            $pivot = $loaivai->loai_sois->find($loaisoi)->pivot;
            $pivot->dinh_muc = $request->input('dinh_muc');
            $pivot->save();
        }
        else
            $loaivai->loai_sois()->attach($loaisoi, ['dinh_muc' => $request->input('dinh_muc')]);

        return redirect('/loaivailoaisoi');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request, $id)
    {
        $loaivai = \App\LoaiVai::findOrFail($id);
        $loaisoi = \App\LoaiSoi::findOrFail($request->input('loai_soi_id'));
        $loaivai->loai_sois()->detach($loaisoi);
        \Session::flash('flash_message', 'Đã xóa thành công !!!');
        return redirect('/loaivailoaisoi');
    }
}
