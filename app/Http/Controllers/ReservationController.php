<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use ReservationService;
use App\Http\Requests\CreateReservationRequest;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function MakeReservation(Request $request){
        $validateData = CreateReservationRequest::handle($request);
        return  redirect()->route('home')->with(ReservationService::Reservation($validateData));
    }

    public function delete($id){
        $Reservation = Reservation::find($id);
        if($Reservation){
            $Reservation->delete();
            return redirect()->route('home')->with('success, Reservation Mark as Cancled');
        }
        else
            redirect()->route('home')->with('error, Reservation Not Deleted Try Again');
    }
}
