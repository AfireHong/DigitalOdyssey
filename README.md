<!--
 * @Author: your name
 * @Date: 2020-05-12 09:47:55
 * @LastEditTime: 2020-06-06 10:02:20
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Javascriptd:\wwwroot\OnlineShoppingSystem\README.md
--> 
# DigitalOdyssey（数码商城）
 ____  _       _ _        _    ___      _                          
|  _ \(_) __ _(_) |_ __ _| |  / _ \  __| |_   _ ___ ___  ___ _   _ 
| | | | |/ _` | | __/ _` | | | | | |/ _` | | | / __/ __|/ _ \ | | |
| |_| | | (_| | | || (_| | | | |_| | (_| | |_| \__ \__ \  __/ |_| |
|____/|_|\__, |_|\__\__,_|_|  \___/ \__,_|\__, |___/___/\___|\__, |
         |___/                            |___/              |___/ 
         
## web后端开发技术大作业

## 项目人员

>  AfireHong,Eson,Joey,JonathanChuyan
>
> HNIE 软件工程1802

## DigitalOdyssey

DigitalOdyssey是一个网络数码商城，轻便快速，易于部署。基于php+mysql编写。目前实现了商品浏览，分类筛选，添加到购物车，提交订单，修改个人资料等功能。

## 项目演示地址

http://demo.afirehong.cn

## 部署说明

> 数据库配置文件为conn.php，部署前创建好名为onlineshopping的数据库，将整个项目文件放入网站根目录下。

> onlineshopping_stru.sql为数据表结构文件。

> onlineshopping_data.sql为数据表结构和数据。

> 由于本项目使用了google的reCAPTCHA，部署时请提前配置好reCAPTCHA（https://www.google.com/recaptcha）。

## 测试样例
* 前台登录(手机号：13012345678，密码：qwer1234)
* 后台登录(用户名:pmh，密码:qwer1234)，支持分类添加，用户和商品的添加，删除，修改状态。

## 其他说明
* 支付接口还未实现，所以只能弹窗支付二维码，点击支付后系统提供订单号

## 参考资料
* PHP和MySQL Web开发（原书第五版）
