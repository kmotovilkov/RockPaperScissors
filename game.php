<?php


function displayItems($item = null)
{
    $items = [

        "rock" => '<a href="?item=rock"><b/><img src="images/rock.png" width="300" height="300" alt="Rock"></a>',

        "paper" => '<a href="?item=paper"><b/><img src="images/paper.png" width="300" height=300" alt="Paper"></a>',

        "scissors" => '<a href="?item=scissors"><b/><img src="images/scissors.png" width="300" height="300" alt="Scissors"></a>'

    ];
    if ($item === null) {
        foreach ($items as $item => $value) :
            echo $value;
        endforeach;
    } else {
        //echo $items[$item];
        echo str_replace("?item={$item}", "#", $items[$item]);
    }
}


function game()
{

    if (isset($_GET['item'])) {


        $validItems = ['rock', 'paper', 'scissors'];
        $compItems = ['rock', 'paper', 'scissors', 'rock',
            'paper', 'scissors', 'rock', 'paper', 'scissors',
            'rock', 'paper', 'scissors', 'rock', 'paper', 'scissors',
            'rock', 'paper', 'scissors', 'rock', 'paper', 'scissors'];

        $userItem = strtolower($_GET['item']);

        $compItem = $compItems[rand(0, 20)];

        //user's item verification
        if (!in_array($userItem, $validItems)) {
            echo "Wrong command!";
            die;
        }

        //Rules: Scissors > Paper
        //       Paper > Rock
        //       Rock > Scissors

        if ($userItem === 'scissors' && $compItem === 'paper' ||
            $userItem === 'paper' && $compItem == 'rock' ||
            $userItem === 'rock' && $compItem == 'scissors') {
            echo "<div><img src='images/win.gif' width='155' height='150'></div>";

        }
        if ($compItem === 'scissors' && $userItem === 'paper' ||
            $compItem === 'paper' && $userItem == 'rock' ||
            $compItem === 'rock' && $userItem == 'scissors') {
            echo "<h2>You Lose!</h2>";
        }
        if ($userItem === $compItem) {
            echo "<h2>Equal!</h2>";
        }
        displayItems($userItem);
        displayItems($compItem);

        echo '<div class="back"><a href="./"><img src="images/play_again.png"></a></div>';

    } else {
        displayItems();
    }


}
