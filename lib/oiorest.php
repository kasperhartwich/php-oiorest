<?php
/*
 *  OIOREST
 *  http://geo.oiorest.dk
 *  https://github.com/kasperhartwich/php-oiorest
 */
Class Oiorest {
  public $url = null;
  public $parameters = array('maxantal');
  public $request = array();
  
  public function __set($name, $value) {
    if (in_array($name, $this->parameters)) {
      $this->request[$name] = $value;
    } else {
      throw new Exception("Parameter '" . $name . "' not allowed.");
    }
  }

  public function __get($name) {
    return array_key_exists($name, $this->request) ? $this->request[$name] : null;
  }
  
  function sendRequest() {
    $output = file_get_contents($this->url . '?' . http_build_query($this->request));
    return json_decode($output);
  }

}

Class Oiorest_Vejnavne extends Oiorest {
  public $url = 'http://geo.oiorest.dk/vejnavne.json';
  public $parameters = array('postnr','frapostnr','tilpostnr','kommunekode','vejnavn','vejkode','maxantal');
}