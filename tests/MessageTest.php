<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Carbon\Carbon;

class MessageTest extends TestCase
{
    public function testPostMessage()
    {
        $thread = Thread::create(
            [
                'subject' => '这是主题',
            ]
        );

        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => 1, // message 的user id
                'body'      => '这是消息内容主体',
            ]
        );

        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => 1, // 发送者id
                'last_read' => Carbon::now(),
            ]
        );

        // Recipients
        $thread->addParticipant(2); // 接受者id

    }

    public function testUpdate()
    {

        $thread = Thread::findOrFail(1);

        // 先要将之前的接受者缓存
        $thread->activateAllParticipants();

        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => 1,
                'body'      => '这是追加内容',
            ]
        );

        // Add replier as a participant
        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id'   => 1,
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();

        // Recipients
        $thread->addParticipant([3,4]);

    }
}
