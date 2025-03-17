<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DatabaseController extends Controller
{
    public function createProduct(){
        Schema::create('productss', function($table){
            $table->increments('id');
            $table->string('name');
            $table->float('price', 10, 2);
            $table->string('image', 250);
        });
        echo 'products table created";';
    }

    public function createArticles()
    {
        Schema::create('articles', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string('title', 255)->collation('utf8_unicode_ci');
            $table->string('slug', 255)->collation('utf8_unicode_ci')->default('');
            $table->text('content')->collation('utf8_unicode_ci');
            $table->string('image', 255)->collation('utf8_unicode_ci')->nullable();
            $table->enum('status', ['PUBLISHED', 'DRAFT'])->collation('utf8_unicode_ci')->default('PUBLISHED');
            $table->date('date');
            $table->boolean('featured')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
        echo 'articles table created';
    }

    public function createBill()
    {
        Schema::create('bills', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('id_customer')->nullable();
            $table->date('date_order')->nullable();
            $table->float('total')->nullable()->comment('Tổng tiền');
            $table->string('payment', 200)->collation('utf8_unicode_ci')->nullable()->comment('Hình thức thanh toán');
            $table->string('note', 500)->collation('utf8_unicode_ci')->nullable();
            $table->timestamps();
        });
        echo 'bills table created';
    }

    public function createBillDetail()
    {
        Schema::create('bill_detail', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('id_bill');
            $table->unsignedInteger('id_product');
            $table->integer('quantity')->comment('Số lượng');
            $table->double('unit_price');
            $table->timestamps();

            // Thêm khóa ngoại
            $table->foreign('id_bill')->references('id')->on('bills')->onDelete('cascade');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function createCategory()
    {
        Schema::create('categories', function ($table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->unsignedInteger('lft')->nullable();
            $table->unsignedInteger('rgt')->nullable();
            $table->unsignedInteger('depth')->nullable();
            $table->string('name', 255)->collation('utf8_unicode_ci');
            $table->string('slug', 255)->collation('utf8_unicode_ci');
            $table->timestamps();
            $table->softDeletes();
        });
        echo 'categories table created';
    }

    public function createComment()
    {
        Schema::create('comments', function ($table) {
            $table->increments('id');
            $table->string('username', 255)->collation('utf8mb4_unicode_ci');
            $table->text('comment')->collation('utf8mb4_unicode_ci');
            $table->unsignedInteger('id_product');
            $table->timestamps();

            // Thêm khóa ngoại
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function createCustomer()
    {
        Schema::create('customer', function ($table) {
            $table->increments('id');
            $table->string('name', 100)->collation('utf8_unicode_ci');
            $table->string('gender', 10)->collation('utf8_unicode_ci');
            $table->string('email', 50)->collation('utf8_unicode_ci')->unique();
            $table->string('address', 100)->collation('utf8_unicode_ci');
            $table->string('phone_number', 20)->collation('utf8_unicode_ci');
            $table->string('note', 200)->collation('utf8_unicode_ci')->nullable();
            $table->timestamps();
        });
        echo 'customer table created';
    }

    public function createDummies()
    {
        Schema::create('dummies', function ($table) {
            $table->increments('id');
            $table->string('name', 255)->collation('utf8_unicode_ci');
            $table->text('description')->collation('utf8_unicode_ci');
            $table->longText('extras')->collation('utf8mb4_bin')->check('json_valid(extras)');
            $table->timestamps();
        });
        echo 'dummies table created';
    }

    public function createFailedJob()
    {
        Schema::create('failed_jobs', function ($table) {
            $table->bigIncrements('id');
            $table->text('connection')->collation('utf8_unicode_ci');
            $table->text('queue')->collation('utf8_unicode_ci');
            $table->longText('payload')->collation('utf8_unicode_ci');
            $table->longText('exception')->collation('utf8_unicode_ci');
            $table->timestamp('failed_at')->useCurrent();
        });
    }
}
