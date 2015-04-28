<?php
class areaManager{

	private $cityid_;
	private $areaid_;	
	private $areaName_;
	
	public function setCityId($val) {
		$this->cityid_ = $val;
	}

	public function getCityId() {
		return $this->cityid_;
	}

	public function setAreaId($val) {
		$this->areaid_ = $val;
	}

	public function getAreaId() {
		return $this->areaid_;
	}
	
	public function setAreaName($val) {
		$this->areaName_ = $val;
	}

	public function getAreaName() {
		return $this->areaName_;
	}

}

?>