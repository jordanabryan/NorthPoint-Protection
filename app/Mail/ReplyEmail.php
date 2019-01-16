<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class ReplyEmail extends Mailable
{
	use Queueable, SerializesModels;
	 
	/**
	 * The content object instance.
	 *
	 * @var content
	 */
	public $content;
 
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($content)
	{
		$this->content = $content;
	}
 
	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->from($this->content->senderEmail, $this->content->senderName)
			->view('mails/replyemail')
			->text('mails/replyemail_plain')
			->subject($this->content->subject);
	}
}