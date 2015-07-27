<?php
if(isset($_COOKIE["hlasoval"])){
    //setcookie('hlasoval','hlas',strtotime("-1 month"));
    echo '<div class="pool-wr"> <b style="color: #aa0000">Již bylo hlasováno!!!</b></div>';
    $vote = $_GET["vote"];

    $filename = "poll_result.txt";
    $content = file($filename);

//put content in array
    $array = explode("||", $content[0]);
    $y = $array[0];
    $my = $array[1];
    $mo = $array[2];
    $o = $array[3];
}
else {
    setcookie('hlasoval', 'hlas', strtotime("+1 month"));

    $vote = $_GET["vote"];

    $filename = "poll_result.txt";
    $content = file($filename);

//put content in array
    $array = explode("||", $content[0]);
    $y = $array[0];
    $my = $array[1];
    $mo = $array[2];
    $o = $array[3];

    if ($vote == 0) {
        $y = $y + 1;
    }
    if ($vote == 1) {
        $my = $my + 1;
    }
    if ($vote == 2) {
        $mo = $mo + 1;
    }
    if ($vote == 3) {
        $o = $o + 1;
    }

//insert vote to text file
    $insertvote = $y . "||" . $my . "||" . $mo . "||" . $o;
    $fp = fopen($filename, "w");
    fputs($fp, $insertvote);
    fclose($fp);
}
?>
    <div class="pool-wr">
    <p>Výsledky ankety</p>
    <table>
        <tr>
            <td>
                13-15:
            </td>
            <td>
                <img src="poll.png" width='<?php echo(100*round($y/($y+$my+$mo+$o),4)); ?>' height ='20' style="overflow: hidden" ">
                <?php echo(100*round($y/($y+$my+$mo+$o),2)); ?>%
            </td>
        </tr>
        <tr>
            <td>15-18:</td>
            <td>
                <img src="poll.png"
                     width='<?php echo(100*round($my/($y+$my+$mo+$o),4)); ?>'
                     height='20'>
                <?php echo(100*round($my/($y+$my+$mo+$o),2)); ?>%
            </td>
        </tr>
        <tr>
            <td>18-21:</td>
            <td>
                <img src="poll.png"
                     width='<?php echo(100*round($mo/($y+$my+$mo+$o),4)); ?>'
                     height='20'>
                <?php echo(100*round($mo/($y+$my+$mo+$o),2)); ?>%
            </td>
        </tr>
        <tr>
            <td>více:</td>
            <td>
                <img src="poll.png"
                     width='<?php echo(100*round($o/($y+$my+$mo+$o),4)); ?>'
                     height='20'>
                <?php echo(100*round($o/($y+$my+$mo+$o),2)); ?>%
            </td>
        </tr>
        <tr><td colspan="2" class="celkem-td"><p class="celkem ">Celkem hlasovalo: <?php echo $y+$my+$mo+$o ?></p></td></tr>
    </table>
    </div>
<?php