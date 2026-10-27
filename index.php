<?php
/*
 * LABORATORIO #9 · Estructuras de control en PHP
 * Sigue el documento del estudiante. Escribe tu código SOLO en las zonas marcadas con TODO.
 * Recuerda: un commit por ejercicio (ej0, ej1, ... css, final).
 */

// ---------- PARTE 0 · TUS DATOS ----------
// TODO 0.1: define las constantes SEMILLA (últimos 3 dígitos de tu cédula, como número),
//           NOMBRE y APELLIDO.
const SEMILLA = 301;
const NOMBRE = "Moisés";
const APELLIDO = "Pérez";
// TODO 0.2: crea $nombreCompleto, $edad, $dia, $mes, $nota1, $nota2, $nota3, $monto,
//           $esMiembro, $hora, $huella, $descuento y $vacio (fórmulas en el documento).
$nombreCompleto = NOMBRE . " " . APELLIDO;
$edad       = 8 + (SEMILLA % 70);
$dia        = (SEMILLA % 7) + 1;
$mes        = (SEMILLA % 12) + 1;
$nota1      = 40 + (SEMILLA % 61);
$nota2      = 40 + ((SEMILLA * 3) % 61);
$nota3      = 40 + ((SEMILLA * 7) % 61);
$monto      = 20 + (SEMILLA % 181);
$esMiembro  = (SEMILLA % 2) == 0;
$hora       = SEMILLA % 24;
$huella     = (SEMILLA * 13 + 91) % 1000;
$descuento  = SEMILLA * 0.001;
$vacio      = null;

// ---------- EJERCICIO 1 · Boleto de cine (if / elseif / else) ----------
// TODO 1
const PRECIO_NINO = 3.00;
const PRECIO_JOVEN = 4.50;
const PRECIO_ADULTO = 7.00;
const PRECIO_JUBILADO = 3.50;

if ($edad < 13) {
    $precio = PRECIO_NINO;
    $categoria = "Niño";
} elseif ($edad < 18) {
    $precio = PRECIO_JOVEN;
    $categoria = "Joven";
} elseif ($edad < 65) {
    $precio = PRECIO_ADULTO;
    $categoria = "Adulto";
} else {
    $precio = PRECIO_JUBILADO;
    $categoria = "Jubilado";
}

$precioBoleto = number_format($precio, 2);

if ($dia == 3) { // Miércoles
    $precioBoleto*= 0.5; // 50% de descuento
    $Miercoles = "Sí";
} 
else {
    $Miercoles = "No";
}

// ---------- EJERCICIO 2 · Notas (elseif, ternario, &&) ----------
// TODO 2
$promedio = ($nota1 + $nota2 + $nota3) / 3;
if ($promedio >= 90) {
    $letra = "A";
} 
elseif ($promedio >= 80) {
    $letra = "B";
} 
elseif ($promedio >= 70) {
    $letra = "C";
} 
elseif ($promedio >= 60) {
    $letra = "D";
} 
else {
    $letra = "F";
}

if ($promedio >= 70) {
    $estado = "Aprobado";
} 
else {
    $estado = "Reprobado";
}

$CuadroDeHonor = ($promedio >= 90 && $nota1 >= 80 && $nota2 >= 80 && $nota3 >= 80) ? "Sí" : "No";



// ---------- EJERCICIO 3 · Día de la semana (switch) ----------
// TODO 3
switch ($dia) {
    case 1:
        $nombreDia = "Lunes";
        break;
    case 2:
        $nombreDia = "Martes";
        break;
    case 3:
        $nombreDia = "Miércoles";
        break;
    case 4:
        $nombreDia = "Jueves";
        break;
    case 5:
        $nombreDia = "Viernes";
        break;
    case 6:
        $nombreDia = "Sábado";
        break;
    case 7:
        $nombreDia = "Domingo";
        break;
    default:
        $nombreDia = "Día inválido";
}

switch ($dia) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        $diaLaborable = "Laboral";
        break;
    case 6:
    case 7:
        $diaLaborable = "Fin de semana";
        break;
    default:
        $diaLaborable = "Día inválido";
}

// ---------- EJERCICIO 4 · Mes y estación (match) ----------
// TODO 4
match ($nombreMes = $mes) {
    1 => $nombreMes = "Enero",
    2 => $nombreMes = "Febrero",
    3 => $nombreMes = "Marzo",
    4 => $nombreMes = "Abril",
    5 => $nombreMes = "Mayo",
    6 => $nombreMes = "Junio",
    7 => $nombreMes = "Julio",
    8 => $nombreMes = "Agosto",
    9 => $nombreMes = "Septiembre",
    10 => $nombreMes = "Octubre",
    11 => $nombreMes = "Noviembre",
    12 => $nombreMes = "Diciembre",
    default => $nombreMes = "Mes inválido"
};

match ($epocaPanama = $mes) {
    12, 1, 2, 3, 4 => $epocaPanama = "Estación seca",
    5, 6, 7, 8, 9, 10, 11 => $epocaPanama = "Estación lluviosa",
    default => $epocaPanama = "Mes inválido"
};

// ---------- EJERCICIO 5 · Caja de la tienda (reto integrador) ----------
// TODO 5
const ITBMS = 0.07;

if ($monto >= 150) {
    $pct = 15;
} elseif ($monto >= 100) {
    $pct = 10;
} elseif ($monto >= 50) {
    $pct = 5;
} else {
    $pct = 0;
}

if ($esMiembro) {
    $pct += 5;
}

$base = $monto - ($monto * $pct / 100);

$recargoNocturno = false;
if ($hora >= 22 || $hora < 6) {
    $base = $base * 1.03;
    $recargoNocturno = true;
}

$total = $base * (1 + ITBMS);

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- TODO 0.3: <meta name="lab9-huella" content="..."> con el valor de $huella -->
   <meta name="lab9-huella" content="<?php echo $huella; ?>">
  <title>Lab 9 · Estructuras de control</title>
  <!-- TODO CSS-1: enlaza css/estilos.css (CSS externo) -->
   <link rel="stylesheet" href="css/estilos.css">
  <!-- TODO CSS-2: agrega un <style> interno con al menos 2 reglas -->
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    header {
      background-color: #f0f0f0;
      padding: 10px;
      border-radius: 5px;
    }
  </style>

</head>
<body>
  <header>
    <!-- TODO CSS-3: agrega un atributo style (CSS en línea) a este h1 -->
    <h1 style="color: #1a4d8f; border-bottom: 2px solid #1a4d8f;">
    <h1>Laboratorio #9 · Estructuras de control</h1>
    <p id="autor"><!-- TODO 0.4: "Autor: Nombre Apellido" -->
      Autor: <?php echo NOMBRE . " " . APELLIDO; ?>
    </p>
  </header>

  <!-- TODO 0.5: el id de <main> es "lab9-" + tu apellido en minúsculas, sin tildes (ver documento) -->
  <main id="lab9-perez">

    <section id="ej0">
      <h2>Ejercicio 0 · Tipos de datos</h2>
      <table id="ej0-tipos">
        <thead>
          <tr><th>Variable</th><th>Tipo</th></tr>
        </thead>
        <tbody>
          <!-- TODO 0.6: 5 filas <tr> con el nombre de la variable y su gettype() -->
          <tr><td>$nombreCompleto</td><td><?= gettype($nombreCompleto) ?></td></tr>
          <tr><td>$edad</td><td><?= gettype($edad) ?></td></tr>
          <tr><td>$esMiembro</td><td><?= gettype($esMiembro) ?></td></tr>
          <tr><td>$descuento</td><td><?= gettype($descuento) ?></td></tr>
          <tr><td>$vacio</td><td><?= gettype($vacio) ?></td></tr>
        </tbody>
      </table>
    </section>

    <section id="ej1">
      <h2>Ejercicio 1 · Boleto de cine</h2>
      <p id="ej1-res"><!-- TODO 1 -->
        Categoria: <?= $categoria ?> | Precio final: <?= $precioBoleto ?> | Miercoles 50%: <?= $Miercoles  ?>
      </p>
    </section>

    <section id="ej2">
      <h2>Ejercicio 2 · Notas</h2>
      <!-- TODO CSS-4: agrega la clase "ok" o "error" con PHP según el estado -->
       <p id="ej2-res" class="resultado <?= $aprobado ? 'ok' : 'error' ?>">
        Letra: <?= $letra ?> | Estado: <?= $estado ?> | Cuadro de honor: <?= $CuadroDeHonor ?>
      </p>
    </section>

    <section id="ej3">
      <h2>Ejercicio 3 · Día de la semana</h2>
      <p id="ej3-res"><!-- TODO 3 -->
        Día: <?= $nombreDia ?> | Tipo: <?= $diaLaborable ?>
      </p>
    </section>

    <section id="ej4">
      <h2>Ejercicio 4 · Mes y estación</h2>
      <p id="ej4-res"><!-- TODO 4 -->
        Mes: <?= $nombreMes ?> | Estación: <?= $epocaPanama ?>
      </p>
    </section>

    <section id="ej5">
      <h2>Ejercicio 5 · Caja de la tienda</h2>
      <p id="ej5-monto"><!-- TODO 5 -->
        Monto de compra: <?= $monto ?>
      </p>
      <p id="ej5-descuento"><!-- TODO 5 -->
        Descuento aplicado: <?= $pct ?>%
      </p>
      <p id="ej5-recargo"><!-- TODO 5 -->
        Recargo nocturno: <?= $recargoNocturno ? 'Sí' : 'No' ?>
      </p>
      <p id="ej5-total"><!-- TODO 5 -->
        Total a pagar: $<?= $total ?>
      </p>
    </section>

  </main>

  <footer id="firma"><!-- TODO 0.7: "Lab 9 · Nombre Apellido · Semilla N" -->
    Lab 9 · <?php echo NOMBRE . " " . APELLIDO; ?> · Semilla <?php echo SEMILLA; ?>
  </footer>
</body>
</html>
