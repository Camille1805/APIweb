<?php
/*
http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
[Informational 1xx]
100="Continue"
101="Switching Protocols"

[Successful 2xx]
200="OK"
201="Created"
202="Accepted"
203="Non-Authoritative Information"
204="No Content"
205="Reset Content"
206="Partial Content"

[Redirection 3xx]
300="Multiple Choices"
301="Moved Permanently"
302="Found"
303="See Other"
304="Not Modified"
305="Use Proxy"
306="(Unused)"
307="Temporary Redirect"

[Client Error 4xx]
400="Bad Request"
401="Unauthorized"
402="Payment Required"
403="Forbidden"
404="Not Found"
405="Method Not Allowed"
406="Not Acceptable"
407="Proxy Authentication Required"
408="Request Timeout"
409="Conflict"
410="Gone"
411="Length Required"
412="Precondition Failed"
413="Request Entity Too Large"
414="Request-URI Too Long"
415="Unsupported Media Type"
416="Requested Range Not Satisfiable"
417="Expectation Failed"

[Server Error 5xx]
500="Internal Server Error"
501="Not Implemented"
502="Bad Gateway"
503="Service Unavailable"
504="Gateway Timeout"
505="HTTP Version Not Supported"
*/
class RestCurlClient {
  public function __construct(){}
  public function get($url,$headerparams=null,$content=null,$urlparams=null){
    return $this->_callapi($url,'GET',$headerparams,$content,$urlparams);
  }
  public function post($url,$headerparams=null,$content){
    return $this->_callapi($url,'POST',$headerparams,$content);
  }
  public function put($url,$headerparams=null,$content){
    return $this->_callapi($url,'PUT',$headerparams,$content);
  }
  public function delete($url,$headerparams=null){
    return $this->_callapi($url,'DELETE',$headerparams);
  }
  private function _callapi($url,$method,$headerparams,$content=null,$urlparams=null){
    //Set headers
    $header = array('Content-Type: application/json');
    if(!is_null($headerparams)){
      foreach ($headerparams as $key => $value) {
        array_push($header,$key.': '.$value);
      }
    }
    if(!is_null($urlparams) && count($urlparams)){
      $url.='?';
      foreach ($urlparams as $key => $value) {
        $url.='&'.$key.'='.urlencode($value);
      }
    }
    //cURL manager creation
    $ch = curl_init($url);
    if (!$ch) {
      throw new Exception("Couldn't initialize a cURL handle",412);
    }
    //Set options
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    if (!is_null($content)) curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($content));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //Exécution
    $response_json = curl_exec($ch);
    //var_dump($response_json);die();
    if (empty($response_json)) {
      //An error happened ^^
      $error=curl_error($ch);
      curl_close($ch);
      throw new Exception('cURL Error: '.$error);
    } else {
      //HTTP Status check
      if (!curl_errno($ch)) {
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        switch ($http_code) {
          case 200:
            curl_close($ch);
            return json_decode($response_json);
            break;
          default:
            curl_close($ch);
            throw new Exception('Unexpected HTTP code: '.$http_code,$http_code);
        }
      }else{
        //Error Management
        $error=curl_error($ch);
        curl_close($ch); // close cURL handler
        throw new Exception('cURL Error '.$error.' - Response: '.$print_r($response_json));
      }
    }
  }
}
