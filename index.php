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
        } // or mp3
    } else {
        echo "No audio file found.";
    }
}

// for excel date yyyy-mm-dd h:mm:ss AM/PM

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Music Project</title>
</head>

<body>
    <div class="container">
        <header class="header">
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
        </header>
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
        <section class="music-category">
            <h2 class="kpop-rnb">POP/R&B Playlist</h2>
            <div class="playlists">
                <!--  THIS IS FOR EXTRACTING THE INFORMATION FROM THE DATABASE INSTEAD OF WRITING THE SONG INFO ONE AFTER THE OTHER -->
                <?php
                $mw->homePagePlaylist("pop_rnb_table");
                ?>
            </div>
        </section>


        <!-- HIPHOP PLAYLIST -->
        <section class="music-category">
            <h2 class="kpop-rnb">HIP-HOP Playlist</h2>
            <div class="playlists">
                <!--  THIS IS FOR EXTRACTING THE INFORMATION FROM THE DATABASE INSTEAD OF WRITING THE SONG INFO ONE AFTER THE OTHER -->
                <?php
                $mw->homePagePlaylist("hiphop_table");
                ?>
            </div>
        </section>


        <!-- GOSPEL PLAYLIST -->
        <section class="music-category">
            <h2 class="kpop-rnb">GOSPEL Playlist</h2>
            <div class="playlists">
                <!--  THIS IS FOR EXTRACTING THE INFORMATION FROM THE DATABASE INSTEAD OF WRITING THE SONG INFO ONE AFTER THE OTHER -->
                <?php
                $mw->homePagePlaylist("gospel_table");
                ?>
            </div>
        </section>

        <!-- AFROBEAT PLAYLIST -->


    </div>
    <footer>
        <p>&copy; 2024 TUNE PLAY. All Rights Reserved.</p>
    </footer>
    </div>
</body>

</html>
<script src="script.js"></script>