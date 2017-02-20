# Dump of access_list 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS access_list;
CREATE TABLE access_list (
  access_key char(32) NOT NULL,
  access_name varchar(256) NOT NULL,
  access_detail text NOT NULL,
  access_class int(11) NOT NULL,
  access_status tinyint(1) NOT NULL,
  PRIMARY KEY (access_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO access_list VALUES("0a3c8aabc6cdbce67a157ba1701b3fa9","รายงาน","รายงาน",0,1);
INSERT INTO access_list VALUES("295744c466c17b46170f88b5c1b9104d","ข่าวสาร","ข่าวสาร",0,1);
INSERT INTO access_list VALUES("7fea6fea61143d1fcb188f3080ecc446","ผู้ดูแลระบบ","ผู้ดูแลระบบ",0,1);
INSERT INTO access_list VALUES("f1344bc0fb9c5594fa0e3d3f37a56957","ข้อมูลนักเรียน","ข้อมูลนักเรียน",0,1);



# Dump of access_user 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS access_user;
CREATE TABLE access_user (
  access_key char(32) NOT NULL,
  user_key char(32) NOT NULL,
  access_status tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO access_user VALUES("0a3c8aabc6cdbce67a157ba1701b3fa9","1d471b52ce56279cc7adbd3e5bdb5cb9",1);
INSERT INTO access_user VALUES("295744c466c17b46170f88b5c1b9104d","1d471b52ce56279cc7adbd3e5bdb5cb9",1);
INSERT INTO access_user VALUES("7fea6fea61143d1fcb188f3080ecc446","1d471b52ce56279cc7adbd3e5bdb5cb9",1);
INSERT INTO access_user VALUES("f1344bc0fb9c5594fa0e3d3f37a56957","1d471b52ce56279cc7adbd3e5bdb5cb9",1);



# Dump of backup_logs 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS backup_logs;
CREATE TABLE backup_logs (
  backup_key varchar(32) NOT NULL,
  backup_file varchar(256) NOT NULL,
  backup_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  user_key char(32) NOT NULL,
  PRIMARY KEY (backup_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






# Dump of categories 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
  categories_key char(32) NOT NULL,
  categories_name varchar(128) NOT NULL,
  categories_status tinyint(1) NOT NULL,
  categories_insert timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (categories_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO categories VALUES("2870d771b1b9e340ef5f4a0365e5a47e","ไม่มีกลุ่ม",1,"2016-03-24 20:08:16");



# Dump of field_detail 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS field_detail;
CREATE TABLE field_detail (
  fd_key char(32) NOT NULL,
  fh_key varchar(32) NOT NULL,
  fd_title varchar(128) NOT NULL,
  fd_value varchar(128) NOT NULL,
  fd_insert timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (fd_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO field_detail VALUES("125e1673add3809f23c56d2b6fb675fb","1640e4e8b91de3901a446bedd30fe537","1","1","2017-02-16 03:07:20");
INSERT INTO field_detail VALUES("ecb921331a737914fcb2945c6608813b","1640e4e8b91de3901a446bedd30fe537","3","3","2017-02-16 14:56:57");
INSERT INTO field_detail VALUES("ff36d034e9bf7bb46bec328bae7db961","1640e4e8b91de3901a446bedd30fe537","2","2","2017-02-16 03:07:24");



# Dump of field_header 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS field_header;
CREATE TABLE field_header (
  fh_key char(32) NOT NULL,
  fh_name varchar(128) NOT NULL,
  fh_title varchar(128) NOT NULL,
  fh_type tinyint(1) NOT NULL,
  fh_length int(11) NOT NULL,
  fh_status tinyint(1) NOT NULL,
  fh_insert timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (fh_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO field_header VALUES("1640e4e8b91de3901a446bedd30fe537","student_type","ประเภท",2,4,1,"2017-02-16 01:48:11");
INSERT INTO field_header VALUES("809d8c55c4002c221bfb982ffd071f02","student_note","หมายเหตุ",3,255,1,"2017-02-16 02:07:01");
INSERT INTO field_header VALUES("cc329e0de82a131760f184fcd4a48af1","student_color","สี",1,32,1,"2017-02-16 01:47:59");



# Dump of language 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS language;
CREATE TABLE language (
  language_code varchar(16) NOT NULL,
  language_name varchar(32) NOT NULL,
  language_status tinyint(1) NOT NULL,
  PRIMARY KEY (language_code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO language VALUES("th","ภาษาไทย",1);



# Dump of list 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS list;
CREATE TABLE list (
  cases varchar(64) NOT NULL,
  menu varchar(64) NOT NULL,
  pages varchar(128) NOT NULL,
  case_status tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (cases)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



INSERT INTO list VALUES("setting","setting","settings/setting.php",1);
INSERT INTO list VALUES("member","member","members/member.php",1);
INSERT INTO list VALUES("cashier","cashier","cashier/cashier.php",1);
INSERT INTO list VALUES("report","report","report/report.php",1);
INSERT INTO list VALUES("report_export","report","report/report_export.php",1);
INSERT INTO list VALUES("report_movement","report","report/report_movement.php",1);
INSERT INTO list VALUES("report_income","report","report/report_income.php",1);
INSERT INTO list VALUES("report_income_detail","report","report/report_income_detail.php",1);
INSERT INTO list VALUES("report_booking","report","report/report_booking.php",1);
INSERT INTO list VALUES("report_logs","report","report/report_logs.php",1);
INSERT INTO list VALUES("report_delivery","report","report/report_delivery.php",1);
INSERT INTO list VALUES("report_delivery_detail","report","report/report_delivery_detail.php",1);
INSERT INTO list VALUES("setting_users","setting","settings/setting_users.php",1);
INSERT INTO list VALUES("setting_backup","setting","settings/setting_backup.php",1);
INSERT INTO list VALUES("setting_unit","setting","settings/setting_unit.php",0);
INSERT INTO list VALUES("setting_categories","setting","settings/setting_categories.php",1);
INSERT INTO list VALUES("setting_member_group","setting","settings/setting_member_group.php",1);
INSERT INTO list VALUES("setting_promotions","setting","settings/setting_promotions.php",1);
INSERT INTO list VALUES("report_debt","report","report/report_debt.php",1);
INSERT INTO list VALUES("report_creditor","report","report/report_creditor.php",1);
INSERT INTO list VALUES("setting_info","setting","settings/setting_info.php",1);
INSERT INTO list VALUES("setting_system","setting","settings/setting_system.php",1);
INSERT INTO list VALUES("setting_user_access","setting","settings/setting_user_access.php",1);
INSERT INTO list VALUES("administrator_access_list","setting","administrator/administrator_access_list.php",1);
INSERT INTO list VALUES("administrator_cases","setting","administrator/administrator_cases.php",1);
INSERT INTO list VALUES("administrator_menus","setting","administrator/administrator_menus.php",1);
INSERT INTO list VALUES("administrator_modules","setting","administrator/administrator_modules.php",1);
INSERT INTO list VALUES("administrator_helper","seting","administrator/administrator_helper.php",1);
INSERT INTO list VALUES("cashier_member","cashier","cashier/cashier_member.php",1);
INSERT INTO list VALUES("cashier_booking","cashier","cashier/cashier_booking.php",1);
INSERT INTO list VALUES("product_detail","product","products/product_detail.php",1);
INSERT INTO list VALUES("member_detail","member","members/member_detail.php",1);
INSERT INTO list VALUES("new_member","member","members/new_member.php",1);
INSERT INTO list VALUES("member_history","member","members/member_history.php",1);
INSERT INTO list VALUES("setting_promotion_member","setting","settings/setting_promotion_member.php",1);
INSERT INTO list VALUES("report_cancel","report","report/report_cancel.php",1);
INSERT INTO list VALUES("card_all_status","card","card/card_all_status.php",1);
INSERT INTO list VALUES("search","","main/search.php",1);
INSERT INTO list VALUES("card","card","card/card.php",1);
INSERT INTO list VALUES("setting_card_status","setting","settings/setting_card_status.php",1);
INSERT INTO list VALUES("card_create_detail","card_create","card/card_create_detail.php",1);
INSERT INTO list VALUES("search_code","","main/search.php",1);
INSERT INTO list VALUES("card_create","card_create","card/main.php",1);
INSERT INTO list VALUES("setting_products","setting","settings/setting_products.php",1);
INSERT INTO list VALUES("setting_jobs_type","setting","settings/setting_jobs_type.php",1);
INSERT INTO list VALUES("setting_brands","setting","settings/setting_brands.php",1);
INSERT INTO list VALUES("setting_models","setting","settings/setting_models.php",1);
INSERT INTO list VALUES("setting_products_type","setting","settings/setting_products_type.php",1);
INSERT INTO list VALUES("setting_employees","setting","settings/setting_employees.php",1);
INSERT INTO list VALUES("edit_jobs","card","card/edit_jobs.php",1);
INSERT INTO list VALUES("jobs","card_create","card/jobs.php",1);
INSERT INTO list VALUES("create","create","create/main.php",1);
INSERT INTO list VALUES("news","news","news/main.php",1);
INSERT INTO list VALUES("about","setting","settings/about.php",1);



# Dump of logs 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS logs;
CREATE TABLE logs (
  log_key varchar(16) NOT NULL,
  log_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  log_ipaddress varchar(32) NOT NULL,
  log_text varchar(256) NOT NULL,
  log_user varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



INSERT INTO logs VALUES("f2fac3507f1cd50d","2016-05-16 18:58:56","::1","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("dceef3eeaaf741a3","2016-05-16 19:02:19","::1","admin ออกจากระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("a1252c6c7d9395a4","2016-12-06 12:30:16","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("a1252c6c7d9395a4","2016-12-06 12:30:16","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("ab2f0a57997e3af0","2016-12-06 12:30:38","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("32b0dc0fcdd4787a","2017-01-08 20:46:18","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("32b0dc0fcdd4787a","2017-01-08 20:46:18","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("9d96fe3207f9965c","2017-01-08 20:46:48","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("c8ffc677bf58eebd","2017-01-08 22:30:26","::1","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("e74d4dd94b82abac","2017-01-08 22:30:32","::1","admin ออกจากระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("78d4f4252ccd6ab3","2017-01-09 16:54:31","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("78d4f4252ccd6ab3","2017-01-09 16:54:31","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("0a06fa3c698c97a9","2017-01-09 16:54:33","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("fcf059f0f964389e","2017-01-09 17:01:12","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("fcf059f0f964389e","2017-01-09 17:01:12","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("f4547453d6870220","2017-01-09 17:08:25","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("9454d2ecfdf3f7d4","2017-01-09 17:08:26","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("93dd06d3adbed859","2017-01-09 17:14:03","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("d447de7134ae48d5","2017-01-09 17:15:32","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("1bf6eeb16cdc0485","2017-01-09 17:27:46","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("8dcec4a020207e79","2017-01-13 06:29:18","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("d0a1d66c369b427f","2017-01-13 13:16:15","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("de50855be62522b4","2017-01-14 15:43:42","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("b712969199807a00","2017-01-14 16:39:15","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("31c2b59afa810489","2017-01-14 17:13:14","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("0d081e8eda8f925b","2017-01-15 08:25:57","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("bac21e401ebaa79a","2017-01-16 08:12:28","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("916fd0ec45a299f7","2017-01-16 08:15:05","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("a46c3fbd51d24e17","2017-01-17 15:51:20","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("72cb35a50a056b4d","2017-01-17 16:02:38","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("1d15a0fd822c396e","2017-01-18 09:28:25","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("f9e18bdf8a00461c","2017-01-18 09:30:18","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("9fdbbfdc593395d7","2017-01-18 09:30:35","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("0dedcd9ab405e694","2017-01-18 10:28:16","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("30533a7796c8ac72","2017-01-18 10:28:20","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("c027359b3215e2f7","2017-01-18 15:34:07","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("68f08dd0316d7020","2017-01-19 08:12:43","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("13364bf3c09a3302","2017-01-19 11:43:43","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("99264a7580c04d8c","2017-01-19 12:22:39","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("e7df985acf278918","2017-01-19 14:12:31","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("d51ad78b80c6c41a","2017-01-23 01:20:04","49.228.247.43","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("1858a99ee7a681f6","2017-01-23 11:00:10","49.228.244.242","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("42b1700b2e2ae7f7","2017-01-24 10:26:35","49.228.246.68","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("a007abdea9cb1e30","2017-01-24 11:02:02","49.228.247.104","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("b4e1075b52b7d53c","2017-01-25 09:35:16","58.11.188.212","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("f63c916c554caf3e","2017-01-25 10:39:36","58.11.188.212","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("857e1a3678da5032","2017-01-25 10:49:03","58.11.188.212","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("a1f7eca4d3816ecd","2017-01-26 09:36:33","171.100.24.75","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("c8700a94054bf569","2017-01-30 19:18:43","49.228.247.124","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("1d5e6d8744fd16dd","2017-01-30 20:05:05","49.228.246.117","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("0cd89b34cb05695f","2017-01-30 20:10:36","49.228.247.109","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("6250311b4a828585","2017-01-30 20:25:43","49.228.245.159","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("43f46a1321f4d1e0","2017-01-30 20:44:06","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("461a1ea3f8f17702","2017-01-30 20:44:08","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("aba8c0f53ea91221","2017-01-30 21:00:54","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("1c431d067eb327e5","2017-01-31 10:52:35","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("fbc7f28cc4c5dd41","2017-02-13 20:33:53","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("066d3cf3ff0b57cf","2017-02-13 20:34:06","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("aa9d588a308e5d3e","2017-02-13 20:52:01","::1","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("b2d6ef3cbfb061d1","2017-02-13 20:52:04","::1","admin ออกจากระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("5a69bcc76c87f23c","2017-02-13 20:52:05","::1","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("125ef52b254dbd88","2017-02-13 20:54:01","::1","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("21b608172f76c022","2017-02-13 20:54:06","::1","admin ออกจากระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("4b12d3c962b6dd6f","2017-02-13 20:55:02","::1","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("0d00ea47ac42b43a","2017-02-13 20:57:19","::1","admin เข้าสู่ระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("39f429d9637954b3","2017-02-13 21:00:11","::1","admin ออกจากระบบ.","363a7e4982865bfd0c647726a8fb7d75");
INSERT INTO logs VALUES("5613a6e872ae89fe","2017-02-13 21:00:17","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("fcff5468a36e8969","2017-02-13 21:07:04","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("7027a0519130742c","2017-02-13 21:30:15","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("a19e1812755aae00","2017-02-13 21:31:33","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("b017b6fb38cd5c8e","2017-02-13 21:31:36","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("b8d5a9f431ad7c46","2017-02-14 14:30:14","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("d2de6fe0a8a5b49a","2017-02-14 15:44:38","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("583ddec2305163ab","2017-02-14 15:52:33","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("4b65ee8eceaac550","2017-02-14 16:25:30","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("12cdaec6db9e02d0","2017-02-14 16:30:33","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("e15766386614441a","2017-02-15 23:12:12","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("30637af8ae50518c","2017-02-15 23:12:14","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("a89e5bcde3ba4eea","2017-02-15 23:12:15","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("5f3ee43723fee227","2017-02-16 02:53:50","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("e528bb85a46af74a","2017-02-16 11:25:07","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("cf36f82092591cd8","2017-02-16 14:09:20","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("20d32364ea682486","2017-02-16 21:20:37","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("0e614b928ab73c2d","2017-02-18 11:09:31","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("70710f2896eda43d","2017-02-18 11:09:37","::1","hello เข้าสู่ระบบ.","77a6fc0003ccb6d77b4cadb96a149949");
INSERT INTO logs VALUES("37fd87dd91c79cd2","2017-02-18 11:09:54","::1","hello ออกจากระบบ.","77a6fc0003ccb6d77b4cadb96a149949");
INSERT INTO logs VALUES("7ed98a0e929371df","2017-02-18 11:10:29","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("09e29d1114de0d77","2017-02-18 11:14:35","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("1010e479700ab188","2017-02-18 11:14:44","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("03fd399c868d5dd4","2017-02-18 11:15:20","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("4e368e8547e4b13d","2017-02-18 11:15:24","::1","admin เข้าสู่ระบบ.","b873d1e42c5f42a4cbc7d36f0cbe09db");
INSERT INTO logs VALUES("61ae48ef21d1b57b","2017-02-18 11:15:53","::1","admin ออกจากระบบ.","b873d1e42c5f42a4cbc7d36f0cbe09db");
INSERT INTO logs VALUES("658755b92b84b776","2017-02-18 11:15:58","::1","hello เข้าสู่ระบบ.","77a6fc0003ccb6d77b4cadb96a149949");
INSERT INTO logs VALUES("dfcecfc098ea59cc","2017-02-18 11:16:13","::1","hello ออกจากระบบ.","77a6fc0003ccb6d77b4cadb96a149949");
INSERT INTO logs VALUES("d1a14d498ca211d8","2017-02-18 11:16:14","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("dbc2166d1208b032","2017-02-18 11:33:45","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("2923f212a29de46c","2017-02-18 11:39:00","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("8c6c583a0995ad01","2017-02-18 12:18:06","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("197790cac1a1e279","2017-02-18 12:20:31","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("456f50cb8f754615","2017-02-18 12:20:33","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("da204b88abd54479","2017-02-18 12:22:10","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("fa5a36bb42bc6cbd","2017-02-18 12:22:17","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("b4a245a4cc76e5fd","2017-02-18 12:22:23","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("ee71771e91617d1f","2017-02-18 13:01:59","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("4a87fa821090b58e","2017-02-18 13:02:01","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("277bfa2430cb06ee","2017-02-18 13:05:10","::1","dump ออกจากระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("2265c10b5f1f861c","2017-02-18 13:20:53","::1","dump เข้าสู่ระบบ.","c37d695c6f1144abdefa8890a921b8fb");
INSERT INTO logs VALUES("e31d5eece68f6ab1","2017-02-18 14:51:19","::1","admin เข้าสู่ระบบ.","1d471b52ce56279cc7adbd3e5bdb5cb9");
INSERT INTO logs VALUES("0b303feb1a08d948","2017-02-18 14:51:21","::1","admin ออกจากระบบ.","1d471b52ce56279cc7adbd3e5bdb5cb9");
INSERT INTO logs VALUES("5352e13ab790c0c6","2017-02-18 14:51:51","::1","admin เข้าสู่ระบบ.","1d471b52ce56279cc7adbd3e5bdb5cb9");



# Dump of members 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS members;
CREATE TABLE members (
  member_key char(32) NOT NULL,
  member_group varchar(32) NOT NULL,
  member_code varchar(32) NOT NULL,
  member_prefix varchar(16) NOT NULL,
  member_name varchar(64) NOT NULL,
  member_lastname varchar(64) NOT NULL,
  member_address text NOT NULL,
  member_phone varchar(32) NOT NULL,
  member_email varchar(128) NOT NULL,
  member_note text NOT NULL,
  member_status tinyint(1) NOT NULL,
  student_note varchar(255) NOT NULL COMMENT 'หมายเหตุ',
  student_type varchar(4) NOT NULL COMMENT 'ประเภท',
  student_color varchar(32) NOT NULL COMMENT 'สี',
  member_insert timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (member_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






# Dump of members_prefix 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS members_prefix;
CREATE TABLE members_prefix (
  prefix_key varchar(32) NOT NULL,
  prefix_code varchar(16) NOT NULL,
  prefix_title varchar(64) NOT NULL,
  prefix_status tinyint(1) NOT NULL,
  prefix_insert timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (prefix_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO members_prefix VALUES("00d3ee50b62c10ee1f590819a045ea47","3","นาย",1,"2017-02-15 23:22:28");
INSERT INTO members_prefix VALUES("2f9f2c0fc106a86ea7cb3bca1a28de00","4","นางสาว",1,"2017-02-15 23:22:46");
INSERT INTO members_prefix VALUES("383182292551e50872fd81907f1406a7","2","เด็กหญิง",1,"2017-02-15 23:21:19");
INSERT INTO members_prefix VALUES("73a839c50e210771fe3867c0a7907b4b","1","เด็กชาย",1,"2017-02-15 23:20:09");
INSERT INTO members_prefix VALUES("b69fcedf741f32260fb2323fe8fdc9dc","5","นาง",1,"2017-02-15 23:22:56");



# Dump of menus 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS menus;
CREATE TABLE menus (
  menu_key char(32) NOT NULL,
  menu_upkey char(32) NOT NULL,
  menu_icon varchar(256) NOT NULL,
  menu_name varchar(128) NOT NULL,
  menu_case varchar(128) NOT NULL,
  menu_link varchar(256) NOT NULL,
  menu_status tinyint(1) NOT NULL,
  menu_sorting int(11) NOT NULL,
  PRIMARY KEY (menu_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO menus VALUES("0a3c8aabc6cdbce67a157ba1701b3fa9","0a3c8aabc6cdbce67a157ba1701b3fa9","<i class=\"fa fa-pie-chart fa-fw\"></i>","LA_MN_REPORT","report","?p=report",1,8);
INSERT INTO menus VALUES("2309e0cdb2c541bf7cb8ef0dee7b7eba","2309e0cdb2c541bf7cb8ef0dee7b7eba","<i class=\"fa fa-gear  fa-fw\"></i>","LA_MN_SETTING","setting","?p=setting",1,9);
INSERT INTO menus VALUES("295744c466c17b46170f88b5c1b9104d","295744c466c17b46170f88b5c1b9104d","<i class=\"fa fa-newspaper-o fa-fw\"></i>","ข่าวสาร","news","?p=news",1,4);
INSERT INTO menus VALUES("a16043256ea5ca0ea86995e2b69ec238","a16043256ea5ca0ea86995e2b69ec238","<i class=\"fa fa-home fa-fw\"></i>","LA_MN_HOME","","index.php",1,1);
INSERT INTO menus VALUES("c6c8729b45d1fec563f8453c16ff03b8","c6c8729b45d1fec563f8453c16ff03b8","<i class=\"fa fa-lock fa-fw\"></i>","LA_MN_LOGOUT","logout","../core/logout.core.php",1,10);
INSERT INTO menus VALUES("f1344bc0fb9c5594fa0e3d3f37a56957","f1344bc0fb9c5594fa0e3d3f37a56957","<i class=\"fa fa-address-book-o fa-fw\"></i>","ข้อมูลนักเรียน","member","?p=member",1,3);



# Dump of news 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS news;
CREATE TABLE news (
  news_key char(32) NOT NULL,
  news_title varchar(128) NOT NULL,
  news_detail text NOT NULL,
  news_status tinyint(1) NOT NULL,
  user_key varchar(32) NOT NULL,
  news_insert timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (news_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






# Dump of slideshow 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS slideshow;
CREATE TABLE slideshow (
  slide_key char(32) NOT NULL,
  slide_file varchar(256) NOT NULL,
  slide_link text NOT NULL,
  slide_sorting int(1) NOT NULL,
  slide_status tinyint(1) NOT NULL,
  slide_insert timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (slide_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO slideshow VALUES("65ce283e3ed40421e1c3f1cadbe0e392","slide_2.jpg","",3,1,"2017-02-18 10:59:11");
INSERT INTO slideshow VALUES("7098e8f1094149d6253083dbcecc758f","slide_1.jpg","https://nattarin.com/profile",1,1,"2017-02-18 10:47:04");
INSERT INTO slideshow VALUES("ae8e2103e1511e0d4f6ed0612b2be44c","slide_3.jpg","",2,1,"2017-02-18 10:59:17");



# Dump of system_font_size 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS system_font_size;
CREATE TABLE system_font_size (
  font_key char(32) NOT NULL,
  font_name varchar(128) NOT NULL,
  font_size_text text NOT NULL,
  font_status tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO system_font_size VALUES("6c3ca25445248c1dff79d51ad9fa4082","14px","font-size:14px;",1);
INSERT INTO system_font_size VALUES("74af75636b4e933684d63b617c97f398","24px","font-size:24px;",1);
INSERT INTO system_font_size VALUES("bffeb9ae0d04ffc7affc3701f9858932","22px","font-size:22px;",1);
INSERT INTO system_font_size VALUES("dd7e28065e654467be0f9c16f3bd987d","16px","font-size:16px;",1);
INSERT INTO system_font_size VALUES("e215155479796a0bdcad2326ffca09c7","18px","font-size:18px;",1);
INSERT INTO system_font_size VALUES("ff9ec5b758824e67edcf5ecc7e635f6f","20px","font-size:20px;",1);



# Dump of system_info 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS system_info;
CREATE TABLE system_info (
  site_key char(32) NOT NULL,
  site_logo varchar(256) NOT NULL,
  site_favicon varchar(256) NOT NULL,
  time_zone varchar(128) NOT NULL,
  year_type varchar(16) NOT NULL,
  year_format varchar(32) NOT NULL,
  PRIMARY KEY (site_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO system_info VALUES("8f411b77c389d5de467af8f2c0e91cda","logo.png","icon.png","Asia/Bangkok","BE","3");



# Dump of user 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS user;
CREATE TABLE user (
  user_key char(32) NOT NULL,
  name varchar(64) NOT NULL,
  lastname varchar(64) NOT NULL,
  username varchar(64) NOT NULL,
  password varchar(60) NOT NULL,
  user_photo varchar(128) NOT NULL DEFAULT 'noimg.jpg',
  user_class tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=user,2=admin,3=super admin',
  bed_view varchar(64) NOT NULL DEFAULT 'box_view',
  user_language varchar(8) NOT NULL DEFAULT 'th',
  system_font_size varchar(32) NOT NULL DEFAULT 'dd7e28065e654467be0f9c16f3bd987d',
  email varchar(128) NOT NULL,
  user_status tinyint(1) NOT NULL,
  PRIMARY KEY (user_key)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



INSERT INTO user VALUES("1d471b52ce56279cc7adbd3e5bdb5cb9","admin","admin","admin","$2a$08$QW.dOCRyqCddPK9twu7.lu2W4cfuCRrUIml2seOo9XqPwm/McZqom","noimg.jpg",2,"box_view","th","dd7e28065e654467be0f9c16f3bd987d","admin@clear.co.th",1);



# Dump of user_online 
# Dump DATE : 18-Feb-2017

DROP TABLE IF EXISTS user_online;
CREATE TABLE user_online (
  osession varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  user_key varchar(32) CHARACTER SET utf8 NOT NULL,
  otime int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO user_online VALUES("c36cb5983503791127d4dc26bb447ccb","1d471b52ce56279cc7adbd3e5bdb5cb9",1487404376);



