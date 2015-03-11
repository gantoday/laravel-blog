<?php namespace App\Http\Requests;


class ArticleRequest extends Request
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
            'title' => 'required|min:2',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tag_list' => 'required',
            'slug' => 'required|unique:articles,slug,'.$this->segment(3),
            'original' => 'url',
        ];
    }
}
