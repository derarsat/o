<?php

namespace App\Http\Controllers;

use App\Helper\File;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    use File;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view("dashboard.menus.all", ["menus" => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.menus.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:menus|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,svg',
            'pdf' => 'required|mimes:pdf',
        ]);
        $menu = new Menu();
        $menu->name = $validated["name"];
        // Image
        $imageFile = $request->file('image');
        $imagePath = 'menus/';
        $imageUrl = $this->imageFile($imageFile, $imagePath, 450, 750);
        $menu->image = $imageUrl;
        // Pdf
        $pdfFile = $request->file('pdf');
        $pdfPath = 'menus/';
        $pdfUrl = $this->pdfFile($pdfFile, $pdfPath);
        $menu->pdf = $pdfUrl;
        $menu->save();

        return redirect(route("menus.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::where("id", "=", $id)->get()[0];
        return view("dashboard.menus.edit", ["menu" => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:menus,name' . $id . ',id',
            'image' => 'sometimes|mimes:jpeg,png,jpg,svg',
            'pdf' => 'sometimes|mimes:pdf',
        ]);
        $menu = Menu::find($id);
        $menu->name = $validated["name"];
        // Image
        if ($request->file('image')) {
            $imageFile = $request->file('image');
            $imagePath = 'menus/';
            $imageUrl = $this->imageFile($imageFile, $imagePath);
            $menu->image = $imageUrl;
        }
        // Pdf
        if ($request->file('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfPath = 'menus/';
            $pdfUrl = $this->pdfFile($pdfFile, $pdfPath);
            $menu->pdf = $pdfUrl;
        }
        $menu->save();

        return redirect(route("menus.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect(route("menus.index"));
    }
}
