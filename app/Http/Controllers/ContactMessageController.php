<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Auth;

class ContactMessageController extends Controller
{
    public function Send(CreateContactRequest $request)
    {
        $data = $request->validated();

        $contact = ContactMessage::create([
            'name' => $data['name'],
            'email' => $data['email'] ?? null,
            'Message_Content' => $data['message'],
            'user_id' => Auth::id(),
        ]);

        if (!$contact) {
            return redirect(route('home') . '#contact')
                ->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }

        return redirect(route('home') . '#contact')
            ->with('success', 'Votre message a été envoyé avec succès. L’équipe de La Maison vous contactera bientôt.');
    }
}
