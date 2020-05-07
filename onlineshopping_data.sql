/*
 Navicat Premium Data Transfer

 Source Server         : 本地数据库
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : onlineshopping

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 07/05/2020 14:20:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address`  (
  `add_id` int(11) NOT NULL COMMENT '地址id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '地址',
  `receiver` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '收件人',
  `tel` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '电话',
  `post` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '邮编',
  PRIMARY KEY (`add_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of address
-- ----------------------------

-- ----------------------------
-- Table structure for cate
-- ----------------------------
DROP TABLE IF EXISTS `cate`;
CREATE TABLE `cate`  (
  `cate_id` int(11) NOT NULL COMMENT '分类id',
  `cate_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '分类名',
  PRIMARY KEY (`cate_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cate
-- ----------------------------
INSERT INTO `cate` VALUES (1, '笔记本电脑');
INSERT INTO `cate` VALUES (2, '平板电脑');
INSERT INTO `cate` VALUES (3, '手机');
INSERT INTO `cate` VALUES (4, '配件');
INSERT INTO `cate` VALUES (5, '相机');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`  (
  `goods_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `goods_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '商品名',
  `cate_id` int(10) NULL DEFAULT NULL COMMENT '分类id',
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '品牌',
  `stock` int(11) NULL DEFAULT NULL COMMENT '库存',
  `max_price` decimal(10, 2) NOT NULL COMMENT '最高价格,默认显示最高价格',
  `min_price` decimal(10, 2) NULL DEFAULT NULL COMMENT '最低价格',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '描述',
  `is_hot` tinyint(1) NULL DEFAULT 0 COMMENT '是否热卖 0否 1是',
  `is_rec` tinyint(1) NULL DEFAULT 0 COMMENT '是否推荐 0否 1是',
  `is_up` tinyint(1) NULL DEFAULT 1 COMMENT '是否上架 0否 1是',
  `status` tinyint(1) NULL DEFAULT 0 COMMENT '是否放入回收站 0否 1是',
  PRIMARY KEY (`goods_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 100092 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES (100001, '华硕(ASUS) 天选 15.6英寸游戏笔记本电脑', 1, '华硕', NULL, 6099.00, NULL, '新锐龙 7nm 8核 R7-4800H 8G 512GSSD GTX1650Ti 4G 144Hz', 1, 1, 1, 0);
INSERT INTO `goods` VALUES (100002, '华为(HUAWEI)MateBook 13 2020款全面屏轻薄性能笔记本电脑', 1, '华为', NULL, 5999.00, NULL, '十代酷睿(i5 16G 512G MX250 触控屏 多屏协同)银', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100003, '荣耀MagicBook Pro 16.1英寸全面屏轻薄高性能笔记本电脑', 1, '华为', NULL, 4599.00, NULL, '标压锐龙R5 3550H 16G 512G 100%sRGB Win10 银', 1, NULL, 1, 0);
INSERT INTO `goods` VALUES (100004, '华为(HUAWEI)MateBook X Pro 2020款 13.9英寸超轻薄全面屏笔记本电脑', 1, '华为', NULL, 9999.00, NULL, '十代酷睿i7 16G+512G 独显 3K触控 粉', 1, 1, 1, 0);
INSERT INTO `goods` VALUES (100005, 'Apple iPad 平板电脑 2019年新款10.2英寸', 2, 'Apple', NULL, 2999.00, NULL, '128G WLAN版/iPadOS系统/Retina显示屏/MW792CH/A 金色', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100006, 'Apple iPad Air 3 2019年新款平板电脑 10.5英寸', 2, 'Apple', NULL, 3896.00, NULL, '64G WLAN版/A12芯片/Retina显示屏/MUUK2CH/A 银色', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100007, 'Apple iPad Pro 11英寸平板电脑 2020年新款', 2, 'Apple', NULL, 6229.00, NULL, '128G WLAN版/全面屏/A12Z/Face ID/MY232CH/A 深空灰色', 1, NULL, 1, 0);
INSERT INTO `goods` VALUES (100008, 'Apple Watch Series 5智能手表', 4, 'Apple', NULL, 3399.00, NULL, 'GPS款 44毫米深空灰色铝金属表壳 黑色运动型表带 MWVF2CH/A', 1, NULL, 1, 0);
INSERT INTO `goods` VALUES (100009, 'Apple 2020新款 MacBook Air 13.3', 1, 'Apple', NULL, 7999.00, NULL, 'Retina屏 十代i3 8G 256G SSD 银色 笔记本电脑 轻薄本', 0, 1, 1, 0);
INSERT INTO `goods` VALUES (100010, 'Apple 2019款 MacBook Pro 13.3【带触控栏】', 1, 'Apple', NULL, 11088.00, NULL, '八代i5 8G 256G RP645显卡 深空灰 笔记本电脑', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100011, '索尼（SONY）Alpha 6000L APS-C微单数码相机标准套装', 5, 'SONY', NULL, 3599.00, NULL, '黑色（约2430万有效像素 E PZ 16-50mm镜头 a6000）', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100012, '索尼（SONY）Alpha 7 II 全画幅微单数码相机 ', 5, 'SONY', NULL, 6999.00, NULL, '单机身(约2430万有效像素 1080P录像 wifi直连 a7M2/A72)', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100013, '索尼（SONY）Alpha 7R II 全画幅微单数码相机', 5, 'SONY', NULL, 9999.00, NULL, '单机身（约4240万有效像素 4K视频 5轴防抖 A7RM2/a7r2）', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100014, '索尼（SONY）Alpha 7 III 全画幅微单数码相机 SEL2470Z蔡司镜头套装', 5, 'SONY', NULL, 19299.00, NULL, '约2420万有效像素 5轴防抖 a7M3/A73', 1, 1, 1, 0);
INSERT INTO `goods` VALUES (100015, '佳能（Canon）EOS 800D 单反相机 单反机身 单反套机', 5, 'Canon', NULL, 4999.00, NULL, 'EF-S 18-55mm f/4-5.6 IS STM 单反镜头', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100016, '佳能（Canon）EOS 80D 单反相机 单反套机', 5, 'Canon', NULL, 8299.00, NULL, 'EF-S 18-200mm f/3.5-5.6 IS 单反镜头', 1, NULL, 1, 0);
INSERT INTO `goods` VALUES (100017, '佳能（Canon）EOS 6D Mark II 6D2 单反相机 单反套机', 5, 'Canon', NULL, 14499.00, NULL, '全画幅（EF 24-105mm f/4L IS II USM 单反镜头）', 0, 1, 1, 0);
INSERT INTO `goods` VALUES (100018, '佳能（Canon）EOS 90D 单反相机 单反套机', 5, 'Canon', NULL, 9699.00, NULL, 'EF-S 18-200mm f/3.5-5.6 IS 单反镜头', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100019, 'Beats Studio3 Wireless 录音师无线3', 4, 'Beats', NULL, 1748.00, NULL, '头戴式 蓝牙无线降噪耳机 游戏耳机 - 桀骜黑红（十周年版）', 1, NULL, 1, 0);
INSERT INTO `goods` VALUES (100020, 'Beats X 蓝牙无线 入耳式耳机', 4, 'Beats', NULL, 699.00, NULL, '带麦可通话 -桀骜黑红（十周年版）', 0, 1, 1, 0);
INSERT INTO `goods` VALUES (100021, 'Beats Powerbeats Pro', 4, 'Beats', NULL, 1698.00, NULL, '完全无线高性能耳机 真无线蓝牙运动耳机 象牙白', 1, NULL, 1, 0);
INSERT INTO `goods` VALUES (100022, '联想(Lenovo)拯救者Y7000P 英特尔酷睿i5 15.6英寸游戏笔记本电脑', 1, '联想(Lenovo)', NULL, 7299.00, NULL, 'i5-9300HF 16G 1TSSD GTX1660Ti 144Hz 竞技版', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100023, '联想(Lenovo)小新Air14 2020性能版 英特尔酷睿i5 全面屏独显轻薄笔记本电脑', 1, '联想(Lenovo)', NULL, 5499.00, NULL, 'i5 16G 512G MX350 100%sRGB 银', 1, NULL, 1, 0);
INSERT INTO `goods` VALUES (100024, '联想(Lenovo)YOGA S740 英特尔酷睿i7 14英寸超轻薄商务办公笔记本电脑', 1, '联想(Lenovo)', NULL, 6899.00, NULL, 'i7 16G 512G MX250独显 雷电3接口 灰', 1, 1, 1, 0);
INSERT INTO `goods` VALUES (100025, '联想(Lenovo)小新15 2020英特尔酷睿i7 15.6英寸全面屏独显轻薄笔记本电脑', 1, '联想(Lenovo)', NULL, 6499.00, NULL, '十代i7 16G 512G MX350高色域 银', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100026, '联想(Lenovo)小新Pro13 2020 英特尔酷睿i5高性能轻薄独显笔记本电脑', 1, '联想(Lenovo)', NULL, 6299.00, NULL, 'i5 16G 512G MX350 100%sRGB  沧海冰蓝', 0, 1, 1, 0);
INSERT INTO `goods` VALUES (100027, '联想(Lenovo)小新Pro13锐龙版 性能网课办公轻薄笔记本电脑', 1, '联想(Lenovo)', NULL, 4999.00, NULL, '标压R5-3550H 16G 512G 人脸识别 100%sRGB 银', 1, 1, 1, 0);
INSERT INTO `goods` VALUES (100028, '联想ThinkPad E14 十代英特尔酷睿i5/i7 14英寸商务办公轻薄笔记本电脑', 1, '联想ThinkPad', NULL, 6799.00, NULL, '十代i7 8G 512GSSD 独显 2LCD', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100029, '联想ThinkBook 14英特尔酷睿i5 14英寸轻薄笔记本电脑', 1, '联想ThinkPad', NULL, 4999.00, NULL, '十代酷睿i5 8G 512G傲腾增强型SSD 2G独显', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100030, 'Ins 15 35Work BtCIns 15 3580 20Q11W Microsoft 无Office', 1, '戴尔', 0, 2983.00, NULL, 'Celeron 4205U, 1TB HDD, 4GB', 0, 1, 1, 0);
INSERT INTO `goods` VALUES (100031, 'XPS 7390XPS 13 7390 20Q31', 1, '戴尔', 0, 10437.00, NULL, 'Core-i5, 256GB SSD, 8GB', 1, NULL, 1, 0);
INSERT INTO `goods` VALUES (100032, 'Ins 14 5490Ins 14 5490 20Q31S 1', 1, '戴尔', 0, 5017.00, NULL, 'Core i5, 256GB SSD, 8GB', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100033, 'Dell G5 15 5000 15.6 Inch FHD IPS Gaming Laptop - ( Black)', 1, '戴尔', 0, 7686.00, NULL, 'Intel Core i5-9300H, 8 GB RAM, 128 GB SSD + 1TB HDD', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100034, '	Ins 13 5391Ins 13 5391 20Q32S', 1, '戴尔', 0, 5704.00, NULL, 'Core i5, 256GB SSD, 8GB', 0, 1, 1, 0);
INSERT INTO `goods` VALUES (100035, 'Dell Inspiron 15 3567 FHD 笔记本电脑3585-4610', 1, '戴尔', 0, 3724.00, NULL, 'AMD Ryzen 5-2500U, 8 GB RAM 15.6 Inch', 1, NULL, 1, 0);
INSERT INTO `goods` VALUES (100036, 'Dell Inspiron 15 防眩光 LED 背光2019 笔记本电脑', 1, '戴尔', 0, 2236.00, NULL, 'J5MHN Intel Pentium Silver N5000, 4 GB 14.0 Inch', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100037, 'Dell Inspiron 3000 3185 11.6 英寸笔记本电脑 PC', 1, '戴尔', 0, 3805.00, NULL, 'AMD A6-9220e，4GB 内存，32GB EMMC 存储，灰色，Windows 10', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100038, 'G7 17 7790Dell G7 17 7790 20Q23 3', 1, '戴尔', 0, 11601.00, NULL, 'Core i7, RTX2060, 256GB+1TB, 16GB', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100039, '	Dell Inspiron 15 防眩光 LED 背光 2019 笔记本电脑Dell Inspiron 14 3493', 1, '戴尔', 0, 4076.00, NULL, 'Intel i5, 8 GB RAM 14 Inch', 0, 1, 1, 0);
INSERT INTO `goods` VALUES (100040, '	Dell Inspiron 5000 Full HD 笔记本电脑', 1, '戴尔', 0, 7710.00, NULL, 'Intel Core i7-10510U, 8 GB RAM 14 Inch	', 1, NULL, 1, 0);
INSERT INTO `goods` VALUES (100041, '戴尔Dell游戏笔记本电脑G7', 1, '戴尔', 0, 11055.00, NULL, 'Core i7, GTX1660Ti, 256GB+1TB, 16GB', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100042, 'Dell 笔记本电脑 Inspiron 15 5575Ins 15 5575 19Q33B Microsoft Office', 1, '戴尔', 0, 8145.00, NULL, 'AMD Ryzen 7, SSD512GB, 16GB', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100043, 'Dell Inspiron 15 防眩光 LED 背光 2019 笔记本电脑', 1, '戴尔', 0, 2599.00, NULL, 'Dell Inspiron 14 3493 Intel i3, 4 GB RAM 14 Inch', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100044, 'Ins 13 5391Ins 13 5391 20Q31S 1', 1, '戴尔', 0, 4782.00, NULL, 'Core i3, 128GB SSD, 4GB', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100045, 'Ins 13 5391Ins 13 5391 20Q33S 4', 1, '戴尔', 0, 7609.00, NULL, 'Core i7, 512GB SSD, 8GB, MX250', 1, 1, 1, 0);
INSERT INTO `goods` VALUES (100046, 'HP 笔记本电脑14-cm0042na A4', 1, '惠普', 0, 2006.00, NULL, ' 4 GB RAM, 64 GB eMMC 14 Inch', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100047, 'HP 惠普 17-by3235ng ( 17.3 英寸 / 高清 ) 笔记本电脑', 1, '惠普', 0, 3626.00, NULL, '英特尔酷睿 i3-1005G1 双 , 8GB DDR4 内存 , 512GB 固态硬盘 , 英特尔超高清显卡 G，Windows 10 ) 银色', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100048, 'HP Pavilion 15.6英寸FHD IPS触摸屏WLED背光笔记本电脑', 1, '惠普', 0, 6289.00, NULL, '英特尔四核i7-1065G7高达3.9GHz，12GB DDR4，1TB硬盘，背光键盘，网络摄像头，Windows 10带配件包15 1TB HDD', 0, 1, 1, 0);
INSERT INTO `goods` VALUES (100049, 'HP 惠普 Chromebook ( 12 英寸 / HD+ 触摸屏) 可转换笔记本电脑', 1, '惠普', 0, 2485.00, NULL, '银色12b-ca0000ng 12 Zoll HD+', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100050, 'HP 惠普 Pavilion （14 英寸 / 全高清）笔记本电脑', 1, '惠普', 0, 3905.00, NULL, '银色，指纹传感器14-ce3010ng Intel UHD Grafik mit Fingerabdrucksensor 256GB SSD + 16GB Intel Optane', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100051, '全新 2020 HP 15.6 英寸高清触摸屏笔记本电脑', 1, '惠普', 0, 6156.00, NULL, '英特尔酷睿 i7-1065G7 8GB DDR4 RAM 512GB SSD HDMI 802.11b/g/n/ac Windows 10 银色 15-dy1771ms', 1, NULL, 1, 0);
INSERT INTO `goods` VALUES (100052, 'HP X360 2019 Gemcut 笔记本电脑', 1, '惠普', 0, 10781.00, NULL, ' i7，16 GB RAM，512GB SSD，Windows 10，HDMI，USB C，触摸屏，B&O 扬声器，3 年 Mcafee 互联网*13TGEMCUT 1TB SSD | 16GB RAM | WINPRO', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100053, 'HP 惠普 Envy 17-cg0278ng 白色笔记本电脑', 1, '惠普', 0, 10424.00, NULL, '43.9厘米（17.3英寸）3840 x 2160 像素 英特尔® 酷睿TM i7 16 GB DDR4-SDRAM 1000 GB SSD NVIDIA GeForce MX330 Wi-Fi 6（802.11ax）Win 10 H', 0, 1, 1, 0);
INSERT INTO `goods` VALUES (100054, 'HP 惠普 Envy 17-cg0004ng 银色笔记本电脑', 1, '惠普', 0, 8468.00, NULL, '43.9厘米（17.3英寸）1920 x 1080 像素 英特尔®酷睿TM i7 16 GB DDR4-SDRAM 512 GB SSD NVIDIA GeForce MX330 Wi-Fi 6（802.11ax）Win 10 H', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100055, 'HP 惠普 EliteBook x360', 1, '惠普', 0, 11222.00, NULL, '1040 G5 Intel i7-8550U 35.6 厘米 14\" FHD BV UWVA AG 16GB 512GB/SSD UMA W10P', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100056, 'HP 惠普 250 G7 (15.6 英寸 / HD) 商务笔记本电脑', 1, '惠普', 0, 2796.00, NULL, '（英特尔奔腾 4417U，8 GB DDR4 内存，512 GB SDD，英特尔高清显卡，DVD刻录机，Windows 10 家庭版）银色', 1, NULL, 1, 0);
INSERT INTO `goods` VALUES (100057, 'HP 惠普 250 G7（15.6英寸 / FHD）商务笔记本电脑', 1, '惠普', 0, 3122.00, NULL, '英特尔酷睿i38130U，8GB DDR4 内存，128GB SDD，1TB 硬盘，英特尔高清显卡，DVD刻录机，Windows 10家庭版）银色', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100058, '	HP 惠普 14s-dq1014ns 14 英寸 FHD 笔记本电脑', 1, '惠普', 0, 3870.00, NULL, '英特尔酷睿 i7-1065G7，8 GB 内存，512 GB 固态硬盘，集成显卡，无操作系统） 灰色 – 西班牙 QWERTY 键盘', 0, 1, 1, 0);
INSERT INTO `goods` VALUES (100059, 'HP 惠普 Probook 470 G7 ( 17.3 英寸 / FHD ) 商务笔记本电脑', 1, '惠普', 0, 6552.00, NULL, '英特尔酷睿 i7-10510U，16GB DDR4 内存，256GB 固态硬盘，1TB 硬盘，英特尔超高清显卡620，Windows 10 Pro）银色', 0, NULL, 1, 0);
INSERT INTO `goods` VALUES (100060, 'HP 惠普 Probook 470 G7 ( 17.3 英寸 / FHD ) 商务笔记本电脑', 1, '惠普', 0, 6093.00, NULL, '英特尔i7-10510U , 8GB DDR4 内存 , 512GB 固态硬盘 , 1TB 硬盘 , 英特尔超高清显卡 620，Windows 10 Pro ) 银色', 1, 1, 1, 0);
INSERT INTO `goods` VALUES (100061, '华为 HUAWEI nova 7 Pro', 3, '华为', 0, 3699.00, 0.00, '3200万追焦双摄 50倍潜望式变焦四摄 5G SoC芯片 8GB+128GB 7号色全网通5G手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100062, '华为 HUAWEI P40', 3, '华为', 0, 4188.00, 0.00, '麒麟990 5G SoC芯片 5000万超感知徕卡三摄 30倍数字变焦 6GB+128GB亮黑色全网通5G手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100063, '华为 HUAWEI P40 Pro', 3, '华为', 0, 6488.00, 0.00, '麒麟990 5G SoC芯片 5000万超感知徕卡四摄 50倍数字变焦 8GB+256GB亮黑色全网通5G手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100064, '华为 HUAWEI nova 7 SE 5G', 3, '华为', 0, 2399.00, 0.00, '麒麟820 5G SoC芯片 6400万高清AI四摄 40W超级快充 8GB+128GB 幻夜黑全网通手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100065, '华为 HUAWEI Mate 30 5G', 3, '华为', 0, 4499.00, 0.00, '麒麟990 4000万超感光徕卡影像双超级快充8GB+128GB亮黑色5G全网通游戏手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100066, '华为 HUAWEI Mate 30 Pro 5G', 3, '华为', 0, 5899.00, 0.00, '麒麟990 OLED环幕屏双4000万徕卡电影四摄8GB+128GB亮黑色5G全网通游戏手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100067, '小米10', 3, '小米', 0, 4299.00, 0.00, '双模5G 骁龙865 1亿像素8K电影相机 对称式立体声 8GB+256GB 冰海蓝 拍照智能游戏手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100068, 'Redmi K30 Pro 5G先锋', 3, '小米 红米', 0, 3399.00, 0.00, '骁龙865旗舰处理器 弹出式超光感全面屏 索尼6400万高清四摄 4700mAh长续航 33W闪充 8GB+128GB 天际蓝 游戏智能手机 小米 红米', 1, 0, 0, 0);
INSERT INTO `goods` VALUES (100069, 'Redmi Note8', 3, '小米 红米', 0, 899.00, 0.00, '4800万全场景四摄 4000mAh长续航 高通骁龙665 18W快充 4GB+64GB 梦幻蓝 游戏手机 小米 红米', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100070, '小米10青春版', 3, '小米', 0, 2499.00, 0.00, '双模5G 骁龙765G 50倍潜望式变焦四摄 8GB+128GB 蓝莓薄荷游戏手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100071, '小米10 Pro', 3, '小米', 0, 4999.00, 0.00, '双模5G 骁龙865 1亿像素8K电影相机 50倍变焦 50W快充 8GB+256GB 珍珠白 拍照智能游戏手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100072, 'Apple iPhone SE (A2298)', 3, 'Apple', 0, 3799.00, 0.00, '128GB 黑色 移动联通电信4G手机', 1, 0, 0, 0);
INSERT INTO `goods` VALUES (100073, 'Apple iPhone XR (A2108)', 3, 'Apple', 0, 4299.00, 0.00, '64GB 黄色 移动联通电信4G手机 双卡双待', 1, 0, 0, 0);
INSERT INTO `goods` VALUES (100074, 'Apple iPhone XS Max (A2104)', 3, 'Apple', 0, 6099.00, 0.00, '64GB 银色 移动联通电信4G手机 双卡双待', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100075, 'Apple iPhone 11 (A2223)', 3, 'Apple', 0, 5499.00, 0.00, '64GB 紫色 移动联通电信4G手机 双卡双待', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100076, 'Apple iPhone 11 Pro (A2217)', 3, 'Apple', 0, 8699.00, 0.00, '64GB 金色 移动联通电信4G手机 双卡双待', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100077, 'Apple iPhone 11 Pro Max (A2220)', 3, 'Apple', 0, 9599.00, 0.00, '64GB 深空灰色 移动联通电信4G手机 双卡双待', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100078, '一加 OnePlus 8', 3, '一加', 0, 4599.00, 0.00, '5G旗舰 90Hz高清柔性屏 骁龙865 180g轻薄手感 12GB+256GB 黑镜 超清超广角拍照游戏手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100079, '一加 OnePlus 8 Pro', 3, '一加', 0, 5999.00, 0.00, '5G旗舰 2K+120Hz 柔性屏 30W无线闪充 骁龙865 12GB+256GB 青空 超清超广角拍照游戏手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100080, '一加 OnePlus 7T', 3, '一加', 0, 3199.00, 0.00, '90Hz流体屏 骁龙855Plus旗舰 4800万超广角三摄  8GB+256GB 冰际蓝 游戏手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100081, 'vivo X30 Pro 5G', 3, 'vivo', 0, 3698.00, 0.00, '秘银 8GB+128GB 双模5G 60倍变焦 50mm专业人像镜头 全网通智慧旗舰手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100082, 'vivo S6 5G手机', 3, 'vivo', 0, 2698.00, 0.00, '8GB+128GB 天鹅湖 前置3200万超清夜景自拍 4500mAh大电池 后置四摄 双模5G全网通手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100083, 'vivo NEX 3S', 3, 'vivo', 0, 5298.00, 0.00, '5G 12GB+256GB 深空流光 骁龙865 无界瀑布屏 6400万超高像素 双模5G全网通手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100084, 'vivo iQOO Neo3 5G', 3, 'vivo', 0, 2998.00, 0.00, '8GB+128GB 夜幕黑 高通骁龙865 144Hz竞速屏 立体双扬 44W闪充 双模5G全网通手机', 1, 0, 0, 0);
INSERT INTO `goods` VALUES (100085, 'vivo iQOO 3 5G', 3, 'vivo', 0, 3998.00, 0.00, '12GB+128GB 驭影黑 高通骁龙865 55W超快闪充 专业电竞游戏体验手机 双模5G全网通手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100086, 'OPPO Ace2 8+128', 3, 'oppo', 0, 3999.00, 0.00, '月岩灰双模5G 185g超薄机身 65W超级闪充 40W无线闪充 90Hz电竞屏高通骁龙865游戏智能手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100087, 'OPPO Find X2', 3, 'oppo', 0, 5499.00, 0.00, '超感官旗舰 3K分辨率 120Hz超感屏 多焦段影像系统 骁龙865 65w闪充 8GB+128GB碧波 双模5G手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100088, 'OPPO Reno3 Pro', 3, 'oppo', 0, 3699.00, 0.00, '双模5G 视频双防抖 90HZ高感曲面屏 7.7mm轻薄机身 8GB+128GB 日出印象 拍照游戏视频手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100089, 'OPPO Reno3', 3, 'oppo', 0, 2999.00, 0.00, '双模5G 6400万超清四摄 视频双防抖 7.96mm纤薄机身 8GB+128GB 蓝色星夜全网通拍照游戏视频手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100090, 'OPPO A91', 3, 'oppo', 0, 1799.00, 0.00, '8GB+128GB 暗夜星辰 4800万超清四摄 VOOC闪充3.0 光感屏幕指纹 全网通4G 全面屏拍照游戏智能手机', 0, 0, 0, 0);
INSERT INTO `goods` VALUES (100091, 'OPPO Reno2 Z', 3, 'oppo', 0, 2299.00, 0.00, '8G+128G 深海夜光 4800万夜拍四摄 VOOC闪充 炫彩升降 全网通4G 全面屏拍照游戏智能手机', 0, 0, 0, 0);

-- ----------------------------
-- Table structure for img
-- ----------------------------
DROP TABLE IF EXISTS `img`;
CREATE TABLE `img`  (
  `img_id` int(255) NOT NULL AUTO_INCREMENT COMMENT '图片id',
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '图片地址',
  `goods_id` int(10) NULL DEFAULT NULL COMMENT '商品id',
  `display` tinyint(1) NULL DEFAULT 1 COMMENT '是否显示，1显示，0不显示',
  PRIMARY KEY (`img_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 92 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of img
-- ----------------------------
INSERT INTO `img` VALUES (1, '6b8012b34efed0e2.jpg', 100001, 1);
INSERT INTO `img` VALUES (2, '24f4a923aa944527.jpg', 100002, 1);
INSERT INTO `img` VALUES (3, 'feb860a77684cb42.jpg', 100003, 1);
INSERT INTO `img` VALUES (4, 'bfc17fba9a7a3e99.jpg', 100004, 1);
INSERT INTO `img` VALUES (5, '61f65ac6aae3146b.jpg', 100005, 1);
INSERT INTO `img` VALUES (6, 'e6d026af43a69501.jpg', 100006, 1);
INSERT INTO `img` VALUES (7, '9845c5e15f40ec6b.jpg', 100007, 1);
INSERT INTO `img` VALUES (8, '0288f4cf3016e061.jpg', 100008, 1);
INSERT INTO `img` VALUES (9, '47ddde1012dd59de.jpg', 100009, 1);
INSERT INTO `img` VALUES (10, 'c39fe0cb7ab36c13.jpg', 100010, 1);
INSERT INTO `img` VALUES (11, '5add4ec7N4dc7fafe.jpg', 100011, 1);
INSERT INTO `img` VALUES (12, '5add567fN32ccc250.jpg', 100012, 1);
INSERT INTO `img` VALUES (13, '5add75c8N45d76e9a.jpg', 100013, 1);
INSERT INTO `img` VALUES (14, '044942f6d6e3b93a.jpg', 100014, 1);
INSERT INTO `img` VALUES (15, '58d49036N367570f7.jpg', 100015, 1);
INSERT INTO `img` VALUES (16, '56fc835dNe349b797.jpg', 100016, 1);
INSERT INTO `img` VALUES (17, '59755188N08ffd2e1.jpg', 100017, 1);
INSERT INTO `img` VALUES (18, 'fa6d76d4787e33bf.jpg', 100018, 1);
INSERT INTO `img` VALUES (19, '5b1a4881Ne532d9ac.jpg', 100019, 1);
INSERT INTO `img` VALUES (20, '50cb4e5ca4e77d9a.jpg', 100020, 1);
INSERT INTO `img` VALUES (21, '9e753ea9e3f3a771.jpg', 100021, 1);
INSERT INTO `img` VALUES (22, 'e4b42e8ccc95829d.jpg', 100022, 1);
INSERT INTO `img` VALUES (23, '14ae6bae4f0ceea4.jpg', 100023, 1);
INSERT INTO `img` VALUES (24, 'c3bb4ace3a6601f5.jpg', 100024, 1);
INSERT INTO `img` VALUES (25, '1781e4b7c279bbec.jpg', 100025, 1);
INSERT INTO `img` VALUES (26, '7174dd8bd11c711e.jpg', 100026, 1);
INSERT INTO `img` VALUES (27, '5b8d52046dead384.jpg', 100027, 1);
INSERT INTO `img` VALUES (28, '9b168a40e79a7569.jpg', 100028, 1);
INSERT INTO `img` VALUES (29, '622c3fb670cee4d9.jpg', 100029, 1);
INSERT INTO `img` VALUES (30, '81ALAgnc2ML._AC_UL320_.jpg', 100030, 1);
INSERT INTO `img` VALUES (31, '81MJAHRFM8L._AC_UL320_.jpg', 100031, 1);
INSERT INTO `img` VALUES (32, '81HeobmHIrL._AC_UL320_.jpg', 100032, 1);
INSERT INTO `img` VALUES (33, '81bRuoTwS6L._AC_UL320_.jpg', 100033, 1);
INSERT INTO `img` VALUES (34, '81tyr-nVHHL._AC_UL320_.jpg', 100034, 1);
INSERT INTO `img` VALUES (35, '81Af-EuFKLL._AC_UL320_.jpg', 100035, 1);
INSERT INTO `img` VALUES (36, '81YA8OyZEaL._AC_UL320_.jpg', 100036, 1);
INSERT INTO `img` VALUES (37, '61JeA02URhL._AC_UL320_.jpg', 100037, 1);
INSERT INTO `img` VALUES (38, '814UCu4WmOL._AC_UL320_.jpg', 100038, 1);
INSERT INTO `img` VALUES (39, '71qJQqM0sEL._AC_UL320_.jpg', 100039, 1);
INSERT INTO `img` VALUES (40, '81fDx3XDO5L._AC_UL320_.jpg', 100040, 1);
INSERT INTO `img` VALUES (41, '81lu9OTL2wL._AC_UL320_.jpg', 100041, 1);
INSERT INTO `img` VALUES (42, '71+u2fNDTUL._AC_UL320_.jpg', 100042, 1);
INSERT INTO `img` VALUES (43, '71qJQqM0sEL._AC_UL320_ (1).jpg', 100043, 1);
INSERT INTO `img` VALUES (44, '810CFWW5ZaL._AC_UL320_.jpg', 100044, 1);
INSERT INTO `img` VALUES (45, '81W7yb29pXL._AC_UL320_.jpg', 100045, 1);
INSERT INTO `img` VALUES (46, '815aI-tvFzL._AC_UL320_.jpg', 100046, 1);
INSERT INTO `img` VALUES (47, '815IM6RJ6TL._AC_UL320_.jpg', 100047, 1);
INSERT INTO `img` VALUES (48, '71BxDFgiZJL._AC_UL320_.jpg', 100048, 1);
INSERT INTO `img` VALUES (49, '91WpZBkPE4L._AC_UL320_.jpg', 100049, 1);
INSERT INTO `img` VALUES (50, '51u7+XaWPPL._AC_UL320_.jpg', 100050, 1);
INSERT INTO `img` VALUES (51, '812C6irNvRL._AC_UL320_.jpg', 100051, 1);
INSERT INTO `img` VALUES (52, '518BSOBDttL._AC_UL320_.jpg', 100052, 1);
INSERT INTO `img` VALUES (53, '81UF7Mpa+5L._AC_UL320_.jpg', 100053, 1);
INSERT INTO `img` VALUES (54, '81UF7Mpa+5L._AC_UL320_ (1).jpg', 100054, 1);
INSERT INTO `img` VALUES (55, '918k05jguKL._AC_UL320_.jpg', 100055, 1);
INSERT INTO `img` VALUES (56, '811VX2YhquL._AC_UL320_.jpg', 100056, 1);
INSERT INTO `img` VALUES (57, '811VX2YhquL._AC_UL320_ (1).jpg', 100057, 1);
INSERT INTO `img` VALUES (58, '61dhuVvizEL._AC_UL320_.jpg', 100058, 1);
INSERT INTO `img` VALUES (59, '81kC92ESTXL._AC_UL320_.jpg', 100059, 1);
INSERT INTO `img` VALUES (60, '81kC92ESTXL._AC_UL320_ (1).jpg', 100060, 1);
INSERT INTO `img` VALUES (61, 'c37ba01f324a30d7.jpg', 100061, 1);
INSERT INTO `img` VALUES (62, '857b2bdf4882dd6f.jpg', 100062, 1);
INSERT INTO `img` VALUES (63, 'c94ddcb77d9de42a.jpg', 100063, 1);
INSERT INTO `img` VALUES (64, '39bddf4c961567df.jpg', 100064, 1);
INSERT INTO `img` VALUES (65, '032be1072bde8b82.jpg', 100065, 1);
INSERT INTO `img` VALUES (66, 'fb1d346477700be8.jpg', 100066, 1);
INSERT INTO `img` VALUES (67, 'fa8dfc14fae937d8.jpg', 100067, 1);
INSERT INTO `img` VALUES (68, 'd05cb19409053b03.jpg', 100068, 1);
INSERT INTO `img` VALUES (69, '8af64bdb7bd8fd33.jpg', 100069, 1);
INSERT INTO `img` VALUES (70, '56f706d1b14cf36f.jpg', 100070, 1);
INSERT INTO `img` VALUES (71, '0cf6e05c9b7d4360.jpg', 100071, 1);
INSERT INTO `img` VALUES (72, 'cdab3422b2886eed.jpg', 100072, 1);
INSERT INTO `img` VALUES (73, '83d512f576675ad7.jpg', 100073, 1);
INSERT INTO `img` VALUES (74, 'c13c9b603ff5083d.jpg', 100074, 1);
INSERT INTO `img` VALUES (75, '6f80fa75e7fe2864.jpg', 100075, 1);
INSERT INTO `img` VALUES (76, '08919f815acbc696.jpg', 100076, 1);
INSERT INTO `img` VALUES (77, '0f5a8de2ce0c29ce.jpg', 100077, 1);
INSERT INTO `img` VALUES (78, '6b945c956d405676.jpg', 100078, 1);
INSERT INTO `img` VALUES (79, '396e3307b14e6a91.jpg', 100079, 1);
INSERT INTO `img` VALUES (80, '1ef00a067fe76605.jpg', 100080, 1);
INSERT INTO `img` VALUES (81, '75c3fbef0fc574a9.jpg', 100081, 1);
INSERT INTO `img` VALUES (82, '6a9efb6245562f64.jpg', 100082, 1);
INSERT INTO `img` VALUES (83, '35e49e1e9fdea370.jpg', 100083, 1);
INSERT INTO `img` VALUES (84, '5a9e4dad8e8c3952.jpg', 100084, 1);
INSERT INTO `img` VALUES (85, '20a7cdd6535c3793.jpg', 100085, 1);
INSERT INTO `img` VALUES (86, '8edf063ad1ea5e6c.jpg', 100086, 1);
INSERT INTO `img` VALUES (87, '57ee5fc4b688c336.jpg', 100087, 1);
INSERT INTO `img` VALUES (88, '3e8b564018e6b35d.jpg', 100088, 1);
INSERT INTO `img` VALUES (89, 'c31c93e52d265329.jpg', 100089, 1);
INSERT INTO `img` VALUES (90, '553da0b09f6a3a13.jpg', 100090, 1);
INSERT INTO `img` VALUES (91, 'f4b0dc1355ba8ae1.jpg', 100091, 1);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `orders_id` int(10) NOT NULL COMMENT '订单Id',
  `orders_price` decimal(10, 2) NOT NULL COMMENT '订单总金额',
  `goods_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '产品id，有多个逗号分隔',
  `goods_count` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '产品数量，有多个逗号分隔',
  `user_id` int(11) NOT NULL COMMENT '用户Id',
  `is_pay` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否已支付，0未，1已，下面同',
  `is_send` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否发送',
  `is_receive` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否收到',
  `is_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否放入回收站',
  PRIMARY KEY (`orders_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '用户名',
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '密码',
  `tel` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '电话',
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '邮箱',
  `sex` tinyint(1) NULL DEFAULT 0 COMMENT '性别 0保密 1男 2女',
  `age` int(3) NULL DEFAULT 0 COMMENT '年龄',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '状态 0为正常 1被禁',
  `power` tinyint(1) NOT NULL DEFAULT 0 COMMENT '权力 0普通用户 1管理员',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 100003 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (100001, 'test', '202CB962AC59075B964B07152D234B70', '13012345678', '123@qq.com', 1, 1, 1, 0);
INSERT INTO `users` VALUES (100002, 'teso', '202CB962AC59075B964B07152D234B70', '13012345670', '123', NULL, NULL, 1, 0);

SET FOREIGN_KEY_CHECKS = 1;
