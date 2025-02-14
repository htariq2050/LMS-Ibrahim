<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer',
            'status' => 'required|in:active,inactive',
            'videos.*.title' => 'required|string|max:255',
            'videos.*.video_url' => 'required|url',
            'videos.*.thumbnail' => 'nullable|file|max:2048',
            'videos.*.order' => 'required|integer',
            'videos.*.duration' => 'required|integer',
        ];
    }
}
