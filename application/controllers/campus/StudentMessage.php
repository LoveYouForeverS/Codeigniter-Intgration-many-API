<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Aws\Ses\SesClient;
class StudentMessage extends MY_Campus_Controller {
	
	public function __construct(){
		parent::__construct();

		$this->load->model('InboxModel');
		$this->load->model('ProfesorModel');
		$this->load->model('MensajeModel');

		$this->load->library('form_validation');
		$this->lang->load('campus',$this->data['lang']);

		if(!$this->session->userdata('campus_user') || ($this->session->userdata('campus_user') && $this->data['campus_user_role'] != 2)){ //no user or not student
			redirect('campus/auth/login/', 'refresh');
		}
		$this->data['campus_user'] = (array)$this->session->userdata('campus_user');
		$this->data['user_id'] = $this->data['campus_user']['CCODCLI'];
		$this->layouts->add_includes('js', 'app/js/campus/message/main.js');
	}
	
	public function index(){
		$this->data['page'] = 'student_messages';
		$this->layouts->add_includes('js', 'app/js/campus/message/student_message.js');
		$this->layouts->view('campus/messages/studentMessageView', $this->data, $this->layout);
	}
	
	public function inbox(){
		$email = $this->MensajeModel->getStudentInbox($this->data['user_id']);
		print_r(json_encode($email));
	}

	public function get_messages(){
		$html = '';
		if ($this->input->is_ajax_request()) {
			$messages_from = $this->input->post('messages_from', true);
			$show_more = $this->input->post('show_more', true);
			if($messages_from == 'inbox'){
				$messages = $this->MensajeModel->getStudentInbox($this->data['user_id'], 5, $show_more);
			}else if($messages_from == 'outbox'){
				$messages = $this->MensajeModel->getStudentOutbox($this->data['user_id'], 5, $show_more);
			}

			if(isset($messages) && !empty($messages)){
				foreach($messages as $k_m=>$message){
					$user_name = '';
					$user_photo = '';
					$read_messaeg_inbox = 'read_message';
					if($messages_from == 'inbox'){
						$user_name = $message->from_user_name;
						$user_photo = $message->from_user_photo;
					}else if($messages_from == 'outbox'){
						$user_name = $message->to_user_name;
						$user_photo = $message->to_user_photo;
					}

					$img_src = "/assets/img/dummy-image.jpg";
					if(!empty($user_photo)){
						$img_src = image_parser_from_db($user_photo);
					}
					if($message->Read == '1'){
						$message_read = "";
					}else{
						if($messages_from == 'inbox') {
							$read_messaeg_inbox = 'read_message_inbox';
						}
						$message_read = "bold_text";
					}

					$html .= '<div class="for_list_border_colors '. $read_messaeg_inbox .'" data-message_id="'. $message->id.'" >
								<div class="row">
								<div class="col-xs-2  text-center message_img">
									<img src="'.$img_src.'" class="user_img" alt=""  >
								</div>
								<div class="col-xs-8  ts_info_text">
									<div class="text-primary '.$message_read.' title">'.$user_name. '</div>
									<div class="message_read_role '.$message_read.'">'.$this->lang->line($message->roletype).'</div>
									<div class=" message_subject">'. $message->subject.'</div>';
					$message_body = $message->body;
					$text_more = '';
					$full_message = true;
					if(strlen($message_body) > 150){
						$message_body = substr($message_body, 0, 150);
						$message_body .= '<span  class="show_more_message_link " id="show_more_message_'.$k_m.'" data-message_item="'.$k_m.'">...<a href="#" class="text-primary">  '.$this->lang->line('campus_show_more').'</a></span>';
						$full_message = false;
						$text_more = '<span class="hidden more_message_'.$message->id.'" id="more_message_'.$k_m.'">'.substr($message->body,10,strlen($message->body)).'</span>
									<a class="hidden less_message_link text-primary" id="less_message_text_'.$k_m.'" href="#" data-message_item="'.$k_m.'"> '.$this->lang->line('campus_less_message').'</a>';
					}
					$html .= '<div class=" message_body" data-full-message="'.$full_message.'">	'.$message_body.$text_more.'</div>  ';

					$html .='</div>
								<div class="col-xs-2 light_color_text date_time_messages">
									<div class="text-center">
											<p class="no_margin title">'.date("M, d",strtotime($message->maildate)).'</p>
											<span>'.date("H:i A",strtotime($message->maildate)).'</span>
									</div>
								</div>
						  </div> </div>';
					$html .= '<hr>';
				}
				$html .= '<button type="button" class="btn btn-circle btn-primary pull-right xs_btn_block" id="show_more" data-messages_from="'.$messages_from.'">'.$this->lang->line('campus_display_more').'</button>';
			}
		}

		print_r(json_encode($html));
		exit;
	}
	
	public function compose(){
		$result['success'] = false;
		if ($this->input->post()) {
			$form_data = $this->input->post('form_data', true);
			$data = array();
			foreach($form_data as $item){
				$data[$item['name']] = $item['value'];
			}
			$user_data = array();
			if(isset($data['totype']) &&  $data['totype'] == '0' && isset($data['to'])){
				$this->load->model('UsuarioModel');
				$user_data = $this->UsuarioModel->getUserDataById($data['to']);
			}
			if((!empty($data) && isset($user_data->allow_messaging_students)
				&& $user_data->allow_messaging_students == '1') || (!empty($data) && empty($user_data))){
				if(isset($data['totype']) && $data['totype'] == '1' && isset($data['to']) ){
					$teacher = $this->ProfesorModel->listTeachers($this->data['user_id'], $data['to']);
					if(!empty($teacher)) {
						$data['totype'] = 1;
						$result['success'] = $this->MensajeModel->insert_student_msg($this->data['user_id'], $data);
					}
				}elseif(isset($data['totype']) && $data['totype'] == '0'){
					$result['success'] = $this->MensajeModel->insert_student_msg($this->data['user_id'],$data);
				}

				if($result['success']){
					$toId = $data['to'];
					$toType = $data['totype'];
					$this->load->model('ErpEmailsAutomatedModel');
					if($toType == '1'){
						$this->load->model('ProfesorModel');
						$user_data = $this->ProfesorModel->getTeacherById($toId);
					}elseif($toType == '2'){
						$this->load->model('AlumnoModel');
						$user_data = $this->AlumnoModel->getStudentById($toId);
					}
					if(!empty($user_data)) {
						$replace_data = array(
							'FIRSTNAME' => isset($user_data->first_name_1) ? $user_data->first_name_1 : $user_data->full_name,
							'SURNAME' => isset($user_data->sur_name) ? $user_data->sur_name : $user_data->full_name,
							'FULLNAME' => $user_data->full_name,
							'PHONE1' => isset($user_data->phone1) ? $user_data->phone1 : '',
							'MOBILE' => isset($user_data->mobile) ? $user_data->mobile : '',
							'EMAIL1' => $user_data->email1,
							//'COURSE_NAME' => ,
							'START_DATE' => date('F j') . ' at  ' . date('G:i A'),
							'END_DATE' => date('F j') . ' at  ' . date('G:i A'),
						);
					}
					$template = $this->ErpEmailsAutomatedModel->getByTemplateId('16', array('notify_student' => 1));

					if (!empty($template)) {
						$email_subject = replaceTemplateBody($template->Subject, $replace_data);
						$email_body = replaceTemplateBody($template->Body, $replace_data);
						if(isset($user_data->email1)){
							$result_1 = $this->send_automated_email($user_data->email1, $email_subject, $email_body, $template->from_email);
						}
						if(isset($user_data->tutor1_email1)){
							$this->send_automated_email($user_data->tutor1_email1, $email_subject, $email_body, $template->from_email);
						}
						if(isset($user_data->tutor2_email1)){
							$this->send_automated_email($user_data->tutor2_email1, $email_subject, $email_body, $template->from_email);
						}
					}
				}

			}
		}
		print_r(json_encode($result));
		exit;
	}

	private function send_automated_email($email, $subject, $body, $from_email){
		$this->load->model('ErpEmailModel');
		$user_id = $this->data['user_id'];

		$emails_limit_daily = $this->_db_details->emails_limit_daily;
		$emails_limit_monthly = $this->_db_details->emails_limit_monthly;
		$count_emails_day = $this->ErpEmailModel->getEmailsCountDay();

		if ($emails_limit_daily > $count_emails_day->count_daily && $emails_limit_monthly > $count_emails_day->count_monthly) {
			$amazon = $this->config->item('amazon');
			$email_from = $this->config->item('email');

			$client = SesClient::factory(array(
				'version' => 'latest',
				'region' => $amazon['email_region'],
				'credentials' => array(
					'key' => $amazon['AWSAccessKeyId'],
					'secret' => $amazon['AWSSecretKey'],
				),
			));

			$request = array();
			$request['Source'] = $from_email.' <'.$email_from['from'].'>';
			$request['Destination']['ToAddresses'] = array($email);
			$request['Message']['Subject']['Data'] = $subject;
			$request['Message']['Subject']['Charset'] = "UTF-8";
			$request['Message']['Body']['Html']['Data'] = $body;
			$request['Message']['Body']['Charset'] = "UTF-8";
			$data_recipient = array(
				'from_userid' => $user_id,
				'from_usertype' => '2',
				'id_campaign' => '',
				'email_recipie' => $email,
				'Subject' => $subject,
				'Body' => $body,
				'date' => date('Y-m-d H:i:s'),
			);
			try {
				$result = $client->sendEmail($request);
				$messageId = $result->get('MessageId');
				//echo("Email sent! Message ID: $messageId"."\n");
				if ($messageId) {
					$response['success'] = $this->lang->line('send_email_success');
					$response['errors'] = false;
					$data_recipient['sucess'] = '1';
					$data_recipient['error_msg'] = ''; //$e->getMessage(),
				} else {
					$response['errors'] = $this->lang->line('no_send_email');
				}

			} catch (Exception $e) {
				//echo("The email was not sent. Error message: ");
				//$response['errors'] = $e->getMessage()."\n";
				$response['errors'] = $this->lang->line('no_send_email');
				$data_recipient['sucess'] = '0';
				$data_recipient['error_msg'] = $e->getMessage();
			}
			$added_email_id = $this->ErpEmailModel->insertEmailData($data_recipient);
		}else{
			$response['errors'] = $this->lang->line('emails_limit_daily_msg');
		}
		return $response;
	}

	public function send(){
		
	}

	public function getTeachersList(){
		$teachers = $this->ProfesorModel->listTeachers($this->data['user_id']);
		print_r(json_encode($teachers));
		exit;
	}

	public function getSchoolUsers(){
		$this->load->model('UsuarioModel');
		$users = $this->UsuarioModel->get_active_users_for_select_msg();
		print_r(json_encode($users));
		exit;
	}

	public function readMessages(){
		$result = false;
		if ($this->input->post()) {
			$message_id = $this->input->post('message_id', true);
			$to_id = 	$this->data['user_id'];
			$user_role = '2';
			$result = $this->MensajeModel->updateRead($message_id, $to_id, $user_role, '1');
		}
		print_r(json_encode($result));
		exit;
	}

	public function deleteMessage(){
		if($this->input->is_ajax_request()) {
			$success = false;
			$user_id = $this->data['user_id'];
			$message_id = $this->input->post('message_id');
			if($user_id && $message_id){
				$success = $this->MensajeModel->deleteMessage($message_id);
			}
			echo json_encode(array('success' => $success));
			exit;
		}else{
			$this->layouts->view('error_404',$this->data, 'error_404');
		}
	}
}