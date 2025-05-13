<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    /**
     * @var int|mixed
     */
    public mixed $quantity = 1;
    protected $fillable = [
        'name',
        'description',
        'price',
        'published_at'
    ];


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    #[Scope]
    public function published(Builder $query): void
    {
        $query->whereNotNull('published_at');
    }

    protected function publishedAt(): Attribute
    {
        return Attribute::make(
            set: fn($publishedAt) => $publishedAt ? now() : null,

        );

    }

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime'
        ];
    }


}
