<?php 

	namespace content\config\conection;

	use config\settings\sysConfig as sysConfig;

	class database extends sysConfig{

		public $gestor;
		public $localhost;
		public $user;
		public $password;
		public $DataName;

		public function __construct(){

			$this->gestor = 'mysql';
			$this->localhost = parent::_BD_Server_();
			$this->user = parent::_User_();
			$this->password = parent::_Pass_();
			$this->DataName = parent::_DB_NAME_WEB_();

        }

        public function getGestor() { 
        return $this->gestor; }
        
        public function getLocalhost() { 
        return $this->localhost; }

        public function getUser() { 
        return $this->user; }

        public function getPassword() { 
        return $this->password; }

        public function getDataName() { 
        return $this->DataName; }

	}


?>