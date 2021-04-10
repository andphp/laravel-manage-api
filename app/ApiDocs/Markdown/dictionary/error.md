---
title: 数据字典-错误码
url_name: dictionary/error
sticky: 1
cover: false
date: 2021-04-08 19:48:47
categories: 
- 数据字典
- 错误码
---

### http状态码
|状态码|状态信息|
|--|--|
|0|成功|
|401|未授权|
|402|支付失败|
|403|禁止访问|
|404|访问失败|
|500|服务器错误|
|501|无法识别的请求|
|502|错误网关|
|503|服务不可用|
|504|服务超时|
|505|HTTP 版本不受支持|

### code码

|错误码|错误值|错误信息|
|--|--|--|
|0|SUCCESS|请求成功|
|9999|UNKNOWN_ERROR|未知错误|
|10000|INVALID_PARAMS|非法的请求参数|
|10001|INVALID_CLIENT|用户认证失败|
|10002|INVALID_GRANT|非法的授权信息|
|10003|INVALID_SCOPE|scope信息无效或超出范围|
|10004|EXPIRED_TOKEN|令牌已过期|
|10005|ACCESS_DENIED|没有权限,拒绝访问|
