<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideo extends FormRequest
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
            'music_name' => ['required', 'max:40'],
            'artist'=> ['required', 'max:40'],
            'string'=> ['required', 'max:30'],
            'genre'=> ['required'],
        ];
    }
    
    
    public function messages() 
    {
        return [
            'music_name.required'  => '曲名を入力してください。',
            'artist.required'  => 'アーティスト名を入力してください。',
            'string.required'  => 'URLを入力してください。',
            'genre.required'  => 'ジャンルを選択してください。',
            'music_name.max' => '曲名は40字以内でお願いします。',
            'artist.max' => 'アーティスト名は40字以内でお願いします。',
            'string.max'     => 'URLは30字以内でお願いします。',
        ];
    }
    
}
