<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TicketCommentRequest extends Request
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
        $this->merge(['user_id' => auth()->id()]);

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
                    'content' => 'required|min:2|max:1000',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {

                return [
                    'content' => 'required|min:2|max:1000',
                ];
            }
            default:break;
        }
    }
}
