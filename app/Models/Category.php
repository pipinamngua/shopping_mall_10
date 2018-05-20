<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
    ];

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function parents()
    {
        return static::where('parent_id', '=', 0)->pluck('name', 'id');
    }

    public static function categories()
    {
        $parents = self::parents();
        $i = 0;
        foreach ($parents as $key => $value) {
            $categories[$i] = static::find($key)->child;
            $i++;
        }
        
        return $categories;
    }

    public static function getfirstProducts()
    {
        $category = static::where('parent_id', '!=', 0)->first();
        $firstProducts = $category->products;
        
        return $firstProducts; 
    }
}
