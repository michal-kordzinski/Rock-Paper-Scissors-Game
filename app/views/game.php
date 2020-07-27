<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=URL?>/css/style.css" type="text/css">
    <title>Rock-Paper-Scissors Game</title>
</head>
<body>
    
    <header>
        <div class="container">
        <div class="jumbotron">
            <h1>Rock-Paper-Scissors Game</h1>
        </div>
        </div>
    </header>
    <nav>
        <div class="container">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" href="<?=URL?>/game">Game</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=URL?>/results">Results</a>
                </li>
            </ul>
        </div>
    </nav>
    <section>
        <div class="container">
            <h2 class="header">Pick your play</h2>
            <div>
                <form action="<?=URL?>/game/play" method="POST">
                    <div class="game">

                        <button type="submit" name="submit" value="Rock" class="game_button img-fluid"><img src="<?=URL?>/img/rock.png" alt="Rock" class="game_img"></button>
                        <button type="submit" name="submit" value="Paper" class="game_button img-fluid"><img src="<?=URL?>/img/paper.png" alt="Rock" class="game_img"></button>
                        <button type="submit" name="submit" value="Rock" class="game_button img-fluid"><img src="<?=URL?>/img/rock.png" alt="Rock" class="game_img"></button>
                    </div>
                    <input name="safety_button" type="hidden" value="safety_button">
                </form>
            </div>
            <div class="header">
                <?php if (isset($data[0])) echo '<h5>Computer plays: ' . $data[0] . '</h5>'?>
                <?php if (isset($data[0])) echo '<h3>Result: ' . $data[1] . '</h3>'?>
            </div>
        </div>
    </section>
    <footer>
        <div class="container header">
            <p>Copyright ©2020 · Author: Michał Kordziński</p>
        </div>
    </footer>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
