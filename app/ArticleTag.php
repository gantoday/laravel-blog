<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model {

	protected $table = 'article_tag';

	protected $fillable = ['article_id', 'tag_id'];

}
