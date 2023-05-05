<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OfferController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
require __DIR__.'/teacher_auth.php';
require __DIR__.'/partent_auth.php';
require __DIR__.'/admin.php';

Route::get('sessions', function (Request $request) {
    // $session=$request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
    return $request->session()->all();
    // return $session;
});

Route::get("send_sms",function (){
    $basic  = new \Vonage\Client\Credentials\Basic("6834c203", "fhuGshnqZBfJoSf4");
    $client = new \Vonage\Client($basic);

    $response = $client->sms()->send(
        new \Vonage\SMS\Message\SMS("201016204667", "Km men jay", 'eat chocalete')
    );
    
    $message = $response->current();
    
    if ($message->getStatus() == 0) {
        echo "The message was sent successfully\n";
    } else {
        echo "The message failed with status: " . $message->getStatus() . "\n";
    }
});