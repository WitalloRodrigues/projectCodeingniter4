<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('conteudo') ?>

<header class="container">
  <div class="row">
    <div class="col p-3">
      <h3>TODO LIST</h3>
    </div>
    <div class="col text-right p-3">
      <a href="<?= site_url('main/new_job') ?>" class="btn btn-warning">Criar noma tarefa</a>
    </div>
  </div>
</header>
<hr>
<?php if (count($jobs) == 0) : ?>
  <p class="text-center">Não existe tarefas alocadas neste sistema!</p>
<?php else : ?>
  <table class="table table-striped table-sm ">
    <thead class="table-dark">
      <tr>
        <th class="text-center">Tarefa</th>
        <th class="text-center">Data de criação</th>
        <th class="text-center">Data de finalização</th>
        <th class="text-center">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($jobs as $job): ?>
        <tr>
          <td class="text-center"><?=$job->jobs ?></td>
          <td class="text-center"><?=$job->datetime_created ?></td>
          <td class="text-center"><?=$job->datetime_finish ?></td>
          <td class="text-center">
            <?php if(empty($job->datetime_finish)): ?>
          <a href="<?= site_url('main/job_done/').$job->id_job?>" class="btn btn-success btn-sm mx-2">&#10004</a>
          <?php else: ?>
            <span class="btn btn-light btn-sm mx-2">&#10006</span>
            <?php endif ?>
            <?php if(empty($job->datetime_finish)): ?>
          <a href="<?= site_url('main/edit_job/').$job->id_job?>" class="btn btn-primary btn-sm mx-2">&#9998</a>
          <?php else: ?>
            <span class="btn btn-light btn-sm mx-2">&#9998</span>
            <?php endif ?>
          <a href="<?= site_url('main/delete_job/').$job->id_job?>" class="btn btn-danger btn-sm mx-2">&#128465</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <p>N.º de Tarefas: <strong><?= count($jobs) ?></strong></p>


<?php endif; ?>


<?= $this->endSection() ?>