<?php
/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 23/07/16
 * Time: 09:15 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
//use App\User;
//use Request;
use Mail;
use App\Neighbor;
use Laracasts\Flash\Flash;
use DB;


class AuthenticationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function validateToken(Request $request)
    {
        if ( Neighbor::where('token',$request->input('token')->exists()) )
        {
            return redirect('admin');
        }

        $neighbor = new Neighbor();
        $neighbor->token = $request->input('token');


        // Store values in variables from project created in Google Developer Console
        $client_id = '899897935509-7kgem0kgclsmfel158gaj1tgmupos81o.apps.googleusercontent.com';
        $client_secret = 'dEwe3Tu5We_arosqJN68qEsF';
        $redirect_uri = 'http://localhost/phmanagement/admin';
        $simple_api_key = 'AIzaSyC6n9yiZDPnaFVU4rWaLkWsQ1Y1v5ZxaO8';

        // Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("Municipalidad de Punta Hermosa");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->setDeveloperKey($simple_api_key);
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");

        // Send Client Request
        $objOAuthService = new Google_Service_Oauth2($client);

        // Add Access Token to Session
        if ($request->input('token')) {
            $client->authenticate($request->input('token'));

            $value = session('key');
            $request->session()->push('access_token', $client->getAccessToken());

            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }





        //$neighbor->first_name = $request->input('name');
        //$neighbor->last_name = $request->input('description');
        //$neighbor->address = $request->input('date_event');
        //$neighbor->email = $request->input('date_event');
        //$neighbor->phone_number = $request->input('date_event');

        $neighbor->save();

        return redirect('admin');

    }*/

    public function singup(Request $request)
    {
        $first_name=$request->input('first_name');
        $last_name=$request->input('last_name');
        $email=$request->input('email');

        $exist=DB::select('select 1 from neighbors n where n.email=?',[$email]);

        if(!empty($exist)){
            return response()->json(['message' => 'Usuario ya se encuentra registrado.','result' => 'false']);
        }


        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }


        $content='Su contraseña de activacion es '.implode($pass);

        Mail::send('emails.send', ['title' => 'Bienvenido', 'content' => $content], function ($message) use ($email)
        {

            $message->subject('Punta Hermosa Mobile - Confirmacion de contraseña');
            $message->from('puntahermmosamobile@gmail.com', 'Punta Hermosa Mobile');

            $message->to($email);

        });

        $neighbor = new Neighbor();
        $neighbor->first_name = $first_name;
        $neighbor->last_name = $last_name;
        $neighbor->email = $email;
        $neighbor->password = implode($pass);

        $neighbor->save();

        return response()->json(['message' => 'Usuario registrado exitosamente.','result' => 'true']);

    }

    public function singin(Request $request)
    {
        $email=$request->input('email');
        $password=$request->input('password');

        $neighbor=DB::select("select 1 from neighbors n where n.email='?' and n.password='?'",[$email,$password]);

        if(empty($neighbor)){
            return response()->json(['message' => 'Usuario o contraseña inválidos.', 'result' => 'false']);
        }else{

            $token=uniqid();
            $neighbor = new Neighbor();
            $neighbor->token = $token;
            $neighbor->save();

            return response()->json([ 'token' => $token ,'message' => 'Usuario válido.', 'result' => 'true']);
        }
    }
}