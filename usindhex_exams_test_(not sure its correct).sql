/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.8-MariaDB : Database - usindhex_exams_test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `DEPT_ID` int(3) NOT NULL AUTO_INCREMENT,
  `FAC_ID` int(3) DEFAULT NULL,
  `INST_ID` int(3) DEFAULT NULL,
  `DEPT_NAME` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `IS_INST` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `CODE` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `REMARKS` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `EMAIL` text COLLATE latin1_general_ci NOT NULL,
  `SAC_PASSWORD` text COLLATE latin1_general_ci NOT NULL,
  `RESET_TOKEN` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `USER_TEMP` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `PASS_TEMP` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `CITY_NAME` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `FORM_FINAL_PER` int(11) NOT NULL,
  PRIMARY KEY (`DEPT_ID`),
  KEY `fk_department_faculty_idx` (`FAC_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `department` */

insert  into `department`(`DEPT_ID`,`FAC_ID`,`INST_ID`,`DEPT_NAME`,`IS_INST`,`CODE`,`REMARKS`,`EMAIL`,`SAC_PASSWORD`,`RESET_TOKEN`,`USER_TEMP`,`PASS_TEMP`,`CITY_NAME`,`FORM_FINAL_PER`) values 
(1,6,0,'ECONOMICS','N','ECON','ECONOMICS','chair.economics@usindh.edu.pk','fcae3f9041169c92e3fdd096f09dbff9','','','','',75),
(2,2,6,'BUSINESS ADMINSTRATION','N','BUS','BBA','','e025582dca473c01bea5b4d525e5a59e','HoD29994','','','',75),
(3,5,0,'INSTITUTE OF INFORMATION &COMMUNICATION TECHNOLOGY','Y','','','dir.iict@usindh.edu.pk','71fa81c042dc46d80a3db2e0b2009174','HoD566','','','',75),
(6,2,0,'INSTITUTE  OF BUSINESS ADMINISTRATION','Y','','IBA','dir.iba@usindh.edu.pk','4ec55f75ebd1ed0bf86caff5ad60c625','','','','',75),
(7,2,0,'INSTITUTE OF COMMERCE','Y','','COM','dir.com@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD31814','','','',75),
(8,5,3,'INFORMATION TECHNOLOGY','N','ITEC','INFORMATION TECHNOLOGY','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(9,5,0,'INSTITUTE OF MATHEMATICS & COMPUTER SCIENCE','Y','','IMCS','dir.imcs@usindh.edu.pk','5d6ad4984363bb95639c535469e5187b','','','','',75),
(10,5,9,'COMPUTER SCIENCE','N','COMP','COMPUTER SCIENCE','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(11,5,0,'DR. M.A. KAZI INSTITUTE OF CHEMISTRY','Y','','CHEMISTRY','dir.chem@usindh.edu.pk','821f3dc12777daa8fe91d701514b8da5','','','','',75),
(12,5,11,'CHEMISTRY','N','CHEM','CHEMISTRY','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(13,5,3,'SOFTWARE ENGINEERING','N','SWE','SOFTWARE ENGINEERING','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(14,5,3,'TELECOMMUNICATION','N','TELC','TELECOMMUNICATION','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(15,5,3,'ELECTRONICS','N','ELEC','ELECTRONICS','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(16,6,0,'SINDH DEVELOPMENT STUDIES CENTRE','N','DS','SINDH DEVELOPMENT STUDIES CENTRE','dir.sdsc@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD21383','','','',75),
(17,5,0,'INSTITUTE OF BIOTECHNOLOGY & GENETIC ENGINEERING','Y','','','dir.bt@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD4316','','','',75),
(18,5,17,'GENETIC ENGINEERING','N','GENG','GENETIC ENGINEERING','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(19,5,68,'BOTANY','N','BOTN','BOTANY','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(20,5,0,'FRESH WATER BIOLOGY & FISHERIES','N','FWBF','FRESH WATER BIOLOGY & FISHERIES','chair.fbf@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD11508','','','',75),
(21,5,0,'GEOGRAPHY','N','GEOG','GEOGRAPHY','chair.geo@usindh.edu.pk','b2f9daf68265d92075e946761bb7ba4e','','','','',75),
(22,5,0,'CENTRE FOR PURE & APPLIED GEOLOGY','N','GEOL','GEOLOGY','dir.cpag@usindh.edu.pk','ba966d27d86cc255ceda313dd255a6c7','','','','',75),
(23,5,79,'MICROBIOLOGY','N','MICR','MICORBIOLOGY','director.mb@usindh.edu.pk','136e83004ff4c86b067abf41bc52eb82','HoD7338','','','',75),
(24,5,69,'PHYSICS','N','PHYS','PHYSICS','dir.phy@usindh.edu.pk','cce5e66cd3b1c8a3352c4c04c9e77fd5','','','','',75),
(25,5,0,'PHYSIOLOGY','N','PHSL','PHYSIOLOGY','chair.physio@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD5727','','','',75),
(26,5,0,'STATISTICS','N','STAT','STATISTICS','chair.stat@usindh.edu.pk','f480034fee8f39994f1989df74cdd206','HoD12150','','','',75),
(27,5,0,'ZOOLOGY','N','ZOOL','ZOOLOGY','chair.zoo@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD17698','','','',75),
(28,6,0,'INSTITUTE OF GENDER STUDIES','Y','','IGS','dir.gs@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD13730','','','',75),
(29,6,28,'GENDER STUDIES','N','WS','GS','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(30,5,0,'CENTRE FOR  PHYSICAL EDUCATION  HEALTH & SPORTS SC','N','HPE','HEALTH & PHYSICAL EDUCATION','dir.pes@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD28857','','','',75),
(31,6,0,'GENERAL HISTORY','N','GH','GENRAL HISTORY','chair.gh@usindh.edu.pk','ec2b438df9d4913a3fd783cd05f082b3','','','','',75),
(32,6,0,'INTERNATIONAL RELATIONS','N','IR','I R','chair.ir@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD21267','','','',75),
(33,6,0,'LIBRARY INFORMATION SCIENCE & ARCHIVE STUDIES','N','LS','LIBRARY SCIENCES','chair.lisas@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD15561','','','',75),
(34,6,0,'MEDIA & COMMUNICATION STUDIES','N','MC','MEDIA & COMMUNICATION STUDIES','chair.mc@usindh.edu.pk','7fd638a4ce60abe1f4d1178ec62cfb0f','','','','',75),
(35,6,0,'CENTRE FOR RURAL DEVELOPMENT COMMUNICATION','N','RURAL','RURAL DEVELOPMENT / MASS COMMUNICATION','dir.crdc@usindh.edu.pk','7fd638a4ce60abe1f4d1178ec62cfb0f','','','','',75),
(36,6,0,'POLITICAL SCIENCE','N','POL','POLITICAL SCIENCE','chair.polsc@usindh.edu.pk','ce63fb91d2abb487b1d18e22e4d05480','','','','',75),
(37,6,0,'PSYCHOLOGY','N','PSY','PSYCHOLOGY','chair.psy@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD29657','','','',75),
(38,6,0,'PUBLIC ADMINISTRATION','N','PA','PUBLIC ADMINISTRATION','chair.pa@usindh.edu.pk','cb19f461dd30a9dbe505943047816938','','','','',75),
(39,6,0,'SOCIOLOGY','N','SOC','SOCIOLOGY','chair.socio@usindh.edu.pk','03238bebc1591aec2ce7fbd90ac4f437','HoD13061','','','',75),
(40,6,0,'SOCIAL WORK','N','SW','SOCIAL WORK','chair.sw@usindh.edu.pk','e10adc3949ba59abbe56e057f20f883e','','','','',75),
(41,6,0,'CRIMINOLOGY','N','CRM','CRIMINOLOGY','chair.crim@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD7052','','','',75),
(42,2,7,'COMMERCE','N','COM','','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(43,7,0,'INSTITUTE OF ARTS & DESIGN','Y','','FINE ARTS','dir.ad@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(44,7,0,'INSTITUTE OF LANGUAGES','Y','','INSTITUTE OF LANGUAGES','dir.lang@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(45,7,70,'ENGLISH','N','ENG','ENLISH','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(46,7,0,'PHILOSOPHY','N','PHIL','PHILOSOPHY','chair.phil@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(47,7,0,'SINDHI','N','SIND','SINDHI','chair.sin@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(48,7,0,'URDU','N','URD','URDU','chair.urdu@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD12538','','','',75),
(49,7,43,'ART & DESIGN','N','FAD','FINE ART','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(50,7,44,'ARABIC','N','AR','ARABIC','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(51,7,44,'PERSIAN','N','PERS','PERSIAN','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(57,9,0,'COMPARATIVE RELIGION & ISLAMIC CULTURE','N','IC','','chair.cris@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD32609','','','',75),
(58,9,0,'MUSLIM HISTORY','N','MH','','chair.mh@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD32336','','','',75),
(59,5,0,'INSTITUTE OF BIOCHEMISTRY','Y','','','dir.bc@usindh.edu.pk','58ca33e848f918457028a86134d9b955','','','','',75),
(60,5,59,'BIOCHEMISTRY','N','BIOC','BIOCHEMISRY','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(61,5,0,'CENTRE OF ENVIRONMENTAL SCIENCES','N','ENVS','ENVIROMENTAL','dir.es@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD12074','','','',75),
(62,11,0,'INSTITUTE OF PHARMACY','Y','','','dean.pharm@usindh.edu.pk','d352d25c3aa2e00532ed9e79be2b8bb8','','','','',75),
(63,11,62,'PHARMACY','N','PHAR','PHAR','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(64,5,9,'MATHEMATICS','N','MATH','MATHEMATICS','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(65,5,17,'BIOTECHNOLOGY','N','BIOT','BIOTECHNOLOGY','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(66,10,0,'PAKISTAN STUDY CENTRE','N','PS','','dir.psc@usindh.edu.pk','48feb5c26255f6ec50e321b430375bda','','','','',75),
(67,8,0,'EDUCATION','N','EDU','Main Department of Education','dean.edu@usindh.edu.pk','fadd61c3ce79258742d5ddd19f69d986','','','','',75),
(68,5,0,'INSTITUTE OF PLANT SCIENCES','Y','BOTN','BOTANY','dir.plant@usindh.edu.pk','58a810d2204fdc406d2e110de8829efa','','','','',75),
(69,5,0,'INSTITUTE OF PHYSICS','Y','','','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(70,7,0,'INSTITUTE OF ENGLISH LANGUAGE & LITERATURE','Y','','ENGLISH','dir.eng@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD30026','','','',75),
(71,5,3,'TELEMEDICINE & E-HEALTH','N','TEMED','TELEMEDICINE & E-HEALTH','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(72,10,0,'SINDH UNIVERSITY LAAR CAMPUS @ BADIN','N','SUBC','','pvc.laar@usindh.edu.pk','30e1a74f7358acea0cc6f773ab673b71','','','','',75),
(73,5,0,'ANTHROPOLOGY & ARCHAEOLOGY','N','ANTH','ANTHROPOLOGY & ARCHAEOLOGY','chair.anth@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD9899','','','',75),
(74,8,0,'EDUCATION  SINDH UNIVERSITY LAAR CAMPUS @ BADIN','N','EDUL','LAAR BADIN','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(75,8,0,'EDUCATION  P.I.T.E SINDH  NAWABSHAH','N','EDUP','PITE (NAWABSHAH)','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(76,12,88,'LAW','N','LAW','LAW','law_test@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(77,10,0,'SINDH UNIVERSITY CAMPUS MIRPURKHAS','N','SUMC','','pvc.mpk@usindh.edu.pk','780a55d8e03a3a7a2c8165f815cbb510','','','','',75),
(78,7,0,'CENTRE FOR MUSIC EDUCATION  INSTITUTE OF ART & DES','N','MUSC','CENTRE FOR MUSIC EDUCATION','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(79,5,0,'SHAHEED PROF. BASHIR AHMED CHANNAR DEPARTMENT OF M','Y','','','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(80,10,0,'MOHTARMA BENAZIR BHUTTO SHAHEED CAMPUS DADU','N','SUDC','','pvc.dadu@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD16206','','','',75),
(81,13,0,'INSTITUTE OF MODEREN SCIENCES & ARTS  HYDERABAD','N','','03332766010','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(82,13,0,'COLLEGE OF MODEREN SCIENCES','N','','03136667700','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(83,13,0,'SUKKUR INSTITUTE OF SCIENCE & TECHNOLOGY  SUKKAR','N','','0715614116','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(84,10,0,'SINDH UNIVERSITY CAMPUS THATTA','N','SUCT','','pvc.thatta@usindh.edu.pk','efebfb5e5abccfc0fdbc4e07eae91390','','','','',75),
(85,10,0,'SINDH UNIVERSITY CAMPUS LARKANA','N','','','pvc.larkana@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(86,5,59,'NUTRITION & FOOD TECHNOLOGY','N','NUFT','NUTRITION & FOOD TECHNOLOGY','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(87,10,0,'SINDH UNIVERSITY CAMPUS BHIT SHAH  IUPSMS','N','','','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(88,12,0,'INSTITUTE OF LAW','Y','','LAW','dean.law@usindh.edu.pk','069f5b72e8a290c533857c2d0b3fe7f5','','','','',75),
(89,10,0,'SYED ALLAHANDO SHAH CAMPUS NAUSHAHRO FEROZ','N','SUNC','','pvc.nf@usindh.edu.pk','e025582dca473c01bea5b4d525e5a59e','HoD6548','','','',75),
(90,13,0,'ANEES HASSAN CENTRE OF EXCELLENCE  HYDERABAD','N','','03213133050','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(91,13,0,'NATIONAL COLLEGE OF ARTS MANAGEMENT  HYDERABAD','N','','0223812383/ 0223821393','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(92,13,0,'HYDERABAD INSTITUTE OF ART  SCIENCES & TECHNOLOGY','N','','03432392847','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(93,13,0,'MUHAMMAD INSTITUTE OF SCIENCE & TECHNOLOGY  MIRPUR','N','','0233516049','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(94,13,0,'NAZEER HASSAIN INSTITUTE OF EMERGING SCIENCE  MIRP','N','','0233863522','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(95,13,0,'GOVERNMENT BOYS COLLEGE KALI MORI  HYDERABAD','N','','03013614184','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(96,13,0,'GOVERNMENT BOYS COLLEGE QASIMABAD  HYDERABAD','N','','03332457571','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(97,13,0,'GOVERNMENT NUZRAT GIRLS COLLEGE  HYDERABAD','N','','03018370965','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(98,13,0,'GOVERNMENT GIRLS ZUBEDA COLLEGE  HYDERABAD','N','','03003028646','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(99,13,0,'GOVERNMENT GIRLS COLLEGE QASIMABAD  HYDERABAD','N','','03003013341','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(100,13,0,'GOVERNMENT SHAH LATIF GIRLS COLLEGE LATIFABAD  HYD','N','','03332602126','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(101,13,0,'IBNE RUSHID GOVERNMENT GIRLS COLLEGE  MIRPURKHAS','N','','02339290232','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(102,13,0,'GOVERNMENT BOYS COLLEGE TANDO JAN MUHAMMAD','N','','03342551289','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(103,13,0,'GOVERNMENT ELEMENTARY COLLEGE OF EDUCATION (MEN)  ','N','','03013617298','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(104,13,0,'GOVERNMENT ELEMENTARY COLLEGE OF EDUCATION (WOMEN)','N','','03003796085','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(105,13,0,'GOVERNMENT ELEMENTARY COLLEGE OF EDUCATION (MEN)  ','N','','03073432008','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(106,13,0,'GOVERNMENT ELEMENTARY COLLEGE OF EDUCATION (WOMEN)','N','','03003321446','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(107,13,0,'GOVERNMENT ELEMENTARY COLLEGE OF EDUCATION (MEN/ W','N','','03332707826','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(108,13,0,'GOVERNMENT ELEMENTARY COLLEGE OF EDUCATION (MEN)  ','N','','03003250562','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(109,13,0,'GOVERNMENT ELEMENTARY COLLEGE OF EDUCATION (WOMEN)','N','','03337076876','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(110,13,0,'GOVERNMENT ELEMENTARY COLLEGE OF EDUCATION (MEN)  ','N','','03023217823','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(111,13,0,'GOVERNMENT ELEMENTARY COLLEGE OF EDUCATION (WOMEN)','N','','03013641804','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(112,13,0,'GOVERNMENT ELEMENTARY COLLEGE OF EDUCATION (MEN)  ','N','','03332180822','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(113,13,0,'GOVERNMENT ELEMENTARY COLLEGE OF EDUCATION (WOMEN)','N','','03023909464','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(114,13,0,'GOVERNMENT ELEMENTARY COLLEGE OF EDUCATION (MEN)  ','N','','03463862138','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(115,13,0,'PROVINCIAL INSTITUTE OF TEACHERS EDUCATION (PITE) ','N','','03013610556','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(116,13,0,'INDUS COLLEGE OF LAW  HYDERABAD','N','','03332525427','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(117,5,25,'MEDICAL LABORATORY TECHNOLOGY','N','MLT','MEDICAL LABORATORY TECHNOLOGY','','e025582dca473c01bea5b4d525e5a59e','','','','',75),
(122,14,0,'GOVERNMENT COLLEGES','N','5.0','','','e025582dca473c01bea5b4d525e5a59e','','','','HYDERABAD',75),
(123,5,0,'NATIONAL CENTRE OF EXCELLENCE  IN ANALYTICAL CHEMI','N','NCEAC','','','','','','','',75),
(124,5,0,'INSTITUTE FOR ADVANCED RESEARCH STUDIES IN CHEMICA','N','','','','','','','','',75),
(125,15,0,'INFORMATION TECHNOLOGY SERVICES CENTRE','N','ITSC',NULL,'itsc@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','HoD22604','','','JAMSHORO',0),
(126,15,0,'REGISTRAR','Y',NULL,NULL,'registrar@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(127,15,0,'CONTROLLER OF EXAMINATIONS (SEMESTER)','Y','CES',NULL,'controller@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(128,15,0,'CONTROLLER OF EXAMINATIONS (ANNUAL)','Y','CEA',NULL,'controller.annual@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(129,15,0,'DIRECTOR ADMISSIONS','Y','DA',NULL,'dir.adms@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(130,15,0,'DIRECTOR FINANCE','Y','DF',NULL,'dir.fin@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(131,15,126,'ADMINISTRATION ADMIN OFFICE','N',NULL,NULL,'admin.admin.io@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(132,15,126,'ADMINISTRATION TEACH OFFICE','N',NULL,NULL,'admin.teach.io@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(133,15,126,'GENERAL BRANCH','N',NULL,NULL,'admin.general.io@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(134,15,130,'BURSUR, UNIVERSITY OF SINDH, JAMSHORO.','N',NULL,NULL,'bursar@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(135,15,130,'AUDITOR, UNIVERSITY OF SINDH, JAMSHORO','N',NULL,NULL,'auditor@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(136,15,130,'CHIEF ACCOUNTANT-I, UNIVERSITY OF SINDH, JAMSHORO','N',NULL,NULL,'chief.acount@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(137,15,129,'DIRECTORATE OF ADMISSIONS, UNIVERSITY OF SINDH','N',NULL,NULL,'admin.admissions@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(138,15,127,'DIRECTORATE OF CONTROLLER OF EXAMINATION (SEMESTER','N',NULL,NULL,'controller.io@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(139,15,128,'DIRECTORATE OF CONTROLLER OF EXAMINATION (ANNUAL)','N',NULL,NULL,'controller.annual.io@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(140,15,0,'INSPECTOR OF AFFILIATED COLLEGES, UNIVERSITY OF SI','N',NULL,NULL,'insp.colleges@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(141,15,0,'ADVISOR, PLANNING & DEVELOPMENT CELL, UNIVERSITY O','Y',NULL,NULL,'advisorpnd@usindh.edu.pk','','','','','JAMSHORO',0),
(142,15,141,'DIRECTORATE OF PLANNING & DEVELOPMENT CELL, UNIVER','N',NULL,NULL,'directorate.pnd.io@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(143,15,0,'DIRECTOR, PLANNING & DEVELOPMENT CELL, UNIVERSITY ','N',NULL,NULL,'dirpnd@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(144,15,0,'DIRECTOR OF PROCUREMENT, UNIVERSITY OF SINDH','Y',NULL,NULL,'pso@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0),
(145,15,144,'DIRECTORATE OF PROCUREMENT, UNIVERSITY OF SINDH','N',NULL,NULL,'pso.io@usindh.edu.pk','14736c9e8daf20c983172bd51c2bef97','','','','JAMSHORO',0);

/*Table structure for table `faculty` */

DROP TABLE IF EXISTS `faculty`;

CREATE TABLE `faculty` (
  `FAC_ID` int(3) NOT NULL DEFAULT 0,
  `FAC_NAME` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `REMARKS` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`FAC_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `faculty` */

insert  into `faculty`(`FAC_ID`,`FAC_NAME`,`REMARKS`) values 
(6,'SOCIAL SCIENCES',''),
(5,'NATURAL SCIENCES',''),
(2,'COMMERCE & BUSINESS ADMINISTRATION',''),
(7,'ARTS',''),
(8,'EDUCATION',''),
(10,'GENERAL (OTHER)',''),
(9,'ISLAMIC STUDIES',''),
(11,'PHARMACY',''),
(12,'LAW',''),
(13,'AFFILIATED COLLEGES/ INSTITUTIONS PUBLIC & PRIVATE',''),
(14,'ANNUAL SYSTEM',''),
(15,'ADMINISTRATIVE OFFICES',NULL);

/*Table structure for table `inout_ward` */

DROP TABLE IF EXISTS `inout_ward`;

CREATE TABLE `inout_ward` (
  `INOUT_ID` int(11) NOT NULL,
  `LETTERS_ID` int(11) DEFAULT NULL,
  `IN` int(11) DEFAULT NULL,
  `OUT` int(11) DEFAULT NULL,
  `IN_DATE` date DEFAULT NULL,
  `OUT_DATE` date DEFAULT NULL,
  `IS_CHANNELED` int(1) DEFAULT NULL,
  `PATH` text DEFAULT NULL,
  `INWARD_NO` varchar(100) DEFAULT NULL,
  `OUTWARD_NO` varchar(100) DEFAULT NULL,
  `STATUS` int(1) DEFAULT 0,
  `PREVIOUS` int(11) DEFAULT 0,
  PRIMARY KEY (`INOUT_ID`),
  KEY `members_inward_fk` (`IN`),
  KEY `members_outward_fk` (`OUT`),
  KEY `letters_detail_fk` (`LETTERS_ID`),
  CONSTRAINT `letter_detail_fk` FOREIGN KEY (`LETTERS_ID`) REFERENCES `letter_detail` (`LETTERS_ID`),
  CONSTRAINT `letter_receive_fk` FOREIGN KEY (`IN`) REFERENCES `department` (`DEPT_ID`),
  CONSTRAINT `letter_send_fk` FOREIGN KEY (`OUT`) REFERENCES `department` (`DEPT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inout_ward` */

insert  into `inout_ward`(`INOUT_ID`,`LETTERS_ID`,`IN`,`OUT`,`IN_DATE`,`OUT_DATE`,`IS_CHANNELED`,`PATH`,`INWARD_NO`,`OUTWARD_NO`,`STATUS`,`PREVIOUS`) values 
(1,1,9,3,'2019-09-03','2019-09-03',1,'-1','11','1',1,0),
(2,2,6,9,'2019-09-03','2019-09-03',1,'-1','3','2',1,1),
(3,3,7,6,'2019-09-03','2019-09-04',1,'-1','4/4/2019','3',1,2),
(4,4,3,7,'2019-09-03','2019-09-04',0,NULL,'8899','90',1,0);

/*Table structure for table `letter_detail` */

DROP TABLE IF EXISTS `letter_detail`;

CREATE TABLE `letter_detail` (
  `LETTERS_ID` int(11) NOT NULL,
  `SUBJECT` text DEFAULT NULL,
  `FILE_NO` varchar(100) DEFAULT NULL,
  `POSTAGE_CHARGES` varchar(20) DEFAULT NULL,
  `LETTER_IMAGE` text DEFAULT NULL,
  `REMARKS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`LETTERS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `letter_detail` */

insert  into `letter_detail`(`LETTERS_ID`,`SUBJECT`,`FILE_NO`,`POSTAGE_CHARGES`,`LETTER_IMAGE`,`REMARKS`) values 
(1,'To Test Again','1','00','../images/letters/1_To Test Again Sended By INSTITUTE OF INFORMATION &COMMUNICATION TECHNOLOGY.pdf','Should be responded on time'),
(2,'To Test Again','2','00','../images/letters/2_To Test Again Sended By INSTITUTE OF MATHEMATICS & COMPUTER SCIENCE.pdf','Should be responded on time'),
(3,'To Test Again','90','00','../images/letters/3_To Test Again Sended By INSTITUTE  OF BUSINESS ADMINISTRATION.pdf','good'),
(4,'Data Base Check And Application Test','90','00','../images/letters/4_Data Base Check And Application Test Sended By INSTITUTE OF COMMERCE.pdf','V.Good');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
