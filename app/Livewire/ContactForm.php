<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ContactForm extends Component
{
    public Contact $contact;

    public $name;

    public $email;

    public $phone_number;

    public $message;

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function submit()
    {
        $validated = Validator::make(
            // Data to validate...
            [
                'name' => $this->name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'message' => $this->message,
            ],

            // Validation rules to apply...
            [
                'name' => 'required|min:3',
                'email' => 'required|email|min:3',
                'phone_number' => 'required|numeric|min:3',
                'message' => 'required|min:3',
            ],

            // Custom validation messages...
            ['required' => 'The :attribute field is required'],
        )->validate();

        Contact::create($validated);

        session()->flash('success', 'Votre message a bien été envoyé.');

        $this->reset(
            'name',
            'email',
            'phone_number',
            'message'
        );
    }
}
