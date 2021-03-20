<?php

namespace App\Models;


/**
 * Class ApiDocsRecord
 * @package App\Models
 * @property int id 
 * @property int action 操作类型：1创建，2更新，3删除
 * @property string operator 操作人
 * @property string url 接口路径
 * @property string title 接口名称
 * @property string method 请求方式
 * @property string header header参数
 * @property string query query参数
 * @property string body body参数
 * @property string description 描述
 * @property string response 返回数据
 * @property datetime created_at 创建时间
 */
class ApiDocsRecord extends Model
{


       protected $table = 'api_docs_records';
       protected $fillable = [
           'action', 'operator', 'url', 'title', 'method', 'header', 'query', 'body', 'description', 'response', 'created_at'
       ];

}
