<?php 
require_once('Product.php');
class CDMusic extends Product{
    private $artist;
    private $genre;
    public function __construct($name,$price,$discount,$artist,$genre){
        $this->name = $name;
        $this->price = $price + ($price * (10/100));
        $this->discount = $discount + 5;
        $this->artist = $artist;
        $this->genre = $genre;
    }
    public function getArtist(){
        return $this->artist;
    }
    public function setArtist($artist){
        $this->artist = $artist;
    }
    public function getGenre(){
        return $this->genre;
    }
    public function setGenre($genre){
        $this->genre = $genre;
    }

}
