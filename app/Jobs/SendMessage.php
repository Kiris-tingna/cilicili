<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Carbon\Carbon;

class SendMessage extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $from;
    protected $tos;
    protected $subject;
    protected $body;

    /**
     * Create a new job instance.
     *
     * @param $from
     * @param $tos
     * @param $subject
     * @param $body
     */
    public function __construct($from, $tos, $subject, $body)
    {
        $this->from = $from;
        $this->tos = $tos;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $thread = Thread::create(
            [
                'subject' => $this->subject,
            ]
        );

        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => $this->from, // message 的user id
                'body'      => $this->body,
            ]
        );

        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => $this->from, // 发送者id
                'last_read' => Carbon::now(),
            ]
        );

        // Recipients
        $thread->addParticipant($this->tos); // 接受者id
    }
}
