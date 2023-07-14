<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;


class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $with = [
        'author',
        'category'
    ];

    public function scopeFilter(Builder $query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title','like','%'.$filters['search'].'%')
        //             ->orWhere('body','like','%'.$filters['search'].'%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title','like','%'.$search.'%')
                    ->orWhere('body','like','%'.$search.'%');
        });

        // $query->when($filters['category'] ?? false, function($query, $category){
        //     return $query->whereHas('category', function($query) use ($category){
        //         $query->where('slug', $category);
        //     });
        // });

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            //menghubungakn query dari tabel posts dengan tabel categories 
            $query->whereHas('category', fn($query) =>  
            //end
                $query->where('slug', $category)
            )
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
