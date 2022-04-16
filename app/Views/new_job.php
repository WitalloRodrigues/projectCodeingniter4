<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('conteudo') ?>

<header class="container">
  <div class="row">
    <div class="col p-3">
      <h3>TODO LIST</h3>
    </div>
    <div class="col text-right p-3">
      <h3>Nova tarefa</h3>
    </div>
  </div>
</header>
<hr>
<?php
helper('form');
echo form_open('main/new_jobs_submit')
?>
<div class="container">
  <div class="row">
    <div class="col-4 offset-4">
      <div class="form-group">
        <label>Designação da tarefa:</label>
        <input type="text" name="job_name" class="form-control" required>
      </div>
        <br>
      <div class="row">
        <div class="col"><a href="<?= site_url('main') ?>" class="btn btn-secondary">Cancelar</a></div>
        <div class="col right"><input type="submit" value="Gravar" class="btn btn-primary"></div>
      </div>
    </div>
  </div>
</div>

<?= form_close() ?>
<?= $this->endSection() ?>