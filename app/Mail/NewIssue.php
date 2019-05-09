<?php

namespace Modules\IssueTracker\Emails;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use \Modules\IssueTracker\Entities\Issue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewIssue extends Mailable
{
    private $user;
    private $issue;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Issue $issue)
    {
        $this->issue = $issue; //informações do chamado
        $this->user = $user; //quem recebe o email
    }

    public function setIssue(Issue $issue)
    {
        $this->issue = $issue;
    }


    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject(sprintf("[%s] Novo chamado de %s", config('app.name'), $this->user->name));

        //formata prioridade
        return $this->markdown('issuetracker::email.new_issue', ['UserTo'=>$this->user, 'Issue'=>$this->issue]);
    }
}
