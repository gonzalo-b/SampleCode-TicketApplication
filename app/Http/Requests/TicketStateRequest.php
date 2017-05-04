<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\TicketState;

class TicketStateRequest extends Request
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
     * Locked states can't be edited or removed
     *
     * @return array
     */
    public function messages()
    {
        return [
            'locked.not_in' => 'This State is locked'
        ];
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
                return[
                    'title' => 'required|min:2|max:20|unique:ticketStates',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $state = $this->ticket_states->id;
                return [
                    'title' => 'required|min:2|max:20|unique:ticketStates,title,'.$state    ,
                    'locked' => 'not_in:1',
                ];
            }
            default:break;
        }
    }
}
