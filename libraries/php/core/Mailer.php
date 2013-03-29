<?php

/**
 * This class provides several methods 
 * to send mail.
 */
class Mailer{

	var $senderName = '';
	var $senderMail = '';
	var $to = '';
	var $cc = '';
	var $bcc = '';
	var $subject = '';
	var $content = '';
	var $headers = '';
	var $attachContent = '';
	var $mimeBoundary = '';

	/**
	 * Constructor
	 * @param none
	 * @return
	 */
	public function __construct(){
		$this->message = '';
		$this->setMimeBoundary();
	}

	/**
	 * Set the FROM mail
	 * @param string $mail, string $name
	 * @return 
	 */
	public function setFrom($mail, $name = ""){
		$this->senderMail = $mail;
		$this->senderName = $name;
	}

	/**
	 * Set the TO mails
	 * @param string $to
	 * @return 
	 */
	public function setTo($to){
		$this->to = $to;
	}

	/**
	 * Set the CC mails
	 * @param string $cc
	 * @return 
	 */
	public function setCc($cc){
		$this->cc = $cc;
	}

	/**
	 * Set the BCC mails
	 * @param string $bcc
	 * @return 
	 */
	public function setBcc($bcc){
		$this->bcc = $bcc;
	}

	/**
	 * Set the subject of the mail
	 * @param string $subject
	 * @return 
	 */
	public function setSubject($subject){
		$this->subject = $subject;
	}

	/**
	 * Add the content of the mail
	 * @param string $content
	 * @return 
	 */
	public function setContent($content){
		$this->content = 'This is a multi-part message in MIME format.'."\n\n";
		$this->content .= '--'.$this->mimeBoundary."\n";
		$this->content .= 'Content-Type: text/html; charset="iso-8859-1"'."\r\n";
		$this->content .= 'Content-Transfer-Encoding: 8bit'."\r\n\n";
		$this->content .= $content."\n\n";
		$this->appendContent();
	}

	/**
	 * Gets the number of lines
	 * @param string $type, string $name, string $content, string $disposition
	 * @return
	 */
	public function attach($type, $name, $content, $disposition = "attachement"){
		$data = chunk_split(base64_encode(file_get_contents($content)));
		$this->content .= 'Content-Type: '.$type.'; name="'.$name.'"'."\r\n";
		$this->content .= 'Content-Transfer-Encoding: base64'."\r\n";
		$this->content .= 'Content-Disposition: '.$disposition.'; filename="'.$name.'"'."\r\n\n";
		$this->content .= $data."\n\n";
		$this->appendContent();
	}

	/**
	 * Define the random MimeBoundary
	 * @param none
	 * @return 
	 */
	private function setMimeBoundary(){
		$this->mimeBoundary = '-----='.md5(uniqid(mt_rand()));
	}

	/**
	 * Append the MimeBoundary after mail content
	 * @param none
	 * @return 
	 */
	private function appendContent(){
		$this->content .= '--'.$this->mimeBoundary."\n";
	}

	/**
	 * Build the header of the mail
	 * @param none
	 * @return 
	 */
	private function buildHeader(){

		if($this->senderName != ''){
			$this->headers = 'From: "'.$this->senderName.'" <'.$this->senderMail.'>'."\r\n";
		}
		else{
			$this->headers = 'From: '.$this->senderMail."\r\n";
		}
		$this->headers .= 'Return-Path: <'.$this->senderMail.'>'."\r\n";

		if($this->cc != ''){
			$this->headers .= 'cc: '.$this->cc."\r\n";
		}
		if($this->bcc != ''){
			$this->headers .= 'Bcc: '.$this->bcc."\r\n";
		}

		$this->headers .= 'MIME-Version: 1.0'."\r\n";
		$this->headers .= 'Content-Type: multipart/mixed; boundary="'.$this->mimeBoundary.'"'."\r\n\n";
	}

	/**
	 * Send the mail
	 * @param none
	 * @return bool 
	 */
	public function sendMail(){
		$this->buildHeader();
		return mail($this->to, $this->subject, $this->content, $this->headers);
	}

}

?>