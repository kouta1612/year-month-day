<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDateRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'year' => 'numeric|required_with:month,day',
            'month' => 'numeric|required_with:year,day',
            'day' => 'numeric|required_with:year,month',
            'full_date' => 'date|before_or_equal:' . today()->format('Y-m-d'),
        ];
    }

    // public function attributes()
    // {
    //     return [
    //         'year' => '年',
    //         'month' => '月',
    //         'day' => '日',
    //         'full_date' => '年月日'
    //     ];
    // }

    protected function validationData()
    {
        $data = parent::validationData();
        $data['full_date'] = null;
        if ($data['year'] && $data['month'] && $data['day']) {
            $data['full_date'] = $data['year'] . '-' . $data['month'] . '-' . $data['day'];
        }
        return $data;
    }
}
