<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simón</title>
</head>
<body>
  <h1>Simón</h1>

  <form action="inicio.php" method="post" class="container">

    <!-- Control de Círculos -->
    <div class="control-group">
      <label for="num">Círculos:</label>
      <div class="input-row">
        <button type="button" class="arrow" onclick="num.value = Math.max(4, parseInt(num.value) - 1); numSlider.value = num.value; numOut.value = num.value;">◀</button>
        <input type="number" id="num" name="num" min="4" max="8" value="6" readonly>
        <button type="button" class="arrow" onclick="num.value = Math.min(8, parseInt(num.value) + 1); numSlider.value = num.value; numOut.value = num.value;">▶</button>
      </div>
      <input type="range" id="numSlider" name="numSlider" min="4" max="8" value="6" oninput="num.value = this.value; numOut.value = this.value">
      <output id="numOut">6</output>
    </div>

    <!-- Control de Colores -->
    <div class="control-group">
      <label for="numColores">Colores:</label>
      <div class="input-row">
        <button type="button" class="arrow" onclick="numColores.value = Math.max(4, parseInt(numColores.value) - 1); colSlider.value = numColores.value; colOut.value = numColores.value;">◀</button>
        <input type="number" id="numColores" name="numColores" min="4" max="8" value="6" readonly>
        <button type="button" class="arrow" onclick="numColores.value = Math.min(8, parseInt(numColores.value) + 1); colSlider.value = numColores.value; colOut.value = numColores.value;">▶</button>
      </div>
      <input type="range" id="colSlider" name="colSlider" min="4" max="8" value="6" oninput="numColores.value = this.value; colOut.value = this.value">
      <output id="colOut">6</output>
    </div>

    <input type="submit" value="¡JUGAR!">
  </form>
</body>
</html>
