<?php require "header.inc.php"?>
<?php require "include/games.inc.php"?>
<?php 
    if(!isset($_SESSION['username'])){
        header("Location: /login.php");
        exit();
    }
?>
<main>
    <div class="container">
        <div class="section1">
            <div class="sect1-row">
                <img class="dash-img" src="img/s.png" height="50px" width="50px" alt="fire logo">
                <h4><?php echo $username;?></h6>
                <p class="paragraph"><?php echo $role;?></p>
            </div>
            <div class="sect1-row">
                <div class="minirow">
                    <li>
                        <img class="dash-img" src="img/flash.png" height="50px" width="50px" alt="">
                    </li>
                    <li>
                        <h5>Speed</h5>
                    </li>
                </div>
            </div>
            <div class="sect1-row">
                <div class="minirow">
                    <li>
                        <img class="dash-img" src="img/hulk.png" height="50px" width="50px" alt="">
                    </li>
                    <li>
                        <h5>Strength</h5>
                    </li>
                </div>
            </div>
            <div class="sect1-row">
                <div class="minirow">
                    <li>
                        <img class="dash-img" src="img/iron.png" height="50px" width="50px" alt="">
                    </li>
                    <li>
                        <h5>Mental</h5>
                    </li>
                </div>
            </div>
            <div class="sect1-row">
                <div class="minirow">
                    <li>
                        <img class="dash-img" src="img/widow.png" height="50px" width="50px" alt="">
                    </li>
                    <li>
                        <h5>Skill</h5>
                    </li>
                </div>
            </div>
        </div>
        <div class="section2">
            <div class="sect2-row">
                <h2>Action Games</h1>
            </div>
            <div class="sect2-row">
                <!--add a search bar here-->
                <input class="search" type="search" name="search" placeholder="find game" id="">
                <button class="search-btn">search</button>
            </div>
            <?php
                foreach ($games as $game) {
                    echo" 
                        <div class='sect-2-row'>
                            <div class='mini-1'>
                                <img class='dash-img' src=".$game->getLink()." height='50px' width='50px' alt=''>
                            </div>
                            <div class='mini-2'>
                                <h5>".$game->getGame()."</h5>
                                <p class='paragraph'>".$game->getVersion()."</p>
                                <!--add a bar-->
                                <div class='bar'>
                                    <div width=".$game->getRate()."% class='range'><p class='paragraph-1'>rating</p></div>
                                </div>
                            </div>
                            <div class='mini-3'>
                                <h4>".$game->getRate()."%</h4>
                            </div>
                        </div>                      
                    ";
                }            
            ?>            
        </div>
    </div>
</main>
<?php require "footer.inc.php"?>