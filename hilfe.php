<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hilfe</title>
    <meta chartset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

  include("navbar.html");

?>
    <div class="container">
        <h1 class="display-2">Hilfe & FAQ - Muster Hotel</h1>
    </div>
    <div class="container">
        <h1 class="display-3">FAQ</h1>
        <div class="fragen">
            <h2 class="h2"> 1) Buchungen und Reservierungen</h2>
                <h3 class="h5">Wie kann ich meine Reservierung vornehmen?</h3>
                    <p class="antwort">Sie können eine Reservierung direkt auf unserer 
                        Website <a href="Muster_Hotel.php" class="text-decoration-none">www.muster-hotel.com</a> über unser 
                        Online-Reservierungssystem vornehmen. Alternativ erreichen Sie
                        uns telefonisch unter +43 1 234 567 890 oder per E-Mail unter 
                        reservierung@muster-hotel.at.</p>
                <h3 class="h5">Welche Zahlungsmethoden akzeptieren Sie?</h3>
                    <p class="antwort">Wir akzeptieren folgende Zahlungsmethoden:</p>
                    <ul class="zahlungsmethoden" id="liste">
                        <li>Kreditkarten (Visa, MasterCard, American Express)</li>
                        <li>Debitkarten</li>
                        <li>Banküberweisungen</li>
                        <li>Barzahlung vor Ort</li>
                    </ul>
                <h3 class="h5">Kann ich meine Reservierung stornieren?</h3>
                    <p class="antwort">Ja, Sie können Ihre Reservierung bis zu 24 Stunden vor
                        Anreise kostenlos stornieren. Bei Stornierungen innerhalb von 24 
                        Stunden vor Ankunft wird eine Stornogebühr von 50 % des Gesamtbetrags 
                        erhoben. Um eine Stornierung vorzunehmen, kontaktieren Sie uns bitte per 
                        E-Mail unter reservierung@muster-hotel.at oder telefonisch unter 
                        +43 1 234 567 890.</p>
            <h2 class="h2">2) Check-in und Check-Out</h2>
                <h3 class="h5">Wann kann ich einchecken und auschecken?</h3>
                    <ul id="liste">
                        <li><b>Check-In:</b>ab 14:00 Uhr</li>
                        <li><b>Check:Out</b>bis 11:00 Uhr</li>
                    </ul>
                    <p>Wenn Sie früher anreisen oder später abreisen möchten, teilen Sie 
                        uns dies bitte im Voraus mit, damit wir Ihnen bestmöglich 
                        entgegenkommen können.</p>
                <h3 class="h5">Gibt es eine Gepäckaufbewahrung?</h3>
                    <p>Ja, wir bieten eine kostenlose Gepäckaufbewahrung sowohl vor 
                        dem Check-in als auch nach dem Check-out.</p>
            <h2 class="h2">3) Zimmer und Ausstattung</h2>
                <h3 class="h5">Gibt es WLAN im Hotel?</h3>
                    <p>Ja, in allen Zimmern sowie in den öffentlichen Bereichen 
                        des Hotels steht Ihnen kostenloses WLAN zur Verfügung.</p>
                <h3 class="h5">Sind Haustiere erlaubt?</h3>
                    <p>Ja, kleine Haustiere sind in unserem Hotel willkommen. 
                        Es fällt eine zusätzliche Reinigungsgebühr von € 20 pro 
                        Nacht an. Bitte informieren Sie uns im Voraus, wenn Sie mit 
                        einem Haustier reisen.</p>
                <h3 class="h5">Bieten Sie berrierefreie Zimmer an?</h3>
                    <p>Ja, wir haben barrierefreie Zimmer im Angebot. Bitte geben 
                        Sie bei der Buchung an, ob Sie ein solches Zimmer benötigen, 
                        damit wir es für Sie reservieren können.</p>
            <h2>4) Restaurant und Verpflegung</h2>
                <h3 class="h5">Gibt es ein Restaurant im Hotel?</h3>
                    <p>Ja, unser Restaurant „Alpenküche“ serviert täglich Frühstück, 
                        Mittagessen und Abendessen mit regionalen und internationalen 
                        Spezialitäten.</p>
                    <ul id="liste">
                        <li><b>Frühctuck:</b>7:00-10:30</li>
                        <li><b>Mittagessen:</b>12:00-14:00</li>
                        <li><b>Abendessen:</b>18:00-21:30</li>
                    </ul>
                <h3 class="h5">Bieten Sie vegetarische und Vegane Optionen an?</h3>
                    <p>Ja, unser Restaurant bietet eine Auswahl an vegetarischen 
                        und veganen Gerichten. Bitte teilen Sie uns bei Ihrer Ankunft mit, 
                        falls Sie besondere Ernährungsbedürfnisse haben.</p>
            <h2 class="h2">5) Service und Extras</h2>
                <h3 class="h5">Sie einen Flughafentransfer an?</h3>
                    <p>Ja, wir bieten einen Flughafentransfer vom und zum Flughafen 
                        Wien-Schwechat an. Der Service kostet € 40 pro Strecke. Bitte 
                        kontaktieren Sie uns im Voraus, um den Transfer zu buchen.</p>
                <h3 class="h5">Gibt es einen Fitnessbreich im Hotle?</h3>
                    <p>Ja, unser Fitnessbereich ist täglich von 6:00 bis 22:00 Uhr 
                        geöffnet und für alle Hotelgäste kostenlos zugänglich.</p>
            <h2 class="h2">6) Technische Unterstützung</h2>
                <h3 class="h5">Ich habe technische Probleme mit der Website - an wenn kann ich mich wenden?</h3>
                    <p>Wenn Sie Schwierigkeiten mit der Nutzung unserer Website haben, kontaktieren 
                        Sie uns bitte unter websupport@muster-hotel.at.</p>
        </div>
    
    </div>
    <div class="container">
        <h2 class="h3">Kontakt</h2>
            <p>Haben Sie weitere Fragen? Wir helfen Ihnen gerne weiter!</p>
            <ul id="liste">
                <li><b>E-mail:</b>info@muster-hotel.at</li>
                <li><b>Telefon:</b> +43 1 234 567 891</li>
                <li><b>Adresse:</b>Muster Hotel, Musterstraße 24, A-1010 Wien, Österreich</li>
                <li><b>Fax:</b>+43 1 234 567 892</li>
            </ul>
    </div>
    <div class="container">
        <h3 class="h5">Rechtlicher Hinweis:</h3>
        <p>Alle Informationen auf dieser Seite sind ohne Gewähr. 
            Bitte wenden Sie sich bei spezifischen Fragen an unseren 
            Kundenservice. Weitere Informationen finden Sie in unserem 
            <a href="impressum.php" class="text-decoration-none">Impressum.</a></p>
    </div>
<?php
    include("footer.html");
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

    </script>
</body>
</html>