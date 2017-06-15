/*
Navicat MySQL Data Transfer

Source Server         : www.0315.com
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : yuesao

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-06-15 16:56:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ys_ad
-- ----------------------------
DROP TABLE IF EXISTS `ys_ad`;
CREATE TABLE `ys_ad` (
  `ad_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '广告id',
  `ad_name` varchar(255) NOT NULL COMMENT '广告名称',
  `ad_content` text COMMENT '广告内容',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  `images` varchar(255) DEFAULT NULL COMMENT '广告图片',
  `order` tinyint(4) DEFAULT NULL COMMENT '广告排序',
  PRIMARY KEY (`ad_id`),
  KEY `ad_name` (`ad_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_ad
-- ----------------------------

-- ----------------------------
-- Table structure for ys_article
-- ----------------------------
DROP TABLE IF EXISTS `ys_article`;
CREATE TABLE `ys_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章表',
  `content` varchar(255) DEFAULT NULL COMMENT '文章内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_article
-- ----------------------------

-- ----------------------------
-- Table structure for ys_asset
-- ----------------------------
DROP TABLE IF EXISTS `ys_asset`;
CREATE TABLE `ys_asset` (
  `aid` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户 id',
  `key` varchar(50) NOT NULL COMMENT '资源 key',
  `filename` varchar(50) DEFAULT NULL COMMENT '文件名',
  `filesize` int(11) DEFAULT NULL COMMENT '文件大小,单位Byte',
  `filepath` varchar(200) NOT NULL COMMENT '文件路径，相对于 upload 目录，可以为 url',
  `uploadtime` int(11) NOT NULL COMMENT '上传时间',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1：可用，0：删除，不可用',
  `meta` text COMMENT '其它详细信息，JSON格式',
  `suffix` varchar(50) DEFAULT NULL COMMENT '文件后缀名，不包括点',
  `download_times` int(11) NOT NULL DEFAULT '0' COMMENT '下载次数',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='资源表';

-- ----------------------------
-- Records of ys_asset
-- ----------------------------

-- ----------------------------
-- Table structure for ys_auth_access
-- ----------------------------
DROP TABLE IF EXISTS `ys_auth_access`;
CREATE TABLE `ys_auth_access` (
  `role_id` mediumint(8) unsigned NOT NULL COMMENT '角色',
  `rule_name` varchar(255) NOT NULL COMMENT '规则唯一英文标识,全小写',
  `type` varchar(30) DEFAULT NULL COMMENT '权限规则分类，请加应用前缀,如admin_',
  KEY `role_id` (`role_id`),
  KEY `rule_name` (`rule_name`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限授权表';

-- ----------------------------
-- Records of ys_auth_access
-- ----------------------------

-- ----------------------------
-- Table structure for ys_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `ys_auth_rule`;
CREATE TABLE `ys_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '规则所属module',
  `type` varchar(30) NOT NULL DEFAULT '1' COMMENT '权限规则分类，请加应用前缀,如admin_',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识,全小写',
  `param` varchar(255) DEFAULT NULL COMMENT '额外url参数',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  `condition` varchar(300) NOT NULL DEFAULT '' COMMENT '规则附加条件',
  PRIMARY KEY (`id`),
  KEY `module` (`module`,`status`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=176 DEFAULT CHARSET=utf8 COMMENT='权限规则表';

-- ----------------------------
-- Records of ys_auth_rule
-- ----------------------------
INSERT INTO `ys_auth_rule` VALUES ('1', 'Admin', 'admin_url', 'admin/content/default', null, '内容管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('2', 'Api', 'admin_url', 'api/guestbookadmin/index', null, '所有留言', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('3', 'Api', 'admin_url', 'api/guestbookadmin/delete', null, '删除网站留言', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('4', 'Comment', 'admin_url', 'comment/commentadmin/index', null, '评论管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('5', 'Comment', 'admin_url', 'comment/commentadmin/delete', null, '删除评论', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('6', 'Comment', 'admin_url', 'comment/commentadmin/check', null, '评论审核', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('7', 'Portal', 'admin_url', 'portal/adminpost/index', null, '文章管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('8', 'Portal', 'admin_url', 'portal/adminpost/listorders', null, '文章排序', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('9', 'Portal', 'admin_url', 'portal/adminpost/top', null, '文章置顶', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('10', 'Portal', 'admin_url', 'portal/adminpost/recommend', null, '文章推荐', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('11', 'Portal', 'admin_url', 'portal/adminpost/move', null, '批量移动', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('12', 'Portal', 'admin_url', 'portal/adminpost/check', null, '文章审核', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('13', 'Portal', 'admin_url', 'portal/adminpost/delete', null, '删除文章', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('14', 'Portal', 'admin_url', 'portal/adminpost/edit', null, '编辑文章', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('15', 'Portal', 'admin_url', 'portal/adminpost/edit_post', null, '提交编辑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('16', 'Portal', 'admin_url', 'portal/adminpost/add', null, '添加文章', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('17', 'Portal', 'admin_url', 'portal/adminpost/add_post', null, '提交添加', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('18', 'Portal', 'admin_url', 'portal/adminterm/index', null, '分类管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('19', 'Portal', 'admin_url', 'portal/adminterm/listorders', null, '文章分类排序', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('20', 'Portal', 'admin_url', 'portal/adminterm/delete', null, '删除分类', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('21', 'Portal', 'admin_url', 'portal/adminterm/edit', null, '编辑分类', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('22', 'Portal', 'admin_url', 'portal/adminterm/edit_post', null, '提交编辑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('23', 'Portal', 'admin_url', 'portal/adminterm/add', null, '添加分类', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('24', 'Portal', 'admin_url', 'portal/adminterm/add_post', null, '提交添加', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('25', 'Portal', 'admin_url', 'portal/adminpage/index', null, '页面管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('26', 'Portal', 'admin_url', 'portal/adminpage/listorders', null, '页面排序', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('27', 'Portal', 'admin_url', 'portal/adminpage/delete', null, '删除页面', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('28', 'Portal', 'admin_url', 'portal/adminpage/edit', null, '编辑页面', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('29', 'Portal', 'admin_url', 'portal/adminpage/edit_post', null, '提交编辑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('30', 'Portal', 'admin_url', 'portal/adminpage/add', null, '添加页面', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('31', 'Portal', 'admin_url', 'portal/adminpage/add_post', null, '提交添加', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('32', 'Admin', 'admin_url', 'admin/recycle/default', null, '回收站', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('33', 'Portal', 'admin_url', 'portal/adminpost/recyclebin', null, '文章回收', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('34', 'Portal', 'admin_url', 'portal/adminpost/restore', null, '文章还原', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('35', 'Portal', 'admin_url', 'portal/adminpost/clean', null, '彻底删除', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('36', 'Portal', 'admin_url', 'portal/adminpage/recyclebin', null, '页面回收', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('37', 'Portal', 'admin_url', 'portal/adminpage/clean', null, '彻底删除', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('38', 'Portal', 'admin_url', 'portal/adminpage/restore', null, '页面还原', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('39', 'Admin', 'admin_url', 'admin/extension/default', null, '扩展工具', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('40', 'Admin', 'admin_url', 'admin/backup/default', null, '备份管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('41', 'Admin', 'admin_url', 'admin/backup/restore', null, '数据还原', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('42', 'Admin', 'admin_url', 'admin/backup/index', null, '数据备份', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('43', 'Admin', 'admin_url', 'admin/backup/index_post', null, '提交数据备份', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('44', 'Admin', 'admin_url', 'admin/backup/download', null, '下载备份', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('45', 'Admin', 'admin_url', 'admin/backup/del_backup', null, '删除备份', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('46', 'Admin', 'admin_url', 'admin/backup/import', null, '数据备份导入', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('47', 'Admin', 'admin_url', 'admin/plugin/index', null, '插件管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('48', 'Admin', 'admin_url', 'admin/plugin/toggle', null, '插件启用切换', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('49', 'Admin', 'admin_url', 'admin/plugin/setting', null, '插件设置', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('50', 'Admin', 'admin_url', 'admin/plugin/setting_post', null, '插件设置提交', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('51', 'Admin', 'admin_url', 'admin/plugin/install', null, '插件安装', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('52', 'Admin', 'admin_url', 'admin/plugin/uninstall', null, '插件卸载', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('53', 'Admin', 'admin_url', 'admin/slide/default', null, '幻灯片', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('54', 'Admin', 'admin_url', 'admin/slide/index', null, '幻灯片管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('55', 'Admin', 'admin_url', 'admin/slide/listorders', null, '幻灯片排序', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('56', 'Admin', 'admin_url', 'admin/slide/toggle', null, '幻灯片显示切换', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('57', 'Admin', 'admin_url', 'admin/slide/delete', null, '删除幻灯片', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('58', 'Admin', 'admin_url', 'admin/slide/edit', null, '编辑幻灯片', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('59', 'Admin', 'admin_url', 'admin/slide/edit_post', null, '提交编辑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('60', 'Admin', 'admin_url', 'admin/slide/add', null, '添加幻灯片', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('61', 'Admin', 'admin_url', 'admin/slide/add_post', null, '提交添加', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('62', 'Admin', 'admin_url', 'admin/slidecat/index', null, '幻灯片分类', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('63', 'Admin', 'admin_url', 'admin/slidecat/delete', null, '删除分类', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('64', 'Admin', 'admin_url', 'admin/slidecat/edit', null, '编辑分类', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('65', 'Admin', 'admin_url', 'admin/slidecat/edit_post', null, '提交编辑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('66', 'Admin', 'admin_url', 'admin/slidecat/add', null, '添加分类', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('67', 'Admin', 'admin_url', 'admin/slidecat/add_post', null, '提交添加', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('68', 'Admin', 'admin_url', 'admin/ad/index', null, '网站广告', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('69', 'Admin', 'admin_url', 'admin/ad/toggle', null, '广告显示切换', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('70', 'Admin', 'admin_url', 'admin/ad/delete', null, '删除广告', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('71', 'Admin', 'admin_url', 'admin/ad/edit', null, '编辑广告', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('72', 'Admin', 'admin_url', 'admin/ad/edit_post', null, '提交编辑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('73', 'Admin', 'admin_url', 'admin/ad/add', null, '添加广告', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('74', 'Admin', 'admin_url', 'admin/ad/add_post', null, '提交添加', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('75', 'Admin', 'admin_url', 'admin/link/index', null, '友情链接', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('76', 'Admin', 'admin_url', 'admin/link/listorders', null, '友情链接排序', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('77', 'Admin', 'admin_url', 'admin/link/toggle', null, '友链显示切换', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('78', 'Admin', 'admin_url', 'admin/link/delete', null, '删除友情链接', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('79', 'Admin', 'admin_url', 'admin/link/edit', null, '编辑友情链接', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('80', 'Admin', 'admin_url', 'admin/link/edit_post', null, '提交编辑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('81', 'Admin', 'admin_url', 'admin/link/add', null, '添加友情链接', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('82', 'Admin', 'admin_url', 'admin/link/add_post', null, '提交添加', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('83', 'Api', 'admin_url', 'api/oauthadmin/setting', null, '第三方登陆', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('84', 'Api', 'admin_url', 'api/oauthadmin/setting_post', null, '提交设置', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('85', 'Admin', 'admin_url', 'admin/menu/default', null, '菜单管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('86', 'Admin', 'admin_url', 'admin/navcat/default1', null, '前台菜单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('87', 'Admin', 'admin_url', 'admin/nav/index', null, '菜单管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('88', 'Admin', 'admin_url', 'admin/nav/listorders', null, '前台导航排序', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('89', 'Admin', 'admin_url', 'admin/nav/delete', null, '删除菜单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('90', 'Admin', 'admin_url', 'admin/nav/edit', null, '编辑菜单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('91', 'Admin', 'admin_url', 'admin/nav/edit_post', null, '提交编辑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('92', 'Admin', 'admin_url', 'admin/nav/add', null, '添加菜单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('93', 'Admin', 'admin_url', 'admin/nav/add_post', null, '提交添加', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('94', 'Admin', 'admin_url', 'admin/navcat/index', null, '菜单分类', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('95', 'Admin', 'admin_url', 'admin/navcat/delete', null, '删除分类', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('96', 'Admin', 'admin_url', 'admin/navcat/edit', null, '编辑分类', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('97', 'Admin', 'admin_url', 'admin/navcat/edit_post', null, '提交编辑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('98', 'Admin', 'admin_url', 'admin/navcat/add', null, '添加分类', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('99', 'Admin', 'admin_url', 'admin/navcat/add_post', null, '提交添加', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('100', 'Admin', 'admin_url', 'admin/menu/index', null, '后台菜单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('101', 'Admin', 'admin_url', 'admin/menu/add', null, '添加菜单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('102', 'Admin', 'admin_url', 'admin/menu/add_post', null, '提交添加', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('103', 'Admin', 'admin_url', 'admin/menu/listorders', null, '后台菜单排序', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('104', 'Admin', 'admin_url', 'admin/menu/export_menu', null, '菜单备份', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('105', 'Admin', 'admin_url', 'admin/menu/edit', null, '编辑菜单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('106', 'Admin', 'admin_url', 'admin/menu/edit_post', null, '提交编辑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('107', 'Admin', 'admin_url', 'admin/menu/delete', null, '删除菜单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('108', 'Admin', 'admin_url', 'admin/menu/lists', null, '所有菜单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('109', 'Admin', 'admin_url', 'admin/setting/default', null, '设置', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('110', 'Admin', 'admin_url', 'admin/setting/userdefault', null, '个人信息', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('111', 'Admin', 'admin_url', 'admin/user/userinfo', null, '修改信息', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('112', 'Admin', 'admin_url', 'admin/user/userinfo_post', null, '修改信息提交', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('113', 'Admin', 'admin_url', 'admin/setting/password', null, '修改密码', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('114', 'Admin', 'admin_url', 'admin/setting/password_post', null, '提交修改', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('115', 'Admin', 'admin_url', 'admin/setting/site', null, '网站信息', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('116', 'Admin', 'admin_url', 'admin/setting/site_post', null, '提交修改', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('117', 'Admin', 'admin_url', 'admin/route/index', null, '路由列表', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('118', 'Admin', 'admin_url', 'admin/route/add', null, '路由添加', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('119', 'Admin', 'admin_url', 'admin/route/add_post', null, '路由添加提交', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('120', 'Admin', 'admin_url', 'admin/route/edit', null, '路由编辑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('121', 'Admin', 'admin_url', 'admin/route/edit_post', null, '路由编辑提交', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('122', 'Admin', 'admin_url', 'admin/route/delete', null, '路由删除', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('123', 'Admin', 'admin_url', 'admin/route/ban', null, '路由禁止', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('124', 'Admin', 'admin_url', 'admin/route/open', null, '路由启用', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('125', 'Admin', 'admin_url', 'admin/route/listorders', null, '路由排序', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('126', 'Admin', 'admin_url', 'admin/mailer/default', null, '邮箱配置', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('127', 'Admin', 'admin_url', 'admin/mailer/index', null, 'SMTP配置', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('128', 'Admin', 'admin_url', 'admin/mailer/index_post', null, '提交配置', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('129', 'Admin', 'admin_url', 'admin/mailer/active', null, '邮件模板', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('130', 'Admin', 'admin_url', 'admin/mailer/active_post', null, '提交模板', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('131', 'Admin', 'admin_url', 'admin/setting/clearcache', null, '清除缓存', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('132', 'User', 'admin_url', 'user/indexadmin/default', null, '用户管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('133', 'User', 'admin_url', 'user/indexadmin/default1', null, '用户组', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('134', 'User', 'admin_url', 'user/indexadmin/index', null, '本站用户', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('135', 'User', 'admin_url', 'user/indexadmin/ban', null, '拉黑会员', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('136', 'User', 'admin_url', 'user/indexadmin/cancelban', null, '启用会员', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('137', 'User', 'admin_url', 'user/oauthadmin/index', null, '第三方用户', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('138', 'User', 'admin_url', 'user/oauthadmin/delete', null, '第三方用户解绑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('139', 'User', 'admin_url', 'user/indexadmin/default3', null, '管理组', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('140', 'Admin', 'admin_url', 'admin/rbac/index', null, '角色管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('141', 'Admin', 'admin_url', 'admin/rbac/member', null, '成员管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('142', 'Admin', 'admin_url', 'admin/rbac/authorize', null, '权限设置', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('143', 'Admin', 'admin_url', 'admin/rbac/authorize_post', null, '提交设置', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('144', 'Admin', 'admin_url', 'admin/rbac/roleedit', null, '编辑角色', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('145', 'Admin', 'admin_url', 'admin/rbac/roleedit_post', null, '提交编辑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('146', 'Admin', 'admin_url', 'admin/rbac/roledelete', null, '删除角色', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('147', 'Admin', 'admin_url', 'admin/rbac/roleadd', null, '添加角色', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('148', 'Admin', 'admin_url', 'admin/rbac/roleadd_post', null, '提交添加', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('149', 'Admin', 'admin_url', 'admin/user/index', null, '管理员', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('150', 'Admin', 'admin_url', 'admin/user/delete', null, '删除管理员', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('151', 'Admin', 'admin_url', 'admin/user/edit', null, '管理员编辑', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('152', 'Admin', 'admin_url', 'admin/user/edit_post', null, '编辑提交', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('153', 'Admin', 'admin_url', 'admin/user/add', null, '管理员添加', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('154', 'Admin', 'admin_url', 'admin/user/add_post', null, '添加提交', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('155', 'Admin', 'admin_url', 'admin/plugin/update', null, '插件更新', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('156', 'Admin', 'admin_url', 'admin/storage/index', null, '文件存储', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('157', 'Admin', 'admin_url', 'admin/storage/setting_post', null, '文件存储设置提交', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('158', 'Admin', 'admin_url', 'admin/slide/ban', null, '禁用幻灯片', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('159', 'Admin', 'admin_url', 'admin/slide/cancelban', null, '启用幻灯片', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('160', 'Admin', 'admin_url', 'admin/user/ban', null, '禁用管理员', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('161', 'Admin', 'admin_url', 'admin/user/cancelban', null, '启用管理员', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('162', 'Yuesao', 'admin_url', 'yuesao/index/index', null, '月嫂管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('163', 'Order', 'admin_url', 'order/adminorder/index', null, '订单管理', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('164', 'Order', 'admin_url', 'order/adminorder/orderlist', null, '所有订单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('165', 'Order', 'admin_url', 'order/adminorder/depositlist', null, '待付定金订单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('166', 'Order', 'admin_url', 'order/adminorder/balancelist', null, '待付余款订单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('167', 'Order', 'admin_url', 'order/adminorder/evaluatelist', null, '待评价订单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('168', 'Order', 'admin_url', 'order/adminorder/finishlist', null, '已完成订单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('169', 'Order', 'admin_url', 'order/adminorder/closelist', null, '已关闭订单', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('170', 'wedwq', 'admin_url', 'wedwq/wea/fawd', null, '23ewqer', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('171', '大峡谷', 'admin_url', '大峡谷/消毒柜/东旭光电', null, '东旭光电', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('172', 'yt', 'admin_url', 'yt/jyg/jhg', null, 'tregr', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('173', 'Yuesao', 'admin_url', 'yuesao/yuesao/add', null, '添加月嫂', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('174', 'Yuesao', 'admin_url', 'yuesao/yuesao/ys_list', null, '月嫂列表', '1', '');
INSERT INTO `ys_auth_rule` VALUES ('175', 'Member', 'admin_url', 'member/member/index', null, '用户管理', '1', '');

-- ----------------------------
-- Table structure for ys_browsing_log
-- ----------------------------
DROP TABLE IF EXISTS `ys_browsing_log`;
CREATE TABLE `ys_browsing_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '浏览表',
  `user_id` int(11) DEFAULT NULL COMMENT '用户外键',
  `yuesao_id` int(11) DEFAULT NULL COMMENT '月嫂的外键',
  PRIMARY KEY (`id`),
  KEY `yuesao` (`yuesao_id`),
  KEY `user` (`user_id`),
  CONSTRAINT `ys_browsing_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `ys_users` (`id`) ON UPDATE SET NULL,
  CONSTRAINT `ys_browsing_log_ibfk_2` FOREIGN KEY (`yuesao_id`) REFERENCES `ys_yuesao` (`ys_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_browsing_log
-- ----------------------------

-- ----------------------------
-- Table structure for ys_characteristics
-- ----------------------------
DROP TABLE IF EXISTS `ys_characteristics`;
CREATE TABLE `ys_characteristics` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '月嫂特点',
  `name` varchar(255) DEFAULT NULL COMMENT '月嫂特点',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_characteristics
-- ----------------------------

-- ----------------------------
-- Table structure for ys_characteristics_xref
-- ----------------------------
DROP TABLE IF EXISTS `ys_characteristics_xref`;
CREATE TABLE `ys_characteristics_xref` (
  `yuesao_id` int(11) DEFAULT NULL,
  `yuesao_characteristics_id` int(11) DEFAULT NULL,
  KEY `yuesao_id` (`yuesao_id`),
  KEY `characteris_id` (`yuesao_characteristics_id`),
  CONSTRAINT `characteris_id` FOREIGN KEY (`yuesao_characteristics_id`) REFERENCES `ys_characteristics` (`id`) ON DELETE SET NULL,
  CONSTRAINT `yuesao_id` FOREIGN KEY (`yuesao_id`) REFERENCES `ys_yuesao` (`ys_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_characteristics_xref
-- ----------------------------

-- ----------------------------
-- Table structure for ys_comment
-- ----------------------------
DROP TABLE IF EXISTS `ys_comment`;
CREATE TABLE `ys_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '收藏表',
  `user_id` int(11) DEFAULT NULL COMMENT '用户外键',
  `yuesao_id` int(11) DEFAULT NULL COMMENT '月嫂的外键',
  `order_id` bigint(20) DEFAULT NULL,
  `comprehensive_score` float DEFAULT NULL COMMENT '综合评分',
  `skill_score` float DEFAULT NULL COMMENT '技能',
  `attitude_score` float DEFAULT NULL COMMENT '态度评分',
  `images` text COMMENT '图片(多图用分号分割)',
  `create_at` datetime DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL COMMENT '评价内容',
  PRIMARY KEY (`id`),
  KEY `yuesao` (`yuesao_id`),
  KEY `user` (`user_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `ys_order` (`order_id`),
  CONSTRAINT `ys_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `ys_users` (`id`) ON UPDATE SET NULL,
  CONSTRAINT `ys_comment_ibfk_2` FOREIGN KEY (`yuesao_id`) REFERENCES `ys_yuesao` (`ys_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_comment
-- ----------------------------
INSERT INTO `ys_comment` VALUES ('35', '2', '4', '201706091157134892', '4', '5', '2', '[{\"url\":\"default\\/20170609\\/593a2c2f920e3.jpg\"},{\"url\":\"default\\/20170609\\/593a2c2fbe3f5.jpg\"},{\"url\":\"default\\/20170609\\/593a2c2fce5c9.jpg\"},{\"url\":\"default\\/20170609\\/593a2c2fdc08c.jpg\"},{\"url\":\"default\\/20170609\\/593a2c2feb2c0.jpg\"}]', '2017-06-09 13:03:51', '2101');

-- ----------------------------
-- Table structure for ys_comments
-- ----------------------------
DROP TABLE IF EXISTS `ys_comments`;
CREATE TABLE `ys_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_table` varchar(100) NOT NULL COMMENT '评论内容所在表，不带表前缀',
  `post_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '评论内容 id',
  `url` varchar(255) DEFAULT NULL COMMENT '原文地址',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '发表评论的用户id',
  `to_uid` int(11) NOT NULL DEFAULT '0' COMMENT '被评论的用户id',
  `full_name` varchar(50) DEFAULT NULL COMMENT '评论者昵称',
  `email` varchar(255) DEFAULT NULL COMMENT '评论者邮箱',
  `createtime` datetime NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '评论时间',
  `content` text NOT NULL COMMENT '评论内容',
  `type` smallint(1) NOT NULL DEFAULT '1' COMMENT '评论类型；1实名评论',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '被回复的评论id',
  `path` varchar(500) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '状态，1已审核，0未审核',
  PRIMARY KEY (`id`),
  KEY `comment_post_ID` (`post_id`),
  KEY `comment_approved_date_gmt` (`status`),
  KEY `comment_parent` (`parentid`),
  KEY `table_id_status` (`post_table`,`post_id`,`status`),
  KEY `createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表';

-- ----------------------------
-- Records of ys_comments
-- ----------------------------

-- ----------------------------
-- Table structure for ys_common_action_log
-- ----------------------------
DROP TABLE IF EXISTS `ys_common_action_log`;
CREATE TABLE `ys_common_action_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` bigint(20) DEFAULT '0' COMMENT '用户id',
  `object` varchar(100) DEFAULT NULL COMMENT '访问对象的id,格式：不带前缀的表名+id;如posts1表示xx_posts表里id为1的记录',
  `action` varchar(50) DEFAULT NULL COMMENT '操作名称；格式规定为：应用名+控制器+操作名；也可自己定义格式只要不发生冲突且惟一；',
  `count` int(11) DEFAULT '0' COMMENT '访问次数',
  `last_time` int(11) DEFAULT '0' COMMENT '最后访问的时间戳',
  `ip` varchar(15) DEFAULT NULL COMMENT '访问者最后访问ip',
  PRIMARY KEY (`id`),
  KEY `user_object_action` (`user`,`object`,`action`),
  KEY `user_object_action_ip` (`user`,`object`,`action`,`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='访问记录表';

-- ----------------------------
-- Records of ys_common_action_log
-- ----------------------------

-- ----------------------------
-- Table structure for ys_favorite
-- ----------------------------
DROP TABLE IF EXISTS `ys_favorite`;
CREATE TABLE `ys_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '收藏表',
  `user_id` int(11) DEFAULT NULL COMMENT '用户外键',
  `yuesao_id` int(11) DEFAULT NULL COMMENT '月嫂的外键',
  PRIMARY KEY (`id`),
  KEY `yuesao` (`yuesao_id`),
  KEY `user` (`user_id`),
  CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `ys_users` (`id`) ON UPDATE SET NULL,
  CONSTRAINT `yuesao` FOREIGN KEY (`yuesao_id`) REFERENCES `ys_yuesao` (`ys_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_favorite
-- ----------------------------
INSERT INTO `ys_favorite` VALUES ('2', '3', '4');
INSERT INTO `ys_favorite` VALUES ('7', '2', '4');
INSERT INTO `ys_favorite` VALUES ('8', '2', '1');
INSERT INTO `ys_favorite` VALUES ('9', '2', '4');
INSERT INTO `ys_favorite` VALUES ('10', '2', '4');
INSERT INTO `ys_favorite` VALUES ('11', '2', '4');
INSERT INTO `ys_favorite` VALUES ('12', '2', '4');
INSERT INTO `ys_favorite` VALUES ('13', '2', '4');
INSERT INTO `ys_favorite` VALUES ('14', '2', '4');
INSERT INTO `ys_favorite` VALUES ('15', '2', '4');
INSERT INTO `ys_favorite` VALUES ('16', '2', '4');
INSERT INTO `ys_favorite` VALUES ('17', '2', '4');

-- ----------------------------
-- Table structure for ys_guestbook
-- ----------------------------
DROP TABLE IF EXISTS `ys_guestbook`;
CREATE TABLE `ys_guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL COMMENT '留言者姓名',
  `email` varchar(100) NOT NULL COMMENT '留言者邮箱',
  `title` varchar(255) DEFAULT NULL COMMENT '留言标题',
  `msg` text NOT NULL COMMENT '留言内容',
  `createtime` datetime NOT NULL COMMENT '留言时间',
  `status` smallint(2) NOT NULL DEFAULT '1' COMMENT '留言状态，1：正常，0：删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='留言表';

-- ----------------------------
-- Records of ys_guestbook
-- ----------------------------

-- ----------------------------
-- Table structure for ys_links
-- ----------------------------
DROP TABLE IF EXISTS `ys_links`;
CREATE TABLE `ys_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL COMMENT '友情链接地址',
  `link_name` varchar(255) NOT NULL COMMENT '友情链接名称',
  `link_image` varchar(255) DEFAULT NULL COMMENT '友情链接图标',
  `link_target` varchar(25) NOT NULL DEFAULT '_blank' COMMENT '友情链接打开方式',
  `link_description` text NOT NULL COMMENT '友情链接描述',
  `link_status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  `link_rating` int(11) NOT NULL DEFAULT '0' COMMENT '友情链接评级',
  `link_rel` varchar(255) DEFAULT NULL COMMENT '链接与网站的关系',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of ys_links
-- ----------------------------
INSERT INTO `ys_links` VALUES ('1', 'http://www.thinkcmf.com', 'ThinkCMF', '', '_blank', '', '1', '0', '', '0');

-- ----------------------------
-- Table structure for ys_menu
-- ----------------------------
DROP TABLE IF EXISTS `ys_menu`;
CREATE TABLE `ys_menu` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `app` char(20) NOT NULL COMMENT '应用名称app',
  `model` char(20) NOT NULL COMMENT '控制器',
  `action` char(20) NOT NULL COMMENT '操作名称',
  `data` char(50) NOT NULL COMMENT '额外参数',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '菜单类型  1：权限认证+菜单；0：只作为菜单',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态，1显示，0不显示',
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `icon` varchar(50) DEFAULT NULL COMMENT '菜单图标',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序ID',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `parentid` (`parentid`),
  KEY `model` (`model`)
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

-- ----------------------------
-- Records of ys_menu
-- ----------------------------
INSERT INTO `ys_menu` VALUES ('1', '0', 'Admin', 'Content', 'default', '', '0', '1', '内容管理', 'th', '', '30');
INSERT INTO `ys_menu` VALUES ('2', '1', 'Api', 'Guestbookadmin', 'index', '', '1', '1', '所有留言', '', '', '0');
INSERT INTO `ys_menu` VALUES ('3', '2', 'Api', 'Guestbookadmin', 'delete', '', '1', '0', '删除网站留言', '', '', '0');
INSERT INTO `ys_menu` VALUES ('4', '1', 'Comment', 'Commentadmin', 'index', '', '1', '1', '评论管理', '', '', '0');
INSERT INTO `ys_menu` VALUES ('5', '4', 'Comment', 'Commentadmin', 'delete', '', '1', '0', '删除评论', '', '', '0');
INSERT INTO `ys_menu` VALUES ('6', '4', 'Comment', 'Commentadmin', 'check', '', '1', '0', '评论审核', '', '', '0');
INSERT INTO `ys_menu` VALUES ('7', '1', 'Portal', 'AdminPost', 'index', '', '1', '1', '文章管理', '', '', '1');
INSERT INTO `ys_menu` VALUES ('8', '7', 'Portal', 'AdminPost', 'listorders', '', '1', '0', '文章排序', '', '', '0');
INSERT INTO `ys_menu` VALUES ('9', '7', 'Portal', 'AdminPost', 'top', '', '1', '0', '文章置顶', '', '', '0');
INSERT INTO `ys_menu` VALUES ('10', '7', 'Portal', 'AdminPost', 'recommend', '', '1', '0', '文章推荐', '', '', '0');
INSERT INTO `ys_menu` VALUES ('11', '7', 'Portal', 'AdminPost', 'move', '', '1', '0', '批量移动', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('12', '7', 'Portal', 'AdminPost', 'check', '', '1', '0', '文章审核', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('13', '7', 'Portal', 'AdminPost', 'delete', '', '1', '0', '删除文章', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('14', '7', 'Portal', 'AdminPost', 'edit', '', '1', '0', '编辑文章', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('15', '14', 'Portal', 'AdminPost', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `ys_menu` VALUES ('16', '7', 'Portal', 'AdminPost', 'add', '', '1', '0', '添加文章', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('17', '16', 'Portal', 'AdminPost', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `ys_menu` VALUES ('18', '1', 'Portal', 'AdminTerm', 'index', '', '0', '1', '分类管理', '', '', '2');
INSERT INTO `ys_menu` VALUES ('19', '18', 'Portal', 'AdminTerm', 'listorders', '', '1', '0', '文章分类排序', '', '', '0');
INSERT INTO `ys_menu` VALUES ('20', '18', 'Portal', 'AdminTerm', 'delete', '', '1', '0', '删除分类', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('21', '18', 'Portal', 'AdminTerm', 'edit', '', '1', '0', '编辑分类', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('22', '21', 'Portal', 'AdminTerm', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `ys_menu` VALUES ('23', '18', 'Portal', 'AdminTerm', 'add', '', '1', '0', '添加分类', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('24', '23', 'Portal', 'AdminTerm', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `ys_menu` VALUES ('25', '1', 'Portal', 'AdminPage', 'index', '', '1', '1', '页面管理', '', '', '3');
INSERT INTO `ys_menu` VALUES ('26', '25', 'Portal', 'AdminPage', 'listorders', '', '1', '0', '页面排序', '', '', '0');
INSERT INTO `ys_menu` VALUES ('27', '25', 'Portal', 'AdminPage', 'delete', '', '1', '0', '删除页面', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('28', '25', 'Portal', 'AdminPage', 'edit', '', '1', '0', '编辑页面', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('29', '28', 'Portal', 'AdminPage', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `ys_menu` VALUES ('30', '25', 'Portal', 'AdminPage', 'add', '', '1', '0', '添加页面', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('31', '30', 'Portal', 'AdminPage', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `ys_menu` VALUES ('32', '1', 'Admin', 'Recycle', 'default', '', '1', '1', '回收站', '', '', '4');
INSERT INTO `ys_menu` VALUES ('33', '32', 'Portal', 'AdminPost', 'recyclebin', '', '1', '1', '文章回收', '', '', '0');
INSERT INTO `ys_menu` VALUES ('34', '33', 'Portal', 'AdminPost', 'restore', '', '1', '0', '文章还原', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('35', '33', 'Portal', 'AdminPost', 'clean', '', '1', '0', '彻底删除', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('36', '32', 'Portal', 'AdminPage', 'recyclebin', '', '1', '1', '页面回收', '', '', '1');
INSERT INTO `ys_menu` VALUES ('37', '36', 'Portal', 'AdminPage', 'clean', '', '1', '0', '彻底删除', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('38', '36', 'Portal', 'AdminPage', 'restore', '', '1', '0', '页面还原', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('39', '0', 'Admin', 'Extension', 'default', '', '0', '1', '扩展工具', 'cloud', '', '40');
INSERT INTO `ys_menu` VALUES ('40', '39', 'Admin', 'Backup', 'default', '', '1', '1', '备份管理', '', '', '0');
INSERT INTO `ys_menu` VALUES ('41', '40', 'Admin', 'Backup', 'restore', '', '1', '1', '数据还原', '', '', '0');
INSERT INTO `ys_menu` VALUES ('42', '40', 'Admin', 'Backup', 'index', '', '1', '1', '数据备份', '', '', '0');
INSERT INTO `ys_menu` VALUES ('43', '42', 'Admin', 'Backup', 'index_post', '', '1', '0', '提交数据备份', '', '', '0');
INSERT INTO `ys_menu` VALUES ('44', '40', 'Admin', 'Backup', 'download', '', '1', '0', '下载备份', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('45', '40', 'Admin', 'Backup', 'del_backup', '', '1', '0', '删除备份', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('46', '40', 'Admin', 'Backup', 'import', '', '1', '0', '数据备份导入', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('47', '39', 'Admin', 'Plugin', 'index', '', '1', '1', '插件管理', '', '', '0');
INSERT INTO `ys_menu` VALUES ('48', '47', 'Admin', 'Plugin', 'toggle', '', '1', '0', '插件启用切换', '', '', '0');
INSERT INTO `ys_menu` VALUES ('49', '47', 'Admin', 'Plugin', 'setting', '', '1', '0', '插件设置', '', '', '0');
INSERT INTO `ys_menu` VALUES ('50', '49', 'Admin', 'Plugin', 'setting_post', '', '1', '0', '插件设置提交', '', '', '0');
INSERT INTO `ys_menu` VALUES ('51', '47', 'Admin', 'Plugin', 'install', '', '1', '0', '插件安装', '', '', '0');
INSERT INTO `ys_menu` VALUES ('52', '47', 'Admin', 'Plugin', 'uninstall', '', '1', '0', '插件卸载', '', '', '0');
INSERT INTO `ys_menu` VALUES ('53', '39', 'Admin', 'Slide', 'default', '', '1', '1', '幻灯片', '', '', '1');
INSERT INTO `ys_menu` VALUES ('54', '53', 'Admin', 'Slide', 'index', '', '1', '1', '幻灯片管理', '', '', '0');
INSERT INTO `ys_menu` VALUES ('55', '54', 'Admin', 'Slide', 'listorders', '', '1', '0', '幻灯片排序', '', '', '0');
INSERT INTO `ys_menu` VALUES ('56', '54', 'Admin', 'Slide', 'toggle', '', '1', '0', '幻灯片显示切换', '', '', '0');
INSERT INTO `ys_menu` VALUES ('57', '54', 'Admin', 'Slide', 'delete', '', '1', '0', '删除幻灯片', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('58', '54', 'Admin', 'Slide', 'edit', '', '1', '0', '编辑幻灯片', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('59', '58', 'Admin', 'Slide', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `ys_menu` VALUES ('60', '54', 'Admin', 'Slide', 'add', '', '1', '0', '添加幻灯片', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('61', '60', 'Admin', 'Slide', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `ys_menu` VALUES ('62', '53', 'Admin', 'Slidecat', 'index', '', '1', '1', '幻灯片分类', '', '', '0');
INSERT INTO `ys_menu` VALUES ('63', '62', 'Admin', 'Slidecat', 'delete', '', '1', '0', '删除分类', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('64', '62', 'Admin', 'Slidecat', 'edit', '', '1', '0', '编辑分类', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('65', '64', 'Admin', 'Slidecat', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `ys_menu` VALUES ('66', '62', 'Admin', 'Slidecat', 'add', '', '1', '0', '添加分类', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('67', '66', 'Admin', 'Slidecat', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `ys_menu` VALUES ('68', '39', 'Admin', 'Ad', 'index', '', '1', '1', '网站广告', '', '', '2');
INSERT INTO `ys_menu` VALUES ('69', '68', 'Admin', 'Ad', 'toggle', '', '1', '0', '广告显示切换', '', '', '0');
INSERT INTO `ys_menu` VALUES ('70', '68', 'Admin', 'Ad', 'delete', '', '1', '0', '删除广告', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('71', '68', 'Admin', 'Ad', 'edit', '', '1', '0', '编辑广告', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('72', '71', 'Admin', 'Ad', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `ys_menu` VALUES ('73', '68', 'Admin', 'Ad', 'add', '', '1', '0', '添加广告', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('74', '73', 'Admin', 'Ad', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `ys_menu` VALUES ('75', '39', 'Admin', 'Link', 'index', '', '0', '1', '友情链接', '', '', '3');
INSERT INTO `ys_menu` VALUES ('76', '75', 'Admin', 'Link', 'listorders', '', '1', '0', '友情链接排序', '', '', '0');
INSERT INTO `ys_menu` VALUES ('77', '75', 'Admin', 'Link', 'toggle', '', '1', '0', '友链显示切换', '', '', '0');
INSERT INTO `ys_menu` VALUES ('78', '75', 'Admin', 'Link', 'delete', '', '1', '0', '删除友情链接', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('79', '75', 'Admin', 'Link', 'edit', '', '1', '0', '编辑友情链接', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('80', '79', 'Admin', 'Link', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `ys_menu` VALUES ('81', '75', 'Admin', 'Link', 'add', '', '1', '0', '添加友情链接', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('82', '81', 'Admin', 'Link', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `ys_menu` VALUES ('83', '39', 'Api', 'Oauthadmin', 'setting', '', '1', '1', '第三方登陆', 'leaf', '', '4');
INSERT INTO `ys_menu` VALUES ('84', '83', 'Api', 'Oauthadmin', 'setting_post', '', '1', '0', '提交设置', '', '', '0');
INSERT INTO `ys_menu` VALUES ('85', '0', 'Admin', 'Menu', 'default', '', '1', '1', '菜单管理', 'list', '', '20');
INSERT INTO `ys_menu` VALUES ('86', '85', 'Admin', 'Navcat', 'default1', '', '1', '1', '前台菜单', '', '', '0');
INSERT INTO `ys_menu` VALUES ('87', '86', 'Admin', 'Nav', 'index', '', '1', '1', '菜单管理', '', '', '0');
INSERT INTO `ys_menu` VALUES ('88', '87', 'Admin', 'Nav', 'listorders', '', '1', '0', '前台导航排序', '', '', '0');
INSERT INTO `ys_menu` VALUES ('89', '87', 'Admin', 'Nav', 'delete', '', '1', '0', '删除菜单', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('90', '87', 'Admin', 'Nav', 'edit', '', '1', '0', '编辑菜单', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('91', '90', 'Admin', 'Nav', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `ys_menu` VALUES ('92', '87', 'Admin', 'Nav', 'add', '', '1', '0', '添加菜单', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('93', '92', 'Admin', 'Nav', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `ys_menu` VALUES ('94', '86', 'Admin', 'Navcat', 'index', '', '1', '1', '菜单分类', '', '', '0');
INSERT INTO `ys_menu` VALUES ('95', '94', 'Admin', 'Navcat', 'delete', '', '1', '0', '删除分类', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('96', '94', 'Admin', 'Navcat', 'edit', '', '1', '0', '编辑分类', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('97', '96', 'Admin', 'Navcat', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `ys_menu` VALUES ('98', '94', 'Admin', 'Navcat', 'add', '', '1', '0', '添加分类', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('99', '98', 'Admin', 'Navcat', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `ys_menu` VALUES ('100', '85', 'Admin', 'Menu', 'index', '', '1', '1', '后台菜单', '', '', '0');
INSERT INTO `ys_menu` VALUES ('101', '100', 'Admin', 'Menu', 'add', '', '1', '0', '添加菜单', '', '', '0');
INSERT INTO `ys_menu` VALUES ('102', '101', 'Admin', 'Menu', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `ys_menu` VALUES ('103', '100', 'Admin', 'Menu', 'listorders', '', '1', '0', '后台菜单排序', '', '', '0');
INSERT INTO `ys_menu` VALUES ('104', '100', 'Admin', 'Menu', 'export_menu', '', '1', '0', '菜单备份', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('105', '100', 'Admin', 'Menu', 'edit', '', '1', '0', '编辑菜单', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('106', '105', 'Admin', 'Menu', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `ys_menu` VALUES ('107', '100', 'Admin', 'Menu', 'delete', '', '1', '0', '删除菜单', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('108', '100', 'Admin', 'Menu', 'lists', '', '1', '0', '所有菜单', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('109', '0', 'Admin', 'Setting', 'default', '', '0', '1', '设置', 'cogs', '', '0');
INSERT INTO `ys_menu` VALUES ('110', '109', 'Admin', 'Setting', 'userdefault', '', '0', '1', '个人信息', '', '', '0');
INSERT INTO `ys_menu` VALUES ('111', '110', 'Admin', 'User', 'userinfo', '', '1', '1', '修改信息', '', '', '0');
INSERT INTO `ys_menu` VALUES ('112', '111', 'Admin', 'User', 'userinfo_post', '', '1', '0', '修改信息提交', '', '', '0');
INSERT INTO `ys_menu` VALUES ('113', '110', 'Admin', 'Setting', 'password', '', '1', '1', '修改密码', '', '', '0');
INSERT INTO `ys_menu` VALUES ('114', '113', 'Admin', 'Setting', 'password_post', '', '1', '0', '提交修改', '', '', '0');
INSERT INTO `ys_menu` VALUES ('115', '109', 'Admin', 'Setting', 'site', '', '1', '1', '网站信息', '', '', '0');
INSERT INTO `ys_menu` VALUES ('116', '115', 'Admin', 'Setting', 'site_post', '', '1', '0', '提交修改', '', '', '0');
INSERT INTO `ys_menu` VALUES ('117', '115', 'Admin', 'Route', 'index', '', '1', '0', '路由列表', '', '', '0');
INSERT INTO `ys_menu` VALUES ('118', '115', 'Admin', 'Route', 'add', '', '1', '0', '路由添加', '', '', '0');
INSERT INTO `ys_menu` VALUES ('119', '118', 'Admin', 'Route', 'add_post', '', '1', '0', '路由添加提交', '', '', '0');
INSERT INTO `ys_menu` VALUES ('120', '115', 'Admin', 'Route', 'edit', '', '1', '0', '路由编辑', '', '', '0');
INSERT INTO `ys_menu` VALUES ('121', '120', 'Admin', 'Route', 'edit_post', '', '1', '0', '路由编辑提交', '', '', '0');
INSERT INTO `ys_menu` VALUES ('122', '115', 'Admin', 'Route', 'delete', '', '1', '0', '路由删除', '', '', '0');
INSERT INTO `ys_menu` VALUES ('123', '115', 'Admin', 'Route', 'ban', '', '1', '0', '路由禁止', '', '', '0');
INSERT INTO `ys_menu` VALUES ('124', '115', 'Admin', 'Route', 'open', '', '1', '0', '路由启用', '', '', '0');
INSERT INTO `ys_menu` VALUES ('125', '115', 'Admin', 'Route', 'listorders', '', '1', '0', '路由排序', '', '', '0');
INSERT INTO `ys_menu` VALUES ('126', '109', 'Admin', 'Mailer', 'default', '', '1', '1', '邮箱配置', '', '', '0');
INSERT INTO `ys_menu` VALUES ('127', '126', 'Admin', 'Mailer', 'index', '', '1', '1', 'SMTP配置', '', '', '0');
INSERT INTO `ys_menu` VALUES ('128', '127', 'Admin', 'Mailer', 'index_post', '', '1', '0', '提交配置', '', '', '0');
INSERT INTO `ys_menu` VALUES ('129', '126', 'Admin', 'Mailer', 'active', '', '1', '1', '邮件模板', '', '', '0');
INSERT INTO `ys_menu` VALUES ('130', '129', 'Admin', 'Mailer', 'active_post', '', '1', '0', '提交模板', '', '', '0');
INSERT INTO `ys_menu` VALUES ('131', '109', 'Admin', 'Setting', 'clearcache', '', '1', '1', '清除缓存', '', '', '1');
INSERT INTO `ys_menu` VALUES ('132', '0', 'User', 'Indexadmin', 'default', '', '1', '1', '用户管理', 'group', '', '10');
INSERT INTO `ys_menu` VALUES ('133', '132', 'User', 'Indexadmin', 'default1', '', '1', '1', '用户组', '', '', '0');
INSERT INTO `ys_menu` VALUES ('134', '133', 'User', 'Indexadmin', 'index', '', '1', '1', '本站用户', 'leaf', '', '0');
INSERT INTO `ys_menu` VALUES ('135', '134', 'User', 'Indexadmin', 'ban', '', '1', '0', '拉黑会员', '', '', '0');
INSERT INTO `ys_menu` VALUES ('136', '134', 'User', 'Indexadmin', 'cancelban', '', '1', '0', '启用会员', '', '', '0');
INSERT INTO `ys_menu` VALUES ('137', '133', 'User', 'Oauthadmin', 'index', '', '1', '1', '第三方用户', 'leaf', '', '0');
INSERT INTO `ys_menu` VALUES ('138', '137', 'User', 'Oauthadmin', 'delete', '', '1', '0', '第三方用户解绑', '', '', '0');
INSERT INTO `ys_menu` VALUES ('139', '132', 'User', 'Indexadmin', 'default3', '', '1', '1', '管理组', '', '', '0');
INSERT INTO `ys_menu` VALUES ('140', '139', 'Admin', 'Rbac', 'index', '', '1', '1', '角色管理', '', '', '0');
INSERT INTO `ys_menu` VALUES ('141', '140', 'Admin', 'Rbac', 'member', '', '1', '0', '成员管理', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('142', '140', 'Admin', 'Rbac', 'authorize', '', '1', '0', '权限设置', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('143', '142', 'Admin', 'Rbac', 'authorize_post', '', '1', '0', '提交设置', '', '', '0');
INSERT INTO `ys_menu` VALUES ('144', '140', 'Admin', 'Rbac', 'roleedit', '', '1', '0', '编辑角色', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('145', '144', 'Admin', 'Rbac', 'roleedit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `ys_menu` VALUES ('146', '140', 'Admin', 'Rbac', 'roledelete', '', '1', '1', '删除角色', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('147', '140', 'Admin', 'Rbac', 'roleadd', '', '1', '1', '添加角色', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('148', '147', 'Admin', 'Rbac', 'roleadd_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `ys_menu` VALUES ('149', '139', 'Admin', 'User', 'index', '', '1', '1', '管理员', '', '', '0');
INSERT INTO `ys_menu` VALUES ('150', '149', 'Admin', 'User', 'delete', '', '1', '0', '删除管理员', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('151', '149', 'Admin', 'User', 'edit', '', '1', '0', '管理员编辑', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('152', '151', 'Admin', 'User', 'edit_post', '', '1', '0', '编辑提交', '', '', '0');
INSERT INTO `ys_menu` VALUES ('153', '149', 'Admin', 'User', 'add', '', '1', '0', '管理员添加', '', '', '1000');
INSERT INTO `ys_menu` VALUES ('154', '153', 'Admin', 'User', 'add_post', '', '1', '0', '添加提交', '', '', '0');
INSERT INTO `ys_menu` VALUES ('155', '47', 'Admin', 'Plugin', 'update', '', '1', '0', '插件更新', '', '', '0');
INSERT INTO `ys_menu` VALUES ('156', '39', 'Admin', 'Storage', 'index', '', '1', '1', '文件存储', '', '', '0');
INSERT INTO `ys_menu` VALUES ('157', '156', 'Admin', 'Storage', 'setting_post', '', '1', '0', '文件存储设置提交', '', '', '0');
INSERT INTO `ys_menu` VALUES ('158', '54', 'Admin', 'Slide', 'ban', '', '1', '0', '禁用幻灯片', '', '', '0');
INSERT INTO `ys_menu` VALUES ('159', '54', 'Admin', 'Slide', 'cancelban', '', '1', '0', '启用幻灯片', '', '', '0');
INSERT INTO `ys_menu` VALUES ('160', '149', 'Admin', 'User', 'ban', '', '1', '0', '禁用管理员', '', '', '0');
INSERT INTO `ys_menu` VALUES ('161', '149', 'Admin', 'User', 'cancelban', '', '1', '0', '启用管理员', '', '', '0');
INSERT INTO `ys_menu` VALUES ('162', '0', 'Yuesao', 'Index', 'index', '', '1', '1', '月嫂管理', 'female', '', '0');
INSERT INTO `ys_menu` VALUES ('163', '0', 'Order', 'AdminOrder', 'index', '', '1', '1', '订单管理', 'reorder', '', '0');
INSERT INTO `ys_menu` VALUES ('164', '163', 'Order', 'AdminOrder', 'orderList', '', '1', '1', '所有订单', '', '', '0');
INSERT INTO `ys_menu` VALUES ('165', '163', 'Order', 'AdminOrder', 'depositList', '', '1', '1', '待付定金订单', '', '', '0');
INSERT INTO `ys_menu` VALUES ('166', '163', 'Order', 'AdminOrder', 'balanceList', '', '1', '1', '待付余款订单', '', '', '0');
INSERT INTO `ys_menu` VALUES ('167', '163', 'Order', 'AdminOrder', 'evaluateList', '', '1', '1', '待评价订单', '', '', '0');
INSERT INTO `ys_menu` VALUES ('168', '163', 'Order', 'AdminOrder', 'finishList', '', '1', '1', '已完成订单', '', '', '0');
INSERT INTO `ys_menu` VALUES ('169', '163', 'Order', 'AdminOrder', 'closeList', '', '1', '1', '已关闭订单', '', '', '0');
INSERT INTO `ys_menu` VALUES ('172', '163', 'Order', 'AdminOrder', 'delete', '', '1', '0', '删除订单', ' ', ' ', '0');
INSERT INTO `ys_menu` VALUES ('175', '162', 'Yuesao', 'Yuesao', 'add', '', '1', '1', '添加月嫂', '', '', '0');
INSERT INTO `ys_menu` VALUES ('176', '162', 'Yuesao', 'Yuesao', 'ys_list', '', '1', '1', '月嫂列表', '', '', '0');

-- ----------------------------
-- Table structure for ys_nav
-- ----------------------------
DROP TABLE IF EXISTS `ys_nav`;
CREATE TABLE `ys_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL COMMENT '导航分类 id',
  `parentid` int(11) NOT NULL COMMENT '导航父 id',
  `label` varchar(255) NOT NULL COMMENT '导航标题',
  `target` varchar(50) DEFAULT NULL COMMENT '打开方式',
  `href` varchar(255) NOT NULL COMMENT '导航链接',
  `icon` varchar(255) NOT NULL COMMENT '导航图标',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  `listorder` int(6) DEFAULT '0' COMMENT '排序',
  `path` varchar(255) NOT NULL DEFAULT '0' COMMENT '层级关系',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='前台导航表';

-- ----------------------------
-- Records of ys_nav
-- ----------------------------
INSERT INTO `ys_nav` VALUES ('1', '1', '0', '首页', '', 'home', '', '1', '0', '0-1');
INSERT INTO `ys_nav` VALUES ('2', '1', '0', '列表演示', '', 'a:2:{s:6:\"action\";s:17:\"Portal/List/index\";s:5:\"param\";a:1:{s:2:\"id\";s:1:\"1\";}}', '', '1', '0', '0-2');
INSERT INTO `ys_nav` VALUES ('3', '1', '0', '瀑布流', '', 'a:2:{s:6:\"action\";s:17:\"Portal/List/index\";s:5:\"param\";a:1:{s:2:\"id\";s:1:\"2\";}}', '', '1', '0', '0-3');
INSERT INTO `ys_nav` VALUES ('4', '1', '0', '订单', '', 'a:2:{s:6:\"action\";s:17:\"Portal/Page/index\";s:5:\"param\";a:1:{s:2:\"id\";s:1:\"1\";}}', '', '1', '0', '0-4');
INSERT INTO `ys_nav` VALUES ('5', '1', '4', '我的订单', '', 'http://www.yuesao.com/index.php?g=Order&m=MemberOrder&a=allOrder', '', '1', '0', '0-4-5');
INSERT INTO `ys_nav` VALUES ('6', '1', '0', '月嫂管理', '', 'home', '', '1', '0', '0-6');
INSERT INTO `ys_nav` VALUES ('7', '1', '6', '月嫂列表', '', 'http://www.yuesao.com/index.php?g=Yuesao&m=MemberYuesao&a=yuesaoList', '', '1', '0', '0-6-7');
INSERT INTO `ys_nav` VALUES ('8', '1', '0', '登录', '', '', '', '1', '0', '0-8');
INSERT INTO `ys_nav` VALUES ('9', '1', '8', '注册', '', 'http://www.yuesao.com/index.php?g=Login&m=Register&a=index', '', '1', '0', '0-8-9');

-- ----------------------------
-- Table structure for ys_nav_cat
-- ----------------------------
DROP TABLE IF EXISTS `ys_nav_cat`;
CREATE TABLE `ys_nav_cat` (
  `navcid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '导航分类名',
  `active` int(1) NOT NULL DEFAULT '1' COMMENT '是否为主菜单，1是，0不是',
  `remark` text COMMENT '备注',
  PRIMARY KEY (`navcid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='前台导航分类表';

-- ----------------------------
-- Records of ys_nav_cat
-- ----------------------------
INSERT INTO `ys_nav_cat` VALUES ('1', '主导航', '1', '主导航');

-- ----------------------------
-- Table structure for ys_oauth_user
-- ----------------------------
DROP TABLE IF EXISTS `ys_oauth_user`;
CREATE TABLE `ys_oauth_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `from` varchar(20) NOT NULL COMMENT '用户来源key',
  `name` varchar(30) NOT NULL COMMENT '第三方昵称',
  `head_img` varchar(200) NOT NULL COMMENT '头像',
  `uid` int(20) NOT NULL COMMENT '关联的本站用户id',
  `create_time` datetime NOT NULL COMMENT '绑定时间',
  `last_login_time` datetime NOT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `login_times` int(6) NOT NULL COMMENT '登录次数',
  `status` tinyint(2) NOT NULL,
  `access_token` varchar(512) NOT NULL,
  `expires_date` int(11) NOT NULL COMMENT 'access_token过期时间',
  `openid` varchar(40) NOT NULL COMMENT '第三方用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='第三方用户表';

-- ----------------------------
-- Records of ys_oauth_user
-- ----------------------------

-- ----------------------------
-- Table structure for ys_options
-- ----------------------------
DROP TABLE IF EXISTS `ys_options`;
CREATE TABLE `ys_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL COMMENT '配置名',
  `option_value` longtext NOT NULL COMMENT '配置值',
  `autoload` int(2) NOT NULL DEFAULT '1' COMMENT '是否自动加载',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='全站配置表';

-- ----------------------------
-- Records of ys_options
-- ----------------------------
INSERT INTO `ys_options` VALUES ('1', 'member_email_active', '{\"title\":\"ThinkCMF\\u90ae\\u4ef6\\u6fc0\\u6d3b\\u901a\\u77e5.\",\"template\":\"<p>\\u672c\\u90ae\\u4ef6\\u6765\\u81ea<a href=\\\"http:\\/\\/www.thinkcmf.com\\\">ThinkCMF<\\/a><br\\/><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/>&nbsp; &nbsp;<strong>\\u5e10\\u53f7\\u6fc0\\u6d3b\\u8bf4\\u660e<\\/strong><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/><br\\/>&nbsp; &nbsp; \\u5c0a\\u656c\\u7684<span style=\\\"FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)\\\">#username#\\uff0c\\u60a8\\u597d\\u3002<\\/span>\\u5982\\u679c\\u60a8\\u662fThinkCMF\\u7684\\u65b0\\u7528\\u6237\\uff0c\\u6216\\u5728\\u4fee\\u6539\\u60a8\\u7684\\u6ce8\\u518cEmail\\u65f6\\u4f7f\\u7528\\u4e86\\u672c\\u5730\\u5740\\uff0c\\u6211\\u4eec\\u9700\\u8981\\u5bf9\\u60a8\\u7684\\u5730\\u5740\\u6709\\u6548\\u6027\\u8fdb\\u884c\\u9a8c\\u8bc1\\u4ee5\\u907f\\u514d\\u5783\\u573e\\u90ae\\u4ef6\\u6216\\u5730\\u5740\\u88ab\\u6ee5\\u7528\\u3002<br\\/>&nbsp; &nbsp; \\u60a8\\u53ea\\u9700\\u70b9\\u51fb\\u4e0b\\u9762\\u7684\\u94fe\\u63a5\\u5373\\u53ef\\u6fc0\\u6d3b\\u60a8\\u7684\\u5e10\\u53f7\\uff1a<br\\/>&nbsp; &nbsp; <a title=\\\"\\\" href=\\\"http:\\/\\/#link#\\\" target=\\\"_self\\\">http:\\/\\/#link#<\\/a><br\\/>&nbsp; &nbsp; (\\u5982\\u679c\\u4e0a\\u9762\\u4e0d\\u662f\\u94fe\\u63a5\\u5f62\\u5f0f\\uff0c\\u8bf7\\u5c06\\u8be5\\u5730\\u5740\\u624b\\u5de5\\u7c98\\u8d34\\u5230\\u6d4f\\u89c8\\u5668\\u5730\\u5740\\u680f\\u518d\\u8bbf\\u95ee)<br\\/>&nbsp; &nbsp; \\u611f\\u8c22\\u60a8\\u7684\\u8bbf\\u95ee\\uff0c\\u795d\\u60a8\\u4f7f\\u7528\\u6109\\u5feb\\uff01<br\\/><br\\/>&nbsp; &nbsp; \\u6b64\\u81f4<br\\/>&nbsp; &nbsp; ThinkCMF \\u7ba1\\u7406\\u56e2\\u961f.<\\/p>\"}', '1');
INSERT INTO `ys_options` VALUES ('2', 'site_options', '            {\n            		\"site_name\":\"坐月子,我们是专业的\",\n            		\"site_host\":\"http://thinkphp.app/\",\n            		\"site_root\":\"\",\n            		\"site_icp\":\"\",\n            		\"site_admin_email\":\"2634817136@qq.com\",\n            		\"site_tongji\":\"\",\n            		\"site_copyright\":\"\",\n            		\"site_seo_title\":\"坐月子,我们是专业的\",\n            		\"site_seo_keywords\":\"\",\n            		\"site_seo_description\":\"\"\n        }', '1');

-- ----------------------------
-- Table structure for ys_order
-- ----------------------------
DROP TABLE IF EXISTS `ys_order`;
CREATE TABLE `ys_order` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '收藏表',
  `user_id` int(11) DEFAULT NULL COMMENT '用户外键',
  `yuesao_id` int(11) DEFAULT NULL COMMENT '月嫂的外键',
  `deposit` decimal(10,2) DEFAULT NULL COMMENT '定金',
  `balance` decimal(10,2) DEFAULT NULL COMMENT '余款',
  `order_status` tinyint(4) DEFAULT NULL COMMENT '订单状态 0,已关闭订单 1 没支付定金2 没支付余款 3 没评价 4 已完成',
  `leave_message` varchar(255) DEFAULT NULL COMMENT '留言',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `is_del` int(11) DEFAULT NULL COMMENT '是否删除  0 已删除 1 没删除',
  `order_create_at` date DEFAULT NULL COMMENT '订单创建时间',
  `order_time` date DEFAULT NULL COMMENT '预订时间',
  `start_confinement` date DEFAULT NULL COMMENT '开始预产期',
  `end_confinement` date DEFAULT NULL COMMENT '结束预产期',
  `start_serve` date DEFAULT NULL,
  `end_serve` date DEFAULT NULL,
  `order_name` varchar(255) DEFAULT NULL COMMENT '预约客户姓名',
  `order_mobile` varchar(11) DEFAULT NULL COMMENT '预约电话',
  PRIMARY KEY (`order_id`),
  KEY `yuesao` (`yuesao_id`),
  KEY `user` (`user_id`),
  CONSTRAINT `ys_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `ys_users` (`id`) ON UPDATE SET NULL,
  CONSTRAINT `ys_order_ibfk_2` FOREIGN KEY (`yuesao_id`) REFERENCES `ys_yuesao` (`ys_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=201706091157134894 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_order
-- ----------------------------
INSERT INTO `ys_order` VALUES ('201706091157134892', '2', '4', '980.00', '8820.00', '4', '阿斯达', '杭州', '1', '2017-06-09', '2017-06-28', null, null, '2017-06-28', '2017-07-24', '阿毛', '15987456321');
INSERT INTO `ys_order` VALUES ('201706091157134893', '2', '4', '980.00', '8820.00', '1', '阿斯达', '杭州', '1', '2017-06-09', '2017-06-28', '2017-06-27', '2017-06-28', '2017-06-28', '2017-07-24', '阿毛', '15987456321');

-- ----------------------------
-- Table structure for ys_payment_method
-- ----------------------------
DROP TABLE IF EXISTS `ys_payment_method`;
CREATE TABLE `ys_payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '支付方式',
  `name` varchar(50) DEFAULT NULL COMMENT '下单客户名字',
  `code` tinyint(4) DEFAULT NULL COMMENT '0,微信支付, 1,支付宝支付',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_payment_method
-- ----------------------------

-- ----------------------------
-- Table structure for ys_plugins
-- ----------------------------
DROP TABLE IF EXISTS `ys_plugins`;
CREATE TABLE `ys_plugins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(50) NOT NULL COMMENT '插件名，英文',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '插件名称',
  `description` text COMMENT '插件描述',
  `type` tinyint(2) DEFAULT '0' COMMENT '插件类型, 1:网站；8;微信',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态；1开启；',
  `config` text COMMENT '插件配置',
  `hooks` varchar(255) DEFAULT NULL COMMENT '实现的钩子;以“，”分隔',
  `has_admin` tinyint(2) DEFAULT '0' COMMENT '插件是否有后台管理界面',
  `author` varchar(50) DEFAULT '' COMMENT '插件作者',
  `version` varchar(20) DEFAULT '' COMMENT '插件版本号',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '插件安装时间',
  `listorder` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件表';

-- ----------------------------
-- Records of ys_plugins
-- ----------------------------

-- ----------------------------
-- Table structure for ys_posts
-- ----------------------------
DROP TABLE IF EXISTS `ys_posts`;
CREATE TABLE `ys_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned DEFAULT '0' COMMENT '发表者id',
  `post_keywords` varchar(150) NOT NULL COMMENT 'seo keywords',
  `post_source` varchar(150) DEFAULT NULL COMMENT '转载文章的来源',
  `post_date` datetime DEFAULT '2000-01-01 00:00:00' COMMENT 'post创建日期，永久不变，一般不显示给用户',
  `post_content` longtext COMMENT 'post内容',
  `post_title` text COMMENT 'post标题',
  `post_excerpt` text COMMENT 'post摘要',
  `post_status` int(2) DEFAULT '1' COMMENT 'post状态，1已审核，0未审核',
  `comment_status` int(2) DEFAULT '1' COMMENT '评论状态，1允许，0不允许',
  `post_modified` datetime DEFAULT '2000-01-01 00:00:00' COMMENT 'post更新时间，可在前台修改，显示给用户',
  `post_content_filtered` longtext,
  `post_parent` bigint(20) unsigned DEFAULT '0' COMMENT 'post的父级post id,表示post层级关系',
  `post_type` int(2) DEFAULT NULL,
  `post_mime_type` varchar(100) DEFAULT '',
  `comment_count` bigint(20) DEFAULT '0',
  `smeta` text COMMENT 'post的扩展字段，保存相关扩展属性，如缩略图；格式为json',
  `post_hits` int(11) DEFAULT '0' COMMENT 'post点击数，查看数',
  `post_like` int(11) DEFAULT '0' COMMENT 'post赞数',
  `istop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '置顶 1置顶； 0不置顶',
  `recommended` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐 1推荐 0不推荐',
  PRIMARY KEY (`id`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`id`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`),
  KEY `post_date` (`post_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='Portal文章表';

-- ----------------------------
-- Records of ys_posts
-- ----------------------------
INSERT INTO `ys_posts` VALUES ('1', '1', '', null, '2017-05-19 17:58:04', '', 'dsd', 'asdadas', '1', '1', '2017-05-19 17:57:56', null, '0', '2', '', '0', '{\"template\":\"page\",\"thumb\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('2', '1', '', null, '2017-05-19 17:58:21', '<p>asdasda</p>', 'asdasd', 'asdasd', '1', '1', '2017-05-19 17:58:18', null, '0', '2', '', '0', '{\"template\":\"page\",\"thumb\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('3', '1', '', '', '2017-05-19 17:59:41', '<p>asdasd</p>', 'sdxas', '', '3', '1', '2017-05-19 17:59:50', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('4', '1', '', '', '2017-05-19 17:59:54', '<p>asdad</p>', 'asdasd', '', '3', '1', '2017-05-19 17:59:58', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('5', '1', 'sdf', 'fsd', '2017-05-31 08:36:12', '<p>dfsfs</p>', 'sdfsd', 'fsdfs', '3', '1', '2017-05-31 08:36:19', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('6', '1', 'sdf', 'fsd', '2017-05-31 09:00:19', '<p>dfsfs</p>', 'sdfsd', 'fsdfs', '3', '1', '2017-05-31 09:00:19', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('7', '1', 'sdf', 'fsd', '2017-05-31 09:00:20', '<p>dfsfs</p>', 'sdfsd', 'fsdfs', '3', '1', '2017-05-31 09:00:20', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('8', '1', 'sdf', 'fsd', '2017-05-31 09:00:22', '<p>dfsfs</p>', 'sdfsd', 'fsdfs', '3', '1', '2017-05-31 09:00:22', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('9', '1', 'sdf', 'fsd', '2017-05-31 09:00:23', '<p>dfsfs</p>', 'sdfsd', 'fsdfs', '3', '1', '2017-05-31 09:00:23', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('10', '1', 'dfsd', 'fsdf', '2017-05-31 13:14:33', '', 'dsfs', 'ssf', '3', '1', '2017-05-31 13:14:36', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('11', '1', 'sdfs', 'ds', '2017-05-31 13:14:38', '<p>fsf</p>', 'sdfs', 'fsdfs', '3', '1', '2017-05-31 13:14:43', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('12', '1', 'sdfs', 'ds', '2017-05-31 13:14:49', '<p>fsf</p>', 'sdfs', 'fsdfs', '1', '1', '2017-06-02 16:10:42', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\",\"photo\":[{\"url\":\"portal\\/20170602\\/59311d7e09108.jpg\",\"alt\":\"1.jpg\"},{\"url\":\"portal\\/20170602\\/59311d7e17f53.jpg\",\"alt\":\"2.jpg\"},{\"url\":\"portal\\/20170602\\/59311d7e288f7.jpg\",\"alt\":\"3.jpg\"},{\"url\":\"portal\\/20170602\\/59311d7e37f13.jpg\",\"alt\":\"4.jpg\"},{\"url\":\"portal\\/20170602\\/59311d7e47916.jpg\",\"alt\":\"8.jpg\"},{\"url\":\"portal\\/20170602\\/59311d7e57ed2.jpg\",\"alt\":\"130.jpg\"}]}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('13', '1', 'dfsd', 'fsdf', '2017-05-31 13:14:49', '', 'dsfs', 'ssf', '1', '1', '2017-05-31 13:14:49', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('14', '1', 'sdfs', 'ds', '2017-05-31 13:14:50', '<p>fsf</p>', 'sdfs', 'fsdfs', '3', '1', '2017-05-31 13:14:50', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('15', '1', 'dfsd', 'fsdf', '2017-05-31 13:14:50', '', 'dsfs', 'ssf', '3', '1', '2017-05-31 13:14:50', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\"}', '0', '0', '0', '0');
INSERT INTO `ys_posts` VALUES ('16', '1', '', '', '2017-05-31 19:18:09', '', '123', '', '1', '1', '2017-05-31 19:18:38', null, '0', null, '', '0', '{\"thumb\":\"\",\"template\":\"\",\"photo\":[{\"url\":\"portal\\/20170531\\/592ea67985294.jpg\",\"alt\":\"1.jpg\"},{\"url\":\"portal\\/20170531\\/592ea67993cf7.jpg\",\"alt\":\"2.jpg\"},{\"url\":\"portal\\/20170531\\/592ea679a2373.jpg\",\"alt\":\"3.jpg\"},{\"url\":\"portal\\/20170531\\/592ea679b1d76.jpg\",\"alt\":\"4.jpg\"},{\"url\":\"portal\\/20170531\\/592ea679bf069.jpg\",\"alt\":\"5.jpg\"},{\"url\":\"portal\\/20170531\\/592ea679cc35c.jpg\",\"alt\":\"6.jpg\"},{\"url\":\"portal\\/20170531\\/592ea679d9267.jpg\",\"alt\":\"7.jpg\"},{\"url\":\"portal\\/20170531\\/592ea679e6943.jpg\",\"alt\":\"8.jpg\"},{\"url\":\"portal\\/20170531\\/592ea679f2c95.jpg\",\"alt\":\"130.jpg\"}]}', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for ys_role
-- ----------------------------
DROP TABLE IF EXISTS `ys_role`;
CREATE TABLE `ys_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `pid` smallint(6) DEFAULT NULL COMMENT '父角色ID',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT '0' COMMENT '排序字段',
  PRIMARY KEY (`id`),
  KEY `parentId` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of ys_role
-- ----------------------------
INSERT INTO `ys_role` VALUES ('1', '超级管理员', '0', '1', '拥有网站最高管理员权限！', '1329633709', '1329633709', '0');

-- ----------------------------
-- Table structure for ys_role_user
-- ----------------------------
DROP TABLE IF EXISTS `ys_role_user`;
CREATE TABLE `ys_role_user` (
  `role_id` int(11) unsigned DEFAULT '0' COMMENT '角色 id',
  `user_id` int(11) DEFAULT '0' COMMENT '用户id',
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户角色对应表';

-- ----------------------------
-- Records of ys_role_user
-- ----------------------------

-- ----------------------------
-- Table structure for ys_route
-- ----------------------------
DROP TABLE IF EXISTS `ys_route`;
CREATE TABLE `ys_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '路由id',
  `full_url` varchar(255) DEFAULT NULL COMMENT '完整url， 如：portal/list/index?id=1',
  `url` varchar(255) DEFAULT NULL COMMENT '实际显示的url',
  `listorder` int(5) DEFAULT '0' COMMENT '排序，优先级，越小优先级越高',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1：启用 ;0：不启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='url路由表';

-- ----------------------------
-- Records of ys_route
-- ----------------------------

-- ----------------------------
-- Table structure for ys_setting
-- ----------------------------
DROP TABLE IF EXISTS `ys_setting`;
CREATE TABLE `ys_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` float DEFAULT NULL COMMENT '比如设置下需要支付定金的百分比',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_setting
-- ----------------------------

-- ----------------------------
-- Table structure for ys_slide
-- ----------------------------
DROP TABLE IF EXISTS `ys_slide`;
CREATE TABLE `ys_slide` (
  `slide_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slide_cid` int(11) NOT NULL COMMENT '幻灯片分类 id',
  `slide_name` varchar(255) NOT NULL COMMENT '幻灯片名称',
  `slide_pic` varchar(255) DEFAULT NULL COMMENT '幻灯片图片',
  `slide_url` varchar(255) DEFAULT NULL COMMENT '幻灯片链接',
  `slide_des` varchar(255) DEFAULT NULL COMMENT '幻灯片描述',
  `slide_content` text COMMENT '幻灯片内容',
  `slide_status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  `listorder` int(10) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`slide_id`),
  KEY `slide_cid` (`slide_cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='幻灯片表';

-- ----------------------------
-- Records of ys_slide
-- ----------------------------

-- ----------------------------
-- Table structure for ys_slide_cat
-- ----------------------------
DROP TABLE IF EXISTS `ys_slide_cat`;
CREATE TABLE `ys_slide_cat` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL COMMENT '幻灯片分类',
  `cat_idname` varchar(255) NOT NULL COMMENT '幻灯片分类标识',
  `cat_remark` text COMMENT '分类备注',
  `cat_status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  PRIMARY KEY (`cid`),
  KEY `cat_idname` (`cat_idname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='幻灯片分类表';

-- ----------------------------
-- Records of ys_slide_cat
-- ----------------------------

-- ----------------------------
-- Table structure for ys_sms_varify
-- ----------------------------
DROP TABLE IF EXISTS `ys_sms_varify`;
CREATE TABLE `ys_sms_varify` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '短信验证码',
  `user_id` int(11) DEFAULT NULL COMMENT '用户外键',
  `mobile` varchar(50) DEFAULT NULL COMMENT '手机号',
  `code` varchar(20) DEFAULT NULL COMMENT '短信验证码',
  `deadline` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `use` (`user_id`),
  CONSTRAINT `use` FOREIGN KEY (`user_id`) REFERENCES `ys_users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_sms_varify
-- ----------------------------
INSERT INTO `ys_sms_varify` VALUES ('3', '3', '456789', '123456', '2017-06-12 18:00:25');
INSERT INTO `ys_sms_varify` VALUES ('4', '1', '15715848363', '9171', '2017-06-12 18:06:55');
INSERT INTO `ys_sms_varify` VALUES ('5', '3', '456789', '456789', '2017-06-18 19:19:17');
INSERT INTO `ys_sms_varify` VALUES ('6', '1', '15715848363', '9425', '2017-06-12 19:31:12');
INSERT INTO `ys_sms_varify` VALUES ('7', null, '456112354', '357162', '2017-06-12 20:29:34');
INSERT INTO `ys_sms_varify` VALUES ('8', null, '15715848363', '190087', '2017-06-12 20:31:31');
INSERT INTO `ys_sms_varify` VALUES ('9', null, '1598745626', '181820', '2017-06-13 11:37:22');
INSERT INTO `ys_sms_varify` VALUES ('10', null, '1598745626', '336837', '2017-06-13 11:37:30');
INSERT INTO `ys_sms_varify` VALUES ('11', null, '15715848363', '730944', '2017-06-13 11:37:57');
INSERT INTO `ys_sms_varify` VALUES ('12', null, '15715848363', '418301', '2017-06-13 11:41:50');
INSERT INTO `ys_sms_varify` VALUES ('13', null, '15715848363', '976104', '2017-06-13 11:41:53');
INSERT INTO `ys_sms_varify` VALUES ('14', null, '15715848363', '652832', '2017-06-13 11:42:21');
INSERT INTO `ys_sms_varify` VALUES ('15', null, '15715848363', '847756', '2017-06-13 11:42:45');
INSERT INTO `ys_sms_varify` VALUES ('16', null, '15715848363', '255511', '2017-06-13 11:43:15');
INSERT INTO `ys_sms_varify` VALUES ('17', null, '15715848363', '542941', '2017-06-13 11:45:10');
INSERT INTO `ys_sms_varify` VALUES ('18', null, '15715848363', '471228', '2017-06-13 11:45:17');
INSERT INTO `ys_sms_varify` VALUES ('19', null, '15715848363', '684170', '2017-06-13 11:45:19');
INSERT INTO `ys_sms_varify` VALUES ('20', null, '15715848363', '930841', '2017-06-13 11:45:39');
INSERT INTO `ys_sms_varify` VALUES ('21', null, '15715848363', '635116', '2017-06-13 11:45:46');
INSERT INTO `ys_sms_varify` VALUES ('22', null, '15715848363', '674584', '2017-06-13 11:45:53');

-- ----------------------------
-- Table structure for ys_terms
-- ----------------------------
DROP TABLE IF EXISTS `ys_terms`;
CREATE TABLE `ys_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `slug` varchar(200) DEFAULT '',
  `taxonomy` varchar(32) DEFAULT NULL COMMENT '分类类型',
  `description` longtext COMMENT '分类描述',
  `parent` bigint(20) unsigned DEFAULT '0' COMMENT '分类父id',
  `count` bigint(20) DEFAULT '0' COMMENT '分类文章数',
  `path` varchar(500) DEFAULT NULL COMMENT '分类层级关系路径',
  `seo_title` varchar(500) DEFAULT NULL,
  `seo_keywords` varchar(500) DEFAULT NULL,
  `seo_description` varchar(500) DEFAULT NULL,
  `list_tpl` varchar(50) DEFAULT NULL COMMENT '分类列表模板',
  `one_tpl` varchar(50) DEFAULT NULL COMMENT '分类文章页模板',
  `listorder` int(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1发布，0不发布',
  PRIMARY KEY (`term_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Portal 文章分类表';

-- ----------------------------
-- Records of ys_terms
-- ----------------------------
INSERT INTO `ys_terms` VALUES ('1', '列表演示', '', 'article', '', '0', '0', '0-1', '', '', '', 'list', 'article', '3', '1');
INSERT INTO `ys_terms` VALUES ('2', '瀑布流', '', 'article', '', '0', '0', '0-2', '', '', '', 'list_masonry', 'article', '0', '1');

-- ----------------------------
-- Table structure for ys_term_relationships
-- ----------------------------
DROP TABLE IF EXISTS `ys_term_relationships`;
CREATE TABLE `ys_term_relationships` (
  `tid` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT 'posts表里文章id',
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1发布，0不发布',
  PRIMARY KEY (`tid`),
  KEY `term_taxonomy_id` (`term_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='Portal 文章分类对应表';

-- ----------------------------
-- Records of ys_term_relationships
-- ----------------------------
INSERT INTO `ys_term_relationships` VALUES ('1', '3', '2', '0', '1');
INSERT INTO `ys_term_relationships` VALUES ('2', '4', '1', '0', '1');
INSERT INTO `ys_term_relationships` VALUES ('3', '5', '1', '0', '1');
INSERT INTO `ys_term_relationships` VALUES ('4', '6', '1', '0', '1');
INSERT INTO `ys_term_relationships` VALUES ('5', '7', '1', '0', '1');
INSERT INTO `ys_term_relationships` VALUES ('6', '8', '2', '0', '1');
INSERT INTO `ys_term_relationships` VALUES ('7', '9', '1', '0', '1');
INSERT INTO `ys_term_relationships` VALUES ('8', '10', '2', '0', '1');
INSERT INTO `ys_term_relationships` VALUES ('9', '11', '1', '0', '1');
INSERT INTO `ys_term_relationships` VALUES ('10', '12', '1', '0', '1');
INSERT INTO `ys_term_relationships` VALUES ('11', '13', '1', '0', '1');
INSERT INTO `ys_term_relationships` VALUES ('12', '14', '1', '0', '1');
INSERT INTO `ys_term_relationships` VALUES ('13', '15', '1', '0', '1');
INSERT INTO `ys_term_relationships` VALUES ('14', '16', '2', '0', '1');

-- ----------------------------
-- Table structure for ys_users
-- ----------------------------
DROP TABLE IF EXISTS `ys_users`;
CREATE TABLE `ys_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；sp_password加密',
  `user_nicename` varchar(50) NOT NULL DEFAULT '' COMMENT '用户美名',
  `user_email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `user_url` varchar(100) NOT NULL DEFAULT '' COMMENT '用户个人网站',
  `avatar` varchar(255) DEFAULT NULL COMMENT '用户头像，相对于upload/avatar目录',
  `sex` smallint(1) DEFAULT '0' COMMENT '性别；0：保密，1：男；2：女',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `signature` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `last_login_ip` varchar(16) DEFAULT NULL COMMENT '最后登录ip',
  `last_login_time` datetime NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '最后登录时间',
  `create_time` datetime NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '注册时间',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '' COMMENT '激活码',
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `user_type` smallint(1) DEFAULT '1' COMMENT '用户类型，1:admin ;2:会员',
  `coin` int(11) NOT NULL DEFAULT '0' COMMENT '金币',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号',
  `qq` varchar(50) DEFAULT NULL COMMENT '会员qq号',
  `wechat` varchar(50) DEFAULT NULL COMMENT '会员微信号',
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of ys_users
-- ----------------------------
INSERT INTO `ys_users` VALUES ('1', 'admin', '###d894c461e5233aa4acd3acd05b75d6b3', 'admin', '2634817136@qq.com', '', 'default/20170531/592e8644cf6c4.jpg', '0', null, null, '127.0.0.1', '2017-06-12 14:12:23', '2017-05-19 08:39:46', '', '1', '0', '1', '0', '15715848369', null, null);
INSERT INTO `ys_users` VALUES ('2', 'abc', '###d894c461e5233aa4acd3acd05b75d6b3', 'abc', '', '', 'default/20170531/592e8644cf6c4.jpg', '1', null, null, '127.0.0.1', '2017-06-14 17:27:16', '2000-01-01 00:00:00', '', '1', '0', '2', '0', '', null, null);
INSERT INTO `ys_users` VALUES ('3', 'maomao', '', 'maomao', '', '', 'default/20170531/592e8644cf6c4.jpg', '0', null, null, null, '2000-01-01 00:00:00', '2000-01-01 00:00:00', '', '1', '0', '2', '0', '', null, null);
INSERT INTO `ys_users` VALUES ('4', '', '###d894c461e5233aa4acd3acd05b75d6b3', '', '', '', null, '0', null, null, '127.0.0.1', '2017-06-12 20:32:56', '2017-06-12 20:32:56', '', '1', '0', '2', '0', '', null, null);

-- ----------------------------
-- Table structure for ys_user_favorites
-- ----------------------------
DROP TABLE IF EXISTS `ys_user_favorites`;
CREATE TABLE `ys_user_favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) DEFAULT NULL COMMENT '用户 id',
  `title` varchar(255) DEFAULT NULL COMMENT '收藏内容的标题',
  `url` varchar(255) DEFAULT NULL COMMENT '收藏内容的原文地址，不带域名',
  `description` varchar(500) DEFAULT NULL COMMENT '收藏内容的描述',
  `table` varchar(50) DEFAULT NULL COMMENT '收藏实体以前所在表，不带前缀',
  `object_id` int(11) DEFAULT NULL COMMENT '收藏内容原来的主键id',
  `createtime` int(11) DEFAULT NULL COMMENT '收藏时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户收藏表';

-- ----------------------------
-- Records of ys_user_favorites
-- ----------------------------

-- ----------------------------
-- Table structure for ys_yuesao
-- ----------------------------
DROP TABLE IF EXISTS `ys_yuesao`;
CREATE TABLE `ys_yuesao` (
  `ys_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '月嫂ID',
  `ys_name` varchar(50) NOT NULL COMMENT '月嫂名称',
  `level` tinyint(4) DEFAULT NULL COMMENT '月嫂等级',
  `age` tinyint(4) DEFAULT NULL COMMENT '月嫂年龄',
  `experience` varchar(50) DEFAULT NULL COMMENT '//经验',
  `introduce` varchar(255) DEFAULT NULL COMMENT '简介',
  `certificate` varchar(255) DEFAULT NULL COMMENT '证书',
  `skill` varchar(255) DEFAULT NULL COMMENT '技能',
  `price` decimal(10,2) DEFAULT NULL COMMENT '价格',
  `features` varchar(255) DEFAULT NULL COMMENT '特点',
  `ys_mobile` varchar(20) DEFAULT NULL COMMENT '手机号',
  `ys_avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `is_recommend` tinyint(4) DEFAULT NULL COMMENT '是否推荐  0是不推荐  1是推荐',
  `ys_address` varchar(255) DEFAULT NULL COMMENT '月嫂家乡',
  `birth` date DEFAULT NULL COMMENT '出生日期',
  `is_del` int(2) DEFAULT NULL,
  `baby_num` int(11) DEFAULT NULL COMMENT '照顾宝宝数量',
  `ys_home` varchar(255) DEFAULT NULL COMMENT '所在地',
  `is_checked` tinyint(4) DEFAULT NULL COMMENT '是否审核  0是未审核  1是审核 ',
  `is_top` tinyint(4) DEFAULT NULL COMMENT '是否置顶  0是不置顶  1是置顶 ',
  `ys_sex` varchar(2) DEFAULT NULL COMMENT '性别',
  `ys_education` varchar(255) DEFAULT NULL COMMENT '学历',
  PRIMARY KEY (`ys_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_yuesao
-- ----------------------------
INSERT INTO `ys_yuesao` VALUES ('1', '李四', '4', '45', '5', '服务周到热情，为人随和，与家人相处愉快，经验丰富，深受产妇全家人喜欢。', '高级母婴护理师证、小儿推拿，营养师，产后康复师', null, '8888.00', null, null, 'default/20170531/592e8644cf6c4.jpg', '1', '广西', '1990-02-06', '1', '5', '杭州', '1', '1', '女', '高中');
INSERT INTO `ys_yuesao` VALUES ('2', '王五', '3', '50', '3', '服务周到热情，为人随和，与家人相处愉快，经验丰富，深受产妇全家人喜欢。', null, null, '8888.00', null, null, 'default/20170531/592e6e4fa3c57.jpg', '1', '浙江', '1960-05-04', '1', '5', '杭州', '1', '1', '女', '高中');
INSERT INTO `ys_yuesao` VALUES ('3', '张三', '4', '55', '2', '服务周到热情，为人随和，与家人相处愉快，经验丰富，深受产妇全家人喜欢。', null, null, '10000.00', null, null, 'default/20170531/592e8644cf6c4.jpg', '1', '北京', '1960-05-04', '1', '6', '杭州', '1', '1', '女', '专科');
INSERT INTO `ys_yuesao` VALUES ('4', '李四', '5', '60', '5', '服务周到热情，为人随和，与家人相处愉快，经验丰富，深受产妇全家人喜欢。', '高级母婴护理师证、小儿推拿，营养师', null, '9800.00', 'sd', '15715848363', 'default/20170531/592e8644cf6c4.jpg', '1', '江苏', '1960-05-04', '1', '2', '杭州', '1', '1', '女', '本科');
INSERT INTO `ys_yuesao` VALUES ('5', '小米', '4', '60', '2', '服务周到热情，为人随和，与家人相处愉快，经验丰富，深受产妇全家人喜欢。', '2342', null, '23400.00', '34', 'asd', 'default/20170531/592e8644cf6c4.jpg', '0', '安徽', '2017-05-27', '0', '3', '杭州', null, null, '', '硕士');

-- ----------------------------
-- Table structure for ys_yuesao_images
-- ----------------------------
DROP TABLE IF EXISTS `ys_yuesao_images`;
CREATE TABLE `ys_yuesao_images` (
  `yuesao_id` int(11) DEFAULT NULL COMMENT '月嫂外键',
  `images` varchar(255) DEFAULT NULL COMMENT '月嫂图片(多张用分号分割)',
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片id',
  PRIMARY KEY (`id`),
  KEY `images` (`yuesao_id`),
  CONSTRAINT `images` FOREIGN KEY (`yuesao_id`) REFERENCES `ys_yuesao` (`ys_id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_yuesao_images
-- ----------------------------
INSERT INTO `ys_yuesao_images` VALUES (null, 'default/20170601/592f73f92ea47.jpg', '7');
INSERT INTO `ys_yuesao_images` VALUES (null, 'default/20170601/592f73f93d4aa.jpg', '8');
INSERT INTO `ys_yuesao_images` VALUES (null, 'default/20170601/592f79b77632f.JPG', '9');
INSERT INTO `ys_yuesao_images` VALUES (null, 'default/20170601/592f79bc3a34f.jpg', '10');
INSERT INTO `ys_yuesao_images` VALUES (null, 'default/20170601/592fa03e64e56.jpg', '11');
INSERT INTO `ys_yuesao_images` VALUES (null, 'default/20170601/592fa03e7502a.jpg', '12');
INSERT INTO `ys_yuesao_images` VALUES (null, 'default/20170601/592fb4d805d5f.jpg', '13');
INSERT INTO `ys_yuesao_images` VALUES (null, 'default/20170601/592fb4d814bab.jpg', '14');
INSERT INTO `ys_yuesao_images` VALUES (null, 'default/20170602/5930d9a658cb1.jpg', '15');
INSERT INTO `ys_yuesao_images` VALUES (null, 'default/20170602/5930d9a94a6e1.jpg', '16');
INSERT INTO `ys_yuesao_images` VALUES (null, 'default/20170602/5930d9abb2b64.jpg', '17');
