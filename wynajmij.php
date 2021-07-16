<?php
(!isset($_POST['wyslany'])) ? header("Location:index.html") : NULL;

function obliczDoKiedyWynajety($czas)
{
    $teraz = time();
    $minuta = 60;
    $wynik = $teraz + (int)$czas * $minuta;
    return date("d.m.y H:i", $wynik);
}

function obliczCene($czas, $dodatek, $typ_roweru)
{
    $cenaMiejski = 0.25;
    $cenaTandem = 0.5;
    $cenaPoziomka = 0.3;
    $cenaKask = 5;
    $cenaKaskIOchraniacze = 10;
    ($typ_roweru == "Rower miejski") ? $cena_za_min = $cenaMiejski : NULL;
    ($typ_roweru == "Tandem") ? $cena_za_min = $cenaTandem : NULL;
    ($typ_roweru == "Poziomka") ? $cena_za_min = $cenaPoziomka : NULL;
    $wynik = $cena_za_min * $czas;
    if ($dodatek == "Kask") {
        if ($typ_roweru == "Tandem") {
            $wynik += ($cenaKask*2);
        } else {
            $wynik += $cenaKask;
        }
    };
    if ($dodatek == "Kask i ochraniacze") {
        if ($typ_roweru == "Tandem") {
            $wynik += ($cenaKaskIOchraniacze*2);
        } else {
            $wynik += ($cenaKaskIOchraniacze);
        }
    };
    $wynik = number_format($wynik, 2);
    return str_replace(".", ",", $wynik);;
}
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8" />
    <title>Wynajem rowerów</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <a href="index.html"><img src="./img/logo.svg" /></a>
    </header>
    <section id="content">
        <div id="okno">
            <h2>Gratulacje <?php echo $_POST['imie'] ?> <?php echo $_POST['nazwisko'] ?>! Rower został wynajęty.</h2>
            Rodzaj roweru: <?php echo $_POST['rower'] ?><br>
            Numer roweru: <?php echo $_POST['numer'] ?><br>
            Wynajęty do:
            <?php
            echo obliczDoKiedyWynajety($_POST['czas']);
            ?><br />
            Email: <?php echo $_POST['email'] ?><br>
            Dodatkowe akcesoria: <?php echo $_POST['dodatek']; ?><br>
            <b>Do zapłacenia przy odbiorze: <?php echo obliczCene($_POST['czas'], $_POST['dodatek'], $_POST['rower']); ?>zł<br></b>

            <a href="index.html"><input type="button" value="Strona główna" /></a>
            <?php unset($_POST['dodatek']); ?>
        </div>
    </section>
    <footer>
        Przykład Piotr Kijoch
    </footer>
    <script src="./zbierzDane.js"></script>
</body>

</html>