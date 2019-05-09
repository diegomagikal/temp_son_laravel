<?php

namespace Modules\IssueTracker\Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Mail;
use Modules\IssueTracker\Entities\Issue;
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

        Mail::assertSent(NewIssue::class, function($mail) {
            //$destinatario = (new User)->find(1)->first();
            //$issue = (new Issue)->find(1)->first();
            //$build = $mail->build();

            //return $build->hasTo($destinatario->email);
        });

    }
}
