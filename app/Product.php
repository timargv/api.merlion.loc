<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Kalnoy\Nestedset\NodeTrait;
use Elasticquent\ElasticquentTrait;

class Product extends Model
{
    //
//    use NodeTrait;
    use ElasticquentTrait;
    protected $table = 'products';

    protected $fillable = [
        'product_id',
        'active',
        'date_update',
        'articul',
        'name',
        'about',
        'category_id',
        'image',
        'price_base',
        'price_old',
        'price_sp',
        'min',
        'box',
        'fix',
        'new',
        'hit',
        'brand',
        'store_ekb',
        'store_msk',
        'store_nsk',
        'way',
        'barcode',
        'props',
        'specifications',
        'includes'
    ];

    protected $casts = [
        'sert' => 'array',
        'specifications' => 'array',
        'includes' => 'array',
        'images' => 'array',
        'props' => 'array',
    ];

    protected $mappingProperties = array(
        'name' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
        'about' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
    );

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function add($fields)
    {
        $product = new static;
        $product->fill($fields);
        $product->save();

        return $product;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function setCategory($id)
    {
        if($id == null) {return;}
        $this->category_id = $id;
        $this->save();
    }

    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public function getCategoryTitle()
    {
        return ($this->category != null)
            ?   $this->category->name
            :   'Нет категории';
    }

}
