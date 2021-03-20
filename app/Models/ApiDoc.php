<?php

namespace App\Models;


/**
 * Class ApiDoc
 * @package App\Models
 * @property int id 
 * @property string creator 创建人
 * @property string title 接口名称
 * @property string method 请求方式
 * @property string header header参数
 * @property string query query参数
 * @property string body body参数
 * @property string url 接口路径
 * @property string description 描述
 * @property string response 返回数据
 * @property string editor 更新人
 * @property datetime created_at 
 * @property datetime updated_at 
 */
class ApiDoc extends Model
{


       protected $table = 'api_docs';
       protected $fillable = [
           'creator', 'title', 'method', 'header', 'query', 'body', 'url', 'description', 'response', 'editor', 'created_at', 'updated_at'
       ];

}
