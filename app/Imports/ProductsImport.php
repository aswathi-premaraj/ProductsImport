<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProductsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Products([
                "name" => (isset($row['product_name'])) ? $row['product_name'] : null,
                "price" => (isset($row['price'])) ? $row['price'] : null,
                "sku" => (isset($row['sku'])) ? $row['sku'] : null,
                "description" => (isset($row['description'])) ? $row['description']:null,
                
            
        ]);
    }
}
