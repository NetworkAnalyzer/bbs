<?php

class PostCommentSeeder extends Seeder{

    public function run(){
        $content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。';

        for( $i = 1 ; $i <= 10 ; $i++) {
            $post = new Post;
            $post->content = $content;
            $post->save();
        }
    }
}