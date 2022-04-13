<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return[
            'name' => 'required|string|max:191|min:2',
            'lastName' => 'required|string|max:255|min:2',
            'phone' => 'required|min:15', //numeric
            'email' => 'required|email|min:2|max:255',//unique:newsletter,email
            'message' => 'required|string|max:1000|min:2',
            'password' => 'required|min:6|confirmed|max:20',
            'check' => 'required'
        ];
    }

    public function messages()
    {
        $language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
        if ($language == 'tr'){
            return[
                'name.required' => 'Lütfen adınızı giriniz.',
                'name.min' => 'Ad alanı en az 2 karakter olmalıdır.',
                'name.max' => 'Ad alanı 191 karakterden fazla olmamalıdır.',
                'name.string' => 'Ad alanı string olmalıdır',
                'lastName.required' => 'Lütfen soyadınızı giriniz.',
                'lastName.min' => 'Soyad alanı en az 2 karakter olmalıdır.',
                'lastName.max' => 'Soyad alanı 255 karakterden fazla olmamalıdır.',
                'lastName.string' => 'Soyad alanı string olmalıdır',
                'email.required' => 'Lütfen email giriniz.',
                'email.email' => 'E-posta geçerli bir e-posta adresi olmalıdır.',
                'email.unique' => 'Bu e-posta daha önce kaydedilmiştir.',
                'email.min' => 'Email alanı en az 2 karakter olmalıdır.',
                'email.max' => 'Emaliniz 255 karakterden fazla olmamalıdır.',
                'phone.required' => 'Lütfen telefon numaranızı giriniz.',
                'phone.numeric' => 'Telefon bilgieriniz rakamsal olmalıdır.',
                'phone.min' => 'Telefon numaranız en az 15 karakter olmalıdır.',
                'message.required' => 'Lütfen mesajınızı giriniz.',
                'message.string' => 'Mesaj alanı string olmalıdır',
                'message.min' => 'Mesajınız en az 2 karakter olmalıdır.',
                'message.max' => 'Mesajınız 1000 karakterden fazla olmamalıdır.',
                'password.required' => 'Lütfen parolanızı giriniz.',
                'password.confirmed' => 'Şifre onayı eşleşmiyor.',
                'password.min' => 'Parolanız en az 6 karakter olmalıdır.',
                'password.max' => 'Şifreniz 20 karakterden fazla olmamalıdır.',
                'check.required' => 'Bu alanı boş geçemezsiniz.'

            ];
        }
        elseif ($language == 'en'){
            return[
                'name.required' => 'The name field is required.',
                'name.min' => 'The name must be at least 2.',
                'name.max' => 'The name may not be greater than 191 characters.',
                'name.string' => 'The name must be a string.',
                'lastName.required' => 'The last name field is required.',
                'lastName.min' => 'The last name must be at least 2.',
                'lastName.max' => 'The last name may not be greater than 255 characters.',
                'lastName.string' => 'The last name must be a string.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'email.unique' => 'The email has already been taken.',
                'email.min' => 'The last email must be at least 2.',
                'email.max' => 'The last email may not be greater than 255 characters.',
                'phone.required' => 'The phone field is required.',
                'phone.numeric' => 'The phone must be a number.',
                'phone.min' => 'The last phone must be at least 15.',
                'message.required' => 'The message field is required.',
                'message.string' => 'The message must be a string.',
                'message.min' => 'The message must be at least 2.',
                'message.max' => 'The message may not be greater than 1000 characters.',
                'password.required' => 'The password field required',
                'password.confirmed' => 'The password confirmation does not match.',
                'password.min' => 'The password must be at least 6.',
                'password.max' => 'The password may not be greater than 20 characters.',
                'check.required' => 'The check field is required.'

            ];
        }


    }
}
