<?php
include('auth.php');

$error = "";
if (isset($_POST['signUp'])) {
    $_SESSION["username"] = mysqli_real_escape_string($mw->link,$_POST['un']);
    $_SESSION["email"] = mysqli_real_escape_string($mw->link,$_POST['email']);
    $_SESSION["password"] = mysqli_real_escape_string($mw->link,$_POST['ps']);
    // Encrypt the password
    $encr_ps = sha1($_SESSION["password"]);
    // For multiple music genre
        $_SESSION["musicGenre"] = mysqli_real_escape_string($mw->link, implode(', ', $_POST['music']));
    // For multiple user categories
        $_SESSION["userCategory"] = mysqli_real_escape_string($mw->link, implode(', ', $_POST['category']));
    
        $_SESSION['signUp'] = true;  // This will help the profile icon to show after signing up

    $query = "INSERT INTO userinfo_table(username, email, password, favorite_music_genre, user_category)";
    $query .= "VALUES('".$_SESSION['username']."', '".$_SESSION['email']."', '".$encr_ps."', '".$_SESSION['musicGenre']."',
     '".$_SESSION['userCategory']."' )";

     $error = json_decode($mw->postData($query));
    
        header("Location: index.php");   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN-UP</title>
    <link rel="stylesheet" href="css/sign-up.css">
</head>
<body>
    <main>
        <section>
            

        <div id="sign-up">
            <form action="" method="POST">
                <h2 id="reg">REGISTER</h2><span style="color: white;"><?php echo (@$error->message); ?> </span>

                <div>
                    <label for="username">Username:
                        <input type="text" id="username" name="un" placeholder="Enter Your Username" required>
                    </label>
                </div>

                <div>
                    <label for="email" class="mail">Email:
                        <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
                    </label>
                </div>

                <div>
                    <label for="password">Password:
                        <input type="password" id="password" name="ps" placeholder="Enter Your Password" required>
                    </label>
                </div>

                <div id="favorite-music">
                    <label>Favorite Music Genre (Choose 1 or more): </label>
                    <div>
                        <input type="checkbox" id="rnb" name="music[]" value="Pop/R&B">
                        <label for="rnb">Pop/R&B</label>
                    </div>
                    <div>
                        <input type="checkbox" id="hiphop" name="music[]" value="Hip-Hop">
                        <label for="hiphop">Hip-Hop</label>
                    </div>
                    <div>
                        <input type="checkbox" id="kpop" name="music[]" value="K-pop">
                        <label for="kpop">K-pop</label>
                    </div>
                    <div>
                        <input type="checkbox" id="afrobeats" name="music[]" value="Afro beats">
                        <label for="afrobeats">Afro beats</label>
                    </div>
                    <div>
                        <input type="checkbox" id="gospel" name="music[]" value="Gospel">
                        <label for="gospel">Gospel</label>
                    </div>
                   <!-- <div>
                        <input type="checkbox" id="fuji" name="music[]" value="Fuji">
                        <label for="fuji">Fuji</label>
                    </div> -->
                </div>

                <div id="user">
                    <label>User Category (Choose 1 or more):</label>
                    <!--<div>
                        <input type="checkbox" id="producer" name="category[]" value="Music Producer">
                        <label for="producer">Music Producer</label>
                    </div>
                    <div>
                        <input type="checkbox" id="songwriter" name="category[]" value="Song writer">
                        <label for="songwriter">Song writer</label>
                    </div> -->
                    <div>
                        <input type="checkbox" id="singer" name="category[]" value="Singer">
                        <label for="singer">Singer</label>
                    </div>
                    <div>
                        <input type="checkbox" id="listener" name="category[]" value="Listener">
                        <label for="listener">Listener (User)</label>
                    </div>
                </div>

                <button type="submit" name="signUp">Sign Up</button>
                <h4 id="already">Already have an account? <a href="login.php" id="log"> Login here</a></h4>
            </form>
        </div>
        </section>
    </main>
</body>
</html>
