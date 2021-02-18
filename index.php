<?php require "header.inc.php"?>

<div class="home-container">
    <div class="text-intro">
        <img class="first-img" src="img/fighter.jpeg" alt="">
        <div class="home-intro">
            <div class="home-text" >
                <h1 style="color:orange;">GAMMER</h1>
                <h4 style="color:orange;">ALL ABOUT THE GAMES</h4>
                <p style="color:white; font-size:18px;">Get the latest content on pc, ps5 and xbox games</p>
                <p style="color:white; font-size:18px;">Get ahead of the game.</p>
            </div>
            <div class="home-text">
                <h1 style="color:orange;">GAMMER</h1>
                <h4 style="color:orange;">ALL GAME, ALL SEASON</h4>
                <p style="color:white; font-size:18px;">A world light-years beyond your imagination.</p>
                <p style="color:white; font-size:18px;">Become a Jedi master without ever leaving home.</p>
            </div>
        </div>
    </div>

    <div class="game-section">
        <div class="content">
            <h2><u>UNDEFEATED FREE SUPERHERO GAME</u></h2>
            <p class="game-description">
                Undefeated is an open-world game that simulates what it is like to be a superhero powerful 
                enough to handle every challenge thrown your way. Unlike other superhero games, 
                this game showcases a hero with unlimited power. There is no health bar for the protagonists. 
                Instead, what you will have is a hero point meter that you need to fill up by doing heroic deeds. 
                Fly over the city and save anyone in need of help. 
                Undefeated is your chance to live out your superhero dream.           
            </p>
        </div>
        <div class="video-section">
            <video src="vid/superman.mp4" controls poster="img/undefeated.jpg"></video>
        </div>
    </div>

    <div class="game-section">
        <div class="content">
            <h2><u>INJUSTICE 2 GAMEPLAY</u></h2>
            <p class="game-description">
                Injustice 2 is a 2017 fighting video game based upon the DC Universe. 
                It is developed by NetherRealm Studios and published by Warner Bros. 
                Interactive Entertainment. It is the sequel to 2013's Injustice: Gods Among Us. 
                The game was initially released in May 2017 for the PlayStation 4 and Xbox One; a Microsoft Windows version was released later in November 2017. 
                An expanded version of the game, titled Injustice 2: Legendary Edition, was released in March 2018 for the PlayStation 4, 
                Xbox One, and Microsoft Windows. Similar to the previous installment, a companion mobile app was 
                released for Android and iOS devices. A prequel comic book series of the same name, written by Tom 
                Taylor, was also released beginning in April 2017.       
            </p>
        </div>
        <div class="video-section">
            <video src="vid/injustice2.mp4" controls poster="img/injustice.jpg"></video>
        </div>
    </div> 


    <div class="game-section">
        <div class="content">
            <h2><u>TAKKEN 7 GAMEPLAY</u></h2>
            <p class="game-description">
            Tekken 7 (鉄拳7) is a fighting game developed and published by Bandai Namco Entertainment. 
            It is the ninth overall installment in the Tekken series. 
            Tekken 7 had a limited arcade release in March 2015. 
            An updated arcade version, Tekken 7: Fated Retribution, was released in July 2016, 
            and features expanded content including new stages, costumes, items and characters.[2] 
            The home versions released for PlayStation 4, Xbox One and Microsoft 
            Windows in June 2017 were based on Fated Retribution.[3]
            
            Set shortly after the events of Tekken 6, the plot focuses on the events 
            leading up to the final battle between martial artist Heihachi Mishima and his son, Kazuya. 
            Tekken 7 introduces several new elements to the fighting system such as Rage Arts and the Power 
            Crush mechanic, making the game more beginner friendly than previous iterations in the series. 
            Tekken 7 was a critical and commercial success, selling over six million copies by September 2020.
            </p>
        </div>
        <div class="video-section">
            <video src="vid/takken.mp4" controls poster="img/takken_7.jpg"></video>
        </div>
    </div>   

    <div class="payment-sector"><h2>ON OFFER</h2></div>
    <?php
        for ($i=0; $i < 5; $i++) { 
            echo "<div class='payment'>";
            for ($n=0; $n <4; $n++) { 
                echo"
                    <div class='col'>
                        <div class='character'>
                            <h3>PLAY STATION 5</h3>
                        </div>
                        <div class='information'>
                            <li class='data'><p>custom GPU from AMD</p></li>
                            <li class='data'><p>peak performance is 10.28 teraflops</p></li>
                            <li class='data'><p>16 GB of GDDR6 RAM</p></li>
                            <li class='data'><p>constant frequency of 3.8 GHz</p></li>
                            <li class='data'><p> 120 frames per second</p></li>
                        </div>
                        <div class='buy'>
                            <button class='col_buy'>BUY</button>
                        </div>
                    </div>
                ";
            }
            echo"</div> ";       
        }
    ?>

</div>
<?php require "footer.inc.php"?>