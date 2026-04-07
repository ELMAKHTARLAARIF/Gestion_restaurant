<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Auth;
class ContactMessageController extends Controller
{
    public function Send(CreateContactRequest $request)
    {
        $data = $request;
        $contact = ContactMessage::create([
            'Message_Content'    => $data['name'],
            'user_id'   => Auth::id(),
            'Order_id' => 0,
            'Item_id' => 0,
        ]);

        if (!$contact) {
            return redirect(route('home') . '#contact')
                ->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }

        return redirect(route('home') . '#contact')
            ->with('success', 'Message envoyé avec succès !');
    }
}
