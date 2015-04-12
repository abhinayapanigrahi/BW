<?php

class userProfileManager{

	private $userid_;
	private $username_;
	private $password_;
	private $confpassword_;
	private $fullname_;
	private $address_;
	private $phone_;
	private $email_;
	private $doj_;
	private $profilepicture_;
	private $venderweb_;
	private $designationid_;
	private $authtoken_;
	private $isactive_;
	
	
	public function setUserId($val) {
		$this->userid_ = $val;
	}

	public function getUserId() {
		return $this->userid_;
	}
	
	public function setUserName($val) {
		$this->username_ = $val;
	}

	public function getUserName() {
		return $this->username_;
	}

	public function setPassword($val) {
		$this->password_ = $val;
	}

	public function getPassword() {
		return $this->password_;
	}
	
	public function setConfPassword($val) {
		$this->confpassword_ = $val;
	}

	public function getConfPassword() {
		return $this->confpassword_;
	}
	
	public function setFullName($val) {
		$this->fullname_ = $val;
	}

	public function getFullName() {
		return $this->fullname_;
	}
	
	public function setAddress($val) {
		$this->address_ = $val;
	}

	public function getAddress() {
		return $this->address_;
	}
	
	public function setPhone($val) {
		$this->phone_ = $val;
	}

	public function getPhone() {
		return $this->phone_;
	}
	
	public function setEmail($val) {
		$this->email_ = $val;
	}

	public function getEmail() {
		return $this->email_;
	}

	public function setDoj($val) {
		$this->doj_ = $val;
	}

	public function getDoj() {
		return $this->doj_;
	}
	
	public function setProfilePicture($val) {
		$this->profilepicture_ = $val;
	}

	public function getProfilePicture() {
		return $this->profilepicture_;
	}
	
	public function setVenderWeb($val) {
		$this->venderweb_ = $val;
	}

	public function getsetVenderWeb() {
		return $this->venderweb_;
	}
	
	public function setDesignationId($val) {
		$this->designationid_ = $val;
	}

	public function getDesignationId() {
		return $this->designationid_;
	}
	
	public function setAuthToken($val) {
		$this->authtoken_ = $val;
	}

	public function getAuthToken() {
		return $this->authtoken_;
	}
	
	public function setIsActive($val) {
		$this->isactive_ = $val;
	}

	public function getIsActive() {
		return $this->isactive_;
	}
}

?>