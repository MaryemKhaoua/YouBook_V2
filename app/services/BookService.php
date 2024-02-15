<?php
namespace App\services;

use App\Models\Book;

class BookService{

static public function checkBook(string $title): bool{


$bookCheck = Book::where('title', $title)->first();

if($bookCheck)
{
    return false;
}
else
return true;


}









}