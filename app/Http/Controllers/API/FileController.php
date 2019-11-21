<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\File;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return File::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(user_id $user_id,$route)
    {



        return File::create([
            'route' => $route,
            'user_id' => $user_id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function ownFiles($id)
    {
        return DB::table('files')->where('user_id',$id)->latest()->paginate(10);
    }

    public function downloadFile($id) {

        $name = DB::table('files')->where('id',$id)->value('nombre');
        $fullPath = public_path() . '/pdf/' . $name . '.pdf';

        $headers = array(
              'Content-Type: application/pdf',
            );

        return response()->download($fullPath, $name . ".pdf", $headers);
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
        $file = File::findOrFail($id);

        $this->validate($request, [
            'nombre' => ['required', 'string', 'max:100','unique:files'],
        ]);

        $request->merge(['nombre' => $request['nombre']]);

        rename("./pdf/" . $file->nombre . '.pdf' , "./pdf/" .  $request['nombre'] . ".pdf");

        $file->nombre = $request["nombre"];
        $file->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);

        unlink("./pdf/" . $file->nombre . ".pdf") or die("Couldn't delete file");
        DB::table('files')->delete($id);
    }
}
