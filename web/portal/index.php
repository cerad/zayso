<?php 
    /* 
     * localhost on solaris 10
     * zayso.org on zayso server
     */
    
    $hostName = $_SERVER['HTTP_HOST'];
    
    $host = sprintf('http://%s/',$hostName); 
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Zayso Portal</title>
    <meta name="description" content="Zayso Referee Scheduling"/>
    <meta name="author"      content="Art Hundiak"/>
    <style>
        ul { margin: 5px; padding: 5px;}
        li { margin: 5px; padding: 5px;}
    </style>    
</head>
<body>
    <h1>Welcome to the Zayso Portal</h1>
    <p>Please click on one of the following AYSO/USSF game/referee scheduling sites:</p>
    <ul>
      <li><a href="<?php echo $host; ?>arbiter/tourn/kicks">
        USSF HFC Kicks 2014 - Huntsville, Alabama - October 17,18,19
      </a></li>
      <?php if (false) { ?>
      <li>
        <a href="<?php echo $host; ?>arbiter/tourn/opencup">
            USSF Open Cup 2014 - Decatur, Alabama - April 11,12,13
        </a>
      </li>
     <li>
        <a href="<?php echo $host; ?>arbiter/tourn/statecup">
            USSF Alabama State Cup Prelims - Spring 2014 - Decatur, Alabama - May 2,3,4
        </a>
      </li>
      <li>
        <a href="<?php echo $host; ?>arbiter/tourn/statecupff">
            USSF Alabama State Cup Final Four - Spring 2014 - Decatur, Alabama - May 9,10,11
        </a>
      </li>
      <?php } ?>
      <li><a href="http://zayso.org/arbiter/schedule" target="_blank">
        Alabama Arbiter (NASOA/ALYS) Game Schedules and Scores
      </a></li>
      
      <?php if (false) { ?>
      <li><a href="<?php echo $host; ?>arbiter/tourn/presidentscup">
        USSF Region III President's Cup - Spring 2014 - Decatur, Alabama - June 12,13,14,15,16
      </a></li>
      
      <li><a href="http://2014nationalgames.org/" target="_blank">
        AYSO National Games 2014 - Riverside/Torrance California - July 2,3,4,5,6
      </a></li>
      
      <li><a href="http://ayso1ref.com/s1_games/zayso" target="_blank">
        AYSO Section One U10/U12/U14 Games -- Ab Brown Complex, Riverside -- 22-23 Feb & 1-2 Mar 2014
      </a></li>
      <li>
        <a href="<?php echo $host; ?>area5c">AYSO Area 5C/F, North Alabama, Fall 2012</a>
      </li>
      <li>
        <a href="<?php echo $host; ?>s5games">AYSO Section 5 Games 2013, TBD</a>
      </li>
      <li>
        <a href="<?php echo $host; ?>natgames">AYSO National Games 2012, Knoxville, TN, July 4-8 2012 (Legacy)</a>
      </li>
      <?php } ?>
    </ul>
    </body>
</html>
