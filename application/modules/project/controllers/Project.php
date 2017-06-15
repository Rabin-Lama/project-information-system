<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Project extends MY_Controller {

		function __construct() {
			parent::__construct();

			$this->load->model('project_model');
		}

		function add_new_project() {
			if(($this->session->userdata('username'))) {
				$data['title'] = 'Add new project';
				$data['module_title'] = 'Add project info';
				$data['content_view'] = 'project/add_new_project_view';

				$this->load->module('Operation'); // to pre-populate the "department field"
				$this->load->model('operation_model');
				$data['departments'] = $this->operation_model->select_all_departments();
				$this->template->admin_template($data);
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function add_project_info() {
			if(($this->session->userdata('username'))) {
				

				//ordering the input date for mysql date field...
				$start_date = explode('-', $this->input->post('start_date'));
				$start_date = $start_date[1].$start_date[0].'00';

				$end_date = explode('-', $this->input->post('end_date'));
				$end_date = $end_date[1].$end_date[0].'00';
				
				$data = array(
							'project_name' => $this->input->post('project_name'),
							'project_budget' => $this->input->post('project_budget'),
							'start_date' => $start_date,
							'end_date' => $end_date,
							'job_title' => $this->input->post('job_title'),
							'department_id' => $this->input->post('department_id'),
							'project_description' => $this->input->post('project_description')
						);print_r($data);die;

				$this->project_model->insert_project_info($data);

				$this->session->set_userdata('project_add_success_msg', 'Project Added Successfully !');

				redirect('project/add_new_project');
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}

		/*function load_all_projects() {
			if(($this->session->userdata('username'))) {
				
				$data = $this->project_model->select_all_projects();
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}*/

		function load_project() {
			if(($this->session->userdata('username'))) {
				$project_id = $this->uri->segment(3);
				
				$data['project'] = $this->project_model->select_project_where($project_id);

				$data['title'] = $data['project']['project_name'];
				$data['content_view'] = 'project/project_view';
				$this->template->admin_template($data);
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function add_item_info() {
			if(($this->session->userdata('username'))) {
				//echo '<pre>'; print_r($this->input->post()); echo '</pre>';
				$project_id = $this->uri->segment(3);
				

				$data = array(
							'project_id' => $project_id = $this->uri->segment(3),
							'item_name' => $this->input->post('')
						);
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function load_job_title_where() {
			if(($this->session->userdata('username'))) {
				$project_id = $this->uri->segment(3);
				
				$data['job_title'] = $this->project_model->select_job_title_where($project_id);

				echo json_encode($data['job_title']);
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function add_new_issue() {
			if(($this->session->userdata('username'))) {
				$data = array(
						'project_id' => $this->input->post('project_id'),
						'created_by' => $this->input->post('created_by'),
						'assignee' => $this->input->post('assignee'),
						'subject' => $this->input->post('subject'),
						'description' => $this->input->post('description'),
						'status' => $this->input->post('status'),
						'priority' => $this->input->post('priority'),
						'start_date' => $this->input->post('start_date'),
						'due_date' => $this->input->post('due_date'),
						'estimated_time' => $this->input->post('estimated_time')
					);
				
				$this->project_model->insert_issue($data);

				$this->session->set_userdata('issue_create_success_msg', 'Issue Created Successfully !');

				redirect('project/load_project/'.$this->input->post('project_id'));
			} else {
				$this->session->set_userdata('login_error', 'Unauthorized access !');
				redirect('/');
			}
		}

		function create_excel() {
			//load our new PHPExcel library
			$this->load->library('excel');
			//activate worksheet number 1
			$this->excel->setActiveSheetIndex(0);
			//name the worksheet
			$this->excel->getActiveSheet()->setTitle('test worksheet');
			//set cell A1 content with some text
			$this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
			//change the font size
			$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
			//make the font become bold
			$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
			//merge cell A1 until D1
			$this->excel->getActiveSheet()->mergeCells('A1:D1');
			//set aligment to center for that merged cell (A1 to D1)
			$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			 
			$filename='just_some_random_name.xls'; //save our workbook as this file name
			header('Content-Type: application/vnd.ms-excel'); //mime type
			header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
			header('Cache-Control: max-age=0'); //no cache
			             
			//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
			//if you want to save it as .XLSX Excel 2007 format
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
			//force user to download the Excel file without writing it to server's HD
			$objWriter->save('php://output');
		}

		function read_excel() {			

			$this->load->library('Excel');

			/*try {
				/// it will be your file name that you are posting with a form or can pass static name $_FILES["file"]["name"];
				$objPHPExcel = PHPExcel_IOFactory::load(base_url() . 'assets/test.xlsx');

			} catch(Exception $e) {
				$this->resp->success = FALSE;
				$this->resp->msg = 'Error Uploading file';
				echo json_encode($this->resp);
				exit;
			}
			 
			$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

			foreach($allDataInSheet as $import) {
				echo $import['A']; /// will return values of Col A
				echo $import['B']; /// will return values of Col B
				echo $import['C']; /// will return values of Col C
				echo $import['D']; /// will return values of Col D
			 
			}*/

			$file = './assets/test.xlsx';
			//read file from path
			$objPHPExcel = PHPExcel_IOFactory::load($file);
			//get only the Cell Collection
			$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
			//extract to a PHP readable array format
			foreach ($cell_collection as $cell) {
			    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
			    echo $data_value.'<br>';
			    //header will/should be in row 1 only. of course this can be modified to suit your need.
			    if ($row == 1) {
			        $header[$row][$column] = $data_value;
			    } else {
			        $arr_data[$row][$column] = $data_value;
			    }
			}
			//send the data in an array format
			$data['header'] = $header;
			$data['values'] = $arr_data;
		}
	}