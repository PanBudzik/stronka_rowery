const wyborRoweru = (nazwaRoweru) => {
    let formularz = `
    <div id="okno">
    <form method="POST" action="wynajmij.php"><h2>Wypełnij formularz</h2>
    <input type="text" name="rower" value="`+ nazwaRoweru + `" hidden/><br/>
    <label for="imie">Imię</label>
    <input type="text" name="imie" id="imie" required/><br/>
    <label for="nazwisko">Nazwisko</label>
    <input type="text" name="nazwisko" id="nazwisko" required/><br/>
    <label for="numer">Numer roweru</label>
    <input type="number" name="numer" id="numer" min="0" required/><br/>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required/><br/>
    <label for="czas">Na ile czasu?</label>
    <select name="czas" id="czas">
        <option value="10">10 min</option>
        <option value="20">20 min</option>
        <option value="30">30 min</option>
        <option value="1440">1 dzień</option>
    </select><br/><br/>
    <label for="dodatki">Co potrzebujesz dodatkowo?</label>
    <fieldset id="dodatki">
        <label><input type="radio" name="dodatek" value="Nic" checked> Nic</label>
        <label><input type="radio" name="dodatek" value="Kask"> Kask</label>
        <label><input type="radio" name="dodatek" value="Kask i ochraniacze"> Kask i ochraniacze</label>
    </fieldset><br/>
    <label><input type="checkbox" name="regulamin" value="zaakceptowany" required> Zapoznałem/am się z regulaminem</label><br/>
    <a href=""><input type="button" value="Cofnij" /></a>
    <input type="submit" name="wyslany" value="Wynajmij"/>
    </form></div>`;
    document.getElementById("content").innerHTML = formularz;
}