<?php

namespace App\Http\Controllers;

use App\Servicio as Servicio;
use App\User;
use App\File;
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
        //$servicio = Servicio::all();
        //$servicio = Servicio::slug();

        $user = Auth::user();
        $ser = DB::table('servicios')->where('slug',$slug)->first();

        $servicio = DB::table('servicios')->where('slug',$slug);
        $pdf = PDF::loadview('servicio.pdf',compact('user'),compact('ser'));
        $pdf->download('servicio.pdf');
        $output = $pdf->output();
        $route =   $user->id . time() . '.pdf';
        file_put_contents( './ServicioPDF/' . $route, $output);

        DB::table('pdfs')->insert(
            ['ruta' => $route, 'user_id' => $user->id]
        );

         $mail = new PHPMailer();

        /*
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'juandb182@gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'juandb182@gmail.com';                     // SMTP username
        $mail->Password   = 'juan andres';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 3305;

        $mail->FromName = 'HelpCamp';
        $mail->Subject = 'Reservacion';
        $mail->Body = 'Gracias por reservar con nosotros';
        $mail->AddAddress(serialize('fernandoujap@gmail.com'));

// definiendo el adjunto
        $mail->AddStringAttachment($pdf, 'servicio.pdf', 'base64', 'application/pdf');
// enviando
        $mail->Send();
*/
    $mail->IsHTML(true);
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->Username = 'fernandoujap@gmail.com';
    $mail->Password = 'fernand02695';
    $mail->setFrom('fernandoujap@gmail.com');
    $mail->Subject = 'JOSE PUTA';
    $mail->Body = 'My Body & My Description';
    $mail->AddAddress($user->email);
    $mail->AddAttachment('C:\laragon\www\SistemaDeInfo2\public\servicioPDF/' . $route, $name = 'servicio',  $encoding = 'base64', $type = 'application/pdf');

    //$mail->addAttachment($pdf,'solicitud.pdf');
    //$mail->AddAttachment('servicioPDF', $name = 'servicio.pdf',  $encoding = 'base64', $type = 'application/pdf');
    $mail->send();





        return Response()->json($mail);
        //return redirect()->route('servicio.index');

        #$servicio->delete();
        #redirect()->route('servicio.index');

        #return redirect()->route('servicio.index');


        #$this->pdf($slug,$pdf);


     }

    public function del($slug)
     {
        $servicio = DB::table('servicios')->where('slug',$slug);
        #$servicio->delete();

        return redirect()->route('servicio.index');
     }







/*
     public function pdf($slug,$pdf)
     {

        $user = Auth::user();
        $ser = DB::table('servicios')->where('slug',$slug)->first();
        $pdf = PDF::loadview('servicio.pdf',compact('user'),compact('ser'));
        $pdf->download('servicio.pdf');
     }

*/




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
            return redirect('../login');
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
        //en este caso si no se coloca el parametro dara un erro
        //enviarle un objeto el cual ahorita es trainer
        //session data
        //con with se va a enviar datos a la vista
        //se le va a pasar una variable status q va a guardar el status y el mensanje
        // return redirect()->route('crud.show',[$servicio])->with('status','Perfil actualizado correctamente.');

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
        //return 'El usuario'.$servicio->name.'se ha eliminado con exito';
        return redirect()->route('servicio.index');
    }
}
