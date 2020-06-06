<!--
 * @Author: your name
 * @Date: 2020-05-12 09:47:55
 * @LastEditTime: 2020-06-06 21:55:02
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \Javascriptd:\wwwroot\OnlineShoppingSystem\README.md
--> 
# DigitalOdyssey（数码商城）

## web后端开发技术大作业

## 项目人员

>  AfireHong,Eson,Joey,JonathanChuyan
>
> HNIE 软件工程18

## DigitalOdyssey

DigitalOdyssey是一个网络数码商城，轻便快速，易于部署。基于php+mysql编写。目前实现了商品浏览，分类筛选，添加到购物车，提交订单，修改个人资料等功能。

## 项目演示地址

> http://demo.afirehong.cn

## 项目地址

> https://github.com/AfireHong/DigitalOdyssey

## 部署说明

* 数据库配置文件为conn.php，部署前创建好名为onlineshopping的数据库，将整个项目文件放入网站根目录下。

* onlineshopping_stru.sql为数据表结构文件。

* onlineshopping_data.sql为数据表结构和数据。

* 由于本项目使用了google的reCAPTCHA，部署时请提前配置好reCAPTCHA（https://www.google.com/recaptcha）。

## 测试样例
* 前台登录(手机号：13012345678，密码：qwer1234)
* 后台登录在根目录后加admin(用户名:pmh，密码:qwer1234)，支持分类添加，用户和商品的添加，删除，修改状态。

## 使用说明
* 将项目部署好后进入主页，即可显示推荐商品和热门商品。右上角点击可以注册新账户，注册后登录。
* 在主页可以看到最近热门和商家推荐产品，在产品目录下可以点击筛选按钮通过分类筛选，同时实现了分页效果。
* 点击商品进入商品介绍页，可以添加进入购物车，购物车可以修改数量，右边的概览可以实时显示修改数量后的价格。
* 购物车提交订单后到订单确认页面，用户可选择收货地址，点击支付订单后跳转到支付页（目前没有做支付接口），支付完成后提供订单号。
* 在个人中心主页，可以看到自己的地址和订单状态，个人信息。
* 个人中心下拉框可以修改个人信息。
* 管理员入口为项目根目录后加admin,目前仅实现了商品的增删改，用户信息的增删改，分类的增删改。预计添加订单处理功能。

## 其他说明
* 支付接口还未实现，所以只能弹窗支付二维码，点击支付后系统提供订单号

## 参考资料
* PHP和MySQL Web开发（原书第五版）
