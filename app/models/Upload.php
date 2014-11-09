<?php

class Upload extends Eloquent {
  protected $hidden = ['api_key_id'];

  public function apiKey() {
    return $this->belongsTo('ApiKey');
  }
}
