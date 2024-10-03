<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends Admin_Controller
{
    public $load;
    public $session;
    public $data;
    public $lang;
    public $signup_m;
    public $form_validation;
    public $input;
    public $recaptcha;
    public $usertype_m;
    public $user_m;
    public $loginlog_m;
    public $updatechecker;
    public $db;

    function __construct()
    {
        parent::__construct();
        $this->load->model("user_m");
        $this->load->model("usertype_m");
        $this->load->model("student_m");
        $this->load->model("loginlog_m");
        $this->load->helper('cookie');
        $this->load->library('updatechecker');
        $this->session->set_userdata($this->data["siteinfos"]->language);
        $language = $this->session->userdata('lang');
        $this->load->model('signup_m');
    }

    public function page()
    {
        $this->signup_m->signup();
        redirect(base_url("signup/index"));
    }

    public function check_referral_id($referral_id)
	{
		if (!empty($referral_id)) {
			// Check if the referral ID exists in the student table
			$this->db->where('referral_id', $referral_id);
			$query = $this->db->get('student');
			if ($query->num_rows() == 0) {
				$this->form_validation->set_message('check_referral_id', 'The {field} is not valid.');
				return false;
			}
		}

		return true;
	}

    protected function rules()
    {
        return [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|max_length[40]|is_unique[user.username]|xss_clean'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|is_unique[user.email]|xss_clean'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[6]|xss_clean'
            ],
            [
                'field' => 'confirm_password',
                'label' => 'Confirm Password',
                'rules' => 'trim|required|matches[password]|xss_clean'
            ],
            [
                'field' => 'first_name',
                'label' => 'First Name',
                'rules' => 'trim|required|xss_clean'
            ],
            [
                'field' => 'last_name',
                'label' => 'Last Name',
                'rules' => 'trim|xss_clean'
            ],
            [
				'field' => 'referred_by',
				'label' => 'Referral ID',
				'rules' => 'trim|callback_check_referral_id'
			],
           
        ];
    }

    protected function generateUniqueReferralID()
	{
		$this->load->model('student_m'); // Load the student model if not already loaded

		do {
			// Generate a random 6-digit number
			$referral_id = rand(100000, 999999);

			// Check if the referral ID is unique
			$existing = $this->student_m->get_single_student_details(array('referral_id' => $referral_id));
		} while ($existing); // If the referral ID exists, generate a new one

		return $referral_id;
	}

    public function index()
    {
        if ($this->data['siteinfos']->captcha_status == 0) {
            $this->load->library('recaptcha');
            $this->data['recaptcha'] = [
                'widget' => $this->recaptcha->getWidget(),
                'script' => $this->recaptcha->getScriptTag(),
            ];
        }

        if ($this->signin_m->loggedin() != FALSE) {
            redirect(base_url('dashboard/index'));
        }

        $this->data['form_validation'] = 'No';

        if ($_POST) {
            $this->_setCookie();

            $rules = $this->rules();
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == FALSE) {
                // Validation failed
                $this->data['form_validation'] = validation_errors();
                $this->data["subview"] = "signup/index";
                $this->load->view('_layout_signin', $this->data);
            } else {
                // Validation passed, proceed with registration


                $userData = [
                    'username' => $this->input->post('username'),
                    'referral_id' => $this->generateUniqueReferralID(),
                    'email' => $this->input->post('email'),
                    'password' => $this->student_m->hash($this->input->post("password")),
                    'name' => $this->input->post('first_name'),
                    'sex' => $this->input->post('gender'),
                    'dob' => $this->input->post('dob'),
                    'phone' => $this->input->post('phone'),
                    'last_name' => $this->input->post('last_name'),
                    'reffered_by' => $this->input->post("referred_by"),
                    'active' => 1,
                    'usertypeID' => 3,
                    'create_date' => date("Y-m-d"),
                    'createschoolyearID' => $this->data['siteinfos']->school_year,
                    'schoolyearID' => $this->data['siteinfos']->school_year,
                    'create_date' => date("Y-m-d h:i:s"),
                    'create_username' => $this->input->post('username'),
                ];

                // dd($userData);

                // Insert user data into the database
                $this->student_m->insert_student($userData);
				$studentID = $this->db->insert_id();

                // Check if the user was successfully inserted
                if ($studentID) {
                    // Perform login for the newly registered user
                    $signinManager = $this->_signInManager();
                    if ($signinManager['return']) {
                        redirect(base_url('dashboard/index'));
                    } else {
                        $this->data['form_validation'] = $signinManager['message'];
                        $this->data["subview"] = "signup/index";
                        $this->load->view('_layout_signin', $this->data);
                    }
                } else {
                    // Handle insertion failure
                    $this->data['form_validation'] = 'Failed to register. Please try again.';
                    $this->data["subview"] = "signup/index";
                    $this->load->view('_layout_signin', $this->data);
                }
            }
        } else {
            $this->data["subview"] = "signup/index";
            $this->load->view('_layout_signin', $this->data);
        }
    }

    private function _setCookie()
    {
        if ($this->input->post('remember')) {
            set_cookie('remember_username', $this->input->post('username'), time() + (86400 * 30));
            set_cookie('remember_password', $this->input->post('password'), time() + (86400 * 30));
        } else {
            delete_cookie('remember_username');
            delete_cookie('remember_password');
        }
    }

    private function _signInManager()
    {
        $verifyValidUser = true;
        $returnArray = [
            'return' => true,
            'message' => 'Success'
        ];
        $setting = $this->data['siteinfos'];
        $lang = $setting->language;
        $defaultSchoolYearID = $setting->school_year;
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->_userChecker($username, $password);
        $userID = inicompute($user) ? $user->userID : 0;
        $user = inicompute($user) ? $user->info : [];

        if (isset($setting->captcha_status) && $setting->captcha_status == 0) {
            $captchaResponse = $this->recaptcha->verifyResponse($this->input->post('g-recaptcha-response'));
        } else {
            $captchaResponse = ['success' => true];
        }

        if ($returnArray['return']) {
            if ($captchaResponse['success']) {
                if (inicompute($user)) {
                    $userType = $this->usertype_m->get_single_usertype(['usertypeID' => $user->usertypeID]);
                    if (inicompute($userType)) {
                        if ($user->active) {
                            $this->_loginLog($user->usertypeID, $userID);
                            $session = [
                                "loginuserID" => $userID,
                                "name" => $user->name,
                                "email" => $user->email,
                                "usertypeID" => $user->usertypeID,
                                'usertype' => $userType->usertype,
                                "username" => $user->username,
                                "photo" => $user->photo,
                                "lang" => $lang,
                                "defaultschoolyearID" => $defaultSchoolYearID,
                                "varifyvaliduser" => $verifyValidUser,
                                "loggedin" => true
                            ];

                            $this->session->set_userdata($session);
                            $returnArray = ['return' => true, 'message' => 'Success'];
                        } else {
                            $returnArray = ['return' => false, 'message' => 'You are blocked.'];
                        }
                    } else {
                        $returnArray = ['return' => false, 'message' => 'This user role does not exist.'];
                    }
                } else {
                    $returnArray = ['return' => false, 'message' => 'Incorrect Signin.'];
                }
            } else {
                $captchaResponseError = (is_array($captchaResponse['error-codes'])) ? $captchaResponse['error-codes'][0] : $captchaResponse['error-codes'];
                $returnArray = ['return' => false, 'message' => $captchaResponseError];
            }
        } else {
            $returnArray = ['return' => false, 'message' => $returnArray['message']];
        }

        return $returnArray;
    }

    private function _userChecker($username, $password)
    {
        $tables = [
            'student' => 'student',
            'parents' => 'parents',
            'teacher' => 'teacher',
            'user' => 'user',
            'systemadmin' => 'systemadmin'
        ];
        $userInfo = ['info' => [], 'userID' => 0, 'idName' => ''];
        foreach ($tables as $table) {
            $user = $this->user_m->get_user_table($table, $username, $password);
            if (inicompute($user)) {
                $id = $table . 'ID';
                $userInfo['info'] = $user;
                $userInfo['userID'] = $user->$id;
                $userInfo['idName'] = $table . 'ID';
                break; // Stop once the user is found
            }
        }
        return (object) $userInfo;
    }

    private function _loginLog($userTypeID, $userID)
    {
        $getPreviousData = $this->loginlog_m->get_single_loginlog([
            'userID' => $userID,
            'usertypeID' => $userTypeID,
            'ip' => $this->updatechecker->getUserIP(),
            'browser' => $this->updatechecker->getBrowser()->name,
            'logout' => null
        ]);

        if (inicompute($getPreviousData)) {
            $this->loginlog_m->update_loginlog(['logout' => ($getPreviousData->login + (60 * 5))], $getPreviousData->loginlogID);
        }

        $this->loginlog_m->insert_loginlog([
            'ip' => $this->updatechecker->getUserIP(),
            'browser' => $this->updatechecker->getBrowser()->name,
            'operatingsystem' => $this->updatechecker->getBrowser()->platform,
            'login' => strtotime(date('YmdHis')),
            'usertypeID' => $userTypeID,
            'userID' => $userID,
        ]);
    }
}
