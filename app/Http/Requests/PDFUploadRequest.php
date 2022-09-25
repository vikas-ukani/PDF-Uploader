<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PDFUploadRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'pdf_upload' => 'required|file|mimes:pdf|max:2048'
        ];
    }

    public function errors()
    {
        return [
            'max' => 'File size should not be grater than 2048 kb'
        ];
    }
}
