<h1 class="text-center text-md"><?=$titulo?></h1>

<table class="table table-border mt-3">
  <colgroup>
    <col style='width: 5%'>
    <col style='width: 30%'>
    <col style='width: 25%'>
    <col style='width: 25%'>
    <col  class="text-end" style='width: 10%'>
  </colgroup>
  <thead class="text-center">
    <tr>
      <th>ID</th>
      <th>nombre</th>
      <th>Color de cabello</th>
      <th>Editorial</th>
      <th>Peso</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($datosObtenidos as $registro): ?>
      <tr>
        <td><?=$registro['id']?></td>
        <td><?=$registro['superhero_name']?></td>
        <td><?=$registro['hair_colour']?></td>
        <td><?=$registro['publisher_name']?></td>
        <td><?=$registro['weight_kg']?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>