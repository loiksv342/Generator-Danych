<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GENERATOR</title>
    <style>
        .input h2 {
            text-align: center;
        }
        .main {
            border-radius: 20px;
            display: flex;
            justify-content: center;
            height: 100%;
            align-items: center;
            background-color: slateblue;
        }
        .input p {
            color: #fff;
            margin: 10 0 0 0;
            padding: 0;
        }
        .copy-btn {
            padding: 5px 10px;
            background-color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 10px;
        }
        .copy-btn:hover {
            background-color: #ddd;
        }
        .form-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="main">  
        <div class="input">
            <h2>WYGENERUJ DANE</h2>
            <form action="" method="post">
                <p style='text-align:center;font-weight:bold'>ILE WYGENEROWAĆ REKORDÓW?</p>
                <div class="form-controls">
                    <input type="number" name="ileRazy" placeholder="Ilość rekordów">
                    
                    <input type="submit"  class="copy-btn" value="GENERUJ">
                    <button type="button" class="copy-btn" onclick="copyToClipboard()">Kopiuj</button>
                </div>
                <?php
                $ile = $_POST['ileRazy'];
                if ($ile) {
                    $imiona = [
                        "Adam", "Agnieszka", "Aleksander", "Alicja", "Andrzej", "Anna", "Barbara", "Bartłomiej", "Beata", 
                        "Błażej", "Bogdan", "Bożena", "Cezary", "Czesław", "Dagmara", "Damian", "Danuta", "Dariusz", 
                        "Dawid", "Dorota", "Edyta", "Elżbieta", "Emilia", "Eryk", "Ewa", "Fabian", "Franciszek", 
                        "Gabriela", "Grzegorz", "Halina", "Hanna", "Henryk", "Irena", "Iwona", "Jacek", "Jan", 
                        "Joanna", "Jolanta", "Julia", "Kacper", "Kamila", "Karolina", "Katarzyna", "Kazimierz", "Kinga", 
                        "Klaudia", "Konrad", "Krystian", "Krystyna", "Lech", "Leon", "Łukasz", "Magdalena", "Marek", 
                        "Maria", "Mariusz", "Marta", "Mateusz", "Michał", "Monika", "Natalia", "Nikodem", "Olga", 
                        "Paweł", "Patrycja", "Piotr", "Rafał", "Renata", "Robert", "Ryszard", "Sabina", "Sebastian", 
                        "Sławomir", "Stanisław", "Stefan", "Sylwia", "Tadeusz", "Tomasz", "Urszula", "Wanda", "Wiesław", 
                        "Wiktoria", "Władysław", "Wojciech", "Zbigniew", "Zofia", "Zuzanna"
                    ];
                    $wiek = [
                        25, 30, 22, 45, 35, 28, 50, 19, 33, 27, 
                        42, 38, 26, 31, 29, 47, 21, 40, 36, 39,
                        24, 32, 48, 34, 23, 41, 37, 43, 20, 44,
                        46, 49, 51, 52, 53, 54, 55, 56, 57, 58,
                        59, 60, 61, 62, 63, 64, 65, 66, 67, 68
                    ];
                    $miasto = [
                        "Warszawa", "Kraków", "Łódź", "Wrocław", "Poznań", "Gdańsk", "Szczecin", "Bydgoszcz", "Lublin", 
                        "Białystok", "Katowice", "Gdynia", "Częstochowa", "Radom", "Toruń", "Sosnowiec", "Kielce", 
                        "Rzeszów", "Gliwice", "Zabrze", "Olsztyn", "Bielsko-Biała", "Bytom", "Zielona Góra", "Rybnik", 
                        "Ruda Śląska", "Opole", "Tychy", "Gorzów Wielkopolski", "Dąbrowa Górnicza", "Elbląg", "Płock", 
                        "Wałbrzych", "Włocławek", "Tarnów", "Chorzów", "Koszalin", "Kalisz", "Legnica", "Grudziądz", 
                        "Słupsk", "Jaworzno", "Jastrzębie-Zdrój", "Nowy Sącz", "Jelenia Góra", "Siedlce", "Mysłowice", 
                        "Konin", "Piotrków Trybunalski"
                    ];
                    
                    echo "<h1 style='color:white'>Wygenerowane Dane</h1>";
                    echo "<div id='result'>";
                    for ($i = 1; $i < $ile + 1; $i++) {
                        $im = $imiona[array_rand($imiona)];
                        $age = $wiek[array_rand($wiek)];
                        $miasta = $miasto[array_rand($miasto)];
                        echo "<p>";
                        echo "(" . "'" . $im . "'" . "," . $age . "," . "'" . $miasta . "'" . "), <br/>";
                        echo "</p>";
                    }
                    echo "</div>";
                }else {
                    exit("<h2 style='font-size:20px;text-align:center;color:#fff'>Napisz ile mam wygenerować rekordów </h2>");
                }
                ?>
            </form>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            var resultDiv = document.getElementById('result');
            var range = document.createRange();
            range.selectNode(resultDiv);
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                console.log('Copy command was ' + msg);
            } catch (err) {
                console.log('Oops, unable to copy');
            }
            window.getSelection().removeAllRanges();
        }
    </script>
</body>
</html>
