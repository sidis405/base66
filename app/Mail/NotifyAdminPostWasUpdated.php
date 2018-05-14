<?php

namespace App\Mail;

use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyAdminPostWasUpdated extends Mailable
{
    public $admin;
    public $post;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param mixed $admin
     * @param mixed $post
     *
     * @return void
     */
    public function __construct(User $admin, Post $post)
    {
        //
        $this->admin = $admin;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('NOTICE: A post was updated. Please verify.')->markdown('emails.posts.admin-post-updated');
    }
}
