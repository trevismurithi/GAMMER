<?php

    class Game{
        private $game;
        private $version;
        private $rate;
        private $link;

        function __construct($game,$version,$rate,$link){
            $this->setGame($game);
            $this->setVersion($version);
            $this->setRate($rate);
            $this->setLink($link);
        }
        
        function setGame($game){$this->game=$game;}
        function getGame(){return $this->game;}
        function setVersion($version){$this->version=$version;}
        function getVersion(){return $this->version;}
        function setRate($rate){$this->rate=$rate;}
        function getRate(){return $this->rate;}
        function setLink($link){$this->link=$link;}
        function getLink(){return $this->link;}
    }

    $game1 = new Game("Ultimate Spiderman PS5","PS5™ digital version",96,"img/spiderman.jpg");
    $game2 = new Game("Watch Dogs PS5","PS5™ digital version",84,"img/watch_dogs.jpg");
    $game3 = new Game("Cyberpunk 2077 PS5", "PS5™ digital version", 73,"img/cyberpunk.jpg");
    $game4 = new Game("Takken PS5", "PS5™ digital version", 73,"img/fighter.jpeg");

    $games = array($game1,$game2,$game3,$game4);

