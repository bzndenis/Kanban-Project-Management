<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kanban extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Project_model');
        $this->load->model('Task_model');
        $this->load->helper('url'); // Pastikan helper URL dimuat
    }

    public function index() {
        $data['projects'] = $this->Project_model->get_all_projects();
        $this->load->view('kanban/index', $data);
    }

    public function view($project_id) {
        $project = $this->Project_model->get_project($project_id);
        if (!$project) {
            show_error('Proyek tidak ditemukan.');
        }

        $data['project_id'] = $project_id;
        $data['project_name'] = $project->name;
        $data['tasks'] = $this->Task_model->get_tasks_by_project($project_id);
        $this->load->view('kanban/view', $data);
    }

    public function create_project() {
        $data = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description')
        ];

        // Debugging
        log_message('debug', 'Data received: ' . print_r($data, true));

        if ($this->Project_model->create_project($data)) {
            // Data berhasil disimpan
            redirect('kanban/index');
        } else {
            // Data gagal disimpan
            show_error('Gagal menyimpan data proyek.');
        }
    }

    public function edit_project($project_id) {
        $data['project'] = $this->Project_model->get_project($project_id);
        $this->load->view('kanban/edit_project', $data);
    }

    public function update_project() {
        $project_id = $this->input->post('project_id');
        $data = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description')
        ];

        $this->Project_model->update_project($project_id, $data);
        redirect('kanban/index');
    }

    public function delete_project($project_id) {
        // Hapus semua tugas yang terkait dengan proyek
        $this->Task_model->delete_tasks_by_project($project_id);
        
        // Hapus proyek
        $this->Project_model->delete_project($project_id);
        redirect('kanban/index');
    }

    public function create_task() {
        $data = [
            'project_id' => $this->input->post('project_id'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'status' => 'task' // Set status awal sebagai 'task'
        ];

        // Debugging
        log_message('debug', 'Task data: ' . print_r($data, true));

        if ($this->Task_model->create_task($data)) {
            log_message('debug', 'Task created successfully');
        } else {
            log_message('error', 'Failed to create task');
        }

        redirect('kanban/view/' . $data['project_id']);
    }

    public function update_task_status() {
        $input = json_decode(file_get_contents('php://input'), true);
        $task_id = $input['task_id'];
        $status = $input['status'];
        $this->Task_model->update_task_status($task_id, $status);
    }

    public function edit_task($task_id) {
        $data['task'] = $this->Task_model->get_task($task_id);
        $this->load->view('kanban/edit_task', $data);
    }

    public function update_task() {
        $task_id = $this->input->post('task_id');
        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status')
        ];

        $this->Task_model->update_task($task_id, $data);
        redirect('kanban/view/' . $this->input->post('project_id'));
    }

    public function delete_task($task_id) {
        $task = $this->Task_model->get_task($task_id);
        $this->Task_model->delete_task($task_id);
        redirect('kanban/view/' . $task->project_id);
    }
}
?>