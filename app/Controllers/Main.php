<?php

namespace App\Controllers;

use App\Libraries\Loja\Venda;
use CodeIgniter\Controller;

class Main extends controller
{

  public function index()
  {
    $data['jobs'] = $this->getAlljobs();
    return view('home', $data);
  }
  public function new_job()
  {
    return view('new_job');
  }
  public function new_jobs_submit()
  {
    if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
      return redirect()->to(site_url('main'));
    }
    $params = [
      'job' =>  $this->request->getPost('job_name')
    ];
    $db = db_connect();
    $db->query("
    INSERT INTO jobs(jobs, datetime_created)
    VALUES(:job:, NOW())
    ", $params);
    $db->close();
    return redirect()->to(site_url('main'));
  }
  public function job_done($id_job = -1)
  {
    $params = [
      'job' =>  $id_job
    ];
    $db = db_connect();
    $db->query("
    UPDATE jobs SET 
    datetime_finish = NOW(),
    datetine_update = NOW() 
    WHERE id_job = :job:
    ", $params);
    $db->close();
    return redirect()->to(site_url('main'));
  }
  public function edit_job($id_job = -1)
  {
    $params = [
      'job' =>  $id_job
    ];
    $db = db_connect();
    $dados = $db->query("SELECT * FROM jobs 
    WHERE id_job = :job:", $params)->getResultObject();
    $db->close();
    $data['job'] = $dados[0];
    //echo var_dump($data[0]);
    return view('edit_job', $data);
  }
  public function edit_job_submit()
  {
    $params = [
      'id' => $this->request->getPost('id_job'),
      'job' => $this->request->getPost('job_name')
    ];
    $db = db_connect();
    $db->query("UPDATE jobs
    SET jobs = :job:,
    datetine_update = NOW() 
    WHERE id_job = :id:", $params);
    $db->close();
    return redirect()->to(site_url('main'));
  }
  public function delete_job($id_job = -1)
  {
    $params = [
      'job' =>  $id_job
    ];
    $db = db_connect();
    $data['job'] = $db->query("SELECT * FROM jobs 
    WHERE id_job = :job:", $params)->getResultObject()[0];
    $db->close();

    return view('delete_job', $data);
  }
  public function delete_job_confirm($id_job = -1)
  {
    $params = [
      'job' =>  $id_job
    ];
    $db = db_connect();
    $db->query("DELETE FROM jobs 
    WHERE id_job = :job:", $params);
    $db->close();
    return redirect()->to(site_url('main'));
  }

  private function getAlljobs()
  {
    $db = db_connect();
    $dados = $db->query("select * from jobs")->getResultObject();
    $db->close();
    return $dados;
  }
}
