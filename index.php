<?php
include('auth.php');
// Check if the form was submitted 
if (isset($_POST['music_picture'])) {
    //echo "hiii";
    // Retrieve the music_picture value from POST data
    $music_picture = $_POST['music_picture'];
    // Fetch the music file paths from the database
    $audioPaths = json_decode($mw->getFilePath($music_picture, "songlist_table"), true);

    if ($audioPaths) {
        foreach ($audioPaths as $filePath) {
            echo "<div class='audio-container'>
            <audio class='custom-audio' controls>
                <source src='$filePath' type='audio/mpeg'>
                Your browser does not support the audio element.
            </audio>
            
          </div>";
        }// or mp3
    } else {
        echo "No audio file found.";
    }
} 

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.css">
    <title>Music Project</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- FOR THE ARTISTS MENU -->
            <button class="menu-button" onclick="toggleMenu()">☰ Artists</button>

            <div class="menu" id="menu">
                <div class="menu-header">
                    <h2>Artists</h2>
                    <button class="exit-button" onclick="toggleMenu()">✖</button>
                </div>
                <div class="artist">
                    <li class="art1">
                        <span><img src="images/artists/beyonce.jpeg" alt=""></span>
                        <h3>Beyonce</h3>
                    </li>
                    <li class="art1">
                        <span><img src="images/artists/John Legend.jpeg" alt=""></span>
                        <h3>John Legend</h3>
                    </li>
                    <li class="art1">
                        <span><img src="images/artists/ed sheeran.jpeg" alt=""></span>
                        <h3>Ed Sheeran</h3>
                    </li>
                    <li class="art1">
                        <span><img src="images/artists/ayra starr.jpeg" alt=""></span>
                        <h3>Ayra Starr</h3>
                    </li>
                    <li class="art1">
                        <span><img src="images/artists/asake.jpeg" alt=""></span>
                        <h3>Asake</h3>
                    </li>
                    <li class="art1">
                        <span><img src="images/artists/celine dion.jpeg" alt=""></span>
                        <h3>Celine Dion</h3>
                    </li>
                    <li class="art1">
                        <span><img src="images/artists/remajpeg.jpeg" alt=""></span>
                        <h3>Rema</h3>
                    </li>
                </div>
            </div>


            <h3 id="musWeb">TUNE PLAY</h3>
<!-- ** FOR DISPLAYING THE PROFILE ICON AFTER SIGNING UP OR LOGGING IN ***-->
            <?php         
if (isset($_SESSION['signUp']) && $_SESSION['signUp'] === true) {
    // User is logged in, display profile icon
    $profileIcon = '<div id="profile-content">
        <input type="checkbox" id="profile-toggle" class="profile-toggle">
        <label for="profile-toggle" class="profile-container">
            <img src="images/th.jpeg" alt="" style="display: block;" >
        </label>

        <div class="profile-pic">
            <div class="profile-header">
                <h2>Profile</h2>
                <label for="profile-toggle" class="exitbutton">✖</label>
            </div>
            <div class="profile">
                <li>
                  <a href="" class="prof1"><h3>View Profile</h3></a>
                </li>
                <hr>
                <li>
                  <a href="" class="prof1"><h3>Monetization</h3></a>
                </li>
                <hr>
                <li>
                   <a href="" class="prof1"><h3>Settings</h3></a>
                </li>
                <hr>
                <li>
                   <a href="" class="prof1"><h3>Log out</h3></a>
                </li>
            </div>
        </div>
    </div>';
} else {
    // User is not logged in, do not display anything
    $profileIcon = '';
}

?> 
<!-- DISPLAY THIS INSTEAD IF NOT LOGGED IN  -->
<div id="sign-log">
    <?php echo $profileIcon; ?>
    <?php if (!isset($_SESSION['signUp']) || $_SESSION['signUp'] !== true) { ?>
        <a href="sign-up.php">Sign Up</a>
        <a href="login.php">Login</a>
    <?php } ?> 
</div>

    <!-- END OF PROFILE ICON  -->
</div>
        </div>                  
                                                                      
        <div class="content">
<!-- KPOP PLAYLIST -->              
<section>
    <h2 class="kpop-rnb">K-Pop Playlist</h2>
<div class="playlists"><!--  THIS IS FOR EXTRACTING THE INFORMATION FROM THE DATABASE INSTEAD OF WRITING THE SONG INFO ONE AFTER THE OTHER -->
    <?php
    $mw->homePagePlaylist("kpop_table");
    ?>
</div>
</section>


<!-- POP/R&B PLAYLIST -->
<section>
    <h2 class="kpop-rnb">POP/R&B Playlist</h2>
<div class="playlists">
<!--  THIS IS FOR EXTRACTING THE INFORMATION FROM THE DATABASE INSTEAD OF WRITING THE SONG INFO ONE AFTER THE OTHER -->
    <?php
    $mw->homePagePlaylist("pop_rnb_table");
    ?>
</div>
</section>


<!-- HIPPOP PLAYLIST -->
<section>
    <h2 class="kpop-rnb">HIP-POP Playlist</h2>
<div class="playlists" style = "gap: 2px;">

    <div class="item">
    <form action="playmusic.php" method="post">
            <input type="hidden" name="music_picture" value="images/songsPictures/band.jpeg"> 
        <img src="images/songsPictures/band.jpeg" alt="" id="eve" onclick= "this.closest('form').submit();">
        <h3>Band4Band By CENTRAL CEE</h3>
        </form>
    </div>

    <div class="item">
        <img src="images/songsPictures/lala.jpeg" alt="" id="eve-lrwb" style = "height: 210px; width: 200px;">
        <h3>Lalali by SEVENTEEN</h3>
    </div>
    
    <div class="item">
        <img src="images/songsPictures/work.jpeg" alt="" id="eve-lrwb">
        <h3>Work By ATEEZ</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/rockstar.jpeg" alt="" id="eve-lrwb">
         <h3>RockStar By LISA</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/bouncy.jpeg" alt="" id="eve-lrwb">
        <h3>Bouncy By ATEEZ </h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/Ed_Sheeran_-_Beautiful_People.png" alt="" id="eve">
        <h3>Mockingbird by EMINEM</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/rock.jpeg" alt="" id="eve">
        <h3>In The Bible by DRAKE</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/outside.jpeg" alt="" id="eve">
        <h3>Rules by DOJA CAT</h3>
    </div>
    <div class="item">
        <img src="images/songsPictures/Benson_Boone_-_Beautiful_Things.png" alt="" id="eve">
        <h3>Mask Off by FUTURE</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/perfect.jpeg" alt="" id="eve">
        <h3>Street by DOJA CAT</h3>
    </div>

 </div>
</section>
    
<!-- GOSPEL PLAYLIST -->
<section>
    <h2 class="kpop-rnb">GOSPEL Playlist</h2>
<div class="playlists">
    <div class="item">
        <img src="images/songsPictures/maverickfirm.jpeg" alt="" id="eve">
        <h3>Firm Foundation by MAVERICK CITY MUSIC</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/rescue lauren.jpeg" alt="" id="eve-lrwb" style = "height: 210px; width: 200px;">
        <h3>Rescue by LAUREN DIAGLE</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/iba nath.jpeg" alt="" id="eve-lrwb">
        <h3>Iba by NATHANIEL BASSEY</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/takeovertheo.jpeg" alt="" id="eve-lrwb">
        <h3>Takeover by THEOPHILUS SUNDAY</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/lauren.jpeg" alt="" id="eve-lrwb">
        <h3>Remember by LAUREN DIAGLE</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/yet maverick.jpeg" alt="" id="eve">
        <h3>Yet by MAVERICK CITY</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/yousay.jpeg" alt="" id="eve">
        <h3>You Say By LAUREN DIAGLE</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/mosesbliss.jpeg" alt="" id="eve">
        <h3>You I Live For by MOSES BLISS</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/larageorge.jpeg" alt="" id="eve">
        <h3>Ijoba Orun by LARA GEORGE</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/fragrancetofire.jpeg" alt="" id="eve">
        <h3>Fragrance To Fire by DUNSIN OYEKAN</h3>
    </div>

</div>
</section>

<!-- AFROBEAT PLAYLIST -->
<section>
    <h2 class="kpop-rnb">AFROBEAT Playlist</h2>
<div class="playlists" >
    <div class="item">
        <img src="images/songsPictures/asake.jpeg" alt="" id="eve">
        <h3>I Swear by ASAKE</h3>   
    </div>

    <div class="item">
        <img src="images/songsPictures/asake.jpeg" alt="" id="eve-lrwb">
        <h3>Mentally by ASAKE</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/forever psquare.jpeg" alt="" id="eve-lrwb">
        <h3>Forever by P-SQUARE</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/runtown.jpeg" alt="" id="eve-lrwb" style = "height: 210px; width: 200px;">
        <h3>Mad Over You by RUNTOWN</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/nwababy.jpeg" alt="" id="eve-lrwb">
        <h3>Nwa Baby by DAVIDO</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/frames wizkid.jpeg" alt="" id="eve">
        <h3>Frames by WIZKID</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/demodavido.jpeg" alt="" id="eve">
        <h3>Demo by DAVIDO</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/noone psquare.jpeg" alt="" id="eve">
        <h3>No One Like You by P-SQUARE</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/ozebarema.jpeg" alt="" id="eve">
        <h3>Ozeba by REMA</h3>
    </div>

    <div class="item">
        <img src="images/songsPictures/asake.jpeg" alt="" id="eve">
        <h3>Wave by ASAKE</h3>
    </div>

</div>
</section>

<!-- <div id="trending-songs">
    <h2 id="trending">Top 10 Trending Songs</h2>
    <ul>
   <li> <a href="">+ Dreamers by JungKook feat. Fahad Al Kubaisi</a> </li>
   <li> <a href="">+ Christmas Tree by V</a> </li>
   <li> <a href="">+ Dancing In The Dark by Rihanna</a> </li>
   <li> <a href="">+ HeartBreak Anniversary by Giveon</a> </li>
   <li> <a href="">+ Perfect by Ed Sheeran</a> </li>
   <li> <a href="">+ Happily Ever After by TXT</a> </li>
   <li> <a href="">+ LOST! by RM</a> </li>
   <li> <a href="">+ Nuts by RM</a> </li>
   <li> <a href="">+ SPOT! by ZICO feat. JENNIE</a> </li>
   <li> <a href="">+ In The Room by Maverick City feat. Tasha Cobbs</a> </li>
</ul>
</div>  -->

        </div>
       <footer>
        <p>&copy; 2024 TUNE PLAY. All Rights Reserved.</p>
       </footer>
    </div>
</body>
</html>
<script src="script.js"></script>