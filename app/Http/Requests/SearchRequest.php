<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;



class SearchRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function toQueryString($query = [])
    {
        $query = $this->all();
        $query['sort']  =  $this->get('sort')  ?? $query['sort'] ?? 'stars' ;
        $query['order'] =  $this->get('order') ?? 'desc';
        $query['q']     =  $this->get('q')     ?? 'stars:'.config('services.github.stars');
        return urldecode(http_build_query($query));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return
        [
            'sort' =>[
                Rule::in(['stars']),
            ],
            'order' => [
                Rule::in(['asc', 'desc']),
            ],
            'q' => [
                'string', 'max:100'
            ]
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }


}
