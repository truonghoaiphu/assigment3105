<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

/**
 * \App\Models\Book
 *
 * @property int $id
 * @property string|null $publisher
 * @property string|null $title
 * @property string $summary
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BookAuthor[] $authors
 * @property-read int|null $authors_count
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Query\Builder|Book onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePublisher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Book withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Book withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Book filterCondition(\Illuminate\Http\Request $request)
 */
class Book extends Model
{
    use SoftDeletes, Searchable;

    protected $table = 'books';

    protected $fillable = [
        'publisher',
        'title',
        'summary',
    ];

    /**
     * The columns of the full text index
     */
    protected $searchable = [
        'publisher',
        'title',
        'summary',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors', 'book_id', 'author_id');
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'publisher' => $this->publisher,
            'title' => $this->title,
            'summary' => $this->summary,
        ];
    }

    /**
     * @param $query
     * @param Request $request
     * @return mixed
     */
    public function scopeFilterCondition($query, Request $request)
    {
        $searchWord = (string) $request->input('filter', null);
        if (!empty($searchWord)) {
//            $query->search($searchWord);
            $query->where(function ($subQuery) use ($searchWord) {
                $subQuery->whereHas('authors', function($authorSubQuery) use ($searchWord){
                           $authorSubQuery->where('name', 'like', '%' . $searchWord . '%');
                         })
                         ->orWhere('publisher', 'like', '%' . $searchWord . '%')
                         ->orWhere('title', 'like', '%' . $searchWord . '%')
                         ->orWhere('summary', 'like', '%' . $searchWord . '%');
            });
        }
        return $query;
    }
}
