<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * \App\Models\BookAuthor
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor newQuery()
 * @method static \Illuminate\Database\Query\Builder|BookAuthor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor query()
 * @method static \Illuminate\Database\Query\Builder|BookAuthor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BookAuthor withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int $book_id
 * @property int $author_id
 * @property string $content
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor whereUpdatedAt($value)
 */
class BookAuthor extends Model
{
    use SoftDeletes;

    protected $table = 'book_authors';

    protected $fillable = [
        'book_id',
        'author_id',
    ];

    public function authors()
    {
        return $this->hasMany(Author::class, 'author_id', 'id');
    }
}
