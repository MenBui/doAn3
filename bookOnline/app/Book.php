<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    public function addProduct($request){
    	$books = new Book;
    	$url_books = new Url_Book;
    	$url_books->url = $request->url;
    	$url_books->title = $request->title;
    	$url_books->keyword_seo = $request->keyword_seo;
    	$url_books->description_seo = $request->description_seo;
    	$url_books->image_seo = $request->image_seo;
    	$url_books->save();
        $books->name = $request->name;
        $books->price = $request->price;
        $books->author_id = $request->author_id;
        $books->category_id = $request->category_id;
        $books->nxb_id = $request->nxb_id;
        $books->namxb = $request->namxb;
        $books->description1 = $request->description1;
        $books->url_books_id = $url_books->id;
        $books->count = $request->count;
        $books->images = $request->images;
        $books->views = 0;
        $books->save();

    }
    public function editProduct($request,$id) {
        $books = Book::where('id',$id)->get()->first();
        $url_books = Url_Book::where('id',$books->url_books_id)->get()->first(); // lỗi này vừa nói xong, $url_book phải tìm where('id', $books->id)
        $url_books->url = $request->url;
        $url_books->title = $request->title;
        $url_books->keyword_seo = $request->keyword_seo;
        $url_books->description_seo = $request->description_seo;
        $url_books->image_seo = $request->image_seo;
        $url_books->save();
        $books->name = $request->name;
        $books->price = $request->price;
        $books->author_id = $request->author_id;
        $books->category_id = $request->category_id;
        $books->nxb_id = $request->nxb_id;
        $books->namxb = $request->namxb;
        $books->description1 = $request->description1;
        $books->url_books_id = $url_books->id;
        $books->count = $request->count;
        $books->images = $request->images;
         // khi thêm mới sách thì mới cho view = 0, sửa thì không sửa view
        $books->save();
    }    
    public function deleteProduct($id){
        $book = Book::where('id',$id)->get()->first();
        $book->delete();
    }

}