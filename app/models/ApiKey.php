<?php

class ApiKey extends Eloquent {
  public function uploads() {
    return $this->hasMany('Upload');
  }
}
