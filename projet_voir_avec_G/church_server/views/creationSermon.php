<?php ob_start(); ?>

<form method="POST" action="<?= URL ?>admin/sermons/validateCreation">
  <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="date" name="date">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Titre</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="mb-3">
    <label for="resume" class="form-label">Résumé</label>
    <textarea class="form-control" id="resume" name="resume" rows="6"></textarea>
</div>
<div class="mb-3">
  <label class="form-label" for="audio_fil">Fichier audio</label>
  <input type="file" class="form-control"  id="audio_fil" name="audio_fil" accept="audio/*">
</div>
  <div class="mb-3">
    <label for="orator" class="form-label">Orateur</label>
    <input type="text" class="form-control" id="orator" name="author">
  </div>

  <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$title = "Page de création de sermon";
require "views/Template.php";

