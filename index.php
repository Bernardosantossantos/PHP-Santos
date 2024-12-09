
<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesion de cUrl; ch = cURL handle

$ch = curl_init(API_URL);
# Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutar la peticion
   y guardamos el resultado
*/
$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);
?>

<head>
<title>La Proxima Pelicula de Marvel</title>
<meta name="descripction" content="La Proxima Pelicula de Marvel"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<main>
<h1 style="text-align: center;">Estrenos de Marvel del 2025</h1>
    <section>
        <div>
            <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"]; ?>" 
            style="border-radius: 16px;" />
            <h3><?= $data["title"]; ?> Se Estrena en <?= $data["days_until"]; ?> Días</h3>
            <p>Fecha de Estreno: <?= $data["release_date"]; ?></p>
        </div>
        
        <div>
            <img src="<?= $data["following_production"]["poster_url"]; ?>" width="300" alt="Poster de <?= $data["following_production"]["title"]; ?>" 
            style="border-radius: 10px;" />
            <h3><?= $data["following_production"]["title"]; ?> Se Estrena en <?= $data["following_production"]["days_until"]; ?> Días</h3>
            <p>Fecha de Estreno: <?= $data["following_production"]["release_date"]; ?></p>
        </div>
    </section>
</main>


<style>
main {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

section {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    text-align: center;
}

hgroup {
    text-align: center;
}

main h1 {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}
</style>
