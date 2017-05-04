<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()

    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'first_name' => 'required|min:2|max:20',
                    'last_name' => 'required|min:2|max:20',
                    'email' => 'min:6|email|unique:contacts,email',
                    'notes' => 'max:1000',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $contact = $this->contacts->id;
                return [
                    'first_name' => 'required|min:2|max:20',
                    'last_name' => 'required|min:2|max:20',
                    'email' => 'min:6|email|unique:contacts,email,'.$contact,
                    'notes' => 'max:1000',
                ];
            }
            default:break;
        }

    }
}
