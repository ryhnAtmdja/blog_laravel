<?php

namespace App\Models;

class Blog
{
    private static $blogs_posts = [
        [
            "id" => 1,
            "title" => "Blog Pertama",
            "author" => "Joko",
            "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odit cum sapiente nihil veniam nostrum quibusdam vero voluptatum dolores laudantium fugiat doloribus veritatis eius laborum quae minus, molestiae nisi accusamus! Officiis mollitia necessitatibus iure fugit reiciendis consequuntur odit nisi vel ut cum autem perferendis dicta non ducimus nesciunt maiores, tenetur ab cumque nam inventore fuga libero laboriosam nemo. Iure sint iusto provident nihil similique eos ex, architecto aperiam voluptates debitis ipsam nulla laborum odio. Dolorum cumque error eos delectus porro."
        ],
        [
            "id" => 2,
            "title" => "Blog Kedua",
            "author" => "Hendra",
            "content" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem odit cum sapiente nihil veniam nostrum quibusdam vero voluptatum dolores laudantium fugiat doloribus veritatis eius laborum quae minus, molestiae nisi accusamus! Officiis mollitia necessitatibus iure fugit reiciendis consequuntur odit nisi vel ut cum autem perferendis dicta non ducimus nesciunt maiores, tenetur ab cumque nam inventore fuga libero laboriosam nemo. Iure sint iusto provident nihil similique eos ex, architecto aperiam voluptates debitis ipsam nulla laborum odio. Dolorum cumque error eos delectus porro."
        ],
    ];

    public static function getAll(){
        return collect(self::$blogs_posts);
    }

    public static function findById($id){
        $all_blogs_posts = static::getAll();
        return $all_blogs_posts->firstWhere("id", $id);
    }
}
