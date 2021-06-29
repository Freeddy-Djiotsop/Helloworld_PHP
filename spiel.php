<?php
$title = 'Eis auswählen';
$zahl = 150;
$error = null;
$succes = null;
$value = null;

if(isset($_GET['ziffer']))
{
    if ($_GET['ziffer'] === "")
            $error = "etwas bitte eingeben, DANKE";
    else
    {
        $value = $_GET['ziffer'];
        if ($value > $zahl)
            $error = "zu groß";
        elseif ($value < $zahl)
            $error = "zu klein";
        else $succes = "genau richtig";

        
    }
}
require 'header.php';
require 'functions.php';
?>
<!-- <pre>
    <?php var_dump($_GET);?>
</pre> -->

<?php if($error):?>
    <div class="alert alert-danger"> <?=$error?></div>
<?php elseif($succes):?>
    <div class="alert alert-success"> <?=$succes?></div>
<?php endif; ?>

<div>
    <form action="/spiel.php" method="GET">
        <div class="form-group">
            <input class="form-control mb-4" type="number" name="ziffer" placeholder="zwischen 0 und 1000" value="<?=$value?>">
            <input class="form-control" type="text" name="demo" placeholder="text eingeben" value="<?php if(isset($_GET['demo'])) echo htmlentities($_GET['demo'])?>">
        </div>
        <button class="btn btn-primary" type="submit">Errate</button>
    </form>
</div>
<br><br><hr>

<?php
    
    $parfums = 
    [
        'Fraise' => 4,
        'vanille' => 3,
        'Chocolat' => 5
    ];

    $cornets =
    [
        'Pot' => 2,
        'cornet' => 3
    ];

    $zusatz =
    [
        'Pepites choco' => 1,
        'chantilly' => 0.5
    ];

    $ihrEis = [];
    $ihrprice = 0;
?>
<pre>
<?php var_dump($_POST);?>
</pre>
<h1><?=$title?></h1>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ihr Eis</h5>

                <ul>
                    <li>
                        <?php 
                            ihrEisPrice($parfums, $ihrEis, $ihrprice, $_POST);
                            foreach($ihrEis as $x)                        
                                echo $x;
                        ?>
                        <?='<br><br>'?>
                        <?='Gesamt Price = '.$ihrprice.'€'?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <form action="/spiel.php" method="POST">
            <hr>
            <h2>Parfum auswählen</h2>
            <?php foreach($parfums as $p => $price):?>
                <div class="checkbox">
                    <label for="">
                        <?= checkbox('parfum', $p, $_POST)?>
                        <?=$p?> - <?=$price?>€
                    </label>
                </div>
            <?php endforeach;?>
            <hr>
            <h2>cornets auswählen</h2>
            <?php foreach($cornets as $p => $price):?>
                <div class="checkbox">
                    <label for="">
                        <?= radio('cornet', $p, $_POST)?>
                        <?=$p?> - <?=$price?>€
                    </label>
                </div>
            <?php endforeach;?>
            <hr>
            <h2>zusatz auswählen</h2>
            <?php foreach($zusatz as $p => $price):?>
                <div class="checkbox">
                    <label for="">
                        <?= checkbox('supplement', $p, $_POST)?>
                        <?=$p?> - <?=$price?>€
                    </label>
                </div>
            <?php endforeach;?>

            <button class="btn btn-primary" type="submit">Post</button>
        </form>
    </div>
    
</div>


<?php require 'footer.php';?>