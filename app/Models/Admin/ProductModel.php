<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';
    protected $allowedFields = ['name', 'slug', 'category', 'description', 'price', 'stock', 'image'];

    public function getProducts()
    {
        return $this->paginate(10, 'products');
    }

    public function getProductById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getProductBySlug($slug)
    {
        return $this->where(['slug' => $slug])->first();
    }

    public function getProductsByCategory($category)
    {
        if ($category == 'semua') {
            return $this->paginate(10, 'products');
        }

        return $this->where(['category' => $category])->paginate(10, 'products');
    }

    public function getProductBySearch($keyword)
    {
        return $this->like('name', $keyword)
            ->orLike('category', $keyword)
            ->orLike('description', $keyword)
            ->orLike('price', $keyword)
            ->orLike('stock', $keyword)
            ->paginate(10, 'products');
    }

    public function getTotalProducts()
    {
        return $this->countAllResults();
    }

    public function saveValidation()
    {
        return [
            'name' => [
                'rules' => 'required|is_unique[products.name]',
                'errors' => [
                    'required' => 'Nama produk tidak boleh kosong!',
                    'is_unique' => 'Nama produk sudah digunakan!'
                ]
            ],
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih salah satu kategori!'
                ]
            ],
            'stock' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Stok tidak boleh kosong!',
                    'integer' => 'Stok harus berupa bilangan bulat!'
                ]
            ],
            'price' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga tidak boleh kosong!',
                    'numeric' => 'Harga harus berupa angka!'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi produk tidak boleh kosong!'
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,1024]|is_image[image]|ext_in[image,jpg,jpeg,png,webp]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'Ukuran file gambar terlalu besar (maksimum 1MB)!',
                    'is_image' => 'File yang dipilih bukan gambar!',
                    'ext_in' => 'Ekstensi file yang diperbolehkan hanya jpg, jpeg, dan png!',
                    'mime_in' => 'Ekstensi file yang diperbolehkan hanya jpg, jpeg, dan png!'
                ]
            ]
        ];
    }

    public function updateValidation($nameRule)
    {
        return [
            'name' => [
                'rules' => $nameRule,
                'errors' => [
                    'required' => 'Nama produk tidak boleh kosong!',
                    'is_unique' => 'Nama produk sudah digunakan!'
                ]
            ],
            'stock' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Stok tidak boleh kosong!',
                    'integer' => 'Stok harus berupa bilangan bulat!'
                ]
            ],
            'price' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga tidak boleh kosong!',
                    'numeric' => 'Harga harus berupa angka!'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi produk tidak boleh kosong!'
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,1024]|is_image[image]|ext_in[image,jpg,jpeg,png,webp]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
                'errors' => [
                    'max_size' => 'Ukuran file gambar terlalu besar (maksimum 1MB)!',
                    'is_image' => 'File yang dipilih bukan gambar!',
                    'ext_in' => 'Ekstensi file yang diperbolehkan hanya jpg, jpeg, dan png!',
                    'mime_in' => 'Ekstensi file yang diperbolehkan hanya jpg, jpeg, dan png!'
                ]
            ]
        ];
    }
}
