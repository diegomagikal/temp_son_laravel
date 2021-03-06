<?php

namespace Modules\IssueTracker\Tests\Feature;

use App\User;
use App\Issue;
use Tests\TestCase;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Mail;
use Modules\IssueTracker\Emails\NewIssue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\IssueTracker\Http\Controllers\IssueController;

class EmailTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEnviaEmailNovaIssueTest()
    {
        Mail::fake();

        $issue = (new Issue)->find(1)->first();
        $destinatario = (new User)->find(1)->first();

        Mail::assertSent(NewIssue::class, function($mail) use($destinatario, $issue) {
            $mail->setIssue($issue);
            $mail->setUser($destinatario);
            $build = $mail->build();

            //return $build->hasTo($destinatario->email);
        });

    }
}
