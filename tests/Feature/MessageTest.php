<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Message;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function メッセージ一覧の表示(): void
    {
        // 事前情報としてメッセージ作成
        Message::create([ 'body' => 'Hello World' ]);
        Message::create([ 'body' => 'Hello Laravel' ]);
        
        // メッセージ一覧にリクエストを送信し、200（OK）が返る
        // メッセージ一覧にHello World、Hello Laravelが表示される
        $this->get('messages')
            ->assertOk()
            ->assertSeeInOrder([
                'Hello World',
                'Hello Laravel',
            ]);                
    }
}
