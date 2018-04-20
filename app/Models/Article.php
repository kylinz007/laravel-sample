<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /*
    在该文件中，Eloquent Article 模型默认情况下会使用类的「下划线命名法」与「复数形式名称」来作为数据表的名称生成规则。如：
        Article 数据模型类对应 articles 表；
        User 数据模型类对应 users 表；
        BlogPost 数据模型类对应 blog_posts 表；
    因此 Eloquent 将会假设 Article 模型被存储记录在 articles 数据表中。如果你需要指定自己的数据表，则可以通过 table 属性来定义，如下：
    */
    protected $table = 'my_article'
}
