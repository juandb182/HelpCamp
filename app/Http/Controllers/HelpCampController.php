<?php

namespace App\Http\Controllers;

use App\Servicio as Servicio;
use App\User;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Mail;
use Queueable, SerializesModels;

use function Opis\Closure\serialize;

class HelpCampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     public function pdff(Request $request,$slug)
     {



        $user = Auth::user();
        $ser = DB::table('servicios')->where('slug',$slug)->first();



        $servicio = DB::table('servicios')->where('slug',$slug);
        $pdf = PDF::loadview('servicio.pdf',compact('user'),compact('ser'));
        //$pdf->download('servicio.pdf');
        $output = $pdf->output();
        $route =   $user->id . time() . '.pdf';
        file_put_contents( './ServicioPDF/' . $route, $output);

        DB::table('pdfs')->insert(
            ['ruta' => $route, 'user_id' => $user->id]
        );

        $servicio = Servicio::find($ser->id);




        $mail = new PHPMailer();


    $mail->IsHTML(true);
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    //username of mail
    $mail->Username = '';
    //password of mail
    $mail->Password = '';
    //mail again
    $mail->setFrom('');
    $mail->Subject = 'Nueva Reservacion';
    $mail->Body = 'Gracias por elejirnos a nosotros';
    $mail->AddAddress($user->email);
    $mail->AddAttachment('C:\laragon\www\HelpCampMaster\public\servicioPDF/' . $route, $name = 'servicio',  $encoding = 'base64', $type = 'application/pdf');

    //$mail->addAttachment($pdf,'solicitud.pdf');
    //$mail->AddAttachment('servicioPDF', $name = 'servicio.pdf',  $encoding = 'base64', $type = 'application/pdf');
    $mail->send();


    $servicio->delete();


    return redirect()->route('servicio.index');
    //return response()->json($mail);





     }

     public function ver(Request $request)
    {
        $user = User::all();
        return view('servicio.verUser',compact('user'));
    }








    public function index(Request $request)
    {
      //$request->user()->authorizeRoles('admin');
      $servicio = Servicio::all();
      //compact genera un array con toda la informacion que le damos
      return view('servicio.index',compact('servicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //se crea una variable que se le va a asignar la instancia del modelo "servicio"


        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/',$name);

            $p_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $slug = substr(str_shuffle($p_chars),0,4);

        }
        $servicio = new Servicio();
        $servicio->name = $request->input('name');
        $servicio->precio = $request->input('precio');
        $servicio->fechai = $request->input('fechai');
        $servicio->fechac = $request->input('fechac');
        $servicio->imagen = $name;
        $servicio->descripcion = $request->input('descripcion');
        $servicio->slug = $slug;

        $servicio->save();

        return redirect()->route('servicio.index');

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Servicio $servicio)
    {
        if(!Auth::check()) {
            return redirect('./login');
        }
        if(Auth::user()->activo == 0) {
            return redirect("./noactivo");
        }
        if ($request->user()->authorizeRoles('admin')) {
            return view('servicio.showd',compact('servicio'));

        }elseif($request->user()->authorizeRoles('user')) {
            return view('servicio.show',compact('servicio'));
        }else{
            return view('servicio.show',compact('servicio'));
        }


       //$servicio = Servicio::find($servicio);

      //return $servicio;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
       // $servicio = Servicio::all();
        //$servicio = Servicio::find($servicio);
        return view('servicio.edit',compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Servicio $servicio)
    {
        $servicio->fill($request->except('imagen'));

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $servicio->imagen = $name;
            $file->move(public_path().'/img/',$name);




    }
        $servicio->save();
        return redirect()->route('servicio.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        $file_path = public_path().'/img/'.$servicio->imagen;
        \File::delete($file_path);
        $servicio->delete();
        return redirect()->route('servicio.index');
    }
}
