<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
                $this->merge(['user_id' => auth()->id()]);
                return[
                    'subject' => 'required|min:2|max:255',
                    'category' => 'min:3|max:30',
                    'priority' => 'numeric',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {

                return [
                    'subject' => 'required|min:2|max:255',
                    'category' => 'min:3|max:30',
                    'priority' => 'numeric',
                ];
            }
            default:break;
        }
    }
}
