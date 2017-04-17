# 扇贝网的API封装

## 安装

 ```bash
 composer require cong5/shanbay-for-laravel5
 ```
 ## 配置
 
 找到 `config/app.php` 里面的 `providers` 数组， 加上一行 `cong5\shanbay\ShanbayServiceProvider::class`
 
 ## 发布配置文件
 
 执行 `php artisan vendor:publish`


## 使用

```php

//实例化
$shanbay = new Shanbay($app_key, $app_secret, $redirect_uri); 
//获取授权Web URL
$authUrl = $shanbay->getAuthUrl();
//拿到code后，使用code获取
$accessToken = $shanbay->getAccessToken($code);
//拿到AccessToken后，重新获取Shanbay实例
$shanbay = new Shanbay($app_key, $app_secret, $redirect_uri,$accessToken); 

```

## 函数列表

```php
 //笔记
$shanbay->getNote();//获取笔记
$shanbay->createNote();//创建笔记
$shanbay->deleteNote();//删除笔记
$shanbay->favoritesNote();//收藏笔记
//例句
$shanbay->getExample();//获取例句
$shanbay->createExample();//添加例句
$shanbay->favoritesExample();//收藏例句
$shanbay->deleteExample();//删除例句
//用户
$shanbay->getUserInfo();//获取用户信息
//单词
$shanbay->searchWord();//查询单词
$shanbay->addWord();//添加单词
$shanbay->forgetWord();//忘记单词
```

## 私有API调用

私有API调用是扇贝未开放的API,调用方式使用模拟登陆后进行调用

```php
//实例化
$shanbay = new PrivateShanbay();
//模拟登陆
$shanbay->login();
//获取每日单词学习状态
$shanbay->getState();
//获取打卡记录
$shanbay->getLastCheckIn();
```
