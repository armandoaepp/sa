/*
Navicat MySQL Data Transfer

Source Server         : LOCAL
Source Server Version : 50616
Source Host           : 127.0.0.1:3306
Source Database       : planeatec_sa

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-07-20 23:21:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for caserio
-- ----------------------------
DROP TABLE IF EXISTS `caserio`;
CREATE TABLE `caserio` (
  `nCasCodigo` int(11) unsigned NOT NULL,
  `cCasDescripcion` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nDisCodigo` int(11) unsigned NOT NULL,
  `nCasEstado` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`nCasCodigo`,`nDisCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of caserio
-- ----------------------------

-- ----------------------------
-- Table structure for departamento
-- ----------------------------
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `nDepCodigo` int(11) unsigned NOT NULL,
  `cDepDescripcion` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nPaiCodigo` int(11) unsigned NOT NULL,
  `nDepUbiCodigo` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `nDepEstado` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`nDepCodigo`,`nPaiCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of departamento
-- ----------------------------
INSERT INTO `departamento` VALUES ('1', 'AMAZONAS', '1', '01', '1');
INSERT INTO `departamento` VALUES ('2', 'ANCASH', '1', '02', '1');
INSERT INTO `departamento` VALUES ('3', 'APURIMAC', '1', '03', '1');
INSERT INTO `departamento` VALUES ('4', 'AREQUIPA', '1', '04', '1');
INSERT INTO `departamento` VALUES ('5', 'AYACUCHO', '1', '05', '1');
INSERT INTO `departamento` VALUES ('6', 'CAJAMARCA', '1', '06', '1');
INSERT INTO `departamento` VALUES ('7', 'CUSCO', '1', '07', '1');
INSERT INTO `departamento` VALUES ('8', 'HUANCAVELICA', '1', '08', '1');
INSERT INTO `departamento` VALUES ('9', 'HUANUCO', '1', '09', '1');
INSERT INTO `departamento` VALUES ('10', 'ICA', '1', '10', '1');
INSERT INTO `departamento` VALUES ('11', 'JUNIN', '1', '11', '1');
INSERT INTO `departamento` VALUES ('12', 'LA LIBERTAD', '1', '12', '1');
INSERT INTO `departamento` VALUES ('13', 'LAMBAYEQUE', '1', '13', '1');
INSERT INTO `departamento` VALUES ('14', 'LIMA', '1', '14', '1');
INSERT INTO `departamento` VALUES ('15', 'LORETO', '1', '15', '1');
INSERT INTO `departamento` VALUES ('16', 'MADRE DE DIOS', '1', '16', '1');
INSERT INTO `departamento` VALUES ('17', 'MOQUEGUA', '1', '17', '1');
INSERT INTO `departamento` VALUES ('18', 'PASCO', '1', '18', '1');
INSERT INTO `departamento` VALUES ('19', 'PIURA', '1', '19', '1');
INSERT INTO `departamento` VALUES ('20', 'PUNO', '1', '20', '1');
INSERT INTO `departamento` VALUES ('21', 'SAN MARTIN', '1', '21', '1');
INSERT INTO `departamento` VALUES ('22', 'TACNA', '1', '22', '1');
INSERT INTO `departamento` VALUES ('23', 'TUMBES', '1', '23', '1');
INSERT INTO `departamento` VALUES ('24', 'CALLAO', '1', '24', '1');
INSERT INTO `departamento` VALUES ('25', 'UCAYALI', '1', '25', '1');

-- ----------------------------
-- Table structure for distrito
-- ----------------------------
DROP TABLE IF EXISTS `distrito`;
CREATE TABLE `distrito` (
  `nDisCodigo` int(11) unsigned NOT NULL,
  `cDisDescripcion` varchar(200) CHARACTER SET utf8 NOT NULL,
  `nProCodigo` int(11) unsigned NOT NULL,
  `cDisUbiCodigo` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `nDisEstado` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`nDisCodigo`,`nProCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of distrito
-- ----------------------------
INSERT INTO `distrito` VALUES ('1', 'CHACHAPOYAS', '1', '010101', '1');
INSERT INTO `distrito` VALUES ('2', 'ASUNCION', '1', '010102', '1');
INSERT INTO `distrito` VALUES ('3', 'BALSAS', '1', '010103', '1');
INSERT INTO `distrito` VALUES ('4', 'CHETO', '1', '010104', '1');
INSERT INTO `distrito` VALUES ('5', 'CHILIQUIN', '1', '010105', '1');
INSERT INTO `distrito` VALUES ('6', 'CHUQUIBAMBA', '1', '010106', '1');
INSERT INTO `distrito` VALUES ('7', 'GRANADA', '1', '010107', '1');
INSERT INTO `distrito` VALUES ('8', 'HUANCAS', '1', '010108', '1');
INSERT INTO `distrito` VALUES ('9', 'LA JALCA', '1', '010109', '1');
INSERT INTO `distrito` VALUES ('10', 'LEIMEBAMBA', '1', '010110', '1');
INSERT INTO `distrito` VALUES ('11', 'LEVANTO', '1', '010111', '1');
INSERT INTO `distrito` VALUES ('12', 'MAGDALENA', '1', '010112', '1');
INSERT INTO `distrito` VALUES ('13', 'MARISCAL CASTILLA', '1', '010113', '1');
INSERT INTO `distrito` VALUES ('14', 'MOLINOPAMPA', '1', '010114', '1');
INSERT INTO `distrito` VALUES ('15', 'MONTEVIDEO', '1', '010115', '1');
INSERT INTO `distrito` VALUES ('16', 'OLLEROS', '1', '010116', '1');
INSERT INTO `distrito` VALUES ('17', 'QUINJALCA', '1', '010117', '1');
INSERT INTO `distrito` VALUES ('18', 'SAN FRANCISCO DE DAGUAS', '1', '010118', '1');
INSERT INTO `distrito` VALUES ('19', 'SAN ISIDRO DE MAINO', '1', '010119', '1');
INSERT INTO `distrito` VALUES ('20', 'SOLOCO', '1', '010120', '1');
INSERT INTO `distrito` VALUES ('21', 'SONCHE', '1', '010121', '1');
INSERT INTO `distrito` VALUES ('22', 'LA PECA', '2', '010201', '1');
INSERT INTO `distrito` VALUES ('23', 'ARAMANGO', '2', '010202', '1');
INSERT INTO `distrito` VALUES ('24', 'COPALLIN', '2', '010203', '1');
INSERT INTO `distrito` VALUES ('25', 'EL PARCO', '2', '010204', '1');
INSERT INTO `distrito` VALUES ('26', 'BAGUA', '2', '010205', '1');
INSERT INTO `distrito` VALUES ('27', 'IMAZA', '2', '010206', '1');
INSERT INTO `distrito` VALUES ('28', 'JUMBILLA', '3', '010301', '1');
INSERT INTO `distrito` VALUES ('29', 'COROSHA', '3', '010302', '1');
INSERT INTO `distrito` VALUES ('30', 'CUISPES', '3', '010303', '1');
INSERT INTO `distrito` VALUES ('31', 'CHISQUILLA', '3', '010304', '1');
INSERT INTO `distrito` VALUES ('32', 'CHURUJA', '3', '010305', '1');
INSERT INTO `distrito` VALUES ('33', 'FLORIDA', '3', '010306', '1');
INSERT INTO `distrito` VALUES ('34', 'RECTA', '3', '010307', '1');
INSERT INTO `distrito` VALUES ('35', 'SAN CARLOS', '3', '010308', '1');
INSERT INTO `distrito` VALUES ('36', 'SHIPASBAMBA', '3', '010309', '1');
INSERT INTO `distrito` VALUES ('37', 'VALERA', '3', '010310', '1');
INSERT INTO `distrito` VALUES ('38', 'YAMBRASBAMBA', '3', '010311', '1');
INSERT INTO `distrito` VALUES ('39', 'JAZAN', '3', '010312', '1');
INSERT INTO `distrito` VALUES ('40', 'LAMUD', '4', '010401', '1');
INSERT INTO `distrito` VALUES ('41', 'CAMPORREDONDO', '4', '010402', '1');
INSERT INTO `distrito` VALUES ('42', 'COCABAMBA', '4', '010403', '1');
INSERT INTO `distrito` VALUES ('43', 'COLCAMAR', '4', '010404', '1');
INSERT INTO `distrito` VALUES ('44', 'CONILA', '4', '010405', '1');
INSERT INTO `distrito` VALUES ('45', 'INGUILPATA', '4', '010406', '1');
INSERT INTO `distrito` VALUES ('46', 'LONGUITA', '4', '010407', '1');
INSERT INTO `distrito` VALUES ('47', 'LONYA CHICO', '4', '010408', '1');
INSERT INTO `distrito` VALUES ('48', 'LUYA', '4', '010409', '1');
INSERT INTO `distrito` VALUES ('49', 'LUYA VIEJO', '4', '010410', '1');
INSERT INTO `distrito` VALUES ('50', 'MARIA', '4', '010411', '1');
INSERT INTO `distrito` VALUES ('51', 'OCALLI', '4', '010412', '1');
INSERT INTO `distrito` VALUES ('52', 'OCUMAL', '4', '010413', '1');
INSERT INTO `distrito` VALUES ('53', 'PISUQUIA', '4', '010414', '1');
INSERT INTO `distrito` VALUES ('54', 'SAN CRISTOBAL', '4', '010415', '1');
INSERT INTO `distrito` VALUES ('55', 'SAN FRANCISCO DE YESO', '4', '010416', '1');
INSERT INTO `distrito` VALUES ('56', 'SAN JERONIMO', '4', '010417', '1');
INSERT INTO `distrito` VALUES ('57', 'SAN JUAN DE LOPECANCHA', '4', '010418', '1');
INSERT INTO `distrito` VALUES ('58', 'SANTA CATALINA', '4', '010419', '1');
INSERT INTO `distrito` VALUES ('59', 'SANTO TOMAS', '4', '010420', '1');
INSERT INTO `distrito` VALUES ('60', 'TINGO', '4', '010421', '1');
INSERT INTO `distrito` VALUES ('61', 'TRITA', '4', '010422', '1');
INSERT INTO `distrito` VALUES ('62', 'PROVIDENCIA', '4', '010423', '1');
INSERT INTO `distrito` VALUES ('63', 'SAN NICOLAS', '5', '010501', '1');
INSERT INTO `distrito` VALUES ('64', 'COCHAMAL', '5', '010502', '1');
INSERT INTO `distrito` VALUES ('65', 'CHIRIMOTO', '5', '010503', '1');
INSERT INTO `distrito` VALUES ('66', 'HUAMBO', '5', '010504', '1');
INSERT INTO `distrito` VALUES ('67', 'LIMABAMBA', '5', '010505', '1');
INSERT INTO `distrito` VALUES ('68', 'LONGAR', '5', '010506', '1');
INSERT INTO `distrito` VALUES ('69', 'MILPUCC', '5', '010507', '1');
INSERT INTO `distrito` VALUES ('70', 'MARISCAL BENAVIDES', '5', '010508', '1');
INSERT INTO `distrito` VALUES ('71', 'OMIA', '5', '010509', '1');
INSERT INTO `distrito` VALUES ('72', 'SANTA ROSA', '5', '010510', '1');
INSERT INTO `distrito` VALUES ('73', 'TOTORA', '5', '010511', '1');
INSERT INTO `distrito` VALUES ('74', 'VISTA ALEGRE', '5', '010512', '1');
INSERT INTO `distrito` VALUES ('75', 'NIEVA', '6', '010601', '1');
INSERT INTO `distrito` VALUES ('76', 'RIO SANTIAGO', '6', '010602', '1');
INSERT INTO `distrito` VALUES ('77', 'EL CENEPA', '6', '010603', '1');
INSERT INTO `distrito` VALUES ('78', 'BAGUA GRANDE', '7', '010701', '1');
INSERT INTO `distrito` VALUES ('79', 'CAJARURO', '7', '010702', '1');
INSERT INTO `distrito` VALUES ('80', 'CUMBA', '7', '010703', '1');
INSERT INTO `distrito` VALUES ('81', 'EL MILAGRO', '7', '010704', '1');
INSERT INTO `distrito` VALUES ('82', 'JAMALCA', '7', '010705', '1');
INSERT INTO `distrito` VALUES ('83', 'LONYA GRANDE', '7', '010706', '1');
INSERT INTO `distrito` VALUES ('84', 'YAMON', '7', '010707', '1');
INSERT INTO `distrito` VALUES ('85', 'HUARAZ', '8', '020101', '1');
INSERT INTO `distrito` VALUES ('86', 'INDEPENDENCIA', '8', '020102', '1');
INSERT INTO `distrito` VALUES ('87', 'COCHABAMBA', '8', '020103', '1');
INSERT INTO `distrito` VALUES ('88', 'COLCABAMBA', '8', '020104', '1');
INSERT INTO `distrito` VALUES ('89', 'HUANCHAY', '8', '020105', '1');
INSERT INTO `distrito` VALUES ('90', 'JANGAS', '8', '020106', '1');
INSERT INTO `distrito` VALUES ('91', 'LA LIBERTAD', '8', '020107', '1');
INSERT INTO `distrito` VALUES ('92', 'OLLEROS', '8', '020108', '1');
INSERT INTO `distrito` VALUES ('93', 'PAMPAS GRANDE', '8', '020109', '1');
INSERT INTO `distrito` VALUES ('94', 'PARIACOTO', '8', '020110', '1');
INSERT INTO `distrito` VALUES ('95', 'PIRA', '8', '020111', '1');
INSERT INTO `distrito` VALUES ('96', 'TARICA', '8', '020112', '1');
INSERT INTO `distrito` VALUES ('97', 'AIJA', '9', '020201', '1');
INSERT INTO `distrito` VALUES ('98', 'CORIS', '9', '020203', '1');
INSERT INTO `distrito` VALUES ('99', 'HUACLLAN', '9', '020205', '1');
INSERT INTO `distrito` VALUES ('100', 'LA MERCED', '9', '020206', '1');
INSERT INTO `distrito` VALUES ('101', 'SUCCHA', '9', '020208', '1');
INSERT INTO `distrito` VALUES ('102', 'CHIQUIAN', '10', '020301', '1');
INSERT INTO `distrito` VALUES ('103', 'ABELARDO PARDO LEZAMETA', '10', '020302', '1');
INSERT INTO `distrito` VALUES ('104', 'AQUIA', '10', '020304', '1');
INSERT INTO `distrito` VALUES ('105', 'CAJACAY', '10', '020305', '1');
INSERT INTO `distrito` VALUES ('106', 'HUAYLLACAYAN', '10', '020310', '1');
INSERT INTO `distrito` VALUES ('107', 'HUASTA', '10', '020311', '1');
INSERT INTO `distrito` VALUES ('108', 'MANGAS', '10', '020313', '1');
INSERT INTO `distrito` VALUES ('109', 'PACLLON', '10', '020315', '1');
INSERT INTO `distrito` VALUES ('110', 'SAN MIGUEL DE CORPANQUI', '10', '020317', '1');
INSERT INTO `distrito` VALUES ('111', 'TICLLOS', '10', '020320', '1');
INSERT INTO `distrito` VALUES ('112', 'ANTONIO RAIMONDI', '10', '020321', '1');
INSERT INTO `distrito` VALUES ('113', 'CANIS', '10', '020322', '1');
INSERT INTO `distrito` VALUES ('114', 'COLQUIOC', '10', '020323', '1');
INSERT INTO `distrito` VALUES ('115', 'LA PRIMAVERA', '10', '020324', '1');
INSERT INTO `distrito` VALUES ('116', 'HUALLANCA', '10', '020325', '1');
INSERT INTO `distrito` VALUES ('117', 'CARHUAZ', '11', '020401', '1');
INSERT INTO `distrito` VALUES ('118', 'ACOPAMPA', '11', '020402', '1');
INSERT INTO `distrito` VALUES ('119', 'AMASHCA', '11', '020403', '1');
INSERT INTO `distrito` VALUES ('120', 'ANTA', '11', '020404', '1');
INSERT INTO `distrito` VALUES ('121', 'ATAQUERO', '11', '020405', '1');
INSERT INTO `distrito` VALUES ('122', 'MARCARA', '11', '020406', '1');
INSERT INTO `distrito` VALUES ('123', 'PARIAHUANCA', '11', '020407', '1');
INSERT INTO `distrito` VALUES ('124', 'SAN MIGUEL DE ACO', '11', '020408', '1');
INSERT INTO `distrito` VALUES ('125', 'SHILLA', '11', '020409', '1');
INSERT INTO `distrito` VALUES ('126', 'TINCO', '11', '020410', '1');
INSERT INTO `distrito` VALUES ('127', 'YUNGAR', '11', '020411', '1');
INSERT INTO `distrito` VALUES ('128', 'CASMA', '12', '020501', '1');
INSERT INTO `distrito` VALUES ('129', 'BUENA VISTA ALTA', '12', '020502', '1');
INSERT INTO `distrito` VALUES ('130', 'COMANDANTE NOEL', '12', '020503', '1');
INSERT INTO `distrito` VALUES ('131', 'YAUTAN', '12', '020505', '1');
INSERT INTO `distrito` VALUES ('132', 'CORONGO', '13', '020601', '1');
INSERT INTO `distrito` VALUES ('133', 'ACO', '13', '020602', '1');
INSERT INTO `distrito` VALUES ('134', 'BAMBAS', '13', '020603', '1');
INSERT INTO `distrito` VALUES ('135', 'CUSCA', '13', '020604', '1');
INSERT INTO `distrito` VALUES ('136', 'LA PAMPA', '13', '020605', '1');
INSERT INTO `distrito` VALUES ('137', 'YANAC', '13', '020606', '1');
INSERT INTO `distrito` VALUES ('138', 'YUPAN', '13', '020607', '1');
INSERT INTO `distrito` VALUES ('139', 'CARAZ', '14', '020701', '1');
INSERT INTO `distrito` VALUES ('140', 'HUALLANCA', '14', '020702', '1');
INSERT INTO `distrito` VALUES ('141', 'HUATA', '14', '020703', '1');
INSERT INTO `distrito` VALUES ('142', 'HUAYLAS', '14', '020704', '1');
INSERT INTO `distrito` VALUES ('143', 'MATO', '14', '020705', '1');
INSERT INTO `distrito` VALUES ('144', 'PAMPAROMAS', '14', '020706', '1');
INSERT INTO `distrito` VALUES ('145', 'PUEBLO LIBRE', '14', '020707', '1');
INSERT INTO `distrito` VALUES ('146', 'SANTA CRUZ', '14', '020708', '1');
INSERT INTO `distrito` VALUES ('147', 'YURACMARCA', '14', '020709', '1');
INSERT INTO `distrito` VALUES ('148', 'SANTO TORIBIO', '14', '020710', '1');
INSERT INTO `distrito` VALUES ('149', 'HUARI', '15', '020801', '1');
INSERT INTO `distrito` VALUES ('150', 'CAJAY', '15', '020802', '1');
INSERT INTO `distrito` VALUES ('151', 'CHAVIN DE HUANTAR', '15', '020803', '1');
INSERT INTO `distrito` VALUES ('152', 'HUACACHI', '15', '020804', '1');
INSERT INTO `distrito` VALUES ('153', 'HUACHIS', '15', '020805', '1');
INSERT INTO `distrito` VALUES ('154', 'HUACCHIS', '15', '020806', '1');
INSERT INTO `distrito` VALUES ('155', 'HUANTAR', '15', '020807', '1');
INSERT INTO `distrito` VALUES ('156', 'MASIN', '15', '020808', '1');
INSERT INTO `distrito` VALUES ('157', 'PAUCAS', '15', '020809', '1');
INSERT INTO `distrito` VALUES ('158', 'PONTO', '15', '020810', '1');
INSERT INTO `distrito` VALUES ('159', 'RAHUAPAMPA', '15', '020811', '1');
INSERT INTO `distrito` VALUES ('160', 'RAPAYAN', '15', '020812', '1');
INSERT INTO `distrito` VALUES ('161', 'SAN MARCOS', '15', '020813', '1');
INSERT INTO `distrito` VALUES ('162', 'SAN PEDRO DE CHANA', '15', '020814', '1');
INSERT INTO `distrito` VALUES ('163', 'UCO', '15', '020815', '1');
INSERT INTO `distrito` VALUES ('164', 'ANRA', '15', '020816', '1');
INSERT INTO `distrito` VALUES ('165', 'PISCOBAMBA', '16', '020901', '1');
INSERT INTO `distrito` VALUES ('166', 'CASCA', '16', '020902', '1');
INSERT INTO `distrito` VALUES ('167', 'LUCMA', '16', '020903', '1');
INSERT INTO `distrito` VALUES ('168', 'FIDEL OLIVAS ESCUDERO', '16', '020904', '1');
INSERT INTO `distrito` VALUES ('169', 'LLAMA', '16', '020905', '1');
INSERT INTO `distrito` VALUES ('170', 'LLUMPA', '16', '020906', '1');
INSERT INTO `distrito` VALUES ('171', 'MUSGA', '16', '020907', '1');
INSERT INTO `distrito` VALUES ('172', 'ELEAZAR GUZMAN BARRON', '16', '020908', '1');
INSERT INTO `distrito` VALUES ('173', 'CABANA', '17', '021001', '1');
INSERT INTO `distrito` VALUES ('174', 'BOLOGNESI', '17', '021002', '1');
INSERT INTO `distrito` VALUES ('175', 'CONCHUCOS', '17', '021003', '1');
INSERT INTO `distrito` VALUES ('176', 'HUACASCHUQUE', '17', '021004', '1');
INSERT INTO `distrito` VALUES ('177', 'HUANDOVAL', '17', '021005', '1');
INSERT INTO `distrito` VALUES ('178', 'LACABAMBA', '17', '021006', '1');
INSERT INTO `distrito` VALUES ('179', 'LLAPO', '17', '021007', '1');
INSERT INTO `distrito` VALUES ('180', 'PALLASCA', '17', '021008', '1');
INSERT INTO `distrito` VALUES ('181', 'PAMPAS', '17', '021009', '1');
INSERT INTO `distrito` VALUES ('182', 'SANTA ROSA', '17', '021010', '1');
INSERT INTO `distrito` VALUES ('183', 'TAUCA', '17', '021011', '1');
INSERT INTO `distrito` VALUES ('184', 'POMABAMBA', '18', '021101', '1');
INSERT INTO `distrito` VALUES ('185', 'HUAYLLAN', '18', '021102', '1');
INSERT INTO `distrito` VALUES ('186', 'PAROBAMBA', '18', '021103', '1');
INSERT INTO `distrito` VALUES ('187', 'QUINUABAMBA', '18', '021104', '1');
INSERT INTO `distrito` VALUES ('188', 'RECUAY', '19', '021201', '1');
INSERT INTO `distrito` VALUES ('189', 'COTAPARACO', '19', '021202', '1');
INSERT INTO `distrito` VALUES ('190', 'HUAYLLAPAMPA', '19', '021203', '1');
INSERT INTO `distrito` VALUES ('191', 'MARCA', '19', '021204', '1');
INSERT INTO `distrito` VALUES ('192', 'PAMPAS CHICO', '19', '021205', '1');
INSERT INTO `distrito` VALUES ('193', 'PARARIN', '19', '021206', '1');
INSERT INTO `distrito` VALUES ('194', 'TAPACOCHA', '19', '021207', '1');
INSERT INTO `distrito` VALUES ('195', 'TICAPAMPA', '19', '021208', '1');
INSERT INTO `distrito` VALUES ('196', 'LLACLLIN', '19', '021209', '1');
INSERT INTO `distrito` VALUES ('197', 'CATAC', '19', '021210', '1');
INSERT INTO `distrito` VALUES ('198', 'CHIMBOTE', '20', '021301', '1');
INSERT INTO `distrito` VALUES ('199', 'CACERES DEL PERU', '20', '021302', '1');
INSERT INTO `distrito` VALUES ('200', 'MACATE', '20', '021303', '1');
INSERT INTO `distrito` VALUES ('201', 'MORO', '20', '021304', '1');
INSERT INTO `distrito` VALUES ('202', 'NEPEÑA', '20', '021305', '1');
INSERT INTO `distrito` VALUES ('203', 'SAMANCO', '20', '021306', '1');
INSERT INTO `distrito` VALUES ('204', 'SANTA', '20', '021307', '1');
INSERT INTO `distrito` VALUES ('205', 'COISHCO', '20', '021308', '1');
INSERT INTO `distrito` VALUES ('206', 'NUEVO CHIMBOTE', '20', '021309', '1');
INSERT INTO `distrito` VALUES ('207', 'SIHUAS', '21', '021401', '1');
INSERT INTO `distrito` VALUES ('208', 'ALFONSO UGARTE', '21', '021402', '1');
INSERT INTO `distrito` VALUES ('209', 'CHINGALPO', '21', '021403', '1');
INSERT INTO `distrito` VALUES ('210', 'HUAYLLABAMBA', '21', '021404', '1');
INSERT INTO `distrito` VALUES ('211', 'QUICHES', '21', '021405', '1');
INSERT INTO `distrito` VALUES ('212', 'SICSIBAMBA', '21', '021406', '1');
INSERT INTO `distrito` VALUES ('213', 'ACOBAMBA', '21', '021407', '1');
INSERT INTO `distrito` VALUES ('214', 'CASHAPAMPA', '21', '021408', '1');
INSERT INTO `distrito` VALUES ('215', 'RAGASH', '21', '021409', '1');
INSERT INTO `distrito` VALUES ('216', 'SAN JUAN', '21', '021410', '1');
INSERT INTO `distrito` VALUES ('217', 'YUNGAY', '22', '021501', '1');
INSERT INTO `distrito` VALUES ('218', 'CASCAPARA', '22', '021502', '1');
INSERT INTO `distrito` VALUES ('219', 'MANCOS', '22', '021503', '1');
INSERT INTO `distrito` VALUES ('220', 'MATACOTO', '22', '021504', '1');
INSERT INTO `distrito` VALUES ('221', 'QUILLO', '22', '021505', '1');
INSERT INTO `distrito` VALUES ('222', 'RANRAHIRCA', '22', '021506', '1');
INSERT INTO `distrito` VALUES ('223', 'SHUPLUY', '22', '021507', '1');
INSERT INTO `distrito` VALUES ('224', 'YANAMA', '22', '021508', '1');
INSERT INTO `distrito` VALUES ('225', 'LLAMELLIN', '23', '021601', '1');
INSERT INTO `distrito` VALUES ('226', 'ACZO', '23', '021602', '1');
INSERT INTO `distrito` VALUES ('227', 'CHACCHO', '23', '021603', '1');
INSERT INTO `distrito` VALUES ('228', 'CHINGAS', '23', '021604', '1');
INSERT INTO `distrito` VALUES ('229', 'MIRGAS', '23', '021605', '1');
INSERT INTO `distrito` VALUES ('230', 'SAN JUAN DE RONTOY', '23', '021606', '1');
INSERT INTO `distrito` VALUES ('231', 'SAN LUIS', '24', '021701', '1');
INSERT INTO `distrito` VALUES ('232', 'YAUYA', '24', '021702', '1');
INSERT INTO `distrito` VALUES ('233', 'SAN NICOLAS', '24', '021703', '1');
INSERT INTO `distrito` VALUES ('234', 'CHACAS', '25', '021801', '1');
INSERT INTO `distrito` VALUES ('235', 'ACOCHACA', '25', '021802', '1');
INSERT INTO `distrito` VALUES ('236', 'HUARMEY', '26', '021901', '1');
INSERT INTO `distrito` VALUES ('237', 'COCHAPETI', '26', '021902', '1');
INSERT INTO `distrito` VALUES ('238', 'HUAYAN', '26', '021903', '1');
INSERT INTO `distrito` VALUES ('239', 'MALVAS', '26', '021904', '1');
INSERT INTO `distrito` VALUES ('240', 'CULEBRAS', '26', '021905', '1');
INSERT INTO `distrito` VALUES ('241', 'ACAS', '27', '022001', '1');
INSERT INTO `distrito` VALUES ('242', 'CAJAMARQUILLA', '27', '022002', '1');
INSERT INTO `distrito` VALUES ('243', 'CARHUAPAMPA', '27', '022003', '1');
INSERT INTO `distrito` VALUES ('244', 'COCHAS', '27', '022004', '1');
INSERT INTO `distrito` VALUES ('245', 'CONGAS', '27', '022005', '1');
INSERT INTO `distrito` VALUES ('246', 'LLIPA', '27', '022006', '1');
INSERT INTO `distrito` VALUES ('247', 'OCROS', '27', '022007', '1');
INSERT INTO `distrito` VALUES ('248', 'SAN CRISTOBAL DE RAJAN', '27', '022008', '1');
INSERT INTO `distrito` VALUES ('249', 'SAN PEDRO', '27', '022009', '1');
INSERT INTO `distrito` VALUES ('250', 'SANTIAGO DE CHILCAS', '27', '022010', '1');
INSERT INTO `distrito` VALUES ('251', 'ABANCAY', '28', '030101', '1');
INSERT INTO `distrito` VALUES ('252', 'CIRCA', '28', '030102', '1');
INSERT INTO `distrito` VALUES ('253', 'CURAHUASI', '28', '030103', '1');
INSERT INTO `distrito` VALUES ('254', 'CHACOCHE', '28', '030104', '1');
INSERT INTO `distrito` VALUES ('255', 'HUANIPACA', '28', '030105', '1');
INSERT INTO `distrito` VALUES ('256', 'LAMBRAMA', '28', '030106', '1');
INSERT INTO `distrito` VALUES ('257', 'PICHIRHUA', '28', '030107', '1');
INSERT INTO `distrito` VALUES ('258', 'SAN PEDRO DE CACHORA', '28', '030108', '1');
INSERT INTO `distrito` VALUES ('259', 'TAMBURCO', '28', '030109', '1');
INSERT INTO `distrito` VALUES ('260', 'CHALHUANCA', '29', '030201', '1');
INSERT INTO `distrito` VALUES ('261', 'CAPAYA', '29', '030202', '1');
INSERT INTO `distrito` VALUES ('262', 'CARAYBAMBA', '29', '030203', '1');
INSERT INTO `distrito` VALUES ('263', 'COLCABAMBA', '29', '030204', '1');
INSERT INTO `distrito` VALUES ('264', 'COTARUSE', '29', '030205', '1');
INSERT INTO `distrito` VALUES ('265', 'CHAPIMARCA', '29', '030206', '1');
INSERT INTO `distrito` VALUES ('266', 'HUAYLLO', '29', '030207', '1');
INSERT INTO `distrito` VALUES ('267', 'LUCRE', '29', '030208', '1');
INSERT INTO `distrito` VALUES ('268', 'POCOHUANCA', '29', '030209', '1');
INSERT INTO `distrito` VALUES ('269', 'SAÑAYCA', '29', '030210', '1');
INSERT INTO `distrito` VALUES ('270', 'SORAYA', '29', '030211', '1');
INSERT INTO `distrito` VALUES ('271', 'TAPAIRIHUA', '29', '030212', '1');
INSERT INTO `distrito` VALUES ('272', 'TINTAY', '29', '030213', '1');
INSERT INTO `distrito` VALUES ('273', 'TORAYA', '29', '030214', '1');
INSERT INTO `distrito` VALUES ('274', 'YANACA', '29', '030215', '1');
INSERT INTO `distrito` VALUES ('275', 'SAN JUAN DE CHACÑA', '29', '030216', '1');
INSERT INTO `distrito` VALUES ('276', 'JUSTO APU SAHUARAURA', '29', '030217', '1');
INSERT INTO `distrito` VALUES ('277', 'ANDAHUAYLAS', '30', '030301', '1');
INSERT INTO `distrito` VALUES ('278', 'ANDARAPA', '30', '030302', '1');
INSERT INTO `distrito` VALUES ('279', 'CHIARA', '30', '030303', '1');
INSERT INTO `distrito` VALUES ('280', 'HUANCARAMA', '30', '030304', '1');
INSERT INTO `distrito` VALUES ('281', 'HUANCARAY', '30', '030305', '1');
INSERT INTO `distrito` VALUES ('282', 'KISHUARA', '30', '030306', '1');
INSERT INTO `distrito` VALUES ('283', 'PACOBAMBA', '30', '030307', '1');
INSERT INTO `distrito` VALUES ('284', 'PAMPACHIRI', '30', '030308', '1');
INSERT INTO `distrito` VALUES ('285', 'SAN ANTONIO DE CACHI', '30', '030309', '1');
INSERT INTO `distrito` VALUES ('286', 'SAN JERONIMO', '30', '030310', '1');
INSERT INTO `distrito` VALUES ('287', 'TALAVERA', '30', '030311', '1');
INSERT INTO `distrito` VALUES ('288', 'TURPO', '30', '030312', '1');
INSERT INTO `distrito` VALUES ('289', 'PACUCHA', '30', '030313', '1');
INSERT INTO `distrito` VALUES ('290', 'POMACOCHA', '30', '030314', '1');
INSERT INTO `distrito` VALUES ('291', 'SANTA MARIA DE CHICMO', '30', '030315', '1');
INSERT INTO `distrito` VALUES ('292', 'TUMAY HUARACA', '30', '030316', '1');
INSERT INTO `distrito` VALUES ('293', 'HUAYANA', '30', '030317', '1');
INSERT INTO `distrito` VALUES ('294', 'SAN MIGUEL DE CHACCRAMPA', '30', '030318', '1');
INSERT INTO `distrito` VALUES ('295', 'KAQUIABAMBA', '30', '030319', '1');
INSERT INTO `distrito` VALUES ('296', 'ANTABAMBA', '31', '030401', '1');
INSERT INTO `distrito` VALUES ('297', 'EL ORO', '31', '030402', '1');
INSERT INTO `distrito` VALUES ('298', 'HUAQUIRCA', '31', '030403', '1');
INSERT INTO `distrito` VALUES ('299', 'JUAN ESPINOZA MEDRANO', '31', '030404', '1');
INSERT INTO `distrito` VALUES ('300', 'OROPESA', '31', '030405', '1');
INSERT INTO `distrito` VALUES ('301', 'PACHACONAS', '31', '030406', '1');
INSERT INTO `distrito` VALUES ('302', 'SABAINO', '31', '030407', '1');
INSERT INTO `distrito` VALUES ('303', 'TAMBOBAMBA', '32', '030501', '1');
INSERT INTO `distrito` VALUES ('304', 'COYLLURQUI', '32', '030502', '1');
INSERT INTO `distrito` VALUES ('305', 'COTABAMBAS', '32', '030503', '1');
INSERT INTO `distrito` VALUES ('306', 'HAQUIRA', '32', '030504', '1');
INSERT INTO `distrito` VALUES ('307', 'MARA', '32', '030505', '1');
INSERT INTO `distrito` VALUES ('308', 'CHALLHUAHUACHO', '32', '030506', '1');
INSERT INTO `distrito` VALUES ('309', 'CHUQUIBAMBILLA', '33', '030601', '1');
INSERT INTO `distrito` VALUES ('310', 'CURPAHUASI', '33', '030602', '1');
INSERT INTO `distrito` VALUES ('311', 'HUAILLATI', '33', '030603', '1');
INSERT INTO `distrito` VALUES ('312', 'MAMARA', '33', '030604', '1');
INSERT INTO `distrito` VALUES ('313', 'MARISCAL GAMARRA', '33', '030605', '1');
INSERT INTO `distrito` VALUES ('314', 'MICAELA BASTIDAS', '33', '030606', '1');
INSERT INTO `distrito` VALUES ('315', 'PROGRESO', '33', '030607', '1');
INSERT INTO `distrito` VALUES ('316', 'PATAYPAMPA', '33', '030608', '1');
INSERT INTO `distrito` VALUES ('317', 'SAN ANTONIO', '33', '030609', '1');
INSERT INTO `distrito` VALUES ('318', 'TURPAY', '33', '030610', '1');
INSERT INTO `distrito` VALUES ('319', 'VILCABAMBA', '33', '030611', '1');
INSERT INTO `distrito` VALUES ('320', 'VIRUNDO', '33', '030612', '1');
INSERT INTO `distrito` VALUES ('321', 'SANTA ROSA', '33', '030613', '1');
INSERT INTO `distrito` VALUES ('322', 'CURASCO', '33', '030614', '1');
INSERT INTO `distrito` VALUES ('323', 'CHINCHEROS', '34', '030701', '1');
INSERT INTO `distrito` VALUES ('324', 'ONGOY', '34', '030702', '1');
INSERT INTO `distrito` VALUES ('325', 'OCOBAMBA', '34', '030703', '1');
INSERT INTO `distrito` VALUES ('326', 'COCHARCAS', '34', '030704', '1');
INSERT INTO `distrito` VALUES ('327', 'ANCO HUALLO', '34', '030705', '1');
INSERT INTO `distrito` VALUES ('328', 'HUACCANA', '34', '030706', '1');
INSERT INTO `distrito` VALUES ('329', 'URANMARCA', '34', '030707', '1');
INSERT INTO `distrito` VALUES ('330', 'RANRACANCHA', '34', '030708', '1');
INSERT INTO `distrito` VALUES ('331', 'AREQUIPA', '35', '040101', '1');
INSERT INTO `distrito` VALUES ('332', 'CAYMA', '35', '040102', '1');
INSERT INTO `distrito` VALUES ('333', 'CERRO COLORADO', '35', '040103', '1');
INSERT INTO `distrito` VALUES ('334', 'CHARACATO', '35', '040104', '1');
INSERT INTO `distrito` VALUES ('335', 'CHIGUATA', '35', '040105', '1');
INSERT INTO `distrito` VALUES ('336', 'LA JOYA', '35', '040106', '1');
INSERT INTO `distrito` VALUES ('337', 'MIRAFLORES', '35', '040107', '1');
INSERT INTO `distrito` VALUES ('338', 'MOLLEBAYA', '35', '040108', '1');
INSERT INTO `distrito` VALUES ('339', 'PAUCARPATA', '35', '040109', '1');
INSERT INTO `distrito` VALUES ('340', 'POCSI', '35', '040110', '1');
INSERT INTO `distrito` VALUES ('341', 'POLOBAYA', '35', '040111', '1');
INSERT INTO `distrito` VALUES ('342', 'QUEQUEÑA', '35', '040112', '1');
INSERT INTO `distrito` VALUES ('343', 'SABANDIA', '35', '040113', '1');
INSERT INTO `distrito` VALUES ('344', 'SACHACA', '35', '040114', '1');
INSERT INTO `distrito` VALUES ('345', 'SAN JUAN DE SIGUAS', '35', '040115', '1');
INSERT INTO `distrito` VALUES ('346', 'SAN JUAN DE TARUCANI', '35', '040116', '1');
INSERT INTO `distrito` VALUES ('347', 'SANTA ISABEL DE SIGUAS', '35', '040117', '1');
INSERT INTO `distrito` VALUES ('348', 'SANTA RITA DE SIHUAS', '35', '040118', '1');
INSERT INTO `distrito` VALUES ('349', 'SOCABAYA', '35', '040119', '1');
INSERT INTO `distrito` VALUES ('350', 'TIABAYA', '35', '040120', '1');
INSERT INTO `distrito` VALUES ('351', 'UCHUMAYO', '35', '040121', '1');
INSERT INTO `distrito` VALUES ('352', 'VITOR', '35', '040122', '1');
INSERT INTO `distrito` VALUES ('353', 'YANAHUARA', '35', '040123', '1');
INSERT INTO `distrito` VALUES ('354', 'YARABAMBA', '35', '040124', '1');
INSERT INTO `distrito` VALUES ('355', 'YURA', '35', '040125', '1');
INSERT INTO `distrito` VALUES ('356', 'MARIANO MELGAR', '35', '040126', '1');
INSERT INTO `distrito` VALUES ('357', 'JACOBO HUNTER', '35', '040127', '1');
INSERT INTO `distrito` VALUES ('358', 'ALTO SELVA ALEGRE', '35', '040128', '1');
INSERT INTO `distrito` VALUES ('359', 'JOSE LUIS BUSTAMANTE Y RIVERO', '35', '040129', '1');
INSERT INTO `distrito` VALUES ('360', 'CHIVAY', '36', '040201', '1');
INSERT INTO `distrito` VALUES ('361', 'ACHOMA', '36', '040202', '1');
INSERT INTO `distrito` VALUES ('362', 'CABANACONDE', '36', '040203', '1');
INSERT INTO `distrito` VALUES ('363', 'CAYLLOMA', '36', '040204', '1');
INSERT INTO `distrito` VALUES ('364', 'CALLALLI', '36', '040205', '1');
INSERT INTO `distrito` VALUES ('365', 'COPORAQUE', '36', '040206', '1');
INSERT INTO `distrito` VALUES ('366', 'HUAMBO', '36', '040207', '1');
INSERT INTO `distrito` VALUES ('367', 'HUANCA', '36', '040208', '1');
INSERT INTO `distrito` VALUES ('368', 'ICHUPAMPA', '36', '040209', '1');
INSERT INTO `distrito` VALUES ('369', 'LARI', '36', '040210', '1');
INSERT INTO `distrito` VALUES ('370', 'LLUTA', '36', '040211', '1');
INSERT INTO `distrito` VALUES ('371', 'MACA', '36', '040212', '1');
INSERT INTO `distrito` VALUES ('372', 'MADRIGAL', '36', '040213', '1');
INSERT INTO `distrito` VALUES ('373', 'SAN ANTONIO DE CHUCA', '36', '040214', '1');
INSERT INTO `distrito` VALUES ('374', 'SIBAYO', '36', '040215', '1');
INSERT INTO `distrito` VALUES ('375', 'TAPAY', '36', '040216', '1');
INSERT INTO `distrito` VALUES ('376', 'TISCO', '36', '040217', '1');
INSERT INTO `distrito` VALUES ('377', 'TUTI', '36', '040218', '1');
INSERT INTO `distrito` VALUES ('378', 'YANQUE', '36', '040219', '1');
INSERT INTO `distrito` VALUES ('379', 'MAJES', '36', '040220', '1');
INSERT INTO `distrito` VALUES ('380', 'CAMANA', '37', '040301', '1');
INSERT INTO `distrito` VALUES ('381', 'JOSE MARIA QUIMPER', '37', '040302', '1');
INSERT INTO `distrito` VALUES ('382', 'MARIANO NICOLAS VALCARCEL', '37', '040303', '1');
INSERT INTO `distrito` VALUES ('383', 'MARISCAL CACERES', '37', '040304', '1');
INSERT INTO `distrito` VALUES ('384', 'NICOLAS DE PIEROLA', '37', '040305', '1');
INSERT INTO `distrito` VALUES ('385', 'OCOÑA', '37', '040306', '1');
INSERT INTO `distrito` VALUES ('386', 'QUILCA', '37', '040307', '1');
INSERT INTO `distrito` VALUES ('387', 'SAMUEL PASTOR', '37', '040308', '1');
INSERT INTO `distrito` VALUES ('388', 'CARAVELI', '38', '040401', '1');
INSERT INTO `distrito` VALUES ('389', 'ACARI', '38', '040402', '1');
INSERT INTO `distrito` VALUES ('390', 'ATICO', '38', '040403', '1');
INSERT INTO `distrito` VALUES ('391', 'ATIQUIPA', '38', '040404', '1');
INSERT INTO `distrito` VALUES ('392', 'BELLA UNION', '38', '040405', '1');
INSERT INTO `distrito` VALUES ('393', 'CAHUACHO', '38', '040406', '1');
INSERT INTO `distrito` VALUES ('394', 'CHALA', '38', '040407', '1');
INSERT INTO `distrito` VALUES ('395', 'CHAPARRA', '38', '040408', '1');
INSERT INTO `distrito` VALUES ('396', 'HUANUHUANU', '38', '040409', '1');
INSERT INTO `distrito` VALUES ('397', 'JAQUI', '38', '040410', '1');
INSERT INTO `distrito` VALUES ('398', 'LOMAS', '38', '040411', '1');
INSERT INTO `distrito` VALUES ('399', 'QUICACHA', '38', '040412', '1');
INSERT INTO `distrito` VALUES ('400', 'YAUCA', '38', '040413', '1');
INSERT INTO `distrito` VALUES ('401', 'APLAO', '39', '040501', '1');
INSERT INTO `distrito` VALUES ('402', 'ANDAGUA', '39', '040502', '1');
INSERT INTO `distrito` VALUES ('403', 'AYO', '39', '040503', '1');
INSERT INTO `distrito` VALUES ('404', 'CHACHAS', '39', '040504', '1');
INSERT INTO `distrito` VALUES ('405', 'CHILCAYMARCA', '39', '040505', '1');
INSERT INTO `distrito` VALUES ('406', 'CHOCO', '39', '040506', '1');
INSERT INTO `distrito` VALUES ('407', 'HUANCARQUI', '39', '040507', '1');
INSERT INTO `distrito` VALUES ('408', 'MACHAGUAY', '39', '040508', '1');
INSERT INTO `distrito` VALUES ('409', 'ORCOPAMPA', '39', '040509', '1');
INSERT INTO `distrito` VALUES ('410', 'PAMPACOLCA', '39', '040510', '1');
INSERT INTO `distrito` VALUES ('411', 'TIPAN', '39', '040511', '1');
INSERT INTO `distrito` VALUES ('412', 'URACA', '39', '040512', '1');
INSERT INTO `distrito` VALUES ('413', 'UÑON', '39', '040513', '1');
INSERT INTO `distrito` VALUES ('414', 'VIRACO', '39', '040514', '1');
INSERT INTO `distrito` VALUES ('415', 'CHUQUIBAMBA', '40', '040601', '1');
INSERT INTO `distrito` VALUES ('416', 'ANDARAY', '40', '040602', '1');
INSERT INTO `distrito` VALUES ('417', 'CAYARANI', '40', '040603', '1');
INSERT INTO `distrito` VALUES ('418', 'CHICHAS', '40', '040604', '1');
INSERT INTO `distrito` VALUES ('419', 'IRAY', '40', '040605', '1');
INSERT INTO `distrito` VALUES ('420', 'SALAMANCA', '40', '040606', '1');
INSERT INTO `distrito` VALUES ('421', 'YANAQUIHUA', '40', '040607', '1');
INSERT INTO `distrito` VALUES ('422', 'RIO GRANDE', '40', '040608', '1');
INSERT INTO `distrito` VALUES ('423', 'MOLLENDO', '41', '040701', '1');
INSERT INTO `distrito` VALUES ('424', 'COCACHACRA', '41', '040702', '1');
INSERT INTO `distrito` VALUES ('425', 'DEAN VALDIVIA', '41', '040703', '1');
INSERT INTO `distrito` VALUES ('426', 'ISLAY', '41', '040704', '1');
INSERT INTO `distrito` VALUES ('427', 'MEJIA', '41', '040705', '1');
INSERT INTO `distrito` VALUES ('428', 'PUNTA DE BOMBON', '41', '040706', '1');
INSERT INTO `distrito` VALUES ('429', 'COTAHUASI', '42', '040801', '1');
INSERT INTO `distrito` VALUES ('430', 'ALCA', '42', '040802', '1');
INSERT INTO `distrito` VALUES ('431', 'CHARCANA', '42', '040803', '1');
INSERT INTO `distrito` VALUES ('432', 'HUAYNACOTAS', '42', '040804', '1');
INSERT INTO `distrito` VALUES ('433', 'PAMPAMARCA', '42', '040805', '1');
INSERT INTO `distrito` VALUES ('434', 'PUYCA', '42', '040806', '1');
INSERT INTO `distrito` VALUES ('435', 'QUECHUALLA', '42', '040807', '1');
INSERT INTO `distrito` VALUES ('436', 'SAYLA', '42', '040808', '1');
INSERT INTO `distrito` VALUES ('437', 'TAURIA', '42', '040809', '1');
INSERT INTO `distrito` VALUES ('438', 'TOMEPAMPA', '42', '040810', '1');
INSERT INTO `distrito` VALUES ('439', 'TORO', '42', '040811', '1');
INSERT INTO `distrito` VALUES ('440', 'AYACUCHO', '43', '050101', '1');
INSERT INTO `distrito` VALUES ('441', 'ACOS VINCHOS', '43', '050102', '1');
INSERT INTO `distrito` VALUES ('442', 'CARMEN ALTO', '43', '050103', '1');
INSERT INTO `distrito` VALUES ('443', 'CHIARA', '43', '050104', '1');
INSERT INTO `distrito` VALUES ('444', 'QUINUA', '43', '050105', '1');
INSERT INTO `distrito` VALUES ('445', 'SAN JOSE DE TICLLAS', '43', '050106', '1');
INSERT INTO `distrito` VALUES ('446', 'SAN JUAN BAUTISTA', '43', '050107', '1');
INSERT INTO `distrito` VALUES ('447', 'SANTIAGO DE PISCHA', '43', '050108', '1');
INSERT INTO `distrito` VALUES ('448', 'VINCHOS', '43', '050109', '1');
INSERT INTO `distrito` VALUES ('449', 'TAMBILLO', '43', '050110', '1');
INSERT INTO `distrito` VALUES ('450', 'ACOCRO', '43', '050111', '1');
INSERT INTO `distrito` VALUES ('451', 'SOCOS', '43', '050112', '1');
INSERT INTO `distrito` VALUES ('452', 'OCROS', '43', '050113', '1');
INSERT INTO `distrito` VALUES ('453', 'PACAYCASA', '43', '050114', '1');
INSERT INTO `distrito` VALUES ('454', 'JESUS NAZARENO', '43', '050115', '1');
INSERT INTO `distrito` VALUES ('455', 'CANGALLO', '44', '050201', '1');
INSERT INTO `distrito` VALUES ('456', 'CHUSCHI', '44', '050204', '1');
INSERT INTO `distrito` VALUES ('457', 'LOS MOROCHUCOS', '44', '050206', '1');
INSERT INTO `distrito` VALUES ('458', 'PARAS', '44', '050207', '1');
INSERT INTO `distrito` VALUES ('459', 'TOTOS', '44', '050208', '1');
INSERT INTO `distrito` VALUES ('460', 'MARIA PARADO DE BELLIDO', '44', '050211', '1');
INSERT INTO `distrito` VALUES ('461', 'HUANTA', '45', '050301', '1');
INSERT INTO `distrito` VALUES ('462', 'AYAHUANCO', '45', '050302', '1');
INSERT INTO `distrito` VALUES ('463', 'HUAMANGUILLA', '45', '050303', '1');
INSERT INTO `distrito` VALUES ('464', 'IGUAIN', '45', '050304', '1');
INSERT INTO `distrito` VALUES ('465', 'LURICOCHA', '45', '050305', '1');
INSERT INTO `distrito` VALUES ('466', 'SANTILLANA', '45', '050307', '1');
INSERT INTO `distrito` VALUES ('467', 'SIVIA', '45', '050308', '1');
INSERT INTO `distrito` VALUES ('468', 'LLOCHEGUA', '45', '050309', '1');
INSERT INTO `distrito` VALUES ('469', 'SAN MIGUEL', '46', '050401', '1');
INSERT INTO `distrito` VALUES ('470', 'ANCO', '46', '050402', '1');
INSERT INTO `distrito` VALUES ('471', 'AYNA', '46', '050403', '1');
INSERT INTO `distrito` VALUES ('472', 'CHILCAS', '46', '050404', '1');
INSERT INTO `distrito` VALUES ('473', 'CHUNGUI', '46', '050405', '1');
INSERT INTO `distrito` VALUES ('474', 'TAMBO', '46', '050406', '1');
INSERT INTO `distrito` VALUES ('475', 'LUIS CARRANZA', '46', '050407', '1');
INSERT INTO `distrito` VALUES ('476', 'SANTA ROSA', '46', '050408', '1');
INSERT INTO `distrito` VALUES ('477', 'SAMUGARI', '46', '050409', '1');
INSERT INTO `distrito` VALUES ('478', 'PUQUIO', '47', '050501', '1');
INSERT INTO `distrito` VALUES ('479', 'AUCARA', '47', '050502', '1');
INSERT INTO `distrito` VALUES ('480', 'CABANA', '47', '050503', '1');
INSERT INTO `distrito` VALUES ('481', 'CARMEN SALCEDO', '47', '050504', '1');
INSERT INTO `distrito` VALUES ('482', 'CHAVIÑA', '47', '050506', '1');
INSERT INTO `distrito` VALUES ('483', 'CHIPAO', '47', '050508', '1');
INSERT INTO `distrito` VALUES ('484', 'HUAC-HUAS', '47', '050510', '1');
INSERT INTO `distrito` VALUES ('485', 'LARAMATE', '47', '050511', '1');
INSERT INTO `distrito` VALUES ('486', 'LEONCIO PRADO', '47', '050512', '1');
INSERT INTO `distrito` VALUES ('487', 'LUCANAS', '47', '050513', '1');
INSERT INTO `distrito` VALUES ('488', 'LLAUTA', '47', '050514', '1');
INSERT INTO `distrito` VALUES ('489', 'OCAÑA', '47', '050516', '1');
INSERT INTO `distrito` VALUES ('490', 'OTOCA', '47', '050517', '1');
INSERT INTO `distrito` VALUES ('491', 'SANCOS', '47', '050520', '1');
INSERT INTO `distrito` VALUES ('492', 'SAN JUAN', '47', '050521', '1');
INSERT INTO `distrito` VALUES ('493', 'SAN PEDRO', '47', '050522', '1');
INSERT INTO `distrito` VALUES ('494', 'SANTA ANA DE HUAYCAHUACHO', '47', '050524', '1');
INSERT INTO `distrito` VALUES ('495', 'SANTA LUCIA', '47', '050525', '1');
INSERT INTO `distrito` VALUES ('496', 'SAISA', '47', '050529', '1');
INSERT INTO `distrito` VALUES ('497', 'SAN PEDRO DE PALCO', '47', '050531', '1');
INSERT INTO `distrito` VALUES ('498', 'SAN CRISTOBAL', '47', '050532', '1');
INSERT INTO `distrito` VALUES ('499', 'CORACORA', '48', '050601', '1');
INSERT INTO `distrito` VALUES ('500', 'CORONEL CASTAÑEDA', '48', '050604', '1');
INSERT INTO `distrito` VALUES ('501', 'CHUMPI', '48', '050605', '1');
INSERT INTO `distrito` VALUES ('502', 'PACAPAUSA', '48', '050608', '1');
INSERT INTO `distrito` VALUES ('503', 'PULLO', '48', '050611', '1');
INSERT INTO `distrito` VALUES ('504', 'PUYUSCA', '48', '050612', '1');
INSERT INTO `distrito` VALUES ('505', 'SAN FRANCISCO DE RAVACAYCO', '48', '050615', '1');
INSERT INTO `distrito` VALUES ('506', 'UPAHUACHO', '48', '050616', '1');
INSERT INTO `distrito` VALUES ('507', 'HUANCAPI', '49', '050701', '1');
INSERT INTO `distrito` VALUES ('508', 'ALCAMENCA', '49', '050702', '1');
INSERT INTO `distrito` VALUES ('509', 'APONGO', '49', '050703', '1');
INSERT INTO `distrito` VALUES ('510', 'CANARIA', '49', '050704', '1');
INSERT INTO `distrito` VALUES ('511', 'CAYARA', '49', '050706', '1');
INSERT INTO `distrito` VALUES ('512', 'COLCA', '49', '050707', '1');
INSERT INTO `distrito` VALUES ('513', 'HUALLA', '49', '050708', '1');
INSERT INTO `distrito` VALUES ('514', 'HUAMANQUIQUIA', '49', '050709', '1');
INSERT INTO `distrito` VALUES ('515', 'HUANCARAYLLA', '49', '050710', '1');
INSERT INTO `distrito` VALUES ('516', 'SARHUA', '49', '050713', '1');
INSERT INTO `distrito` VALUES ('517', 'VILCANCHOS', '49', '050714', '1');
INSERT INTO `distrito` VALUES ('518', 'ASQUIPATA', '49', '050715', '1');
INSERT INTO `distrito` VALUES ('519', 'SANCOS', '50', '050801', '1');
INSERT INTO `distrito` VALUES ('520', 'SACSAMARCA', '50', '050802', '1');
INSERT INTO `distrito` VALUES ('521', 'SANTIAGO DE LUCANAMARCA', '50', '050803', '1');
INSERT INTO `distrito` VALUES ('522', 'CARAPO', '50', '050804', '1');
INSERT INTO `distrito` VALUES ('523', 'VILCAS HUAMAN', '51', '050901', '1');
INSERT INTO `distrito` VALUES ('524', 'VISCHONGO', '51', '050902', '1');
INSERT INTO `distrito` VALUES ('525', 'ACCOMARCA', '51', '050903', '1');
INSERT INTO `distrito` VALUES ('526', 'CARHUANCA', '51', '050904', '1');
INSERT INTO `distrito` VALUES ('527', 'CONCEPCION', '51', '050905', '1');
INSERT INTO `distrito` VALUES ('528', 'HUAMBALPA', '51', '050906', '1');
INSERT INTO `distrito` VALUES ('529', 'SAURAMA', '51', '050907', '1');
INSERT INTO `distrito` VALUES ('530', 'INDEPENDENCIA', '51', '050908', '1');
INSERT INTO `distrito` VALUES ('531', 'PAUSA', '52', '051001', '1');
INSERT INTO `distrito` VALUES ('532', 'COLTA', '52', '051002', '1');
INSERT INTO `distrito` VALUES ('533', 'CORCULLA', '52', '051003', '1');
INSERT INTO `distrito` VALUES ('534', 'LAMPA', '52', '051004', '1');
INSERT INTO `distrito` VALUES ('535', 'MARCABAMBA', '52', '051005', '1');
INSERT INTO `distrito` VALUES ('536', 'OYOLO', '52', '051006', '1');
INSERT INTO `distrito` VALUES ('537', 'PARARCA', '52', '051007', '1');
INSERT INTO `distrito` VALUES ('538', 'SAN JAVIER DE ALPABAMBA', '52', '051008', '1');
INSERT INTO `distrito` VALUES ('539', 'SAN JOSE DE USHUA', '52', '051009', '1');
INSERT INTO `distrito` VALUES ('540', 'SARA SARA', '52', '051010', '1');
INSERT INTO `distrito` VALUES ('541', 'QUEROBAMBA', '53', '051101', '1');
INSERT INTO `distrito` VALUES ('542', 'BELEN', '53', '051102', '1');
INSERT INTO `distrito` VALUES ('543', 'CHALCOS', '53', '051103', '1');
INSERT INTO `distrito` VALUES ('544', 'SAN SALVADOR DE QUIJE', '53', '051104', '1');
INSERT INTO `distrito` VALUES ('545', 'PAICO', '53', '051105', '1');
INSERT INTO `distrito` VALUES ('546', 'SANTIAGO DE PAUCARAY', '53', '051106', '1');
INSERT INTO `distrito` VALUES ('547', 'SAN PEDRO DE LARCAY', '53', '051107', '1');
INSERT INTO `distrito` VALUES ('548', 'SORAS', '53', '051108', '1');
INSERT INTO `distrito` VALUES ('549', 'HUACAÑA', '53', '051109', '1');
INSERT INTO `distrito` VALUES ('550', 'CHILCAYOC', '53', '051110', '1');
INSERT INTO `distrito` VALUES ('551', 'MORCOLLA', '53', '051111', '1');
INSERT INTO `distrito` VALUES ('552', 'CAJAMARCA', '54', '060101', '1');
INSERT INTO `distrito` VALUES ('553', 'ASUNCION', '54', '060102', '1');
INSERT INTO `distrito` VALUES ('554', 'COSPAN', '54', '060103', '1');
INSERT INTO `distrito` VALUES ('555', 'CHETILLA', '54', '060104', '1');
INSERT INTO `distrito` VALUES ('556', 'ENCAÑADA', '54', '060105', '1');
INSERT INTO `distrito` VALUES ('557', 'JESUS', '54', '060106', '1');
INSERT INTO `distrito` VALUES ('558', 'LOS BAÑOS DEL INCA', '54', '060107', '1');
INSERT INTO `distrito` VALUES ('559', 'LLACANORA', '54', '060108', '1');
INSERT INTO `distrito` VALUES ('560', 'MAGDALENA', '54', '060109', '1');
INSERT INTO `distrito` VALUES ('561', 'MATARA', '54', '060110', '1');
INSERT INTO `distrito` VALUES ('562', 'NAMORA', '54', '060111', '1');
INSERT INTO `distrito` VALUES ('563', 'SAN JUAN', '54', '060112', '1');
INSERT INTO `distrito` VALUES ('564', 'CAJABAMBA', '55', '060201', '1');
INSERT INTO `distrito` VALUES ('565', 'CACHACHI', '55', '060202', '1');
INSERT INTO `distrito` VALUES ('566', 'CONDEBAMBA', '55', '060203', '1');
INSERT INTO `distrito` VALUES ('567', 'SITACOCHA', '55', '060205', '1');
INSERT INTO `distrito` VALUES ('568', 'CELENDIN', '56', '060301', '1');
INSERT INTO `distrito` VALUES ('569', 'CORTEGANA', '56', '060302', '1');
INSERT INTO `distrito` VALUES ('570', 'CHUMUCH', '56', '060303', '1');
INSERT INTO `distrito` VALUES ('571', 'HUASMIN', '56', '060304', '1');
INSERT INTO `distrito` VALUES ('572', 'JORGE CHAVEZ', '56', '060305', '1');
INSERT INTO `distrito` VALUES ('573', 'JOSE GALVEZ', '56', '060306', '1');
INSERT INTO `distrito` VALUES ('574', 'MIGUEL IGLESIAS', '56', '060307', '1');
INSERT INTO `distrito` VALUES ('575', 'OXAMARCA', '56', '060308', '1');
INSERT INTO `distrito` VALUES ('576', 'SOROCHUCO', '56', '060309', '1');
INSERT INTO `distrito` VALUES ('577', 'SUCRE', '56', '060310', '1');
INSERT INTO `distrito` VALUES ('578', 'UTCO', '56', '060311', '1');
INSERT INTO `distrito` VALUES ('579', 'LA LIBERTAD DE PALLAN', '56', '060312', '1');
INSERT INTO `distrito` VALUES ('580', 'CONTUMAZA', '57', '060401', '1');
INSERT INTO `distrito` VALUES ('581', 'CHILETE', '57', '060403', '1');
INSERT INTO `distrito` VALUES ('582', 'GUZMANGO', '57', '060404', '1');
INSERT INTO `distrito` VALUES ('583', 'SAN BENITO', '57', '060405', '1');
INSERT INTO `distrito` VALUES ('584', 'CUPISNIQUE', '57', '060406', '1');
INSERT INTO `distrito` VALUES ('585', 'TANTARICA', '57', '060407', '1');
INSERT INTO `distrito` VALUES ('586', 'YONAN', '57', '060408', '1');
INSERT INTO `distrito` VALUES ('587', 'SANTA CRUZ DE TOLED', '57', '060409', '1');
INSERT INTO `distrito` VALUES ('588', 'CUTERVO', '58', '060501', '1');
INSERT INTO `distrito` VALUES ('589', 'CALLAYUC', '58', '060502', '1');
INSERT INTO `distrito` VALUES ('590', 'CUJILLO', '58', '060503', '1');
INSERT INTO `distrito` VALUES ('591', 'CHOROS', '58', '060504', '1');
INSERT INTO `distrito` VALUES ('592', 'LA RAMADA', '58', '060505', '1');
INSERT INTO `distrito` VALUES ('593', 'PIMPINGOS', '58', '060506', '1');
INSERT INTO `distrito` VALUES ('594', 'QUEROCOTILLO', '58', '060507', '1');
INSERT INTO `distrito` VALUES ('595', 'SAN ANDRES DE CUTERVO', '58', '060508', '1');
INSERT INTO `distrito` VALUES ('596', 'SAN JUAN DE CUTERVO', '58', '060509', '1');
INSERT INTO `distrito` VALUES ('597', 'SAN LUIS DE LUCMA', '58', '060510', '1');
INSERT INTO `distrito` VALUES ('598', 'SANTA CRUZ', '58', '060511', '1');
INSERT INTO `distrito` VALUES ('599', 'SANTO DOMINGO DE LA CAPILLA', '58', '060512', '1');
INSERT INTO `distrito` VALUES ('600', 'SANTO TOMAS', '58', '060513', '1');
INSERT INTO `distrito` VALUES ('601', 'SOCOTA', '58', '060514', '1');
INSERT INTO `distrito` VALUES ('602', 'TORIBIO CASANOVA', '58', '060515', '1');
INSERT INTO `distrito` VALUES ('603', 'CHOTA', '59', '060601', '1');
INSERT INTO `distrito` VALUES ('604', 'ANGUIA', '59', '060602', '1');
INSERT INTO `distrito` VALUES ('605', 'COCHABAMBA', '59', '060603', '1');
INSERT INTO `distrito` VALUES ('606', 'CONCHAN', '59', '060604', '1');
INSERT INTO `distrito` VALUES ('607', 'CHADIN', '59', '060605', '1');
INSERT INTO `distrito` VALUES ('608', 'CHIGUIRIP', '59', '060606', '1');
INSERT INTO `distrito` VALUES ('609', 'CHIMBAN', '59', '060607', '1');
INSERT INTO `distrito` VALUES ('610', 'HUAMBOS', '59', '060608', '1');
INSERT INTO `distrito` VALUES ('611', 'LAJAS', '59', '060609', '1');
INSERT INTO `distrito` VALUES ('612', 'LLAMA', '59', '060610', '1');
INSERT INTO `distrito` VALUES ('613', 'MIRACOSTA', '59', '060611', '1');
INSERT INTO `distrito` VALUES ('614', 'PACCHA', '59', '060612', '1');
INSERT INTO `distrito` VALUES ('615', 'PION', '59', '060613', '1');
INSERT INTO `distrito` VALUES ('616', 'QUEROCOTO', '59', '060614', '1');
INSERT INTO `distrito` VALUES ('617', 'TACABAMBA', '59', '060615', '1');
INSERT INTO `distrito` VALUES ('618', 'TOCMOCHE', '59', '060616', '1');
INSERT INTO `distrito` VALUES ('619', 'SAN JUAN DE LICUPIS', '59', '060617', '1');
INSERT INTO `distrito` VALUES ('620', 'CHOROPAMPA', '59', '060618', '1');
INSERT INTO `distrito` VALUES ('621', 'CHALAMARCA', '59', '060619', '1');
INSERT INTO `distrito` VALUES ('622', 'BAMBAMARCA', '60', '060701', '1');
INSERT INTO `distrito` VALUES ('623', 'CHUGUR', '60', '060702', '1');
INSERT INTO `distrito` VALUES ('624', 'HUALGAYOC', '60', '060703', '1');
INSERT INTO `distrito` VALUES ('625', 'JAEN', '61', '060801', '1');
INSERT INTO `distrito` VALUES ('626', 'BELLAVISTA', '61', '060802', '1');
INSERT INTO `distrito` VALUES ('627', 'COLASAY', '61', '060803', '1');
INSERT INTO `distrito` VALUES ('628', 'CHONTALI', '61', '060804', '1');
INSERT INTO `distrito` VALUES ('629', 'POMAHUACA', '61', '060805', '1');
INSERT INTO `distrito` VALUES ('630', 'PUCARA', '61', '060806', '1');
INSERT INTO `distrito` VALUES ('631', 'SALLIQUE', '61', '060807', '1');
INSERT INTO `distrito` VALUES ('632', 'SAN FELIPE', '61', '060808', '1');
INSERT INTO `distrito` VALUES ('633', 'SAN JOSE DEL ALTO', '61', '060809', '1');
INSERT INTO `distrito` VALUES ('634', 'SANTA ROSA', '61', '060810', '1');
INSERT INTO `distrito` VALUES ('635', 'LAS PIRIAS', '61', '060811', '1');
INSERT INTO `distrito` VALUES ('636', 'HUABAL', '61', '060812', '1');
INSERT INTO `distrito` VALUES ('637', 'SANTA CRUZ', '62', '060901', '1');
INSERT INTO `distrito` VALUES ('638', 'CATACHE', '62', '060902', '1');
INSERT INTO `distrito` VALUES ('639', 'CHANCAYBAÑOS', '62', '060903', '1');
INSERT INTO `distrito` VALUES ('640', 'LA ESPERANZA', '62', '060904', '1');
INSERT INTO `distrito` VALUES ('641', 'NINABAMBA', '62', '060905', '1');
INSERT INTO `distrito` VALUES ('642', 'PULAN', '62', '060906', '1');
INSERT INTO `distrito` VALUES ('643', 'SEXI', '62', '060907', '1');
INSERT INTO `distrito` VALUES ('644', 'UTICYACU', '62', '060908', '1');
INSERT INTO `distrito` VALUES ('645', 'YAUYUCAN', '62', '060909', '1');
INSERT INTO `distrito` VALUES ('646', 'ANDABAMBA', '62', '060910', '1');
INSERT INTO `distrito` VALUES ('647', 'SAUCEPAMPA', '62', '060911', '1');
INSERT INTO `distrito` VALUES ('648', 'SAN MIGUEL', '63', '061001', '1');
INSERT INTO `distrito` VALUES ('649', 'CALQUIS', '63', '061002', '1');
INSERT INTO `distrito` VALUES ('650', 'LA FLORIDA', '63', '061003', '1');
INSERT INTO `distrito` VALUES ('651', 'LLAPA', '63', '061004', '1');
INSERT INTO `distrito` VALUES ('652', 'NANCHOC', '63', '061005', '1');
INSERT INTO `distrito` VALUES ('653', 'NIEPOS', '63', '061006', '1');
INSERT INTO `distrito` VALUES ('654', 'SAN GREGORIO', '63', '061007', '1');
INSERT INTO `distrito` VALUES ('655', 'SAN SILVESTRE DE COCHAN', '63', '061008', '1');
INSERT INTO `distrito` VALUES ('656', 'EL PRADO', '63', '061009', '1');
INSERT INTO `distrito` VALUES ('657', 'UNION AGUA BLANCA', '63', '061010', '1');
INSERT INTO `distrito` VALUES ('658', 'TONGOD', '63', '061011', '1');
INSERT INTO `distrito` VALUES ('659', 'CATILLUC', '63', '061012', '1');
INSERT INTO `distrito` VALUES ('660', 'BOLIVAR', '63', '061013', '1');
INSERT INTO `distrito` VALUES ('661', 'SAN IGNACIO', '64', '061101', '1');
INSERT INTO `distrito` VALUES ('662', 'CHIRINOS', '64', '061102', '1');
INSERT INTO `distrito` VALUES ('663', 'HUARANGO', '64', '061103', '1');
INSERT INTO `distrito` VALUES ('664', 'NAMBALLE', '64', '061104', '1');
INSERT INTO `distrito` VALUES ('665', 'LA COIPA', '64', '061105', '1');
INSERT INTO `distrito` VALUES ('666', 'SAN JOSE DE LOURDES', '64', '061106', '1');
INSERT INTO `distrito` VALUES ('667', 'TABACONAS', '64', '061107', '1');
INSERT INTO `distrito` VALUES ('668', 'PEDRO GALVEZ', '65', '061201', '1');
INSERT INTO `distrito` VALUES ('669', 'ICHOCAN', '65', '061202', '1');
INSERT INTO `distrito` VALUES ('670', 'GREGORIO PITA', '65', '061203', '1');
INSERT INTO `distrito` VALUES ('671', 'JOSE MANUEL QUIROZ', '65', '061204', '1');
INSERT INTO `distrito` VALUES ('672', 'EDUARDO VILLANUEVA', '65', '061205', '1');
INSERT INTO `distrito` VALUES ('673', 'JOSE SABOGAL', '65', '061206', '1');
INSERT INTO `distrito` VALUES ('674', 'CHANCAY', '65', '061207', '1');
INSERT INTO `distrito` VALUES ('675', 'SAN PABLO', '66', '061301', '1');
INSERT INTO `distrito` VALUES ('676', 'SAN BERNARDINO', '66', '061302', '1');
INSERT INTO `distrito` VALUES ('677', 'SAN LUIS', '66', '061303', '1');
INSERT INTO `distrito` VALUES ('678', 'TUMBADEN', '66', '061304', '1');
INSERT INTO `distrito` VALUES ('679', 'CUSCO', '67', '070101', '1');
INSERT INTO `distrito` VALUES ('680', 'CCORCA', '67', '070102', '1');
INSERT INTO `distrito` VALUES ('681', 'POROY', '67', '070103', '1');
INSERT INTO `distrito` VALUES ('682', 'SAN JERONIMO', '67', '070104', '1');
INSERT INTO `distrito` VALUES ('683', 'SAN SEBASTIAN', '67', '070105', '1');
INSERT INTO `distrito` VALUES ('684', 'SANTIAGO', '67', '070106', '1');
INSERT INTO `distrito` VALUES ('685', 'SAYLLA', '67', '070107', '1');
INSERT INTO `distrito` VALUES ('686', 'WANCHAQ', '67', '070108', '1');
INSERT INTO `distrito` VALUES ('687', 'ACOMAYO', '68', '070201', '1');
INSERT INTO `distrito` VALUES ('688', 'ACOPIA', '68', '070202', '1');
INSERT INTO `distrito` VALUES ('689', 'ACOS', '68', '070203', '1');
INSERT INTO `distrito` VALUES ('690', 'POMACANCHI', '68', '070204', '1');
INSERT INTO `distrito` VALUES ('691', 'RONDOCAN', '68', '070205', '1');
INSERT INTO `distrito` VALUES ('692', 'SANGARARA', '68', '070206', '1');
INSERT INTO `distrito` VALUES ('693', 'MOSOC LLACTA', '68', '070207', '1');
INSERT INTO `distrito` VALUES ('694', 'ANTA', '69', '070301', '1');
INSERT INTO `distrito` VALUES ('695', 'CHINCHAYPUJIO', '69', '070302', '1');
INSERT INTO `distrito` VALUES ('696', 'HUAROCONDO', '69', '070303', '1');
INSERT INTO `distrito` VALUES ('697', 'LIMATAMBO', '69', '070304', '1');
INSERT INTO `distrito` VALUES ('698', 'MOLLEPATA', '69', '070305', '1');
INSERT INTO `distrito` VALUES ('699', 'PUCYURA', '69', '070306', '1');
INSERT INTO `distrito` VALUES ('700', 'ZURITE', '69', '070307', '1');
INSERT INTO `distrito` VALUES ('701', 'CACHIMAYO', '69', '070308', '1');
INSERT INTO `distrito` VALUES ('702', 'ANCAHUASI', '69', '070309', '1');
INSERT INTO `distrito` VALUES ('703', 'CALCA', '70', '070401', '1');
INSERT INTO `distrito` VALUES ('704', 'COYA', '70', '070402', '1');
INSERT INTO `distrito` VALUES ('705', 'LAMAY', '70', '070403', '1');
INSERT INTO `distrito` VALUES ('706', 'LARES', '70', '070404', '1');
INSERT INTO `distrito` VALUES ('707', 'PISAC', '70', '070405', '1');
INSERT INTO `distrito` VALUES ('708', 'SAN SALVADOR', '70', '070406', '1');
INSERT INTO `distrito` VALUES ('709', 'TARAY', '70', '070407', '1');
INSERT INTO `distrito` VALUES ('710', 'YANATILE', '70', '070408', '1');
INSERT INTO `distrito` VALUES ('711', 'YANAOCA', '71', '070501', '1');
INSERT INTO `distrito` VALUES ('712', 'CHECCA', '71', '070502', '1');
INSERT INTO `distrito` VALUES ('713', 'KUNTURKANKI', '71', '070503', '1');
INSERT INTO `distrito` VALUES ('714', 'LANGUI', '71', '070504', '1');
INSERT INTO `distrito` VALUES ('715', 'LAYO', '71', '070505', '1');
INSERT INTO `distrito` VALUES ('716', 'PAMPAMARCA', '71', '070506', '1');
INSERT INTO `distrito` VALUES ('717', 'QUEHUE', '71', '070507', '1');
INSERT INTO `distrito` VALUES ('718', 'TUPAC AMARU', '71', '070508', '1');
INSERT INTO `distrito` VALUES ('719', 'SICUANI', '72', '070601', '1');
INSERT INTO `distrito` VALUES ('720', 'COMBAPATA', '72', '070602', '1');
INSERT INTO `distrito` VALUES ('721', 'CHECACUPE', '72', '070603', '1');
INSERT INTO `distrito` VALUES ('722', 'MARANGANI', '72', '070604', '1');
INSERT INTO `distrito` VALUES ('723', 'PITUMARCA', '72', '070605', '1');
INSERT INTO `distrito` VALUES ('724', 'SAN PABLO', '72', '070606', '1');
INSERT INTO `distrito` VALUES ('725', 'SAN PEDRO', '72', '070607', '1');
INSERT INTO `distrito` VALUES ('726', 'TINTA', '72', '070608', '1');
INSERT INTO `distrito` VALUES ('727', 'SANTO TOMAS', '73', '070701', '1');
INSERT INTO `distrito` VALUES ('728', 'CAPACMARCA', '73', '070702', '1');
INSERT INTO `distrito` VALUES ('729', 'COLQUEMARCA', '73', '070703', '1');
INSERT INTO `distrito` VALUES ('730', 'CHAMACA', '73', '070704', '1');
INSERT INTO `distrito` VALUES ('731', 'LIVITACA', '73', '070705', '1');
INSERT INTO `distrito` VALUES ('732', 'LLUSCO', '73', '070706', '1');
INSERT INTO `distrito` VALUES ('733', 'QUIÑOTA', '73', '070707', '1');
INSERT INTO `distrito` VALUES ('734', 'VELILLE', '73', '070708', '1');
INSERT INTO `distrito` VALUES ('735', 'ESPINAR', '74', '070801', '1');
INSERT INTO `distrito` VALUES ('736', 'CONDOROMA', '74', '070802', '1');
INSERT INTO `distrito` VALUES ('737', 'COPORAQUE', '74', '070803', '1');
INSERT INTO `distrito` VALUES ('738', 'OCORURO', '74', '070804', '1');
INSERT INTO `distrito` VALUES ('739', 'PALLPATA', '74', '070805', '1');
INSERT INTO `distrito` VALUES ('740', 'PICHIGUA', '74', '070806', '1');
INSERT INTO `distrito` VALUES ('741', 'SUYCKUTAMBO', '74', '070807', '1');
INSERT INTO `distrito` VALUES ('742', 'ALTO PICHIGUA', '74', '070808', '1');
INSERT INTO `distrito` VALUES ('743', 'SANTA ANA', '75', '070901', '1');
INSERT INTO `distrito` VALUES ('744', 'ECHARATE', '75', '070902', '1');
INSERT INTO `distrito` VALUES ('745', 'HUAYOPATA', '75', '070903', '1');
INSERT INTO `distrito` VALUES ('746', 'MARANURA', '75', '070904', '1');
INSERT INTO `distrito` VALUES ('747', 'OCOBAMBA', '75', '070905', '1');
INSERT INTO `distrito` VALUES ('748', 'SANTA TERESA', '75', '070906', '1');
INSERT INTO `distrito` VALUES ('749', 'VILCABAMBA', '75', '070907', '1');
INSERT INTO `distrito` VALUES ('750', 'QUELLOUNO', '75', '070908', '1');
INSERT INTO `distrito` VALUES ('751', 'KIMBIRI', '75', '070909', '1');
INSERT INTO `distrito` VALUES ('752', 'PICHARI', '75', '070910', '1');
INSERT INTO `distrito` VALUES ('753', 'PARURO', '76', '071001', '1');
INSERT INTO `distrito` VALUES ('754', 'ACCHA', '76', '071002', '1');
INSERT INTO `distrito` VALUES ('755', 'CCAPI', '76', '071003', '1');
INSERT INTO `distrito` VALUES ('756', 'COLCHA', '76', '071004', '1');
INSERT INTO `distrito` VALUES ('757', 'HUANOQUITE', '76', '071005', '1');
INSERT INTO `distrito` VALUES ('758', 'OMACHA', '76', '071006', '1');
INSERT INTO `distrito` VALUES ('759', 'YAURISQUE', '76', '071007', '1');
INSERT INTO `distrito` VALUES ('760', 'PACCARITAMBO', '76', '071008', '1');
INSERT INTO `distrito` VALUES ('761', 'PILLPINTO', '76', '071009', '1');
INSERT INTO `distrito` VALUES ('762', 'PAUCARTAMBO', '77', '071101', '1');
INSERT INTO `distrito` VALUES ('763', 'CAICAY', '77', '071102', '1');
INSERT INTO `distrito` VALUES ('764', 'COLQUEPATA', '77', '071103', '1');
INSERT INTO `distrito` VALUES ('765', 'CHALLABAMBA', '77', '071104', '1');
INSERT INTO `distrito` VALUES ('766', 'KOSÑIPATA', '77', '071105', '1');
INSERT INTO `distrito` VALUES ('767', 'HUANCARANI', '77', '071106', '1');
INSERT INTO `distrito` VALUES ('768', 'URCOS', '78', '071201', '1');
INSERT INTO `distrito` VALUES ('769', 'ANDAHUAYLILLAS', '78', '071202', '1');
INSERT INTO `distrito` VALUES ('770', 'CAMANTI', '78', '071203', '1');
INSERT INTO `distrito` VALUES ('771', 'CCARHUAYO', '78', '071204', '1');
INSERT INTO `distrito` VALUES ('772', 'CCATCA', '78', '071205', '1');
INSERT INTO `distrito` VALUES ('773', 'CUSIPATA', '78', '071206', '1');
INSERT INTO `distrito` VALUES ('774', 'HUARO', '78', '071207', '1');
INSERT INTO `distrito` VALUES ('775', 'LUCRE', '78', '071208', '1');
INSERT INTO `distrito` VALUES ('776', 'MARCAPATA', '78', '071209', '1');
INSERT INTO `distrito` VALUES ('777', 'OCONGATE', '78', '071210', '1');
INSERT INTO `distrito` VALUES ('778', 'OROPESA', '78', '071211', '1');
INSERT INTO `distrito` VALUES ('779', 'QUIQUIJANA', '78', '071212', '1');
INSERT INTO `distrito` VALUES ('780', 'URUBAMBA', '79', '071301', '1');
INSERT INTO `distrito` VALUES ('781', 'CHINCHERO', '79', '071302', '1');
INSERT INTO `distrito` VALUES ('782', 'HUAYLLABAMBA', '79', '071303', '1');
INSERT INTO `distrito` VALUES ('783', 'MACHUPICCHU', '79', '071304', '1');
INSERT INTO `distrito` VALUES ('784', 'MARAS', '79', '071305', '1');
INSERT INTO `distrito` VALUES ('785', 'OLLANTAYTAMBO', '79', '071306', '1');
INSERT INTO `distrito` VALUES ('786', 'YUCAY', '79', '071307', '1');
INSERT INTO `distrito` VALUES ('787', 'HUANCAVELICA', '80', '080101', '1');
INSERT INTO `distrito` VALUES ('788', 'ACOBAMBILLA', '80', '080102', '1');
INSERT INTO `distrito` VALUES ('789', 'ACORIA', '80', '080103', '1');
INSERT INTO `distrito` VALUES ('790', 'CONAYCA', '80', '080104', '1');
INSERT INTO `distrito` VALUES ('791', 'CUENCA', '80', '080105', '1');
INSERT INTO `distrito` VALUES ('792', 'HUACHOCOLPA', '80', '080106', '1');
INSERT INTO `distrito` VALUES ('793', 'HUAYLLAHUARA', '80', '080108', '1');
INSERT INTO `distrito` VALUES ('794', 'IZCUCHACA', '80', '080109', '1');
INSERT INTO `distrito` VALUES ('795', 'LARIA', '80', '080110', '1');
INSERT INTO `distrito` VALUES ('796', 'MANTA', '80', '080111', '1');
INSERT INTO `distrito` VALUES ('797', 'MARISCAL CACERES', '80', '080112', '1');
INSERT INTO `distrito` VALUES ('798', 'MOYA', '80', '080113', '1');
INSERT INTO `distrito` VALUES ('799', 'NUEVO OCCORO', '80', '080114', '1');
INSERT INTO `distrito` VALUES ('800', 'PALCA', '80', '080115', '1');
INSERT INTO `distrito` VALUES ('801', 'PILCHACA', '80', '080116', '1');
INSERT INTO `distrito` VALUES ('802', 'VILCA', '80', '080117', '1');
INSERT INTO `distrito` VALUES ('803', 'YAULI', '80', '080118', '1');
INSERT INTO `distrito` VALUES ('804', 'ASCENSION', '80', '080119', '1');
INSERT INTO `distrito` VALUES ('805', 'HUANDO', '80', '080120', '1');
INSERT INTO `distrito` VALUES ('806', 'ACOBAMBA', '81', '080201', '1');
INSERT INTO `distrito` VALUES ('807', 'ANTA', '81', '080202', '1');
INSERT INTO `distrito` VALUES ('808', 'ANDABAMBA', '81', '080203', '1');
INSERT INTO `distrito` VALUES ('809', 'CAJA', '81', '080204', '1');
INSERT INTO `distrito` VALUES ('810', 'MARCAS', '81', '080205', '1');
INSERT INTO `distrito` VALUES ('811', 'PAUCARA', '81', '080206', '1');
INSERT INTO `distrito` VALUES ('812', 'POMACOCHA', '81', '080207', '1');
INSERT INTO `distrito` VALUES ('813', 'ROSARIO', '81', '080208', '1');
INSERT INTO `distrito` VALUES ('814', 'LIRCAY', '82', '080301', '1');
INSERT INTO `distrito` VALUES ('815', 'ANCHONGA', '82', '080302', '1');
INSERT INTO `distrito` VALUES ('816', 'CALLANMARCA', '82', '080303', '1');
INSERT INTO `distrito` VALUES ('817', 'CONGALLA', '82', '080304', '1');
INSERT INTO `distrito` VALUES ('818', 'CHINCHO', '82', '080305', '1');
INSERT INTO `distrito` VALUES ('819', 'HUALLAY-GRANDE', '82', '080306', '1');
INSERT INTO `distrito` VALUES ('820', 'HUANCA-HUANCA', '82', '080307', '1');
INSERT INTO `distrito` VALUES ('821', 'JULCAMARCA', '82', '080308', '1');
INSERT INTO `distrito` VALUES ('822', 'SAN ANTONIO DE ANTAPARCO', '82', '080309', '1');
INSERT INTO `distrito` VALUES ('823', 'SANTO TOMAS DE PATA', '82', '080310', '1');
INSERT INTO `distrito` VALUES ('824', 'SECCLLA', '82', '080311', '1');
INSERT INTO `distrito` VALUES ('825', 'CCOCHACCASA', '82', '080312', '1');
INSERT INTO `distrito` VALUES ('826', 'CASTROVIRREYNA', '83', '080401', '1');
INSERT INTO `distrito` VALUES ('827', 'ARMA', '83', '080402', '1');
INSERT INTO `distrito` VALUES ('828', 'AURAHUA', '83', '080403', '1');
INSERT INTO `distrito` VALUES ('829', 'CAPILLAS', '83', '080405', '1');
INSERT INTO `distrito` VALUES ('830', 'COCAS', '83', '080406', '1');
INSERT INTO `distrito` VALUES ('831', 'CHUPAMARCA', '83', '080408', '1');
INSERT INTO `distrito` VALUES ('832', 'HUACHOS', '83', '080409', '1');
INSERT INTO `distrito` VALUES ('833', 'HUAMATAMBO', '83', '080410', '1');
INSERT INTO `distrito` VALUES ('834', 'MOLLEPAMPA', '83', '080414', '1');
INSERT INTO `distrito` VALUES ('835', 'SAN JUAN', '83', '080422', '1');
INSERT INTO `distrito` VALUES ('836', 'TANTARA', '83', '080427', '1');
INSERT INTO `distrito` VALUES ('837', 'TICRAPO', '83', '080428', '1');
INSERT INTO `distrito` VALUES ('838', 'SANTA ANA', '83', '080429', '1');
INSERT INTO `distrito` VALUES ('839', 'PAMPAS', '84', '080501', '1');
INSERT INTO `distrito` VALUES ('840', 'ACOSTAMBO', '84', '080502', '1');
INSERT INTO `distrito` VALUES ('841', 'ACRAQUIA', '84', '080503', '1');
INSERT INTO `distrito` VALUES ('842', 'AHUAYCHA', '84', '080504', '1');
INSERT INTO `distrito` VALUES ('843', 'COLCABAMBA', '84', '080506', '1');
INSERT INTO `distrito` VALUES ('844', 'DANIEL HERNANDEZ', '84', '080509', '1');
INSERT INTO `distrito` VALUES ('845', 'HUACHOCOLPA', '84', '080511', '1');
INSERT INTO `distrito` VALUES ('846', 'HUARIBAMBA', '84', '080512', '1');
INSERT INTO `distrito` VALUES ('847', 'ÑAHUIMPUQUIO', '84', '080515', '1');
INSERT INTO `distrito` VALUES ('848', 'PAZOS', '84', '080517', '1');
INSERT INTO `distrito` VALUES ('849', 'QUISHUAR', '84', '080518', '1');
INSERT INTO `distrito` VALUES ('850', 'SALCABAMBA', '84', '080519', '1');
INSERT INTO `distrito` VALUES ('851', 'SAN MARCOS DE ROCCHAC', '84', '080520', '1');
INSERT INTO `distrito` VALUES ('852', 'SURCUBAMBA', '84', '080523', '1');
INSERT INTO `distrito` VALUES ('853', 'TINTAY PUNCU', '84', '080525', '1');
INSERT INTO `distrito` VALUES ('854', 'SALCAHUASI', '84', '080526', '1');
INSERT INTO `distrito` VALUES ('855', 'AYAVI', '85', '080601', '1');
INSERT INTO `distrito` VALUES ('856', 'CORDOVA', '85', '080602', '1');
INSERT INTO `distrito` VALUES ('857', 'HUAYACUNDO ARMA', '85', '080603', '1');
INSERT INTO `distrito` VALUES ('858', 'HUAYTARA', '85', '080604', '1');
INSERT INTO `distrito` VALUES ('859', 'LARAMARCA', '85', '080605', '1');
INSERT INTO `distrito` VALUES ('860', 'OCOYO', '85', '080606', '1');
INSERT INTO `distrito` VALUES ('861', 'PILPICHACA', '85', '080607', '1');
INSERT INTO `distrito` VALUES ('862', 'QUERCO', '85', '080608', '1');
INSERT INTO `distrito` VALUES ('863', 'QUITO ARMA', '85', '080609', '1');
INSERT INTO `distrito` VALUES ('864', 'SAN ANTONIO DE CUSICANCHA', '85', '080610', '1');
INSERT INTO `distrito` VALUES ('865', 'SAN FRANCISCO DE SANGAYAICO', '85', '080611', '1');
INSERT INTO `distrito` VALUES ('866', 'SAN ISIDRO', '85', '080612', '1');
INSERT INTO `distrito` VALUES ('867', 'SANTIAGO DE CHOCORVOS', '85', '080613', '1');
INSERT INTO `distrito` VALUES ('868', 'SANTIAGO DE QUIRAHUARA', '85', '080614', '1');
INSERT INTO `distrito` VALUES ('869', 'SANTO DOMINGO DE CAPILLAS', '85', '080615', '1');
INSERT INTO `distrito` VALUES ('870', 'TAMBO', '85', '080616', '1');
INSERT INTO `distrito` VALUES ('871', 'CHURCAMPA', '86', '080701', '1');
INSERT INTO `distrito` VALUES ('872', 'ANCO', '86', '080702', '1');
INSERT INTO `distrito` VALUES ('873', 'CHINCHIHUASI', '86', '080703', '1');
INSERT INTO `distrito` VALUES ('874', 'EL CARMEN', '86', '080704', '1');
INSERT INTO `distrito` VALUES ('875', 'LA MERCED', '86', '080705', '1');
INSERT INTO `distrito` VALUES ('876', 'LOCROJA', '86', '080706', '1');
INSERT INTO `distrito` VALUES ('877', 'PAUCARBAMBA', '86', '080707', '1');
INSERT INTO `distrito` VALUES ('878', 'SAN MIGUEL DE MAYOCC', '86', '080708', '1');
INSERT INTO `distrito` VALUES ('879', 'SAN PEDRO DE CORIS', '86', '080709', '1');
INSERT INTO `distrito` VALUES ('880', 'PACHAMARCA', '86', '080710', '1');
INSERT INTO `distrito` VALUES ('881', 'COSME', '86', '080711', '1');
INSERT INTO `distrito` VALUES ('882', 'HUANUCO', '87', '090101', '1');
INSERT INTO `distrito` VALUES ('883', 'CHINCHAO', '87', '090102', '1');
INSERT INTO `distrito` VALUES ('884', 'CHURUBAMBA', '87', '090103', '1');
INSERT INTO `distrito` VALUES ('885', 'MARGOS', '87', '090104', '1');
INSERT INTO `distrito` VALUES ('886', 'QUISQUI', '87', '090105', '1');
INSERT INTO `distrito` VALUES ('887', 'SAN FRANCISCO DE CAYRAN', '87', '090106', '1');
INSERT INTO `distrito` VALUES ('888', 'SAN PEDRO DE CHAULAN', '87', '090107', '1');
INSERT INTO `distrito` VALUES ('889', 'SANTA MARIA DEL VALLE', '87', '090108', '1');
INSERT INTO `distrito` VALUES ('890', 'YARUMAYO', '87', '090109', '1');
INSERT INTO `distrito` VALUES ('891', 'AMARILIS', '87', '090110', '1');
INSERT INTO `distrito` VALUES ('892', 'PILLCO MARCA', '87', '090111', '1');
INSERT INTO `distrito` VALUES ('893', 'YACUS', '87', '090112', '1');
INSERT INTO `distrito` VALUES ('894', 'AMBO', '88', '090201', '1');
INSERT INTO `distrito` VALUES ('895', 'CAYNA', '88', '090202', '1');
INSERT INTO `distrito` VALUES ('896', 'COLPAS', '88', '090203', '1');
INSERT INTO `distrito` VALUES ('897', 'CONCHAMARCA', '88', '090204', '1');
INSERT INTO `distrito` VALUES ('898', 'HUACAR', '88', '090205', '1');
INSERT INTO `distrito` VALUES ('899', 'SAN FRANCISCO', '88', '090206', '1');
INSERT INTO `distrito` VALUES ('900', 'SAN RAFAEL', '88', '090207', '1');
INSERT INTO `distrito` VALUES ('901', 'TOMAY-KICHWA', '88', '090208', '1');
INSERT INTO `distrito` VALUES ('902', 'LA UNION', '89', '090301', '1');
INSERT INTO `distrito` VALUES ('903', 'CHUQUIS', '89', '090307', '1');
INSERT INTO `distrito` VALUES ('904', 'MARIAS', '89', '090312', '1');
INSERT INTO `distrito` VALUES ('905', 'PACHAS', '89', '090314', '1');
INSERT INTO `distrito` VALUES ('906', 'QUIVILLA', '89', '090316', '1');
INSERT INTO `distrito` VALUES ('907', 'RIPAN', '89', '090317', '1');
INSERT INTO `distrito` VALUES ('908', 'SHUNQUI', '89', '090321', '1');
INSERT INTO `distrito` VALUES ('909', 'SILLAPATA', '89', '090322', '1');
INSERT INTO `distrito` VALUES ('910', 'YANAS', '89', '090323', '1');
INSERT INTO `distrito` VALUES ('911', 'LLATA', '90', '090401', '1');
INSERT INTO `distrito` VALUES ('912', 'ARANCAY', '90', '090402', '1');
INSERT INTO `distrito` VALUES ('913', 'CHAVIN DE PARIARCA', '90', '090403', '1');
INSERT INTO `distrito` VALUES ('914', 'JACAS GRANDE', '90', '090404', '1');
INSERT INTO `distrito` VALUES ('915', 'JIRCAN', '90', '090405', '1');
INSERT INTO `distrito` VALUES ('916', 'MIRAFLORES', '90', '090406', '1');
INSERT INTO `distrito` VALUES ('917', 'MONZON', '90', '090407', '1');
INSERT INTO `distrito` VALUES ('918', 'PUNCHAO', '90', '090408', '1');
INSERT INTO `distrito` VALUES ('919', 'PUÑOS', '90', '090409', '1');
INSERT INTO `distrito` VALUES ('920', 'SINGA', '90', '090410', '1');
INSERT INTO `distrito` VALUES ('921', 'TANTAMAYO', '90', '090411', '1');
INSERT INTO `distrito` VALUES ('922', 'HUACRACHUCO', '91', '090501', '1');
INSERT INTO `distrito` VALUES ('923', 'CHOLON', '91', '090502', '1');
INSERT INTO `distrito` VALUES ('924', 'SAN BUENAVENTURA', '91', '090505', '1');
INSERT INTO `distrito` VALUES ('925', 'RUPA-RUPA', '92', '090601', '1');
INSERT INTO `distrito` VALUES ('926', 'DANIEL ALOMIA ROBLES', '92', '090602', '1');
INSERT INTO `distrito` VALUES ('927', 'HERMILIO VALDIZAN', '92', '090603', '1');
INSERT INTO `distrito` VALUES ('928', 'LUYANDO', '92', '090604', '1');
INSERT INTO `distrito` VALUES ('929', 'MARIANO DAMASO BERAUN', '92', '090605', '1');
INSERT INTO `distrito` VALUES ('930', 'JOSE CRESPO Y CASTILLO', '92', '090606', '1');
INSERT INTO `distrito` VALUES ('931', 'PANAO', '93', '090701', '1');
INSERT INTO `distrito` VALUES ('932', 'CHAGLLA', '93', '090702', '1');
INSERT INTO `distrito` VALUES ('933', 'MOLINO', '93', '090704', '1');
INSERT INTO `distrito` VALUES ('934', 'UMARI', '93', '090706', '1');
INSERT INTO `distrito` VALUES ('935', 'HONORIA', '94', '090801', '1');
INSERT INTO `distrito` VALUES ('936', 'PUERTO INCA', '94', '090802', '1');
INSERT INTO `distrito` VALUES ('937', 'CODO DEL POZUZO', '94', '090803', '1');
INSERT INTO `distrito` VALUES ('938', 'TOURNAVISTA', '94', '090804', '1');
INSERT INTO `distrito` VALUES ('939', 'YUYAPICHIS', '94', '090805', '1');
INSERT INTO `distrito` VALUES ('940', 'HUACAYBAMBA', '95', '090901', '1');
INSERT INTO `distrito` VALUES ('941', 'PINRA', '95', '090902', '1');
INSERT INTO `distrito` VALUES ('942', 'CANCHABAMBA', '95', '090903', '1');
INSERT INTO `distrito` VALUES ('943', 'COCHABAMBA', '95', '090904', '1');
INSERT INTO `distrito` VALUES ('944', 'JESUS', '96', '091001', '1');
INSERT INTO `distrito` VALUES ('945', 'BAÑOS', '96', '091002', '1');
INSERT INTO `distrito` VALUES ('946', 'SAN FRANCISCO DE ASIS', '96', '091003', '1');
INSERT INTO `distrito` VALUES ('947', 'QUEROPALCA', '96', '091004', '1');
INSERT INTO `distrito` VALUES ('948', 'SAN MIGUEL DE CAURI', '96', '091005', '1');
INSERT INTO `distrito` VALUES ('949', 'RONDOS', '96', '091006', '1');
INSERT INTO `distrito` VALUES ('950', 'JIVIA', '96', '091007', '1');
INSERT INTO `distrito` VALUES ('951', 'CHAVINILLO', '97', '091101', '1');
INSERT INTO `distrito` VALUES ('952', 'APARICIO POMARES', '97', '091102', '1');
INSERT INTO `distrito` VALUES ('953', 'CAHUAC', '97', '091103', '1');
INSERT INTO `distrito` VALUES ('954', 'CHACABAMBA', '97', '091104', '1');
INSERT INTO `distrito` VALUES ('955', 'JACAS CHICO', '97', '091105', '1');
INSERT INTO `distrito` VALUES ('956', 'OBAS', '97', '091106', '1');
INSERT INTO `distrito` VALUES ('957', 'PAMPAMARCA', '97', '091107', '1');
INSERT INTO `distrito` VALUES ('958', 'CHORAS', '97', '091108', '1');
INSERT INTO `distrito` VALUES ('959', 'ICA', '98', '100101', '1');
INSERT INTO `distrito` VALUES ('960', 'LA TINGUIÑA', '98', '100102', '1');
INSERT INTO `distrito` VALUES ('961', 'LOS AQUIJES', '98', '100103', '1');
INSERT INTO `distrito` VALUES ('962', 'PARCONA', '98', '100104', '1');
INSERT INTO `distrito` VALUES ('963', 'PUEBLO NUEVO', '98', '100105', '1');
INSERT INTO `distrito` VALUES ('964', 'SALAS', '98', '100106', '1');
INSERT INTO `distrito` VALUES ('965', 'SAN JOSE DE LOS MOLINOS', '98', '100107', '1');
INSERT INTO `distrito` VALUES ('966', 'SAN JUAN BAUTISTA', '98', '100108', '1');
INSERT INTO `distrito` VALUES ('967', 'SANTIAGO', '98', '100109', '1');
INSERT INTO `distrito` VALUES ('968', 'SUBTANJALLA', '98', '100110', '1');
INSERT INTO `distrito` VALUES ('969', 'YAUCA DEL ROSARIO', '98', '100111', '1');
INSERT INTO `distrito` VALUES ('970', 'TATE', '98', '100112', '1');
INSERT INTO `distrito` VALUES ('971', 'PACHACUTEC', '98', '100113', '1');
INSERT INTO `distrito` VALUES ('972', 'OCUCAJE', '98', '100114', '1');
INSERT INTO `distrito` VALUES ('973', 'CHINCHA ALTA', '99', '100201', '1');
INSERT INTO `distrito` VALUES ('974', 'CHAVIN', '99', '100202', '1');
INSERT INTO `distrito` VALUES ('975', 'CHINCHA BAJA', '99', '100203', '1');
INSERT INTO `distrito` VALUES ('976', 'EL CARMEN', '99', '100204', '1');
INSERT INTO `distrito` VALUES ('977', 'GROCIO PRADO', '99', '100205', '1');
INSERT INTO `distrito` VALUES ('978', 'SAN PEDRO DE HUACARPANA', '99', '100206', '1');
INSERT INTO `distrito` VALUES ('979', 'SUNAMPE', '99', '100207', '1');
INSERT INTO `distrito` VALUES ('980', 'TAMBO DE MORA', '99', '100208', '1');
INSERT INTO `distrito` VALUES ('981', 'ALTO LARAN', '99', '100209', '1');
INSERT INTO `distrito` VALUES ('982', 'PUEBLO NUEVO', '99', '100210', '1');
INSERT INTO `distrito` VALUES ('983', 'SAN JUAN DE YANAC', '99', '100211', '1');
INSERT INTO `distrito` VALUES ('984', 'NAZCA', '100', '100301', '1');
INSERT INTO `distrito` VALUES ('985', 'CHANGUILLO', '100', '100302', '1');
INSERT INTO `distrito` VALUES ('986', 'EL INGENIO', '100', '100303', '1');
INSERT INTO `distrito` VALUES ('987', 'MARCONA', '100', '100304', '1');
INSERT INTO `distrito` VALUES ('988', 'VISTA ALEGRE', '100', '100305', '1');
INSERT INTO `distrito` VALUES ('989', 'PISCO', '101', '100401', '1');
INSERT INTO `distrito` VALUES ('990', 'HUANCANO', '101', '100402', '1');
INSERT INTO `distrito` VALUES ('991', 'HUMAY', '101', '100403', '1');
INSERT INTO `distrito` VALUES ('992', 'INDEPENDENCIA', '101', '100404', '1');
INSERT INTO `distrito` VALUES ('993', 'PARACAS', '101', '100405', '1');
INSERT INTO `distrito` VALUES ('994', 'SAN ANDRES', '101', '100406', '1');
INSERT INTO `distrito` VALUES ('995', 'SAN CLEMENTE', '101', '100407', '1');
INSERT INTO `distrito` VALUES ('996', 'TUPAC AMARU INCA', '101', '100408', '1');
INSERT INTO `distrito` VALUES ('997', 'PALPA', '102', '100501', '1');
INSERT INTO `distrito` VALUES ('998', 'LLIPATA', '102', '100502', '1');
INSERT INTO `distrito` VALUES ('999', 'RIO GRANDE', '102', '100503', '1');
INSERT INTO `distrito` VALUES ('1000', 'SANTA CRUZ', '102', '100504', '1');
INSERT INTO `distrito` VALUES ('1001', 'TIBILLO', '102', '100505', '1');
INSERT INTO `distrito` VALUES ('1002', 'HUANCAYO', '103', '110101', '1');
INSERT INTO `distrito` VALUES ('1003', 'CARHUACALLANGA', '103', '110103', '1');
INSERT INTO `distrito` VALUES ('1004', 'COLCA', '103', '110104', '1');
INSERT INTO `distrito` VALUES ('1005', 'CULLHUAS', '103', '110105', '1');
INSERT INTO `distrito` VALUES ('1006', 'CHACAPAMPA', '103', '110106', '1');
INSERT INTO `distrito` VALUES ('1007', 'CHICCHE', '103', '110107', '1');
INSERT INTO `distrito` VALUES ('1008', 'CHILCA', '103', '110108', '1');
INSERT INTO `distrito` VALUES ('1009', 'CHONGOS ALTO', '103', '110109', '1');
INSERT INTO `distrito` VALUES ('1010', 'CHUPURO', '103', '110112', '1');
INSERT INTO `distrito` VALUES ('1011', 'EL TAMBO', '103', '110113', '1');
INSERT INTO `distrito` VALUES ('1012', 'HUACRAPUQUIO', '103', '110114', '1');
INSERT INTO `distrito` VALUES ('1013', 'HUALHUAS', '103', '110116', '1');
INSERT INTO `distrito` VALUES ('1014', 'HUANCAN', '103', '110118', '1');
INSERT INTO `distrito` VALUES ('1015', 'HUASICANCHA', '103', '110119', '1');
INSERT INTO `distrito` VALUES ('1016', 'HUAYUCACHI', '103', '110120', '1');
INSERT INTO `distrito` VALUES ('1017', 'INGENIO', '103', '110121', '1');
INSERT INTO `distrito` VALUES ('1018', 'PARIAHUANCA', '103', '110122', '1');
INSERT INTO `distrito` VALUES ('1019', 'PILCOMAYO', '103', '110123', '1');
INSERT INTO `distrito` VALUES ('1020', 'PUCARA', '103', '110124', '1');
INSERT INTO `distrito` VALUES ('1021', 'QUICHUAY', '103', '110125', '1');
INSERT INTO `distrito` VALUES ('1022', 'QUILCAS', '103', '110126', '1');
INSERT INTO `distrito` VALUES ('1023', 'SAN AGUSTIN', '103', '110127', '1');
INSERT INTO `distrito` VALUES ('1024', 'SAN JERONIMO DE TUNAN', '103', '110128', '1');
INSERT INTO `distrito` VALUES ('1025', 'SANTO DOMINGO DE ACOBAMBA', '103', '110131', '1');
INSERT INTO `distrito` VALUES ('1026', 'SAÑO', '103', '110132', '1');
INSERT INTO `distrito` VALUES ('1027', 'SAPALLANGA', '103', '110133', '1');
INSERT INTO `distrito` VALUES ('1028', 'SICAYA', '103', '110134', '1');
INSERT INTO `distrito` VALUES ('1029', 'VIQUES', '103', '110136', '1');
INSERT INTO `distrito` VALUES ('1030', 'CONCEPCION', '104', '110201', '1');
INSERT INTO `distrito` VALUES ('1031', 'ACO', '104', '110202', '1');
INSERT INTO `distrito` VALUES ('1032', 'ANDAMARCA', '104', '110203', '1');
INSERT INTO `distrito` VALUES ('1033', 'COMAS', '104', '110204', '1');
INSERT INTO `distrito` VALUES ('1034', 'COCHAS', '104', '110205', '1');
INSERT INTO `distrito` VALUES ('1035', 'CHAMBARA', '104', '110206', '1');
INSERT INTO `distrito` VALUES ('1036', 'HEROINAS TOLEDO', '104', '110207', '1');
INSERT INTO `distrito` VALUES ('1037', 'MANZANARES', '104', '110208', '1');
INSERT INTO `distrito` VALUES ('1038', 'MARISCAL CASTILLA', '104', '110209', '1');
INSERT INTO `distrito` VALUES ('1039', 'MATAHUASI', '104', '110210', '1');
INSERT INTO `distrito` VALUES ('1040', 'MITO', '104', '110211', '1');
INSERT INTO `distrito` VALUES ('1041', 'NUEVE DE JULIO', '104', '110212', '1');
INSERT INTO `distrito` VALUES ('1042', 'ORCOTUNA', '104', '110213', '1');
INSERT INTO `distrito` VALUES ('1043', 'SANTA ROSA DE OCOPA', '104', '110214', '1');
INSERT INTO `distrito` VALUES ('1044', 'SAN JOSE DE QUERO', '104', '110215', '1');
INSERT INTO `distrito` VALUES ('1045', 'JAUJA', '105', '110301', '1');
INSERT INTO `distrito` VALUES ('1046', 'ACOLLA', '105', '110302', '1');
INSERT INTO `distrito` VALUES ('1047', 'APATA', '105', '110303', '1');
INSERT INTO `distrito` VALUES ('1048', 'ATAURA', '105', '110304', '1');
INSERT INTO `distrito` VALUES ('1049', 'CANCHAYLLO', '105', '110305', '1');
INSERT INTO `distrito` VALUES ('1050', 'EL MANTARO', '105', '110306', '1');
INSERT INTO `distrito` VALUES ('1051', 'HUAMALI', '105', '110307', '1');
INSERT INTO `distrito` VALUES ('1052', 'HUARIPAMPA', '105', '110308', '1');
INSERT INTO `distrito` VALUES ('1053', 'HUERTAS', '105', '110309', '1');
INSERT INTO `distrito` VALUES ('1054', 'JANJAILLO', '105', '110310', '1');
INSERT INTO `distrito` VALUES ('1055', 'JULCAN', '105', '110311', '1');
INSERT INTO `distrito` VALUES ('1056', 'LEONOR ORDOÑEZ', '105', '110312', '1');
INSERT INTO `distrito` VALUES ('1057', 'LLOCLLAPAMPA', '105', '110313', '1');
INSERT INTO `distrito` VALUES ('1058', 'MARCO', '105', '110314', '1');
INSERT INTO `distrito` VALUES ('1059', 'MASMA', '105', '110315', '1');
INSERT INTO `distrito` VALUES ('1060', 'MOLINOS', '105', '110316', '1');
INSERT INTO `distrito` VALUES ('1061', 'MONOBAMBA', '105', '110317', '1');
INSERT INTO `distrito` VALUES ('1062', 'MUQUI', '105', '110318', '1');
INSERT INTO `distrito` VALUES ('1063', 'MUQUIYAUYO', '105', '110319', '1');
INSERT INTO `distrito` VALUES ('1064', 'PACA', '105', '110320', '1');
INSERT INTO `distrito` VALUES ('1065', 'PACCHA', '105', '110321', '1');
INSERT INTO `distrito` VALUES ('1066', 'PANCAN', '105', '110322', '1');
INSERT INTO `distrito` VALUES ('1067', 'PARCO', '105', '110323', '1');
INSERT INTO `distrito` VALUES ('1068', 'POMACANCHA', '105', '110324', '1');
INSERT INTO `distrito` VALUES ('1069', 'RICRAN', '105', '110325', '1');
INSERT INTO `distrito` VALUES ('1070', 'SAN LORENZO', '105', '110326', '1');
INSERT INTO `distrito` VALUES ('1071', 'SAN PEDRO DE CHUNAN', '105', '110327', '1');
INSERT INTO `distrito` VALUES ('1072', 'SINCOS', '105', '110328', '1');
INSERT INTO `distrito` VALUES ('1073', 'TUNAN MARCA', '105', '110329', '1');
INSERT INTO `distrito` VALUES ('1074', 'YAULI', '105', '110330', '1');
INSERT INTO `distrito` VALUES ('1075', 'CURICACA', '105', '110331', '1');
INSERT INTO `distrito` VALUES ('1076', 'MASMA CHICCHE', '105', '110332', '1');
INSERT INTO `distrito` VALUES ('1077', 'SAUSA', '105', '110333', '1');
INSERT INTO `distrito` VALUES ('1078', 'YAUYOS', '105', '110334', '1');
INSERT INTO `distrito` VALUES ('1079', 'JUNIN', '106', '110401', '1');
INSERT INTO `distrito` VALUES ('1080', 'CARHUAMAYO', '106', '110402', '1');
INSERT INTO `distrito` VALUES ('1081', 'ONDORES', '106', '110403', '1');
INSERT INTO `distrito` VALUES ('1082', 'ULCUMAYO', '106', '110404', '1');
INSERT INTO `distrito` VALUES ('1083', 'TARMA', '107', '110501', '1');
INSERT INTO `distrito` VALUES ('1084', 'ACOBAMBA', '107', '110502', '1');
INSERT INTO `distrito` VALUES ('1085', 'HUARICOLCA', '107', '110503', '1');
INSERT INTO `distrito` VALUES ('1086', 'HUASAHUASI', '107', '110504', '1');
INSERT INTO `distrito` VALUES ('1087', 'LA UNION', '107', '110505', '1');
INSERT INTO `distrito` VALUES ('1088', 'PALCA', '107', '110506', '1');
INSERT INTO `distrito` VALUES ('1089', 'PALCAMAYO', '107', '110507', '1');
INSERT INTO `distrito` VALUES ('1090', 'SAN PEDRO DE CAJAS', '107', '110508', '1');
INSERT INTO `distrito` VALUES ('1091', 'TAPO', '107', '110509', '1');
INSERT INTO `distrito` VALUES ('1092', 'LA OROYA', '108', '110601', '1');
INSERT INTO `distrito` VALUES ('1093', 'CHACAPALPA', '108', '110602', '1');
INSERT INTO `distrito` VALUES ('1094', 'HUAY HUAY', '108', '110603', '1');
INSERT INTO `distrito` VALUES ('1095', 'MARCAPOMACOCHA', '108', '110604', '1');
INSERT INTO `distrito` VALUES ('1096', 'MOROCOCHA', '108', '110605', '1');
INSERT INTO `distrito` VALUES ('1097', 'PACCHA', '108', '110606', '1');
INSERT INTO `distrito` VALUES ('1098', 'SANTA BARBARA DE CARHUACAYAN', '108', '110607', '1');
INSERT INTO `distrito` VALUES ('1099', 'SUITUCANCHA', '108', '110608', '1');
INSERT INTO `distrito` VALUES ('1100', 'YAULI', '108', '110609', '1');
INSERT INTO `distrito` VALUES ('1101', 'SANTA ROSA DE SACCO', '108', '110610', '1');
INSERT INTO `distrito` VALUES ('1102', 'SATIPO', '109', '110701', '1');
INSERT INTO `distrito` VALUES ('1103', 'COVIRIALI', '109', '110702', '1');
INSERT INTO `distrito` VALUES ('1104', 'LLAYLLA', '109', '110703', '1');
INSERT INTO `distrito` VALUES ('1105', 'MAZAMARI', '109', '110704', '1');
INSERT INTO `distrito` VALUES ('1106', 'PAMPA HERMOSA', '109', '110705', '1');
INSERT INTO `distrito` VALUES ('1107', 'PANGOA', '109', '110706', '1');
INSERT INTO `distrito` VALUES ('1108', 'RIO NEGRO', '109', '110707', '1');
INSERT INTO `distrito` VALUES ('1109', 'RIO TAMBO', '109', '110708', '1');
INSERT INTO `distrito` VALUES ('1110', 'CHANCHAMAYO', '110', '110801', '1');
INSERT INTO `distrito` VALUES ('1111', 'SAN RAMON', '110', '110802', '1');
INSERT INTO `distrito` VALUES ('1112', 'VITOC', '110', '110803', '1');
INSERT INTO `distrito` VALUES ('1113', 'SAN LUIS DE SHUARO', '110', '110804', '1');
INSERT INTO `distrito` VALUES ('1114', 'PICHANAQUI', '110', '110805', '1');
INSERT INTO `distrito` VALUES ('1115', 'PERENE', '110', '110806', '1');
INSERT INTO `distrito` VALUES ('1116', 'CHUPACA', '111', '110901', '1');
INSERT INTO `distrito` VALUES ('1117', 'AHUAC', '111', '110902', '1');
INSERT INTO `distrito` VALUES ('1118', 'CHONGOS BAJO', '111', '110903', '1');
INSERT INTO `distrito` VALUES ('1119', 'HUACHAC', '111', '110904', '1');
INSERT INTO `distrito` VALUES ('1120', 'HUAMANCACA CHICO', '111', '110905', '1');
INSERT INTO `distrito` VALUES ('1121', 'SAN JUAN DE YSCOS', '111', '110906', '1');
INSERT INTO `distrito` VALUES ('1122', 'SAN JUAN DE JARPA', '111', '110907', '1');
INSERT INTO `distrito` VALUES ('1123', 'TRES DE DICIEMBRE', '111', '110908', '1');
INSERT INTO `distrito` VALUES ('1124', 'YANACANCHA', '111', '110909', '1');
INSERT INTO `distrito` VALUES ('1125', 'TRUJILLO', '112', '120101', '1');
INSERT INTO `distrito` VALUES ('1126', 'HUANCHACO', '112', '120102', '1');
INSERT INTO `distrito` VALUES ('1127', 'LAREDO', '112', '120103', '1');
INSERT INTO `distrito` VALUES ('1128', 'MOCHE', '112', '120104', '1');
INSERT INTO `distrito` VALUES ('1129', 'SALAVERRY', '112', '120105', '1');
INSERT INTO `distrito` VALUES ('1130', 'SIMBAL', '112', '120106', '1');
INSERT INTO `distrito` VALUES ('1131', 'VICTOR LARCO HERRERA', '112', '120107', '1');
INSERT INTO `distrito` VALUES ('1132', 'POROTO', '112', '120109', '1');
INSERT INTO `distrito` VALUES ('1133', 'EL PORVENIR', '112', '120110', '1');
INSERT INTO `distrito` VALUES ('1134', 'LA ESPERANZA', '112', '120111', '1');
INSERT INTO `distrito` VALUES ('1135', 'FLORENCIA DE MORA', '112', '120112', '1');
INSERT INTO `distrito` VALUES ('1136', 'BOLIVAR', '113', '120201', '1');
INSERT INTO `distrito` VALUES ('1137', 'BAMBAMARCA', '113', '120202', '1');
INSERT INTO `distrito` VALUES ('1138', 'CONDORMARCA', '113', '120203', '1');
INSERT INTO `distrito` VALUES ('1139', 'LONGOTEA', '113', '120204', '1');
INSERT INTO `distrito` VALUES ('1140', 'UCUNCHA', '113', '120205', '1');
INSERT INTO `distrito` VALUES ('1141', 'UCHUMARCA', '113', '120206', '1');
INSERT INTO `distrito` VALUES ('1142', 'HUAMACHUCO', '114', '120301', '1');
INSERT INTO `distrito` VALUES ('1143', 'COCHORCO', '114', '120302', '1');
INSERT INTO `distrito` VALUES ('1144', 'CURGOS', '114', '120303', '1');
INSERT INTO `distrito` VALUES ('1145', 'CHUGAY', '114', '120304', '1');
INSERT INTO `distrito` VALUES ('1146', 'MARCABAL', '114', '120305', '1');
INSERT INTO `distrito` VALUES ('1147', 'SANAGORAN', '114', '120306', '1');
INSERT INTO `distrito` VALUES ('1148', 'SARIN', '114', '120307', '1');
INSERT INTO `distrito` VALUES ('1149', 'SARTIMBAMBA', '114', '120308', '1');
INSERT INTO `distrito` VALUES ('1150', 'OTUZCO', '115', '120401', '1');
INSERT INTO `distrito` VALUES ('1151', 'AGALLPAMPA', '115', '120402', '1');
INSERT INTO `distrito` VALUES ('1152', 'CHARAT', '115', '120403', '1');
INSERT INTO `distrito` VALUES ('1153', 'HUARANCHAL', '115', '120404', '1');
INSERT INTO `distrito` VALUES ('1154', 'LA CUESTA', '115', '120405', '1');
INSERT INTO `distrito` VALUES ('1155', 'PARANDAY', '115', '120408', '1');
INSERT INTO `distrito` VALUES ('1156', 'SALPO', '115', '120409', '1');
INSERT INTO `distrito` VALUES ('1157', 'SINSICAP', '115', '120410', '1');
INSERT INTO `distrito` VALUES ('1158', 'USQUIL', '115', '120411', '1');
INSERT INTO `distrito` VALUES ('1159', 'MACHE', '115', '120413', '1');
INSERT INTO `distrito` VALUES ('1160', 'SAN PEDRO DE LLOC', '116', '120501', '1');
INSERT INTO `distrito` VALUES ('1161', 'GUADALUPE', '116', '120503', '1');
INSERT INTO `distrito` VALUES ('1162', 'JEQUETEPEQUE', '116', '120504', '1');
INSERT INTO `distrito` VALUES ('1163', 'PACASMAYO', '116', '120506', '1');
INSERT INTO `distrito` VALUES ('1164', 'SAN JOSE', '116', '120508', '1');
INSERT INTO `distrito` VALUES ('1165', 'TAYABAMBA', '117', '120601', '1');
INSERT INTO `distrito` VALUES ('1166', 'BULDIBUYO', '117', '120602', '1');
INSERT INTO `distrito` VALUES ('1167', 'CHILLIA', '117', '120603', '1');
INSERT INTO `distrito` VALUES ('1168', 'HUAYLILLAS', '117', '120604', '1');
INSERT INTO `distrito` VALUES ('1169', 'HUANCASPATA', '117', '120605', '1');
INSERT INTO `distrito` VALUES ('1170', 'HUAYO', '117', '120606', '1');
INSERT INTO `distrito` VALUES ('1171', 'ONGON', '117', '120607', '1');
INSERT INTO `distrito` VALUES ('1172', 'PARCOY', '117', '120608', '1');
INSERT INTO `distrito` VALUES ('1173', 'PATAZ', '117', '120609', '1');
INSERT INTO `distrito` VALUES ('1174', 'PIAS', '117', '120610', '1');
INSERT INTO `distrito` VALUES ('1175', 'TAURIJA', '117', '120611', '1');
INSERT INTO `distrito` VALUES ('1176', 'URPAY', '117', '120612', '1');
INSERT INTO `distrito` VALUES ('1177', 'SANTIAGO DE CHALLAS', '117', '120613', '1');
INSERT INTO `distrito` VALUES ('1178', 'SANTIAGO DE CHUCO', '118', '120701', '1');
INSERT INTO `distrito` VALUES ('1179', 'CACHICADAN', '118', '120702', '1');
INSERT INTO `distrito` VALUES ('1180', 'MOLLEBAMBA', '118', '120703', '1');
INSERT INTO `distrito` VALUES ('1181', 'MOLLEPATA', '118', '120704', '1');
INSERT INTO `distrito` VALUES ('1182', 'QUIRUVILCA', '118', '120705', '1');
INSERT INTO `distrito` VALUES ('1183', 'SANTA CRUZ DE CHUCA', '118', '120706', '1');
INSERT INTO `distrito` VALUES ('1184', 'SITABAMBA', '118', '120707', '1');
INSERT INTO `distrito` VALUES ('1185', 'ANGASMARCA', '118', '120708', '1');
INSERT INTO `distrito` VALUES ('1186', 'ASCOPE', '119', '120801', '1');
INSERT INTO `distrito` VALUES ('1187', 'CHICAMA', '119', '120802', '1');
INSERT INTO `distrito` VALUES ('1188', 'CHOCOPE', '119', '120803', '1');
INSERT INTO `distrito` VALUES ('1189', 'SANTIAGO DE CAO', '119', '120804', '1');
INSERT INTO `distrito` VALUES ('1190', 'MAGDALENA DE CAO', '119', '120805', '1');
INSERT INTO `distrito` VALUES ('1191', 'PAIJAN', '119', '120806', '1');
INSERT INTO `distrito` VALUES ('1192', 'RAZURI', '119', '120807', '1');
INSERT INTO `distrito` VALUES ('1193', 'CASA GRANDE', '119', '120808', '1');
INSERT INTO `distrito` VALUES ('1194', 'CHEPEN', '120', '120901', '1');
INSERT INTO `distrito` VALUES ('1195', 'PACANGA', '120', '120902', '1');
INSERT INTO `distrito` VALUES ('1196', 'PUEBLO NUEVO', '120', '120903', '1');
INSERT INTO `distrito` VALUES ('1197', 'JULCAN', '121', '121001', '1');
INSERT INTO `distrito` VALUES ('1198', 'CARABAMBA', '121', '121002', '1');
INSERT INTO `distrito` VALUES ('1199', 'CALAMARCA', '121', '121003', '1');
INSERT INTO `distrito` VALUES ('1200', 'HUASO', '121', '121004', '1');
INSERT INTO `distrito` VALUES ('1201', 'CASCAS', '122', '121101', '1');
INSERT INTO `distrito` VALUES ('1202', 'LUCMA', '122', '121102', '1');
INSERT INTO `distrito` VALUES ('1203', 'MARMOT', '122', '121103', '1');
INSERT INTO `distrito` VALUES ('1204', 'SAYAPULLO', '122', '121104', '1');
INSERT INTO `distrito` VALUES ('1205', 'VIRU', '123', '121201', '1');
INSERT INTO `distrito` VALUES ('1206', 'CHAO', '123', '121202', '1');
INSERT INTO `distrito` VALUES ('1207', 'GUADALUPITO', '123', '121203', '1');
INSERT INTO `distrito` VALUES ('1208', 'CHICLAYO', '124', '130101', '1');
INSERT INTO `distrito` VALUES ('1209', 'CHONGOYAPE', '124', '130102', '1');
INSERT INTO `distrito` VALUES ('1210', 'ETEN', '124', '130103', '1');
INSERT INTO `distrito` VALUES ('1211', 'ETEN PUERTO', '124', '130104', '1');
INSERT INTO `distrito` VALUES ('1212', 'LAGUNAS', '124', '130105', '1');
INSERT INTO `distrito` VALUES ('1213', 'MONSEFU', '124', '130106', '1');
INSERT INTO `distrito` VALUES ('1214', 'NUEVA ARICA', '124', '130107', '1');
INSERT INTO `distrito` VALUES ('1215', 'OYOTUN', '124', '130108', '1');
INSERT INTO `distrito` VALUES ('1216', 'PICSI', '124', '130109', '1');
INSERT INTO `distrito` VALUES ('1217', 'PIMENTEL', '124', '130110', '1');
INSERT INTO `distrito` VALUES ('1218', 'REQUE', '124', '130111', '1');
INSERT INTO `distrito` VALUES ('1219', 'JOSE LEONARDO ORTIZ', '124', '130112', '1');
INSERT INTO `distrito` VALUES ('1220', 'SANTA ROSA', '124', '130113', '1');
INSERT INTO `distrito` VALUES ('1221', 'SAÑA', '124', '130114', '1');
INSERT INTO `distrito` VALUES ('1222', 'LA VICTORIA', '124', '130115', '1');
INSERT INTO `distrito` VALUES ('1223', 'CAYALTI', '124', '130116', '1');
INSERT INTO `distrito` VALUES ('1224', 'PATAPO', '124', '130117', '1');
INSERT INTO `distrito` VALUES ('1225', 'POMALCA', '124', '130118', '1');
INSERT INTO `distrito` VALUES ('1226', 'PUCALA', '124', '130119', '1');
INSERT INTO `distrito` VALUES ('1227', 'TUMAN', '124', '130120', '1');
INSERT INTO `distrito` VALUES ('1228', 'FERREÑAFE', '125', '130201', '1');
INSERT INTO `distrito` VALUES ('1229', 'INCAHUASI', '125', '130202', '1');
INSERT INTO `distrito` VALUES ('1230', 'CAÑARIS', '125', '130203', '1');
INSERT INTO `distrito` VALUES ('1231', 'PITIPO', '125', '130204', '1');
INSERT INTO `distrito` VALUES ('1232', 'PUEBLO NUEVO', '125', '130205', '1');
INSERT INTO `distrito` VALUES ('1233', 'MANUEL ANTONIO MESONES MURO', '125', '130206', '1');
INSERT INTO `distrito` VALUES ('1234', 'LAMBAYEQUE', '126', '130301', '1');
INSERT INTO `distrito` VALUES ('1235', 'CHOCHOPE', '126', '130302', '1');
INSERT INTO `distrito` VALUES ('1236', 'ILLIMO', '126', '130303', '1');
INSERT INTO `distrito` VALUES ('1237', 'JAYANCA', '126', '130304', '1');
INSERT INTO `distrito` VALUES ('1238', 'MOCHUMI', '126', '130305', '1');
INSERT INTO `distrito` VALUES ('1239', 'MORROPE', '126', '130306', '1');
INSERT INTO `distrito` VALUES ('1240', 'MOTUPE', '126', '130307', '1');
INSERT INTO `distrito` VALUES ('1241', 'OLMOS', '126', '130308', '1');
INSERT INTO `distrito` VALUES ('1242', 'PACORA', '126', '130309', '1');
INSERT INTO `distrito` VALUES ('1243', 'SALAS', '126', '130310', '1');
INSERT INTO `distrito` VALUES ('1244', 'SAN JOSE', '126', '130311', '1');
INSERT INTO `distrito` VALUES ('1245', 'TUCUME', '126', '130312', '1');
INSERT INTO `distrito` VALUES ('1246', 'LIMA', '127', '140101', '1');
INSERT INTO `distrito` VALUES ('1247', 'ANCON', '127', '140102', '1');
INSERT INTO `distrito` VALUES ('1248', 'ATE', '127', '140103', '1');
INSERT INTO `distrito` VALUES ('1249', 'BREÑA', '127', '140104', '1');
INSERT INTO `distrito` VALUES ('1250', 'CARABAYLLO', '127', '140105', '1');
INSERT INTO `distrito` VALUES ('1251', 'COMAS', '127', '140106', '1');
INSERT INTO `distrito` VALUES ('1252', 'CHACLACAYO', '127', '140107', '1');
INSERT INTO `distrito` VALUES ('1253', 'CHORRILLOS', '127', '140108', '1');
INSERT INTO `distrito` VALUES ('1254', 'LA VICTORIA', '127', '140109', '1');
INSERT INTO `distrito` VALUES ('1255', 'LA MOLINA', '127', '140110', '1');
INSERT INTO `distrito` VALUES ('1256', 'LINCE', '127', '140111', '1');
INSERT INTO `distrito` VALUES ('1257', 'LURIGANCHO', '127', '140112', '1');
INSERT INTO `distrito` VALUES ('1258', 'LURIN', '127', '140113', '1');
INSERT INTO `distrito` VALUES ('1259', 'MAGDALENA DEL MAR', '127', '140114', '1');
INSERT INTO `distrito` VALUES ('1260', 'MIRAFLORES', '127', '140115', '1');
INSERT INTO `distrito` VALUES ('1261', 'PACHACAMAC', '127', '140116', '1');
INSERT INTO `distrito` VALUES ('1262', 'PUEBLO LIBRE', '127', '140117', '1');
INSERT INTO `distrito` VALUES ('1263', 'PUCUSANA', '127', '140118', '1');
INSERT INTO `distrito` VALUES ('1264', 'PUENTE PIEDRA', '127', '140119', '1');
INSERT INTO `distrito` VALUES ('1265', 'PUNTA HERMOSA', '127', '140120', '1');
INSERT INTO `distrito` VALUES ('1266', 'PUNTA NEGRA', '127', '140121', '1');
INSERT INTO `distrito` VALUES ('1267', 'RIMAC', '127', '140122', '1');
INSERT INTO `distrito` VALUES ('1268', 'SAN BARTOLO', '127', '140123', '1');
INSERT INTO `distrito` VALUES ('1269', 'SAN ISIDRO', '127', '140124', '1');
INSERT INTO `distrito` VALUES ('1270', 'BARRANCO', '127', '140125', '1');
INSERT INTO `distrito` VALUES ('1271', 'SAN MARTIN DE PORRES', '127', '140126', '1');
INSERT INTO `distrito` VALUES ('1272', 'SAN MIGUEL', '127', '140127', '1');
INSERT INTO `distrito` VALUES ('1273', 'SANTA MARIA DEL MAR', '127', '140128', '1');
INSERT INTO `distrito` VALUES ('1274', 'SANTA ROSA', '127', '140129', '1');
INSERT INTO `distrito` VALUES ('1275', 'SANTIAGO DE SURCO', '127', '140130', '1');
INSERT INTO `distrito` VALUES ('1276', 'SURQUILLO', '127', '140131', '1');
INSERT INTO `distrito` VALUES ('1277', 'VILLA MARIA DEL TRIUNFO', '127', '140132', '1');
INSERT INTO `distrito` VALUES ('1278', 'JESUS MARIA', '127', '140133', '1');
INSERT INTO `distrito` VALUES ('1279', 'INDEPENDENCIA', '127', '140134', '1');
INSERT INTO `distrito` VALUES ('1280', 'EL AGUSTINO', '127', '140135', '1');
INSERT INTO `distrito` VALUES ('1281', 'SAN JUAN DE MIRAFLORES', '127', '140136', '1');
INSERT INTO `distrito` VALUES ('1282', 'SAN JUAN DE LURIGANCHO', '127', '140137', '1');
INSERT INTO `distrito` VALUES ('1283', 'SAN LUIS', '127', '140138', '1');
INSERT INTO `distrito` VALUES ('1284', 'CIENEGUILLA', '127', '140139', '1');
INSERT INTO `distrito` VALUES ('1285', 'SAN BORJA', '127', '140140', '1');
INSERT INTO `distrito` VALUES ('1286', 'VILLA EL SALVADOR', '127', '140141', '1');
INSERT INTO `distrito` VALUES ('1287', 'LOS OLIVOS', '127', '140142', '1');
INSERT INTO `distrito` VALUES ('1288', 'SANTA ANITA', '127', '140143', '1');
INSERT INTO `distrito` VALUES ('1289', 'CAJATAMBO', '128', '140201', '1');
INSERT INTO `distrito` VALUES ('1290', 'COPA', '128', '140205', '1');
INSERT INTO `distrito` VALUES ('1291', 'GORGOR', '128', '140206', '1');
INSERT INTO `distrito` VALUES ('1292', 'HUANCAPON', '128', '140207', '1');
INSERT INTO `distrito` VALUES ('1293', 'MANAS', '128', '140208', '1');
INSERT INTO `distrito` VALUES ('1294', 'CANTA', '129', '140301', '1');
INSERT INTO `distrito` VALUES ('1295', 'ARAHUAY', '129', '140302', '1');
INSERT INTO `distrito` VALUES ('1296', 'HUAMANTANGA', '129', '140303', '1');
INSERT INTO `distrito` VALUES ('1297', 'HUAROS', '129', '140304', '1');
INSERT INTO `distrito` VALUES ('1298', 'LACHAQUI', '129', '140305', '1');
INSERT INTO `distrito` VALUES ('1299', 'SAN BUENAVENTURA', '129', '140306', '1');
INSERT INTO `distrito` VALUES ('1300', 'SANTA ROSA DE QUIVES', '129', '140307', '1');
INSERT INTO `distrito` VALUES ('1301', 'SAN VICENTE DE CAÑETE', '130', '140401', '1');
INSERT INTO `distrito` VALUES ('1302', 'CALANGO', '130', '140402', '1');
INSERT INTO `distrito` VALUES ('1303', 'CERRO AZUL', '130', '140403', '1');
INSERT INTO `distrito` VALUES ('1304', 'COAYLLO', '130', '140404', '1');
INSERT INTO `distrito` VALUES ('1305', 'CHILCA', '130', '140405', '1');
INSERT INTO `distrito` VALUES ('1306', 'IMPERIAL', '130', '140406', '1');
INSERT INTO `distrito` VALUES ('1307', 'LUNAHUANA', '130', '140407', '1');
INSERT INTO `distrito` VALUES ('1308', 'MALA', '130', '140408', '1');
INSERT INTO `distrito` VALUES ('1309', 'NUEVO IMPERIAL', '130', '140409', '1');
INSERT INTO `distrito` VALUES ('1310', 'PACARAN', '130', '140410', '1');
INSERT INTO `distrito` VALUES ('1311', 'QUILMANA', '130', '140411', '1');
INSERT INTO `distrito` VALUES ('1312', 'SAN ANTONIO', '130', '140412', '1');
INSERT INTO `distrito` VALUES ('1313', 'SAN LUIS', '130', '140413', '1');
INSERT INTO `distrito` VALUES ('1314', 'SANTA CRUZ DE FLORES', '130', '140414', '1');
INSERT INTO `distrito` VALUES ('1315', 'ZUÑIGA', '130', '140415', '1');
INSERT INTO `distrito` VALUES ('1316', 'ASIA', '130', '140416', '1');
INSERT INTO `distrito` VALUES ('1317', 'HUACHO', '131', '140501', '1');
INSERT INTO `distrito` VALUES ('1318', 'AMBAR', '131', '140502', '1');
INSERT INTO `distrito` VALUES ('1319', 'CALETA DE CARQUIN', '131', '140504', '1');
INSERT INTO `distrito` VALUES ('1320', 'CHECRAS', '131', '140505', '1');
INSERT INTO `distrito` VALUES ('1321', 'HUALMAY', '131', '140506', '1');
INSERT INTO `distrito` VALUES ('1322', 'HUAURA', '131', '140507', '1');
INSERT INTO `distrito` VALUES ('1323', 'LEONCIO PRADO', '131', '140508', '1');
INSERT INTO `distrito` VALUES ('1324', 'PACCHO', '131', '140509', '1');
INSERT INTO `distrito` VALUES ('1325', 'SANTA LEONOR', '131', '140511', '1');
INSERT INTO `distrito` VALUES ('1326', 'SANTA MARIA', '131', '140512', '1');
INSERT INTO `distrito` VALUES ('1327', 'SAYAN', '131', '140513', '1');
INSERT INTO `distrito` VALUES ('1328', 'VEGUETA', '131', '140516', '1');
INSERT INTO `distrito` VALUES ('1329', 'MATUCANA', '132', '140601', '1');
INSERT INTO `distrito` VALUES ('1330', 'ANTIOQUIA', '132', '140602', '1');
INSERT INTO `distrito` VALUES ('1331', 'CALLAHUANCA', '132', '140603', '1');
INSERT INTO `distrito` VALUES ('1332', 'CARAMPOMA', '132', '140604', '1');
INSERT INTO `distrito` VALUES ('1333', 'CASTA', '132', '140605', '1');
INSERT INTO `distrito` VALUES ('1334', 'SAN JOSE DE LOS CHORRILLOS', '132', '140606', '1');
INSERT INTO `distrito` VALUES ('1335', 'CHICLA', '132', '140607', '1');
INSERT INTO `distrito` VALUES ('1336', 'HUANZA', '132', '140608', '1');
INSERT INTO `distrito` VALUES ('1337', 'HUAROCHIRI', '132', '140609', '1');
INSERT INTO `distrito` VALUES ('1338', 'LAHUAYTAMBO', '132', '140610', '1');
INSERT INTO `distrito` VALUES ('1339', 'LANGA', '132', '140611', '1');
INSERT INTO `distrito` VALUES ('1340', 'MARIATANA', '132', '140612', '1');
INSERT INTO `distrito` VALUES ('1341', 'RICARDO PALMA', '132', '140613', '1');
INSERT INTO `distrito` VALUES ('1342', 'SAN ANDRES DE TUPICOCHA', '132', '140614', '1');
INSERT INTO `distrito` VALUES ('1343', 'SAN ANTONIO', '132', '140615', '1');
INSERT INTO `distrito` VALUES ('1344', 'SAN BARTOLOME', '132', '140616', '1');
INSERT INTO `distrito` VALUES ('1345', 'SAN DAMIAN', '132', '140617', '1');
INSERT INTO `distrito` VALUES ('1346', 'SANGALLAYA', '132', '140618', '1');
INSERT INTO `distrito` VALUES ('1347', 'SAN JUAN DE TANTARANCHE', '132', '140619', '1');
INSERT INTO `distrito` VALUES ('1348', 'SAN LORENZO DE QUINTI', '132', '140620', '1');
INSERT INTO `distrito` VALUES ('1349', 'SAN MATEO', '132', '140621', '1');
INSERT INTO `distrito` VALUES ('1350', 'SAN MATEO DE OTAO', '132', '140622', '1');
INSERT INTO `distrito` VALUES ('1351', 'SAN PEDRO DE HUANCAYRE', '132', '140623', '1');
INSERT INTO `distrito` VALUES ('1352', 'SANTA CRUZ DE COCACHACRA', '132', '140624', '1');
INSERT INTO `distrito` VALUES ('1353', 'SANTA EULALIA', '132', '140625', '1');
INSERT INTO `distrito` VALUES ('1354', 'SANTIAGO DE ANCHUCAYA', '132', '140626', '1');
INSERT INTO `distrito` VALUES ('1355', 'SANTIAGO DE TUNA', '132', '140627', '1');
INSERT INTO `distrito` VALUES ('1356', 'SANTO DOMINGO DE LOS OLLEROS', '132', '140628', '1');
INSERT INTO `distrito` VALUES ('1357', 'SURCO', '132', '140629', '1');
INSERT INTO `distrito` VALUES ('1358', 'HUACHUPAMPA', '132', '140630', '1');
INSERT INTO `distrito` VALUES ('1359', 'LARAOS', '132', '140631', '1');
INSERT INTO `distrito` VALUES ('1360', 'SAN JUAN DE IRIS', '132', '140632', '1');
INSERT INTO `distrito` VALUES ('1361', 'YAUYOS', '133', '140701', '1');
INSERT INTO `distrito` VALUES ('1362', 'ALIS', '133', '140702', '1');
INSERT INTO `distrito` VALUES ('1363', 'ALLAUCA', '133', '140703', '1');
INSERT INTO `distrito` VALUES ('1364', 'AYAVIRI', '133', '140704', '1');
INSERT INTO `distrito` VALUES ('1365', 'AZANGARO', '133', '140705', '1');
INSERT INTO `distrito` VALUES ('1366', 'CACRA', '133', '140706', '1');
INSERT INTO `distrito` VALUES ('1367', 'CARANIA', '133', '140707', '1');
INSERT INTO `distrito` VALUES ('1368', 'COCHAS', '133', '140708', '1');
INSERT INTO `distrito` VALUES ('1369', 'COLONIA', '133', '140709', '1');
INSERT INTO `distrito` VALUES ('1370', 'CHOCOS', '133', '140710', '1');
INSERT INTO `distrito` VALUES ('1371', 'HUAMPARA', '133', '140711', '1');
INSERT INTO `distrito` VALUES ('1372', 'HUANCAYA', '133', '140712', '1');
INSERT INTO `distrito` VALUES ('1373', 'HUANGASCAR', '133', '140713', '1');
INSERT INTO `distrito` VALUES ('1374', 'HUANTAN', '133', '140714', '1');
INSERT INTO `distrito` VALUES ('1375', 'HUAÑEC', '133', '140715', '1');
INSERT INTO `distrito` VALUES ('1376', 'LARAOS', '133', '140716', '1');
INSERT INTO `distrito` VALUES ('1377', 'LINCHA', '133', '140717', '1');
INSERT INTO `distrito` VALUES ('1378', 'MIRAFLORES', '133', '140718', '1');
INSERT INTO `distrito` VALUES ('1379', 'OMAS', '133', '140719', '1');
INSERT INTO `distrito` VALUES ('1380', 'QUINCHES', '133', '140720', '1');
INSERT INTO `distrito` VALUES ('1381', 'QUINOCAY', '133', '140721', '1');
INSERT INTO `distrito` VALUES ('1382', 'SAN JOAQUIN', '133', '140722', '1');
INSERT INTO `distrito` VALUES ('1383', 'SAN PEDRO DE PILAS', '133', '140723', '1');
INSERT INTO `distrito` VALUES ('1384', 'TANTA', '133', '140724', '1');
INSERT INTO `distrito` VALUES ('1385', 'TAURIPAMPA', '133', '140725', '1');
INSERT INTO `distrito` VALUES ('1386', 'TUPE', '133', '140726', '1');
INSERT INTO `distrito` VALUES ('1387', 'TOMAS', '133', '140727', '1');
INSERT INTO `distrito` VALUES ('1388', 'VIÑAC', '133', '140728', '1');
INSERT INTO `distrito` VALUES ('1389', 'VITIS', '133', '140729', '1');
INSERT INTO `distrito` VALUES ('1390', 'HONGOS', '133', '140730', '1');
INSERT INTO `distrito` VALUES ('1391', 'MADEAN', '133', '140731', '1');
INSERT INTO `distrito` VALUES ('1392', 'PUTINZA', '133', '140732', '1');
INSERT INTO `distrito` VALUES ('1393', 'CATAHUASI', '133', '140733', '1');
INSERT INTO `distrito` VALUES ('1394', 'HUARAL', '134', '140801', '1');
INSERT INTO `distrito` VALUES ('1395', 'ATAVILLOS ALTO', '134', '140802', '1');
INSERT INTO `distrito` VALUES ('1396', 'ATAVILLOS BAJO', '134', '140803', '1');
INSERT INTO `distrito` VALUES ('1397', 'AUCALLAMA', '134', '140804', '1');
INSERT INTO `distrito` VALUES ('1398', 'CHANCAY', '134', '140805', '1');
INSERT INTO `distrito` VALUES ('1399', 'IHUARI', '134', '140806', '1');
INSERT INTO `distrito` VALUES ('1400', 'LAMPIAN', '134', '140807', '1');
INSERT INTO `distrito` VALUES ('1401', 'PACARAOS', '134', '140808', '1');
INSERT INTO `distrito` VALUES ('1402', 'SAN MIGUEL DE ACOS', '134', '140809', '1');
INSERT INTO `distrito` VALUES ('1403', 'VEINTISIETE DE NOVIEMBRE', '134', '140810', '1');
INSERT INTO `distrito` VALUES ('1404', 'SANTA CRUZ DE ANDAMARCA', '134', '140811', '1');
INSERT INTO `distrito` VALUES ('1405', 'SUMBILCA', '134', '140812', '1');
INSERT INTO `distrito` VALUES ('1406', 'BARRANCA', '135', '140901', '1');
INSERT INTO `distrito` VALUES ('1407', 'PARAMONGA', '135', '140902', '1');
INSERT INTO `distrito` VALUES ('1408', 'PATIVILCA', '135', '140903', '1');
INSERT INTO `distrito` VALUES ('1409', 'SUPE', '135', '140904', '1');
INSERT INTO `distrito` VALUES ('1410', 'SUPE PUERTO', '135', '140905', '1');
INSERT INTO `distrito` VALUES ('1411', 'OYON', '136', '141001', '1');
INSERT INTO `distrito` VALUES ('1412', 'NAVAN', '136', '141002', '1');
INSERT INTO `distrito` VALUES ('1413', 'CAUJUL', '136', '141003', '1');
INSERT INTO `distrito` VALUES ('1414', 'ANDAJES', '136', '141004', '1');
INSERT INTO `distrito` VALUES ('1415', 'PACHANGARA', '136', '141005', '1');
INSERT INTO `distrito` VALUES ('1416', 'COCHAMARCA', '136', '141006', '1');
INSERT INTO `distrito` VALUES ('1417', 'IQUITOS', '137', '150101', '1');
INSERT INTO `distrito` VALUES ('1418', 'ALTO NANAY', '137', '150102', '1');
INSERT INTO `distrito` VALUES ('1419', 'FERNANDO LORES', '137', '150103', '1');
INSERT INTO `distrito` VALUES ('1420', 'LAS AMAZONAS', '137', '150104', '1');
INSERT INTO `distrito` VALUES ('1421', 'MAZAN', '137', '150105', '1');
INSERT INTO `distrito` VALUES ('1422', 'NAPO', '137', '150106', '1');
INSERT INTO `distrito` VALUES ('1423', 'PUTUMAYO', '137', '150107', '1');
INSERT INTO `distrito` VALUES ('1424', 'TORRES CAUSANA', '137', '150108', '1');
INSERT INTO `distrito` VALUES ('1425', 'INDIANA', '137', '150110', '1');
INSERT INTO `distrito` VALUES ('1426', 'PUNCHANA', '137', '150111', '1');
INSERT INTO `distrito` VALUES ('1427', 'BELEN', '137', '150112', '1');
INSERT INTO `distrito` VALUES ('1428', 'SAN JUAN BAUTISTA', '137', '150113', '1');
INSERT INTO `distrito` VALUES ('1429', 'TENIENTE MANUEL CLAVERO', '137', '150114', '1');
INSERT INTO `distrito` VALUES ('1430', 'YURIMAGUAS', '138', '150201', '1');
INSERT INTO `distrito` VALUES ('1431', 'BALSAPUERTO', '138', '150202', '1');
INSERT INTO `distrito` VALUES ('1432', 'JEBEROS', '138', '150205', '1');
INSERT INTO `distrito` VALUES ('1433', 'LAGUNAS', '138', '150206', '1');
INSERT INTO `distrito` VALUES ('1434', 'SANTA CRUZ', '138', '150210', '1');
INSERT INTO `distrito` VALUES ('1435', 'TENIENTE CESAR LOPEZ ROJAS', '138', '150211', '1');
INSERT INTO `distrito` VALUES ('1436', 'NAUTA', '139', '150301', '1');
INSERT INTO `distrito` VALUES ('1437', 'PARINARI', '139', '150302', '1');
INSERT INTO `distrito` VALUES ('1438', 'TIGRE', '139', '150303', '1');
INSERT INTO `distrito` VALUES ('1439', 'URARINAS', '139', '150304', '1');
INSERT INTO `distrito` VALUES ('1440', 'TROMPETEROS', '139', '150305', '1');
INSERT INTO `distrito` VALUES ('1441', 'REQUENA', '140', '150401', '1');
INSERT INTO `distrito` VALUES ('1442', 'ALTO TAPICHE', '140', '150402', '1');
INSERT INTO `distrito` VALUES ('1443', 'CAPELO', '140', '150403', '1');
INSERT INTO `distrito` VALUES ('1444', 'EMILIO SAN MARTIN', '140', '150404', '1');
INSERT INTO `distrito` VALUES ('1445', 'MAQUIA', '140', '150405', '1');
INSERT INTO `distrito` VALUES ('1446', 'PUINAHUA', '140', '150406', '1');
INSERT INTO `distrito` VALUES ('1447', 'SAQUENA', '140', '150407', '1');
INSERT INTO `distrito` VALUES ('1448', 'SOPLIN', '140', '150408', '1');
INSERT INTO `distrito` VALUES ('1449', 'TAPICHE', '140', '150409', '1');
INSERT INTO `distrito` VALUES ('1450', 'JENARO HERRERA', '140', '150410', '1');
INSERT INTO `distrito` VALUES ('1451', 'YAQUERANA', '140', '150411', '1');
INSERT INTO `distrito` VALUES ('1452', 'CONTAMANA', '141', '150501', '1');
INSERT INTO `distrito` VALUES ('1453', 'VARGAS GUERRA', '141', '150502', '1');
INSERT INTO `distrito` VALUES ('1454', 'PADRE MARQUEZ', '141', '150503', '1');
INSERT INTO `distrito` VALUES ('1455', 'PAMPA HERMOSA', '141', '150504', '1');
INSERT INTO `distrito` VALUES ('1456', 'SARAYACU', '141', '150505', '1');
INSERT INTO `distrito` VALUES ('1457', 'INAHUAYA', '141', '150506', '1');
INSERT INTO `distrito` VALUES ('1458', 'RAMON CASTILLA', '142', '150601', '1');
INSERT INTO `distrito` VALUES ('1459', 'PEBAS', '142', '150602', '1');
INSERT INTO `distrito` VALUES ('1460', 'YAVARI', '142', '150603', '1');
INSERT INTO `distrito` VALUES ('1461', 'SAN PABLO', '142', '150604', '1');
INSERT INTO `distrito` VALUES ('1462', 'BARRANCA', '143', '150701', '1');
INSERT INTO `distrito` VALUES ('1463', 'ANDOAS', '143', '150702', '1');
INSERT INTO `distrito` VALUES ('1464', 'CAHUAPANAS', '143', '150703', '1');
INSERT INTO `distrito` VALUES ('1465', 'MANSERICHE', '143', '150704', '1');
INSERT INTO `distrito` VALUES ('1466', 'MORONA', '143', '150705', '1');
INSERT INTO `distrito` VALUES ('1467', 'PASTAZA', '143', '150706', '1');
INSERT INTO `distrito` VALUES ('1468', 'TAMBOPATA', '144', '160101', '1');
INSERT INTO `distrito` VALUES ('1469', 'INAMBARI', '144', '160102', '1');
INSERT INTO `distrito` VALUES ('1470', 'LAS PIEDRAS', '144', '160103', '1');
INSERT INTO `distrito` VALUES ('1471', 'LABERINTO', '144', '160104', '1');
INSERT INTO `distrito` VALUES ('1472', 'MANU', '145', '160201', '1');
INSERT INTO `distrito` VALUES ('1473', 'FITZCARRALD', '145', '160202', '1');
INSERT INTO `distrito` VALUES ('1474', 'MADRE DE DIOS', '145', '160203', '1');
INSERT INTO `distrito` VALUES ('1475', 'HUEPETUHE', '145', '160204', '1');
INSERT INTO `distrito` VALUES ('1476', 'IÑAPARI', '146', '160301', '1');
INSERT INTO `distrito` VALUES ('1477', 'IBERIA', '146', '160302', '1');
INSERT INTO `distrito` VALUES ('1478', 'TAHUAMANU', '146', '160303', '1');
INSERT INTO `distrito` VALUES ('1479', 'MOQUEGUA', '147', '170101', '1');
INSERT INTO `distrito` VALUES ('1480', 'CARUMAS', '147', '170102', '1');
INSERT INTO `distrito` VALUES ('1481', 'CUCHUMBAYA', '147', '170103', '1');
INSERT INTO `distrito` VALUES ('1482', 'SAN CRISTOBAL', '147', '170104', '1');
INSERT INTO `distrito` VALUES ('1483', 'TORATA', '147', '170105', '1');
INSERT INTO `distrito` VALUES ('1484', 'SAMEGUA', '147', '170106', '1');
INSERT INTO `distrito` VALUES ('1485', 'OMATE', '148', '170201', '1');
INSERT INTO `distrito` VALUES ('1486', 'COALAQUE', '148', '170202', '1');
INSERT INTO `distrito` VALUES ('1487', 'CHOJATA', '148', '170203', '1');
INSERT INTO `distrito` VALUES ('1488', 'ICHUÑA', '148', '170204', '1');
INSERT INTO `distrito` VALUES ('1489', 'LA CAPILLA', '148', '170205', '1');
INSERT INTO `distrito` VALUES ('1490', 'LLOQUE', '148', '170206', '1');
INSERT INTO `distrito` VALUES ('1491', 'MATALAQUE', '148', '170207', '1');
INSERT INTO `distrito` VALUES ('1492', 'PUQUINA', '148', '170208', '1');
INSERT INTO `distrito` VALUES ('1493', 'QUINISTAQUILLAS', '148', '170209', '1');
INSERT INTO `distrito` VALUES ('1494', 'UBINAS', '148', '170210', '1');
INSERT INTO `distrito` VALUES ('1495', 'YUNGA', '148', '170211', '1');
INSERT INTO `distrito` VALUES ('1496', 'ILO', '149', '170301', '1');
INSERT INTO `distrito` VALUES ('1497', 'EL ALGARROBAL', '149', '170302', '1');
INSERT INTO `distrito` VALUES ('1498', 'PACOCHA', '149', '170303', '1');
INSERT INTO `distrito` VALUES ('1499', 'CHAUPIMARCA', '150', '180101', '1');
INSERT INTO `distrito` VALUES ('1500', 'HUACHON', '150', '180103', '1');
INSERT INTO `distrito` VALUES ('1501', 'HUARIACA', '150', '180104', '1');
INSERT INTO `distrito` VALUES ('1502', 'HUAYLLAY', '150', '180105', '1');
INSERT INTO `distrito` VALUES ('1503', 'NINACACA', '150', '180106', '1');
INSERT INTO `distrito` VALUES ('1504', 'PALLANCHACRA', '150', '180107', '1');
INSERT INTO `distrito` VALUES ('1505', 'PAUCARTAMBO', '150', '180108', '1');
INSERT INTO `distrito` VALUES ('1506', 'SAN FCO DE ASIS DE YARUSYACAN', '150', '180109', '1');
INSERT INTO `distrito` VALUES ('1507', 'SIMON BOLIVAR', '150', '180110', '1');
INSERT INTO `distrito` VALUES ('1508', 'TICLACAYAN', '150', '180111', '1');
INSERT INTO `distrito` VALUES ('1509', 'TINYAHUARCO', '150', '180112', '1');
INSERT INTO `distrito` VALUES ('1510', 'VICCO', '150', '180113', '1');
INSERT INTO `distrito` VALUES ('1511', 'YANACANCHA', '150', '180114', '1');
INSERT INTO `distrito` VALUES ('1512', 'YANAHUANCA', '151', '180201', '1');
INSERT INTO `distrito` VALUES ('1513', 'CHACAYAN', '151', '180202', '1');
INSERT INTO `distrito` VALUES ('1514', 'GOYLLARISQUIZGA', '151', '180203', '1');
INSERT INTO `distrito` VALUES ('1515', 'PAUCAR', '151', '180204', '1');
INSERT INTO `distrito` VALUES ('1516', 'SAN PEDRO DE PILLAO', '151', '180205', '1');
INSERT INTO `distrito` VALUES ('1517', 'SANTA ANA DE TUSI', '151', '180206', '1');
INSERT INTO `distrito` VALUES ('1518', 'TAPUC', '151', '180207', '1');
INSERT INTO `distrito` VALUES ('1519', 'VILCABAMBA', '151', '180208', '1');
INSERT INTO `distrito` VALUES ('1520', 'OXAPAMPA', '152', '180301', '1');
INSERT INTO `distrito` VALUES ('1521', 'CHONTABAMBA', '152', '180302', '1');
INSERT INTO `distrito` VALUES ('1522', 'HUANCABAMBA', '152', '180303', '1');
INSERT INTO `distrito` VALUES ('1523', 'PUERTO BERMUDEZ', '152', '180304', '1');
INSERT INTO `distrito` VALUES ('1524', 'VILLA RICA', '152', '180305', '1');
INSERT INTO `distrito` VALUES ('1525', 'POZUZO', '152', '180306', '1');
INSERT INTO `distrito` VALUES ('1526', 'PALCAZU', '152', '180307', '1');
INSERT INTO `distrito` VALUES ('1527', 'CONSTITUCION', '152', '180308', '1');
INSERT INTO `distrito` VALUES ('1528', 'PIURA', '153', '190101', '1');
INSERT INTO `distrito` VALUES ('1529', 'CASTILLA', '153', '190103', '1');
INSERT INTO `distrito` VALUES ('1530', 'CATACAOS', '153', '190104', '1');
INSERT INTO `distrito` VALUES ('1531', 'LA ARENA', '153', '190105', '1');
INSERT INTO `distrito` VALUES ('1532', 'LA UNION', '153', '190106', '1');
INSERT INTO `distrito` VALUES ('1533', 'LAS LOMAS', '153', '190107', '1');
INSERT INTO `distrito` VALUES ('1534', 'TAMBO GRANDE', '153', '190109', '1');
INSERT INTO `distrito` VALUES ('1535', 'CURA MORI', '153', '190113', '1');
INSERT INTO `distrito` VALUES ('1536', 'EL TALLAN', '153', '190114', '1');
INSERT INTO `distrito` VALUES ('1537', 'VEINTISEIS DE OCTUBRE', '153', '190115', '1');
INSERT INTO `distrito` VALUES ('1538', 'AYABACA', '154', '190201', '1');
INSERT INTO `distrito` VALUES ('1539', 'FRIAS', '154', '190202', '1');
INSERT INTO `distrito` VALUES ('1540', 'LAGUNAS', '154', '190203', '1');
INSERT INTO `distrito` VALUES ('1541', 'MONTERO', '154', '190204', '1');
INSERT INTO `distrito` VALUES ('1542', 'PACAIPAMPA', '154', '190205', '1');
INSERT INTO `distrito` VALUES ('1543', 'SAPILLICA', '154', '190206', '1');
INSERT INTO `distrito` VALUES ('1544', 'SICCHEZ', '154', '190207', '1');
INSERT INTO `distrito` VALUES ('1545', 'SUYO', '154', '190208', '1');
INSERT INTO `distrito` VALUES ('1546', 'JILILI', '154', '190209', '1');
INSERT INTO `distrito` VALUES ('1547', 'PAIMAS', '154', '190210', '1');
INSERT INTO `distrito` VALUES ('1548', 'HUANCABAMBA', '155', '190301', '1');
INSERT INTO `distrito` VALUES ('1549', 'CANCHAQUE', '155', '190302', '1');
INSERT INTO `distrito` VALUES ('1550', 'HUARMACA', '155', '190303', '1');
INSERT INTO `distrito` VALUES ('1551', 'SONDOR', '155', '190304', '1');
INSERT INTO `distrito` VALUES ('1552', 'SONDORILLO', '155', '190305', '1');
INSERT INTO `distrito` VALUES ('1553', 'EL CARMEN DE LA FRONTERA', '155', '190306', '1');
INSERT INTO `distrito` VALUES ('1554', 'SAN MIGUEL DE EL FAIQUE', '155', '190307', '1');
INSERT INTO `distrito` VALUES ('1555', 'LALAQUIZ', '155', '190308', '1');
INSERT INTO `distrito` VALUES ('1556', 'CHULUCANAS', '156', '190401', '1');
INSERT INTO `distrito` VALUES ('1557', 'BUENOS AIRES', '156', '190402', '1');
INSERT INTO `distrito` VALUES ('1558', 'CHALACO', '156', '190403', '1');
INSERT INTO `distrito` VALUES ('1559', 'MORROPON', '156', '190404', '1');
INSERT INTO `distrito` VALUES ('1560', 'SALITRAL', '156', '190405', '1');
INSERT INTO `distrito` VALUES ('1561', 'SANTA CATALINA DE MOSSA', '156', '190406', '1');
INSERT INTO `distrito` VALUES ('1562', 'SANTO DOMINGO', '156', '190407', '1');
INSERT INTO `distrito` VALUES ('1563', 'LA MATANZA', '156', '190408', '1');
INSERT INTO `distrito` VALUES ('1564', 'YAMANGO', '156', '190409', '1');
INSERT INTO `distrito` VALUES ('1565', 'SAN JUAN DE BIGOTE', '156', '190410', '1');
INSERT INTO `distrito` VALUES ('1566', 'PAITA', '157', '190501', '1');
INSERT INTO `distrito` VALUES ('1567', 'AMOTAPE', '157', '190502', '1');
INSERT INTO `distrito` VALUES ('1568', 'ARENAL', '157', '190503', '1');
INSERT INTO `distrito` VALUES ('1569', 'LA HUACA', '157', '190504', '1');
INSERT INTO `distrito` VALUES ('1570', 'COLAN', '157', '190505', '1');
INSERT INTO `distrito` VALUES ('1571', 'TAMARINDO', '157', '190506', '1');
INSERT INTO `distrito` VALUES ('1572', 'VICHAYAL', '157', '190507', '1');
INSERT INTO `distrito` VALUES ('1573', 'SULLANA', '158', '190601', '1');
INSERT INTO `distrito` VALUES ('1574', 'BELLAVISTA', '158', '190602', '1');
INSERT INTO `distrito` VALUES ('1575', 'LANCONES', '158', '190603', '1');
INSERT INTO `distrito` VALUES ('1576', 'MARCAVELICA', '158', '190604', '1');
INSERT INTO `distrito` VALUES ('1577', 'MIGUEL CHECA', '158', '190605', '1');
INSERT INTO `distrito` VALUES ('1578', 'QUERECOTILLO', '158', '190606', '1');
INSERT INTO `distrito` VALUES ('1579', 'SALITRAL', '158', '190607', '1');
INSERT INTO `distrito` VALUES ('1580', 'IGNACIO ESCUDERO', '158', '190608', '1');
INSERT INTO `distrito` VALUES ('1581', 'PARIÑAS', '159', '190701', '1');
INSERT INTO `distrito` VALUES ('1582', 'EL ALTO', '159', '190702', '1');
INSERT INTO `distrito` VALUES ('1583', 'LA BREA', '159', '190703', '1');
INSERT INTO `distrito` VALUES ('1584', 'LOBITOS', '159', '190704', '1');
INSERT INTO `distrito` VALUES ('1585', 'MANCORA', '159', '190705', '1');
INSERT INTO `distrito` VALUES ('1586', 'LOS ORGANOS', '159', '190706', '1');
INSERT INTO `distrito` VALUES ('1587', 'SECHURA', '160', '190801', '1');
INSERT INTO `distrito` VALUES ('1588', 'VICE', '160', '190802', '1');
INSERT INTO `distrito` VALUES ('1589', 'BERNAL', '160', '190803', '1');
INSERT INTO `distrito` VALUES ('1590', 'BELLAVISTA DE LA UNION', '160', '190804', '1');
INSERT INTO `distrito` VALUES ('1591', 'CRISTO NOS VALGA', '160', '190805', '1');
INSERT INTO `distrito` VALUES ('1592', 'RINCONADA-LLICUAR', '160', '190806', '1');
INSERT INTO `distrito` VALUES ('1593', 'PUNO', '161', '200101', '1');
INSERT INTO `distrito` VALUES ('1594', 'ACORA', '161', '200102', '1');
INSERT INTO `distrito` VALUES ('1595', 'ATUNCOLLA', '161', '200103', '1');
INSERT INTO `distrito` VALUES ('1596', 'CAPACHICA', '161', '200104', '1');
INSERT INTO `distrito` VALUES ('1597', 'COATA', '161', '200105', '1');
INSERT INTO `distrito` VALUES ('1598', 'CHUCUITO', '161', '200106', '1');
INSERT INTO `distrito` VALUES ('1599', 'HUATA', '161', '200107', '1');
INSERT INTO `distrito` VALUES ('1600', 'MAÑAZO', '161', '200108', '1');
INSERT INTO `distrito` VALUES ('1601', 'PAUCARCOLLA', '161', '200109', '1');
INSERT INTO `distrito` VALUES ('1602', 'PICHACANI', '161', '200110', '1');
INSERT INTO `distrito` VALUES ('1603', 'SAN ANTONIO', '161', '200111', '1');
INSERT INTO `distrito` VALUES ('1604', 'TIQUILLACA', '161', '200112', '1');
INSERT INTO `distrito` VALUES ('1605', 'VILQUE', '161', '200113', '1');
INSERT INTO `distrito` VALUES ('1606', 'PLATERIA', '161', '200114', '1');
INSERT INTO `distrito` VALUES ('1607', 'AMANTANI', '161', '200115', '1');
INSERT INTO `distrito` VALUES ('1608', 'AZANGARO', '162', '200201', '1');
INSERT INTO `distrito` VALUES ('1609', 'ACHAYA', '162', '200202', '1');
INSERT INTO `distrito` VALUES ('1610', 'ARAPA', '162', '200203', '1');
INSERT INTO `distrito` VALUES ('1611', 'ASILLO', '162', '200204', '1');
INSERT INTO `distrito` VALUES ('1612', 'CAMINACA', '162', '200205', '1');
INSERT INTO `distrito` VALUES ('1613', 'CHUPA', '162', '200206', '1');
INSERT INTO `distrito` VALUES ('1614', 'JOSE DOMINGO CHOQUEHUANCA', '162', '200207', '1');
INSERT INTO `distrito` VALUES ('1615', 'MUÑANI', '162', '200208', '1');
INSERT INTO `distrito` VALUES ('1616', 'POTONI', '162', '200210', '1');
INSERT INTO `distrito` VALUES ('1617', 'SAMAN', '162', '200212', '1');
INSERT INTO `distrito` VALUES ('1618', 'SAN ANTON', '162', '200213', '1');
INSERT INTO `distrito` VALUES ('1619', 'SAN JOSE', '162', '200214', '1');
INSERT INTO `distrito` VALUES ('1620', 'SAN JUAN DE SALINAS', '162', '200215', '1');
INSERT INTO `distrito` VALUES ('1621', 'SANTIAGO DE PUPUJA', '162', '200216', '1');
INSERT INTO `distrito` VALUES ('1622', 'TIRAPATA', '162', '200217', '1');
INSERT INTO `distrito` VALUES ('1623', 'MACUSANI', '163', '200301', '1');
INSERT INTO `distrito` VALUES ('1624', 'AJOYANI', '163', '200302', '1');
INSERT INTO `distrito` VALUES ('1625', 'AYAPATA', '163', '200303', '1');
INSERT INTO `distrito` VALUES ('1626', 'COASA', '163', '200304', '1');
INSERT INTO `distrito` VALUES ('1627', 'CORANI', '163', '200305', '1');
INSERT INTO `distrito` VALUES ('1628', 'CRUCERO', '163', '200306', '1');
INSERT INTO `distrito` VALUES ('1629', 'ITUATA', '163', '200307', '1');
INSERT INTO `distrito` VALUES ('1630', 'OLLACHEA', '163', '200308', '1');
INSERT INTO `distrito` VALUES ('1631', 'SAN GABAN', '163', '200309', '1');
INSERT INTO `distrito` VALUES ('1632', 'USICAYOS', '163', '200310', '1');
INSERT INTO `distrito` VALUES ('1633', 'JULI', '164', '200401', '1');
INSERT INTO `distrito` VALUES ('1634', 'DESAGUADERO', '164', '200402', '1');
INSERT INTO `distrito` VALUES ('1635', 'HUACULLANI', '164', '200403', '1');
INSERT INTO `distrito` VALUES ('1636', 'PISACOMA', '164', '200406', '1');
INSERT INTO `distrito` VALUES ('1637', 'POMATA', '164', '200407', '1');
INSERT INTO `distrito` VALUES ('1638', 'ZEPITA', '164', '200410', '1');
INSERT INTO `distrito` VALUES ('1639', 'KELLUYO', '164', '200412', '1');
INSERT INTO `distrito` VALUES ('1640', 'HUANCANE', '165', '200501', '1');
INSERT INTO `distrito` VALUES ('1641', 'COJATA', '165', '200502', '1');
INSERT INTO `distrito` VALUES ('1642', 'INCHUPALLA', '165', '200504', '1');
INSERT INTO `distrito` VALUES ('1643', 'PUSI', '165', '200506', '1');
INSERT INTO `distrito` VALUES ('1644', 'ROSASPATA', '165', '200507', '1');
INSERT INTO `distrito` VALUES ('1645', 'TARACO', '165', '200508', '1');
INSERT INTO `distrito` VALUES ('1646', 'VILQUE CHICO', '165', '200509', '1');
INSERT INTO `distrito` VALUES ('1647', 'HUATASANI', '165', '200511', '1');
INSERT INTO `distrito` VALUES ('1648', 'LAMPA', '166', '200601', '1');
INSERT INTO `distrito` VALUES ('1649', 'CABANILLA', '166', '200602', '1');
INSERT INTO `distrito` VALUES ('1650', 'CALAPUJA', '166', '200603', '1');
INSERT INTO `distrito` VALUES ('1651', 'NICASIO', '166', '200604', '1');
INSERT INTO `distrito` VALUES ('1652', 'OCUVIRI', '166', '200605', '1');
INSERT INTO `distrito` VALUES ('1653', 'PALCA', '166', '200606', '1');
INSERT INTO `distrito` VALUES ('1654', 'PARATIA', '166', '200607', '1');
INSERT INTO `distrito` VALUES ('1655', 'PUCARA', '166', '200608', '1');
INSERT INTO `distrito` VALUES ('1656', 'SANTA LUCIA', '166', '200609', '1');
INSERT INTO `distrito` VALUES ('1657', 'VILAVILA', '166', '200610', '1');
INSERT INTO `distrito` VALUES ('1658', 'AYAVIRI', '167', '200701', '1');
INSERT INTO `distrito` VALUES ('1659', 'ANTAUTA', '167', '200702', '1');
INSERT INTO `distrito` VALUES ('1660', 'CUPI', '167', '200703', '1');
INSERT INTO `distrito` VALUES ('1661', 'LLALLI', '167', '200704', '1');
INSERT INTO `distrito` VALUES ('1662', 'MACARI', '167', '200705', '1');
INSERT INTO `distrito` VALUES ('1663', 'NUÑOA', '167', '200706', '1');
INSERT INTO `distrito` VALUES ('1664', 'ORURILLO', '167', '200707', '1');
INSERT INTO `distrito` VALUES ('1665', 'SANTA ROSA', '167', '200708', '1');
INSERT INTO `distrito` VALUES ('1666', 'UMACHIRI', '167', '200709', '1');
INSERT INTO `distrito` VALUES ('1667', 'SANDIA', '168', '200801', '1');
INSERT INTO `distrito` VALUES ('1668', 'CUYOCUYO', '168', '200803', '1');
INSERT INTO `distrito` VALUES ('1669', 'LIMBANI', '168', '200804', '1');
INSERT INTO `distrito` VALUES ('1670', 'PHARA', '168', '200805', '1');
INSERT INTO `distrito` VALUES ('1671', 'PATAMBUCO', '168', '200806', '1');
INSERT INTO `distrito` VALUES ('1672', 'QUIACA', '168', '200807', '1');
INSERT INTO `distrito` VALUES ('1673', 'SAN JUAN DEL ORO', '168', '200808', '1');
INSERT INTO `distrito` VALUES ('1674', 'YANAHUAYA', '168', '200810', '1');
INSERT INTO `distrito` VALUES ('1675', 'ALTO INAMBARI', '168', '200811', '1');
INSERT INTO `distrito` VALUES ('1676', 'SAN PEDRO DE PUTINA PUNCO', '168', '200812', '1');
INSERT INTO `distrito` VALUES ('1677', 'JULIACA', '169', '200901', '1');
INSERT INTO `distrito` VALUES ('1678', 'CABANA', '169', '200902', '1');
INSERT INTO `distrito` VALUES ('1679', 'CABANILLAS', '169', '200903', '1');
INSERT INTO `distrito` VALUES ('1680', 'CARACOTO', '169', '200904', '1');
INSERT INTO `distrito` VALUES ('1681', 'YUNGUYO', '170', '201001', '1');
INSERT INTO `distrito` VALUES ('1682', 'UNICACHI', '170', '201002', '1');
INSERT INTO `distrito` VALUES ('1683', 'ANAPIA', '170', '201003', '1');
INSERT INTO `distrito` VALUES ('1684', 'COPANI', '170', '201004', '1');
INSERT INTO `distrito` VALUES ('1685', 'CUTURAPI', '170', '201005', '1');
INSERT INTO `distrito` VALUES ('1686', 'OLLARAYA', '170', '201006', '1');
INSERT INTO `distrito` VALUES ('1687', 'TINICACHI', '170', '201007', '1');
INSERT INTO `distrito` VALUES ('1688', 'PUTINA', '171', '201101', '1');
INSERT INTO `distrito` VALUES ('1689', 'PEDRO VILCA APAZA', '171', '201102', '1');
INSERT INTO `distrito` VALUES ('1690', 'QUILCAPUNCU', '171', '201103', '1');
INSERT INTO `distrito` VALUES ('1691', 'ANANEA', '171', '201104', '1');
INSERT INTO `distrito` VALUES ('1692', 'SINA', '171', '201105', '1');
INSERT INTO `distrito` VALUES ('1693', 'ILAVE', '172', '201201', '1');
INSERT INTO `distrito` VALUES ('1694', 'PILCUYO', '172', '201202', '1');
INSERT INTO `distrito` VALUES ('1695', 'SANTA ROSA', '172', '201203', '1');
INSERT INTO `distrito` VALUES ('1696', 'CAPASO', '172', '201204', '1');
INSERT INTO `distrito` VALUES ('1697', 'CONDURIRI', '172', '201205', '1');
INSERT INTO `distrito` VALUES ('1698', 'MOHO', '173', '201301', '1');
INSERT INTO `distrito` VALUES ('1699', 'CONIMA', '173', '201302', '1');
INSERT INTO `distrito` VALUES ('1700', 'TILALI', '173', '201303', '1');
INSERT INTO `distrito` VALUES ('1701', 'HUAYRAPATA', '173', '201304', '1');
INSERT INTO `distrito` VALUES ('1702', 'MOYOBAMBA', '174', '210101', '1');
INSERT INTO `distrito` VALUES ('1703', 'CALZADA', '174', '210102', '1');
INSERT INTO `distrito` VALUES ('1704', 'HABANA', '174', '210103', '1');
INSERT INTO `distrito` VALUES ('1705', 'JEPELACIO', '174', '210104', '1');
INSERT INTO `distrito` VALUES ('1706', 'SORITOR', '174', '210105', '1');
INSERT INTO `distrito` VALUES ('1707', 'YANTALO', '174', '210106', '1');
INSERT INTO `distrito` VALUES ('1708', 'SAPOSOA', '175', '210201', '1');
INSERT INTO `distrito` VALUES ('1709', 'PISCOYACU', '175', '210202', '1');
INSERT INTO `distrito` VALUES ('1710', 'SACANCHE', '175', '210203', '1');
INSERT INTO `distrito` VALUES ('1711', 'TINGO DE SAPOSOA', '175', '210204', '1');
INSERT INTO `distrito` VALUES ('1712', 'ALTO SAPOSOA', '175', '210205', '1');
INSERT INTO `distrito` VALUES ('1713', 'EL ESLABON', '175', '210206', '1');
INSERT INTO `distrito` VALUES ('1714', 'LAMAS', '176', '210301', '1');
INSERT INTO `distrito` VALUES ('1715', 'BARRANQUITA', '176', '210303', '1');
INSERT INTO `distrito` VALUES ('1716', 'CAYNARACHI', '176', '210304', '1');
INSERT INTO `distrito` VALUES ('1717', 'CUÑUMBUQUI', '176', '210305', '1');
INSERT INTO `distrito` VALUES ('1718', 'PINTO RECODO', '176', '210306', '1');
INSERT INTO `distrito` VALUES ('1719', 'RUMISAPA', '176', '210307', '1');
INSERT INTO `distrito` VALUES ('1720', 'SHANAO', '176', '210311', '1');
INSERT INTO `distrito` VALUES ('1721', 'TABALOSOS', '176', '210313', '1');
INSERT INTO `distrito` VALUES ('1722', 'ZAPATERO', '176', '210314', '1');
INSERT INTO `distrito` VALUES ('1723', 'ALONSO DE ALVARADO', '176', '210315', '1');
INSERT INTO `distrito` VALUES ('1724', 'SAN ROQUE DE CUMBAZA', '176', '210316', '1');
INSERT INTO `distrito` VALUES ('1725', 'JUANJUI', '177', '210401', '1');
INSERT INTO `distrito` VALUES ('1726', 'CAMPANILLA', '177', '210402', '1');
INSERT INTO `distrito` VALUES ('1727', 'HUICUNGO', '177', '210403', '1');
INSERT INTO `distrito` VALUES ('1728', 'PACHIZA', '177', '210404', '1');
INSERT INTO `distrito` VALUES ('1729', 'PAJARILLO', '177', '210405', '1');
INSERT INTO `distrito` VALUES ('1730', 'RIOJA', '178', '210501', '1');
INSERT INTO `distrito` VALUES ('1731', 'POSIC', '178', '210502', '1');
INSERT INTO `distrito` VALUES ('1732', 'YORONGOS', '178', '210503', '1');
INSERT INTO `distrito` VALUES ('1733', 'YURACYACU', '178', '210504', '1');
INSERT INTO `distrito` VALUES ('1734', 'NUEVA CAJAMARCA', '178', '210505', '1');
INSERT INTO `distrito` VALUES ('1735', 'ELIAS SOPLIN VARGAS', '178', '210506', '1');
INSERT INTO `distrito` VALUES ('1736', 'SAN FERNANDO', '178', '210507', '1');
INSERT INTO `distrito` VALUES ('1737', 'PARDO MIGUEL', '178', '210508', '1');
INSERT INTO `distrito` VALUES ('1738', 'AWAJUN', '178', '210509', '1');
INSERT INTO `distrito` VALUES ('1739', 'TARAPOTO', '179', '210601', '1');
INSERT INTO `distrito` VALUES ('1740', 'ALBERTO LEVEAU', '179', '210602', '1');
INSERT INTO `distrito` VALUES ('1741', 'CACATACHI', '179', '210604', '1');
INSERT INTO `distrito` VALUES ('1742', 'CHAZUTA', '179', '210606', '1');
INSERT INTO `distrito` VALUES ('1743', 'CHIPURANA', '179', '210607', '1');
INSERT INTO `distrito` VALUES ('1744', 'EL PORVENIR', '179', '210608', '1');
INSERT INTO `distrito` VALUES ('1745', 'HUIMBAYOC', '179', '210609', '1');
INSERT INTO `distrito` VALUES ('1746', 'JUAN GUERRA', '179', '210610', '1');
INSERT INTO `distrito` VALUES ('1747', 'MORALES', '179', '210611', '1');
INSERT INTO `distrito` VALUES ('1748', 'PAPAPLAYA', '179', '210612', '1');
INSERT INTO `distrito` VALUES ('1749', 'SAN ANTONIO', '179', '210616', '1');
INSERT INTO `distrito` VALUES ('1750', 'SAUCE', '179', '210619', '1');
INSERT INTO `distrito` VALUES ('1751', 'SHAPAJA', '179', '210620', '1');
INSERT INTO `distrito` VALUES ('1752', 'LA BANDA DE SHILCAYO', '179', '210621', '1');
INSERT INTO `distrito` VALUES ('1753', 'BELLAVISTA', '180', '210701', '1');
INSERT INTO `distrito` VALUES ('1754', 'SAN RAFAEL', '180', '210702', '1');
INSERT INTO `distrito` VALUES ('1755', 'SAN PABLO', '180', '210703', '1');
INSERT INTO `distrito` VALUES ('1756', 'ALTO BIAVO', '180', '210704', '1');
INSERT INTO `distrito` VALUES ('1757', 'HUALLAGA', '180', '210705', '1');
INSERT INTO `distrito` VALUES ('1758', 'BAJO BIAVO', '180', '210706', '1');
INSERT INTO `distrito` VALUES ('1759', 'TOCACHE', '181', '210801', '1');
INSERT INTO `distrito` VALUES ('1760', 'NUEVO PROGRESO', '181', '210802', '1');
INSERT INTO `distrito` VALUES ('1761', 'POLVORA', '181', '210803', '1');
INSERT INTO `distrito` VALUES ('1762', 'SHUNTE', '181', '210804', '1');
INSERT INTO `distrito` VALUES ('1763', 'UCHIZA', '181', '210805', '1');
INSERT INTO `distrito` VALUES ('1764', 'PICOTA', '182', '210901', '1');
INSERT INTO `distrito` VALUES ('1765', 'BUENOS AIRES', '182', '210902', '1');
INSERT INTO `distrito` VALUES ('1766', 'CASPIZAPA', '182', '210903', '1');
INSERT INTO `distrito` VALUES ('1767', 'PILLUANA', '182', '210904', '1');
INSERT INTO `distrito` VALUES ('1768', 'PUCACACA', '182', '210905', '1');
INSERT INTO `distrito` VALUES ('1769', 'SAN CRISTOBAL', '182', '210906', '1');
INSERT INTO `distrito` VALUES ('1770', 'SAN HILARION', '182', '210907', '1');
INSERT INTO `distrito` VALUES ('1771', 'TINGO DE PONASA', '182', '210908', '1');
INSERT INTO `distrito` VALUES ('1772', 'TRES UNIDOS', '182', '210909', '1');
INSERT INTO `distrito` VALUES ('1773', 'SHAMBOYACU', '182', '210910', '1');
INSERT INTO `distrito` VALUES ('1774', 'SAN JOSE DE SISA', '183', '211001', '1');
INSERT INTO `distrito` VALUES ('1775', 'AGUA BLANCA', '183', '211002', '1');
INSERT INTO `distrito` VALUES ('1776', 'SHATOJA', '183', '211003', '1');
INSERT INTO `distrito` VALUES ('1777', 'SAN MARTIN', '183', '211004', '1');
INSERT INTO `distrito` VALUES ('1778', 'SANTA ROSA', '183', '211005', '1');
INSERT INTO `distrito` VALUES ('1779', 'TACNA', '184', '220101', '1');
INSERT INTO `distrito` VALUES ('1780', 'CALANA', '184', '220102', '1');
INSERT INTO `distrito` VALUES ('1781', 'INCLAN', '184', '220104', '1');
INSERT INTO `distrito` VALUES ('1782', 'PACHIA', '184', '220107', '1');
INSERT INTO `distrito` VALUES ('1783', 'PALCA', '184', '220108', '1');
INSERT INTO `distrito` VALUES ('1784', 'POCOLLAY', '184', '220109', '1');
INSERT INTO `distrito` VALUES ('1785', 'SAMA', '184', '220110', '1');
INSERT INTO `distrito` VALUES ('1786', 'ALTO DE LA ALIANZA', '184', '220111', '1');
INSERT INTO `distrito` VALUES ('1787', 'CIUDAD NUEVA', '184', '220112', '1');
INSERT INTO `distrito` VALUES ('1788', 'CORONEL GREGORIO ALBARRACIN L.', '184', '220113', '1');
INSERT INTO `distrito` VALUES ('1789', 'TARATA', '185', '220201', '1');
INSERT INTO `distrito` VALUES ('1790', 'HEROES ALBARRACIN', '185', '220205', '1');
INSERT INTO `distrito` VALUES ('1791', 'ESTIQUE', '185', '220206', '1');
INSERT INTO `distrito` VALUES ('1792', 'ESTIQUE PAMPA', '185', '220207', '1');
INSERT INTO `distrito` VALUES ('1793', 'SITAJARA', '185', '220210', '1');
INSERT INTO `distrito` VALUES ('1794', 'SUSAPAYA', '185', '220211', '1');
INSERT INTO `distrito` VALUES ('1795', 'TARUCACHI', '185', '220212', '1');
INSERT INTO `distrito` VALUES ('1796', 'TICACO', '185', '220213', '1');
INSERT INTO `distrito` VALUES ('1797', 'LOCUMBA', '186', '220301', '1');
INSERT INTO `distrito` VALUES ('1798', 'ITE', '186', '220302', '1');
INSERT INTO `distrito` VALUES ('1799', 'ILABAYA', '186', '220303', '1');
INSERT INTO `distrito` VALUES ('1800', 'CANDARAVE', '187', '220401', '1');
INSERT INTO `distrito` VALUES ('1801', 'CAIRANI', '187', '220402', '1');
INSERT INTO `distrito` VALUES ('1802', 'CURIBAYA', '187', '220403', '1');
INSERT INTO `distrito` VALUES ('1803', 'HUANUARA', '187', '220404', '1');
INSERT INTO `distrito` VALUES ('1804', 'QUILAHUANI', '187', '220405', '1');
INSERT INTO `distrito` VALUES ('1805', 'CAMILACA', '187', '220406', '1');
INSERT INTO `distrito` VALUES ('1806', 'TUMBES', '188', '230101', '1');
INSERT INTO `distrito` VALUES ('1807', 'CORRALES', '188', '230102', '1');
INSERT INTO `distrito` VALUES ('1808', 'LA CRUZ', '188', '230103', '1');
INSERT INTO `distrito` VALUES ('1809', 'PAMPAS DE HOSPITAL', '188', '230104', '1');
INSERT INTO `distrito` VALUES ('1810', 'SAN JACINTO', '188', '230105', '1');
INSERT INTO `distrito` VALUES ('1811', 'SAN JUAN DE LA VIRGEN', '188', '230106', '1');
INSERT INTO `distrito` VALUES ('1812', 'ZORRITOS', '189', '230201', '1');
INSERT INTO `distrito` VALUES ('1813', 'CASITAS', '189', '230202', '1');
INSERT INTO `distrito` VALUES ('1814', 'CANOAS DE PUNTA SAL', '189', '230203', '1');
INSERT INTO `distrito` VALUES ('1815', 'ZARUMILLA', '190', '230301', '1');
INSERT INTO `distrito` VALUES ('1816', 'MATAPALO', '190', '230302', '1');
INSERT INTO `distrito` VALUES ('1817', 'PAPAYAL', '190', '230303', '1');
INSERT INTO `distrito` VALUES ('1818', 'AGUAS VERDES', '190', '230304', '1');
INSERT INTO `distrito` VALUES ('1819', 'CALLAO', '191', '240101', '1');
INSERT INTO `distrito` VALUES ('1820', 'BELLAVISTA', '191', '240102', '1');
INSERT INTO `distrito` VALUES ('1821', 'LA PUNTA', '191', '240103', '1');
INSERT INTO `distrito` VALUES ('1822', 'CARMEN DE LA LEGUA-REYNOSO', '191', '240104', '1');
INSERT INTO `distrito` VALUES ('1823', 'LA PERLA', '191', '240105', '1');
INSERT INTO `distrito` VALUES ('1824', 'VENTANILLA', '191', '240106', '1');
INSERT INTO `distrito` VALUES ('1825', 'CALLERIA', '192', '250101', '1');
INSERT INTO `distrito` VALUES ('1826', 'YARINACOCHA', '192', '250102', '1');
INSERT INTO `distrito` VALUES ('1827', 'MASISEA', '192', '250103', '1');
INSERT INTO `distrito` VALUES ('1828', 'CAMPOVERDE', '192', '250104', '1');
INSERT INTO `distrito` VALUES ('1829', 'IPARIA', '192', '250105', '1');
INSERT INTO `distrito` VALUES ('1830', 'NUEVA REQUENA', '192', '250106', '1');
INSERT INTO `distrito` VALUES ('1831', 'MANANTAY', '192', '250107', '1');
INSERT INTO `distrito` VALUES ('1832', 'PADRE ABAD', '193', '250201', '1');
INSERT INTO `distrito` VALUES ('1833', 'IRAZOLA', '193', '250202', '1');
INSERT INTO `distrito` VALUES ('1834', 'CURIMANA', '193', '250203', '1');
INSERT INTO `distrito` VALUES ('1835', 'RAIMONDI', '194', '250301', '1');
INSERT INTO `distrito` VALUES ('1836', 'TAHUANIA', '194', '250302', '1');
INSERT INTO `distrito` VALUES ('1837', 'YURUA', '194', '250303', '1');
INSERT INTO `distrito` VALUES ('1838', 'SEPAHUA', '194', '250304', '1');
INSERT INTO `distrito` VALUES ('1839', 'PURUS', '195', '250401', '1');

-- ----------------------------
-- Table structure for doccomprobante
-- ----------------------------
DROP TABLE IF EXISTS `doccomprobante`;
CREATE TABLE `doccomprobante` (
  `cDocCodigo` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nTipo` int(11) NOT NULL,
  `nMoneda` int(11) NOT NULL,
  `fmonto` float(11,0) NOT NULL,
  PRIMARY KEY (`cDocCodigo`,`nTipo`,`nMoneda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doccomprobante
-- ----------------------------

-- ----------------------------
-- Table structure for doccontenido
-- ----------------------------
DROP TABLE IF EXISTS `doccontenido`;
CREATE TABLE `doccontenido` (
  `cDocCodigo` varchar(15) NOT NULL,
  `nDocParCodigo` int(11) NOT NULL,
  `nDocParClase` int(11) NOT NULL,
  `cDocConContenido` text NOT NULL,
  `nDocConEstado` int(11) NOT NULL,
  PRIMARY KEY (`cDocCodigo`,`nDocParCodigo`,`nDocParClase`),
  UNIQUE KEY `idx_pk` (`cDocCodigo`,`nDocParClase`,`nDocParCodigo`) USING BTREE,
  UNIQUE KEY `nDocParCodigo_UNIQUE` (`nDocParCodigo`) USING BTREE,
  UNIQUE KEY `nDocParClase_UNIQUE` (`nDocParClase`) USING BTREE,
  KEY `idx_clase_codigo` (`nDocParClase`,`nDocParCodigo`) USING BTREE,
  KEY `idx_cdoccodigo` (`cDocCodigo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doccontenido
-- ----------------------------

-- ----------------------------
-- Table structure for docestado
-- ----------------------------
DROP TABLE IF EXISTS `docestado`;
CREATE TABLE `docestado` (
  `cDocCodigo` varchar(15) NOT NULL,
  `nDocParCodigo` int(11) unsigned NOT NULL,
  `nDocParClase` int(11) unsigned NOT NULL,
  `dDocEstFecha` datetime NOT NULL,
  `cDocEstGlosa` text,
  PRIMARY KEY (`cDocCodigo`,`nDocParCodigo`,`nDocParClase`,`dDocEstFecha`),
  UNIQUE KEY `idx_pk` (`cDocCodigo`,`nDocParClase`,`nDocParCodigo`,`dDocEstFecha`) USING BTREE,
  KEY `idx_cdoccodigo` (`cDocCodigo`) USING BTREE,
  KEY `idex_clase_codigo` (`nDocParClase`,`nDocParCodigo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of docestado
-- ----------------------------

-- ----------------------------
-- Table structure for docidentifica
-- ----------------------------
DROP TABLE IF EXISTS `docidentifica`;
CREATE TABLE `docidentifica` (
  `cDocCodigo` varchar(15) NOT NULL,
  `nDocTipoNum` int(11) NOT NULL,
  `cDocNDoc` varchar(100) NOT NULL,
  PRIMARY KEY (`cDocCodigo`,`nDocTipoNum`),
  UNIQUE KEY `idx_pk` (`cDocCodigo`,`nDocTipoNum`) USING BTREE,
  KEY `idx_cdocndoc` (`cDocNDoc`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of docidentifica
-- ----------------------------

-- ----------------------------
-- Table structure for docparametro
-- ----------------------------
DROP TABLE IF EXISTS `docparametro`;
CREATE TABLE `docparametro` (
  `cDocCodigo` varchar(15) NOT NULL,
  `nParClase` int(11) unsigned NOT NULL,
  `nParCodigo` int(11) unsigned NOT NULL,
  `cDocParObservacion` varchar(500) NOT NULL,
  PRIMARY KEY (`cDocCodigo`,`nParClase`,`nParCodigo`),
  UNIQUE KEY `idx_pk` (`cDocCodigo`,`nParClase`,`nParCodigo`) USING BTREE,
  UNIQUE KEY `cDocCodigo_UNIQUE` (`cDocCodigo`) USING BTREE,
  KEY `idx_cdoccodigo` (`cDocCodigo`) USING BTREE,
  KEY `idx_clase_codigo` (`nParClase`,`nParCodigo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of docparametro
-- ----------------------------

-- ----------------------------
-- Table structure for docparparametro
-- ----------------------------
DROP TABLE IF EXISTS `docparparametro`;
CREATE TABLE `docparparametro` (
  `cDocCodigo` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nParSrcCodigo` int(11) NOT NULL,
  `nParSrcClase` int(11) NOT NULL,
  `nParDstCodigo` int(11) NOT NULL,
  `nParDstClase` int(11) NOT NULL,
  `cParParValor` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `cParParGlosa` text CHARACTER SET latin1,
  PRIMARY KEY (`cDocCodigo`,`nParSrcCodigo`,`nParSrcClase`,`nParDstCodigo`,`nParDstClase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of docparparametro
-- ----------------------------

-- ----------------------------
-- Table structure for docperparametro
-- ----------------------------
DROP TABLE IF EXISTS `docperparametro`;
CREATE TABLE `docperparametro` (
  `cDocCodigo` varchar(20) NOT NULL,
  `cPerCodigo` varchar(20) NOT NULL,
  `nParCodigo` int(11) NOT NULL,
  `nParClase` int(11) NOT NULL,
  `cDocPerParValor` varchar(500) DEFAULT NULL,
  `cDocPerParGlosa` text,
  `nDocPerParEstado` int(4) NOT NULL,
  PRIMARY KEY (`cDocCodigo`,`cPerCodigo`,`nParCodigo`,`nParClase`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of docperparametro
-- ----------------------------

-- ----------------------------
-- Table structure for docpersona
-- ----------------------------
DROP TABLE IF EXISTS `docpersona`;
CREATE TABLE `docpersona` (
  `cDocCodigo` varchar(15) NOT NULL,
  `nDocPerTipo` int(11) NOT NULL,
  `cPerCodigo` varchar(20) NOT NULL,
  `nPerRelacion` int(11) NOT NULL,
  `nDocTipo` int(11) NOT NULL,
  PRIMARY KEY (`cDocCodigo`,`nDocPerTipo`,`cPerCodigo`,`nPerRelacion`,`nDocTipo`),
  UNIQUE KEY `id_pk` (`cDocCodigo`,`nDocPerTipo`,`cPerCodigo`,`nPerRelacion`,`nDocTipo`) USING BTREE,
  KEY `idx_cdoccodigo` (`cDocCodigo`) USING BTREE,
  KEY `idx_cpercodigo` (`cPerCodigo`) USING BTREE,
  KEY `idx_cdoc_ndoc_cper` (`cDocCodigo`,`nDocPerTipo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of docpersona
-- ----------------------------

-- ----------------------------
-- Table structure for docref
-- ----------------------------
DROP TABLE IF EXISTS `docref`;
CREATE TABLE `docref` (
  `cDocCodigo` varchar(15) NOT NULL DEFAULT '',
  `cDocRefCodigo` varchar(15) NOT NULL,
  PRIMARY KEY (`cDocCodigo`,`cDocRefCodigo`),
  UNIQUE KEY `idx_pk` (`cDocCodigo`,`cDocRefCodigo`) USING BTREE,
  KEY `idx_cdoccodigo` (`cDocCodigo`) USING BTREE,
  KEY `idx_cdocrefcodigo` (`cDocRefCodigo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of docref
-- ----------------------------

-- ----------------------------
-- Table structure for docrefdestino
-- ----------------------------
DROP TABLE IF EXISTS `docrefdestino`;
CREATE TABLE `docrefdestino` (
  `cDocCodigo` varchar(15) CHARACTER SET latin1 NOT NULL,
  `cLugarOrigen` text CHARACTER SET latin1 NOT NULL,
  `nOrigTipo` int(11) NOT NULL,
  `cOrigDireccion` varchar(200) CHARACTER SET latin1 NOT NULL,
  `cOrigManz` varchar(100) CHARACTER SET latin1 NOT NULL,
  `cOrigLote` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nOrigTipoRes` int(11) NOT NULL,
  `cOrigResidencia` varchar(200) CHARACTER SET latin1 NOT NULL,
  `cLugarDestino` text CHARACTER SET latin1 NOT NULL,
  `nDestTipo` int(11) NOT NULL,
  `cDestDireccion` varchar(200) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`cDocCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of docrefdestino
-- ----------------------------

-- ----------------------------
-- Table structure for documento
-- ----------------------------
DROP TABLE IF EXISTS `documento`;
CREATE TABLE `documento` (
  `cDocCodigo` varchar(15) NOT NULL,
  `dDocFecha` datetime NOT NULL,
  `cDocObservacion` varchar(1000) NOT NULL,
  `nDocTipo` int(11) NOT NULL,
  `nDocEstado` tinyint(3) NOT NULL,
  PRIMARY KEY (`cDocCodigo`),
  UNIQUE KEY `idx_cdoccodigo` (`cDocCodigo`) USING BTREE,
  KEY `idx_cdoccodigo_ndoctipo` (`cDocCodigo`,`nDocTipo`) USING BTREE,
  KEY `idx_nDocTipo` (`nDocTipo`) USING BTREE,
  KEY `idx_nEstado` (`nDocEstado`,`cDocCodigo`,`nDocTipo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of documento
-- ----------------------------

-- ----------------------------
-- Table structure for docvigencia
-- ----------------------------
DROP TABLE IF EXISTS `docvigencia`;
CREATE TABLE `docvigencia` (
  `cDocCodigo` varchar(15) NOT NULL,
  `dFecha` date NOT NULL,
  `dFechaFin` date NOT NULL,
  `dHora` datetime NOT NULL,
  PRIMARY KEY (`cDocCodigo`),
  UNIQUE KEY `Codigo` (`cDocCodigo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of docvigencia
-- ----------------------------

-- ----------------------------
-- Table structure for optionselect
-- ----------------------------
DROP TABLE IF EXISTS `optionselect`;
CREATE TABLE `optionselect` (
  `cPerCodigo` varchar(20) NOT NULL,
  `nParTabla` int(10) unsigned NOT NULL,
  `cTabla` varchar(100) NOT NULL,
  `nOptEstado` tinyint(4) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`cPerCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of optionselect
-- ----------------------------
INSERT INTO `optionselect` VALUES ('', '6', 'departamento', '1');

-- ----------------------------
-- Table structure for pais
-- ----------------------------
DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
  `nPaiCodigo` int(11) unsigned NOT NULL,
  `cPaiDescripcion` varchar(200) NOT NULL,
  `nPaiEstado` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`nPaiCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pais
-- ----------------------------
INSERT INTO `pais` VALUES ('1', 'Perú', '1');

-- ----------------------------
-- Table structure for parametro
-- ----------------------------
DROP TABLE IF EXISTS `parametro`;
CREATE TABLE `parametro` (
  `nParCodigo` int(11) unsigned NOT NULL,
  `nParClase` int(11) NOT NULL,
  `cParJerarquia` varchar(20) NOT NULL,
  `cParNombre` varchar(100) NOT NULL,
  `cParDescripcion` varchar(500) NOT NULL,
  `nParEstado` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`nParClase`,`nParCodigo`),
  UNIQUE KEY `idx_pk_parametro` (`nParCodigo`,`nParClase`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of parametro
-- ----------------------------
INSERT INTO `parametro` VALUES ('0', '2001', '10', 'Campaña', '.:::.Periodos/Campañas.:::.', '0');
INSERT INTO `parametro` VALUES ('1', '2001', '1001', '2014', 'CAMPAÑA 2014', '1');
INSERT INTO `parametro` VALUES ('2', '2001', '1002', '2015', 'CAMPAÑA 2015', '1');
INSERT INTO `parametro` VALUES ('0', '2002', '10', 'Sector', '.:::.Sector.:::.', '0');
INSERT INTO `parametro` VALUES ('10', '5000', '10', 'MODULO SISTEMA WEB', 'MODULO SISTEMA WEB', '0');
INSERT INTO `parametro` VALUES ('1001', '5000', '1001', 'MAESTRO MANTENEDORES', 'Tablas Maestra', '1');
INSERT INTO `parametro` VALUES ('1002', '5000', '1002', 'MAESTRO MANTENEDORES', 'Productores', '1');
INSERT INTO `parametro` VALUES ('100101', '5000', '100103', 'xajax_Listar_Periodos(0,20,1,1);', 'Periodo/Camp.', '1');
INSERT INTO `parametro` VALUES ('100102', '5000', '100102', 'xajax_Listar_Caserios(0,20,1,1);', 'Sector', '1');
INSERT INTO `parametro` VALUES ('100103', '5000', '100101', 'xajax_Configurar_Parametro(1003)', 'Tipos de Zonas', '1');
INSERT INTO `parametro` VALUES ('100104', '5000', '100104', 'xajax_Listar_Caserios(0,20,1,1);', 'Prueba', '1');
INSERT INTO `parametro` VALUES ('100201', '5000', '100201', 'xajax_Listar_Productor();', 'Productor', '1');
INSERT INTO `parametro` VALUES ('10010101', '5001', '10010101', 'boton-nuevo', 'Nuevo', '1');
INSERT INTO `parametro` VALUES ('10010102', '5001', '10010102', 'boton-listar', 'Listar', '1');
INSERT INTO `parametro` VALUES ('10010103', '5001', '10010103', 'boton-editar', 'Editar', '1');
INSERT INTO `parametro` VALUES ('10010104', '5001', '10010104', 'boton-eliminar', 'Eliminar', '1');
INSERT INTO `parametro` VALUES ('10010105', '5001', '10010105', 'boton-reporte', 'Reportes', '1');
INSERT INTO `parametro` VALUES ('10010201', '5001', '10010201', 'boton-nuevo', 'Nuevo', '1');
INSERT INTO `parametro` VALUES ('10010202', '5001', '10010202', 'boton-listar', 'Listar', '1');
INSERT INTO `parametro` VALUES ('10010203', '5001', '10010203', 'boton-editar', 'Editar', '1');
INSERT INTO `parametro` VALUES ('10010204', '5001', '10010204', 'boton-eliminar', 'Eliminar', '1');
INSERT INTO `parametro` VALUES ('10010205', '5001', '10010205', 'boton-reporte', 'Reporte PDF', '1');
INSERT INTO `parametro` VALUES ('10010301', '5001', '10010301', 'boton-nuevo', 'Nuevo', '1');
INSERT INTO `parametro` VALUES ('10010302', '5001', '10010302', 'boton-listar', 'Listar', '1');
INSERT INTO `parametro` VALUES ('10010303', '5001', '10010303', 'boton-editar', 'Editar', '1');
INSERT INTO `parametro` VALUES ('10010304', '5001', '10010304', 'boton-eliminar', 'Eliminar', '1');
INSERT INTO `parametro` VALUES ('10010305', '5001', '10010305', 'boton-reporte', 'Reportes', '1');
INSERT INTO `parametro` VALUES ('10010401', '5001', '10010401', 'boton-nuevo', 'Nuevo', '1');
INSERT INTO `parametro` VALUES ('10010402', '5001', '10010402', 'boton-listar', 'Listar', '1');
INSERT INTO `parametro` VALUES ('10010403', '5001', '10010403', 'boton-editar', 'Editar', '1');
INSERT INTO `parametro` VALUES ('10010404', '5001', '10010404', 'boton-eliminar', 'Eliminar', '1');
INSERT INTO `parametro` VALUES ('10010405', '5001', '10010405', 'boton-reporte', 'Reporte PDF', '1');
INSERT INTO `parametro` VALUES ('10020101', '5001', '10020101', 'boton-nuevo', 'Nuevo', '1');
INSERT INTO `parametro` VALUES ('10020102', '5001', '10020102', 'boton-listar', 'Listar', '1');
INSERT INTO `parametro` VALUES ('10020103', '5001', '10020103', 'boton-editar', 'Editar', '1');
INSERT INTO `parametro` VALUES ('10020104', '5001', '10020104', 'boton-eliminar', 'Eliminar', '1');
INSERT INTO `parametro` VALUES ('10020105', '5001', '10020105', 'boton-reporte', 'Reportes', '1');

-- ----------------------------
-- Table structure for pardetalle
-- ----------------------------
DROP TABLE IF EXISTS `pardetalle`;
CREATE TABLE `pardetalle` (
  `nParCodigo` int(11) unsigned NOT NULL,
  `nParClase` int(11) unsigned NOT NULL,
  `nParItem` int(11) unsigned NOT NULL,
  `nParItemS` int(11) unsigned NOT NULL,
  `cParDetValor` varchar(250) CHARACTER SET utf8 NOT NULL,
  `cParDetGlosa` text CHARACTER SET utf8,
  PRIMARY KEY (`nParCodigo`,`nParClase`,`nParItem`,`nParItemS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pardetalle
-- ----------------------------

-- ----------------------------
-- Table structure for parimagen
-- ----------------------------
DROP TABLE IF EXISTS `parimagen`;
CREATE TABLE `parimagen` (
  `nParCodigo` int(11) unsigned NOT NULL,
  `nParClase` int(11) unsigned NOT NULL,
  `nParImgTipo` int(11) unsigned NOT NULL,
  `cParImgRuta` varchar(1000) NOT NULL,
  `cParImgGlosa` text,
  `nParImgEstado` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`nParCodigo`,`nParClase`,`nParImgTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of parimagen
-- ----------------------------

-- ----------------------------
-- Table structure for parparametro
-- ----------------------------
DROP TABLE IF EXISTS `parparametro`;
CREATE TABLE `parparametro` (
  `nParSrcCodigo` int(11) unsigned NOT NULL DEFAULT '0',
  `nParSrcClase` int(11) unsigned NOT NULL,
  `nParDstCodigo` int(11) unsigned NOT NULL,
  `nParDstClase` int(11) unsigned NOT NULL,
  `cValor` varchar(250) DEFAULT NULL,
  `nParParEstado` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`nParSrcCodigo`,`nParSrcClase`,`nParDstCodigo`,`nParDstClase`),
  UNIQUE KEY `idx_pk_all` (`nParSrcCodigo`,`nParSrcClase`,`nParDstCodigo`,`nParDstClase`) USING BTREE,
  KEY `idx_pk_src` (`nParSrcCodigo`,`nParSrcClase`) USING BTREE,
  KEY `idx_pk_dst` (`nParDstCodigo`,`nParDstClase`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of parparametro
-- ----------------------------
INSERT INTO `parparametro` VALUES ('100101', '5000', '10010101', '5001', 'xajax_Nuevo_Periodo();', '1');
INSERT INTO `parparametro` VALUES ('100101', '5000', '10010102', '5001', 'xajax_Listar_Periodos(0,20,1,1);', '1');
INSERT INTO `parparametro` VALUES ('100101', '5000', '10010103', '5001', 'xajax_Editar_Periodo(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100101', '5000', '10010104', '5001', 'xajax_Eliminar_Periodo(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100101', '5000', '10010105', '5001', 'xajax_Reportes_Parametro(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100102', '5000', '10010201', '5001', 'xajax_Nuevo_Caserio();', '1');
INSERT INTO `parparametro` VALUES ('100102', '5000', '10010202', '5001', 'xajax_Listar_Caserios(0,20,1,1);', '1');
INSERT INTO `parparametro` VALUES ('100102', '5000', '10010203', '5001', 'xajax_Editar_Caserio(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100102', '5000', '10010204', '5001', 'xajax_Eliminar_Caserio(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100102', '5000', '10010205', '5001', 'xajax_Rpt_Caserio_Pdf(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100103', '5000', '10010301', '5001', 'xajax_Nuevo_Parametro();', '1');
INSERT INTO `parparametro` VALUES ('100103', '5000', '10010302', '5001', 'xajax_Configurar_Parametro(1003);', '1');
INSERT INTO `parparametro` VALUES ('100103', '5000', '10010303', '5001', 'xajax_Editar_Parametro(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100103', '5000', '10010304', '5001', 'xajax_Eliminar_Parametro(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100103', '5000', '10010305', '5001', 'xajax_Reportes_Parametro(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100104', '5000', '10010401', '5001', 'xajax_Nuevo_Caserios();', '1');
INSERT INTO `parparametro` VALUES ('100104', '5000', '10010402', '5001', 'xajax_Listar_Caserio(0,20,1,1);', '1');
INSERT INTO `parparametro` VALUES ('100104', '5000', '10010403', '5001', 'xajax_Editar_Caserio(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100104', '5000', '10010404', '5001', 'xajax_Eliminar_Caserio(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100104', '5000', '10010405', '5001', 'xajax_Rpt_Caserio_Pdf(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100201', '5000', '10020101', '5001', 'xajax_Nuevo_Productor();', '1');
INSERT INTO `parparametro` VALUES ('100201', '5000', '10020102', '5001', 'xajax_Listar_Productor();', '1');
INSERT INTO `parparametro` VALUES ('100201', '5000', '10020103', '5001', 'xajax_Editar_Productor(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100201', '5000', '10020104', '5001', 'xajax_Eliminar_Productor(xajax.getFormValues(FrmPrincipal));', '1');
INSERT INTO `parparametro` VALUES ('100201', '5000', '10020105', '5001', 'xajax_Reporte_Productor(xajax.getFormValues(FrmPrincipal));', '1');

-- ----------------------------
-- Table structure for parparext
-- ----------------------------
DROP TABLE IF EXISTS `parparext`;
CREATE TABLE `parparext` (
  `nIntSrcCodigo` int(11) unsigned NOT NULL,
  `nIntSrcClase` int(11) unsigned NOT NULL,
  `nIntDstCodigo` int(11) unsigned NOT NULL,
  `nIntDstClase` int(11) unsigned NOT NULL,
  `nObjCodigo` int(11) unsigned NOT NULL,
  `nObjTipo` int(11) unsigned NOT NULL,
  `cValor` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`nIntSrcCodigo`,`nIntSrcClase`,`nIntDstCodigo`,`nIntDstClase`,`nObjCodigo`,`nObjTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of parparext
-- ----------------------------

-- ----------------------------
-- Table structure for percuenta
-- ----------------------------
DROP TABLE IF EXISTS `percuenta`;
CREATE TABLE `percuenta` (
  `nPerCtaCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `cPerCodigo` varchar(20) CHARACTER SET latin1 NOT NULL,
  `cNroCuenta` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nPerCtaTipo` int(11) unsigned NOT NULL,
  `cPerJurCodigo` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nMonCodigo` int(11) unsigned NOT NULL,
  `nPerCtaEstado` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`nPerCtaCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of percuenta
-- ----------------------------

-- ----------------------------
-- Table structure for perdireccion
-- ----------------------------
DROP TABLE IF EXISTS `perdireccion`;
CREATE TABLE `perdireccion` (
  `cPerCodigo` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'Codigo de la Persona a la que le pertenece esta direccion',
  `nUbiCodigo` int(11) NOT NULL COMMENT 'Codigo del ubigeo de esta direccion',
  `nPerDirTipo` int(11) NOT NULL COMMENT 'Codigo del tipo de la direccion (Casa - trabajo)',
  `cPerDirDescripcion` varchar(500) CHARACTER SET latin1 NOT NULL COMMENT 'Descripcion de la direccion',
  `cPerDirGlosa` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `nPerDirEstado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registra la diferentes direcciones de una persona';

-- ----------------------------
-- Records of perdireccion
-- ----------------------------

-- ----------------------------
-- Table structure for perdocumento
-- ----------------------------
DROP TABLE IF EXISTS `perdocumento`;
CREATE TABLE `perdocumento` (
  `cPerCodigo` varchar(20) NOT NULL COMMENT 'Codigo de la Persona a la que le pertenece este documento. ',
  `nPerDocTipo` int(11) NOT NULL COMMENT 'Codigo del tipo de documento',
  `cPerDocNumero` varchar(50) NOT NULL COMMENT 'Numero del documento',
  `dPerDocCaducidad` date NOT NULL,
  `nPerDocCategoria` int(11) DEFAULT NULL,
  `nPerDocEstado` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cPerCodigo`,`nPerDocTipo`,`cPerDocNumero`),
  UNIQUE KEY `idx_pk_PerDocumento` (`cPerCodigo`,`nPerDocTipo`) USING BTREE,
  UNIQUE KEY `idx_cPerDocNumero` (`cPerDocNumero`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registra los diferentes documentos de una persona ';

-- ----------------------------
-- Records of perdocumento
-- ----------------------------

-- ----------------------------
-- Table structure for perimagen
-- ----------------------------
DROP TABLE IF EXISTS `perimagen`;
CREATE TABLE `perimagen` (
  `cPerCodigo` varchar(10) NOT NULL,
  `cPerRuta` varchar(50) NOT NULL,
  `nPerTipo` int(11) NOT NULL,
  `nPerEstado` int(11) NOT NULL,
  PRIMARY KEY (`cPerCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perimagen
-- ----------------------------

-- ----------------------------
-- Table structure for periodo
-- ----------------------------
DROP TABLE IF EXISTS `periodo`;
CREATE TABLE `periodo` (
  `nPrdCodigo` int(11) unsigned NOT NULL,
  `cPrdDescripcion` varchar(250) NOT NULL,
  `dPrdFecInic` date NOT NULL,
  `dPrdFecFin` date NOT NULL,
  `nPrdTipo` int(11) NOT NULL,
  `nPrdEstado` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nPrdCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of periodo
-- ----------------------------
INSERT INTO `periodo` VALUES ('1', 'CAMPAÑA 2014', '2014-07-02', '2014-11-12', '1', '2');
INSERT INTO `periodo` VALUES ('2', 'CAMPAÑA 2015', '2015-01-15', '2015-03-26', '1', '2');

-- ----------------------------
-- Table structure for perjuridica
-- ----------------------------
DROP TABLE IF EXISTS `perjuridica`;
CREATE TABLE `perjuridica` (
  `cPerCodigo` varchar(20) NOT NULL,
  `nPerJurRubro` int(11) NOT NULL,
  `cPerJurDescripcion` varchar(250) NOT NULL,
  `nPerEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`cPerCodigo`),
  UNIQUE KEY `idx_pk_cPerCodigo` (`cPerCodigo`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perjuridica
-- ----------------------------

-- ----------------------------
-- Table structure for permail
-- ----------------------------
DROP TABLE IF EXISTS `permail`;
CREATE TABLE `permail` (
  `cPerCodigo` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'Codigo de la Persona a la que le pertenece este Email',
  `nPerMailItem` tinyint(3) NOT NULL COMMENT 'Codigo del tipo de email(personal - corporativo)',
  `cPerMail` varchar(250) NOT NULL COMMENT 'Descripcion del Email',
  `nPerMailEstado` tinyint(3) NOT NULL,
  PRIMARY KEY (`cPerCodigo`,`nPerMailItem`),
  UNIQUE KEY `idx_pk_PerMail` (`cPerCodigo`,`nPerMailItem`) USING BTREE,
  KEY `idx_cPerMail` (`cPerMail`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Se registra los diferentes email de una persona ';

-- ----------------------------
-- Records of permail
-- ----------------------------

-- ----------------------------
-- Table structure for pernatural
-- ----------------------------
DROP TABLE IF EXISTS `pernatural`;
CREATE TABLE `pernatural` (
  `cPerCodigo` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'Codigo de la Persona',
  `cPerNatApePaterno` varchar(250) NOT NULL COMMENT 'Registro del apellido paterno',
  `cPerNatApeMaterno` varchar(250) NOT NULL COMMENT 'Registro del apellido Materno',
  `nPerNatSexo` tinyint(3) unsigned NOT NULL COMMENT 'Codigo de la Persona a la que le pertenece este sexo',
  `nPerNatEstCivil` tinyint(3) unsigned NOT NULL COMMENT 'Codigo de la Persona a la que le pertenece este estado civil',
  PRIMARY KEY (`cPerCodigo`),
  UNIQUE KEY `idx_pk_pernatural` (`cPerCodigo`) USING BTREE,
  KEY `idx_cPerNatApePaterno` (`cPerNatApePaterno`) USING BTREE,
  KEY `idx_cPerNatApeMaterno` (`cPerNatApeMaterno`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='En esta tabla se registra los apellidos de una persona';

-- ----------------------------
-- Records of pernatural
-- ----------------------------

-- ----------------------------
-- Table structure for perparametro
-- ----------------------------
DROP TABLE IF EXISTS `perparametro`;
CREATE TABLE `perparametro` (
  `cPerCodigo` varchar(20) NOT NULL,
  `nParCodigo` int(11) NOT NULL,
  `nParClase` int(11) NOT NULL,
  `nPerParValor` int(11) DEFAULT NULL,
  `cPerParGlosa` varchar(255) DEFAULT NULL,
  `nPerParEstado` int(4) DEFAULT NULL,
  PRIMARY KEY (`cPerCodigo`,`nParCodigo`,`nParClase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perparametro
-- ----------------------------

-- ----------------------------
-- Table structure for perrelacion
-- ----------------------------
DROP TABLE IF EXISTS `perrelacion`;
CREATE TABLE `perrelacion` (
  `cPerCodigo` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nPerRelTipo` int(11) unsigned NOT NULL,
  `cPerJuridica` varchar(20) CHARACTER SET latin1 NOT NULL,
  `dPerRelacion` date NOT NULL,
  `cPerObservacion` varchar(500) NOT NULL,
  `nPerRelEstado` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`cPerCodigo`,`nPerRelTipo`,`cPerJuridica`),
  UNIQUE KEY `idx_pk_PerRelacion` (`cPerCodigo`,`nPerRelTipo`) USING BTREE,
  KEY `idx_cPerJuridica` (`cPerJuridica`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perrelacion
-- ----------------------------

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `cPerCodigo` varchar(20) NOT NULL COMMENT 'Codigo de la persona.',
  `cPerNombre` varchar(500) NOT NULL COMMENT 'Nombre de la persona.',
  `cPerApellidos` varchar(500) DEFAULT NULL,
  `dPerNacimiento` date NOT NULL COMMENT 'Fecha de nacimiento de la persona.',
  `nPerTipo` tinyint(3) unsigned NOT NULL COMMENT 'Codigo si es una persona  juridica(1) o natural(2).',
  `nPerEstado` tinyint(3) unsigned NOT NULL COMMENT 'Codigo si esta persona esta activa o inactivo.',
  PRIMARY KEY (`cPerCodigo`),
  UNIQUE KEY `idx_pk_persona` (`cPerCodigo`) USING BTREE,
  KEY `idx_cPerNombre` (`cPerNombre`(255)) USING BTREE,
  KEY `idx_cParApellidos` (`cPerApellidos`(255)) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='En esta tabla se registran los nombres de una persona';

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES ('1', 'Armando Enrique ', 'Pisfil Puemape', '0000-00-00', '1', '1');

-- ----------------------------
-- Table structure for pertelefono
-- ----------------------------
DROP TABLE IF EXISTS `pertelefono`;
CREATE TABLE `pertelefono` (
  `cPerCodigo` varchar(20) NOT NULL COMMENT 'Codigo de la Persona a la cual le pertenece este Numero Telefonico',
  `nPerTelTipo` int(11) NOT NULL COMMENT 'Tipo de Telefono (Fijo - Celular Movistar - Celular Claro)',
  `nPerTelItem` tinyint(3) unsigned NOT NULL,
  `cPerTelNumero` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'Numero del Telefono',
  `nPerTelEstado` tinyint(3) NOT NULL,
  PRIMARY KEY (`cPerCodigo`,`nPerTelItem`,`nPerTelTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena los telefonos de una determinada Persona';

-- ----------------------------
-- Records of pertelefono
-- ----------------------------

-- ----------------------------
-- Table structure for perusuacceso
-- ----------------------------
DROP TABLE IF EXISTS `perusuacceso`;
CREATE TABLE `perusuacceso` (
  `cPerCodigo` varchar(20) NOT NULL COMMENT 'Codigo de la persona quien tendra acceso al sistema.',
  `nPerUsuAccGrupo` int(11) unsigned NOT NULL COMMENT 'Codigo de un determinado grupo a la que una persona tendra acceso.',
  `nPerUsuAccTipo` int(11) unsigned NOT NULL COMMENT 'Codigo de un determinado grupo a la que una persona tendra acceso.',
  `nPerUsuAccObjCodigo` int(11) unsigned NOT NULL COMMENT 'Codigo del permiso al que tendra una persona.',
  `nPerUsuAccCodigo` int(11) unsigned NOT NULL COMMENT 'Codigo del permiso al que tendra una persona.',
  `nPerUsuAccPrdCodigo` int(11) unsigned NOT NULL COMMENT 'Codigo de un determinado periodo al que un usuario tendra acceso.',
  `nPerUsuAccEstado` tinyint(3) unsigned NOT NULL COMMENT 'Codigo del estado de un usuario(activo - inactivo).',
  PRIMARY KEY (`cPerCodigo`,`nPerUsuAccGrupo`,`nPerUsuAccTipo`,`nPerUsuAccObjCodigo`,`nPerUsuAccCodigo`,`nPerUsuAccPrdCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='En esta tabla se registraran los permisos de un determinado ';

-- ----------------------------
-- Records of perusuacceso
-- ----------------------------
INSERT INTO `perusuacceso` VALUES ('1', '10', '1', '5000', '1001', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '10', '1', '5000', '1002', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '10', '1', '5000', '100101', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '10', '1', '5000', '100102', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '10', '1', '5000', '100103', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '10', '1', '5000', '100104', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '10', '1', '5000', '100201', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '10', '1', '5000', '100301', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010101', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010102', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010103', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010104', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010105', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010201', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010202', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010203', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010204', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010205', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010301', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010302', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010303', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010304', '0', '0');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10010305', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10020101', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10020102', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10020103', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10020104', '0', '1');
INSERT INTO `perusuacceso` VALUES ('1', '5001', '1', '5001', '10020105', '0', '1');

-- ----------------------------
-- Table structure for perusuario
-- ----------------------------
DROP TABLE IF EXISTS `perusuario`;
CREATE TABLE `perusuario` (
  `cPerCodigo` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'Codigo de la persona ',
  `cPerUsuCodigo` varchar(50) NOT NULL COMMENT 'Registro del nombre del usuario.',
  `cPerUsuClave` varchar(50) NOT NULL COMMENT 'Registro de la clave del usuario.',
  `nPerUsuEstado` tinyint(3) unsigned NOT NULL COMMENT 'Codigo del estado del usuario(activo - inactivo)',
  PRIMARY KEY (`cPerCodigo`,`cPerUsuCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perusuario
-- ----------------------------
INSERT INTO `perusuario` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

-- ----------------------------
-- Table structure for provincia
-- ----------------------------
DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia` (
  `nProCodigo` int(11) unsigned NOT NULL,
  `cProDescripcion` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nDepCodigo` int(11) unsigned NOT NULL,
  `cProUbiCodigo` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `nProEstado` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`nProCodigo`,`nDepCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of provincia
-- ----------------------------
INSERT INTO `provincia` VALUES ('1', 'CHACHAPOYAS', '1', '0101', '1');
INSERT INTO `provincia` VALUES ('2', 'BAGUA', '1', '0102', '1');
INSERT INTO `provincia` VALUES ('3', 'BONGARA', '1', '0103', '1');
INSERT INTO `provincia` VALUES ('4', 'LUYA', '1', '0104', '1');
INSERT INTO `provincia` VALUES ('5', 'RODRIGUEZ DE MENDOZA', '1', '0105', '1');
INSERT INTO `provincia` VALUES ('6', 'CONDORCANQUI', '1', '0106', '1');
INSERT INTO `provincia` VALUES ('7', 'UTCUBAMBA', '1', '0107', '1');
INSERT INTO `provincia` VALUES ('8', 'HUARAZ', '2', '0201', '1');
INSERT INTO `provincia` VALUES ('9', 'AIJA', '2', '0202', '1');
INSERT INTO `provincia` VALUES ('10', 'BOLOGNESI', '2', '0203', '1');
INSERT INTO `provincia` VALUES ('11', 'CARHUAZ', '2', '0204', '1');
INSERT INTO `provincia` VALUES ('12', 'CASMA', '2', '0205', '1');
INSERT INTO `provincia` VALUES ('13', 'CORONGO', '2', '0206', '1');
INSERT INTO `provincia` VALUES ('14', 'HUAYLAS', '2', '0207', '1');
INSERT INTO `provincia` VALUES ('15', 'HUARI', '2', '0208', '1');
INSERT INTO `provincia` VALUES ('16', 'MARISCAL LUZURIAGA', '2', '0209', '1');
INSERT INTO `provincia` VALUES ('17', 'PALLASCA', '2', '0210', '1');
INSERT INTO `provincia` VALUES ('18', 'POMABAMBA', '2', '0211', '1');
INSERT INTO `provincia` VALUES ('19', 'RECUAY', '2', '0212', '1');
INSERT INTO `provincia` VALUES ('20', 'SANTA', '2', '0213', '1');
INSERT INTO `provincia` VALUES ('21', 'SIHUAS', '2', '0214', '1');
INSERT INTO `provincia` VALUES ('22', 'YUNGAY', '2', '0215', '1');
INSERT INTO `provincia` VALUES ('23', 'ANTONIO RAIMONDI', '2', '0216', '1');
INSERT INTO `provincia` VALUES ('24', 'CARLOS FERMIN FITZCARRALD', '2', '0217', '1');
INSERT INTO `provincia` VALUES ('25', 'ASUNCION', '2', '0218', '1');
INSERT INTO `provincia` VALUES ('26', 'HUARMEY', '2', '0219', '1');
INSERT INTO `provincia` VALUES ('27', 'OCROS', '2', '0220', '1');
INSERT INTO `provincia` VALUES ('28', 'ABANCAY', '3', '0301', '1');
INSERT INTO `provincia` VALUES ('29', 'AYMARAES', '3', '0302', '1');
INSERT INTO `provincia` VALUES ('30', 'ANDAHUAYLAS', '3', '0303', '1');
INSERT INTO `provincia` VALUES ('31', 'ANTABAMBA', '3', '0304', '1');
INSERT INTO `provincia` VALUES ('32', 'COTABAMBAS', '3', '0305', '1');
INSERT INTO `provincia` VALUES ('33', 'GRAU', '3', '0306', '1');
INSERT INTO `provincia` VALUES ('34', 'CHINCHEROS', '3', '0307', '1');
INSERT INTO `provincia` VALUES ('35', 'AREQUIPA', '4', '0401', '1');
INSERT INTO `provincia` VALUES ('36', 'CAYLLOMA', '4', '0402', '1');
INSERT INTO `provincia` VALUES ('37', 'CAMANA', '4', '0403', '1');
INSERT INTO `provincia` VALUES ('38', 'CARAVELI', '4', '0404', '1');
INSERT INTO `provincia` VALUES ('39', 'CASTILLA', '4', '0405', '1');
INSERT INTO `provincia` VALUES ('40', 'CONDESUYOS', '4', '0406', '1');
INSERT INTO `provincia` VALUES ('41', 'ISLAY', '4', '0407', '1');
INSERT INTO `provincia` VALUES ('42', 'LA UNION', '4', '0408', '1');
INSERT INTO `provincia` VALUES ('43', 'HUAMANGA', '5', '0501', '1');
INSERT INTO `provincia` VALUES ('44', 'CANGALLO', '5', '0502', '1');
INSERT INTO `provincia` VALUES ('45', 'HUANTA', '5', '0503', '1');
INSERT INTO `provincia` VALUES ('46', 'LA MAR', '5', '0504', '1');
INSERT INTO `provincia` VALUES ('47', 'LUCANAS', '5', '0505', '1');
INSERT INTO `provincia` VALUES ('48', 'PARINACOCHAS', '5', '0506', '1');
INSERT INTO `provincia` VALUES ('49', 'VICTOR FAJARDO', '5', '0507', '1');
INSERT INTO `provincia` VALUES ('50', 'HUANCA SANCOS', '5', '0508', '1');
INSERT INTO `provincia` VALUES ('51', 'VILCAS HUAMAN', '5', '0509', '1');
INSERT INTO `provincia` VALUES ('52', 'PAUCAR DEL SARA SARA', '5', '0510', '1');
INSERT INTO `provincia` VALUES ('53', 'SUCRE', '5', '0511', '1');
INSERT INTO `provincia` VALUES ('54', 'CAJAMARCA', '6', '0601', '1');
INSERT INTO `provincia` VALUES ('55', 'CAJABAMBA', '6', '0602', '1');
INSERT INTO `provincia` VALUES ('56', 'CELENDIN', '6', '0603', '1');
INSERT INTO `provincia` VALUES ('57', 'CONTUMAZA', '6', '0604', '1');
INSERT INTO `provincia` VALUES ('58', 'CUTERVO', '6', '0605', '1');
INSERT INTO `provincia` VALUES ('59', 'CHOTA', '6', '0606', '1');
INSERT INTO `provincia` VALUES ('60', 'HUALGAYOC', '6', '0607', '1');
INSERT INTO `provincia` VALUES ('61', 'JAEN', '6', '0608', '1');
INSERT INTO `provincia` VALUES ('62', 'SANTA CRUZ', '6', '0609', '1');
INSERT INTO `provincia` VALUES ('63', 'SAN MIGUEL', '6', '0610', '1');
INSERT INTO `provincia` VALUES ('64', 'SAN IGNACIO', '6', '0611', '1');
INSERT INTO `provincia` VALUES ('65', 'SAN MARCOS', '6', '0612', '1');
INSERT INTO `provincia` VALUES ('66', 'SAN PABLO', '6', '0613', '1');
INSERT INTO `provincia` VALUES ('67', 'CUSCO', '7', '0701', '1');
INSERT INTO `provincia` VALUES ('68', 'ACOMAYO', '7', '0702', '1');
INSERT INTO `provincia` VALUES ('69', 'ANTA', '7', '0703', '1');
INSERT INTO `provincia` VALUES ('70', 'CALCA', '7', '0704', '1');
INSERT INTO `provincia` VALUES ('71', 'CANAS', '7', '0705', '1');
INSERT INTO `provincia` VALUES ('72', 'CANCHIS', '7', '0706', '1');
INSERT INTO `provincia` VALUES ('73', 'CHUMBIVILCAS', '7', '0707', '1');
INSERT INTO `provincia` VALUES ('74', 'ESPINAR', '7', '0708', '1');
INSERT INTO `provincia` VALUES ('75', 'LA CONVENCION', '7', '0709', '1');
INSERT INTO `provincia` VALUES ('76', 'PARURO', '7', '0710', '1');
INSERT INTO `provincia` VALUES ('77', 'PAUCARTAMBO', '7', '0711', '1');
INSERT INTO `provincia` VALUES ('78', 'QUISPICANCHI', '7', '0712', '1');
INSERT INTO `provincia` VALUES ('79', 'URUBAMBA', '7', '0713', '1');
INSERT INTO `provincia` VALUES ('80', 'HUANCAVELICA', '8', '0801', '1');
INSERT INTO `provincia` VALUES ('81', 'ACOBAMBA', '8', '0802', '1');
INSERT INTO `provincia` VALUES ('82', 'ANGARAES', '8', '0803', '1');
INSERT INTO `provincia` VALUES ('83', 'CASTROVIRREYNA', '8', '0804', '1');
INSERT INTO `provincia` VALUES ('84', 'TAYACAJA', '8', '0805', '1');
INSERT INTO `provincia` VALUES ('85', 'HUAYTARA', '8', '0806', '1');
INSERT INTO `provincia` VALUES ('86', 'CHURCAMPA', '8', '0807', '1');
INSERT INTO `provincia` VALUES ('87', 'HUANUCO', '9', '0901', '1');
INSERT INTO `provincia` VALUES ('88', 'AMBO', '9', '0902', '1');
INSERT INTO `provincia` VALUES ('89', 'DOS DE MAYO', '9', '0903', '1');
INSERT INTO `provincia` VALUES ('90', 'HUAMALIES', '9', '0904', '1');
INSERT INTO `provincia` VALUES ('91', 'MARAÑON', '9', '0905', '1');
INSERT INTO `provincia` VALUES ('92', 'LEONCIO PRADO', '9', '0906', '1');
INSERT INTO `provincia` VALUES ('93', 'PACHITEA', '9', '0907', '1');
INSERT INTO `provincia` VALUES ('94', 'PUERTO INCA', '9', '0908', '1');
INSERT INTO `provincia` VALUES ('95', 'HUACAYBAMBA', '9', '0909', '1');
INSERT INTO `provincia` VALUES ('96', 'LAURICOCHA', '9', '0910', '1');
INSERT INTO `provincia` VALUES ('97', 'YAROWILCA', '9', '0911', '1');
INSERT INTO `provincia` VALUES ('98', 'ICA', '10', '1001', '1');
INSERT INTO `provincia` VALUES ('99', 'CHINCHA', '10', '1002', '1');
INSERT INTO `provincia` VALUES ('100', 'NAZCA', '10', '1003', '1');
INSERT INTO `provincia` VALUES ('101', 'PISCO', '10', '1004', '1');
INSERT INTO `provincia` VALUES ('102', 'PALPA', '10', '1005', '1');
INSERT INTO `provincia` VALUES ('103', 'HUANCAYO', '11', '1101', '1');
INSERT INTO `provincia` VALUES ('104', 'CONCEPCION', '11', '1102', '1');
INSERT INTO `provincia` VALUES ('105', 'JAUJA', '11', '1103', '1');
INSERT INTO `provincia` VALUES ('106', 'JUNIN', '11', '1104', '1');
INSERT INTO `provincia` VALUES ('107', 'TARMA', '11', '1105', '1');
INSERT INTO `provincia` VALUES ('108', 'YAULI', '11', '1106', '1');
INSERT INTO `provincia` VALUES ('109', 'SATIPO', '11', '1107', '1');
INSERT INTO `provincia` VALUES ('110', 'CHANCHAMAYO', '11', '1108', '1');
INSERT INTO `provincia` VALUES ('111', 'CHUPACA', '11', '1109', '1');
INSERT INTO `provincia` VALUES ('112', 'TRUJILLO', '12', '1201', '1');
INSERT INTO `provincia` VALUES ('113', 'BOLIVAR', '12', '1202', '1');
INSERT INTO `provincia` VALUES ('114', 'SANCHEZ CARRION', '12', '1203', '1');
INSERT INTO `provincia` VALUES ('115', 'OTUZCO', '12', '1204', '1');
INSERT INTO `provincia` VALUES ('116', 'PACASMAYO', '12', '1205', '1');
INSERT INTO `provincia` VALUES ('117', 'PATAZ', '12', '1206', '1');
INSERT INTO `provincia` VALUES ('118', 'SANTIAGO DE CHUCO', '12', '1207', '1');
INSERT INTO `provincia` VALUES ('119', 'ASCOPE', '12', '1208', '1');
INSERT INTO `provincia` VALUES ('120', 'CHEPEN', '12', '1209', '1');
INSERT INTO `provincia` VALUES ('121', 'JULCAN', '12', '1210', '1');
INSERT INTO `provincia` VALUES ('122', 'GRAN CHIMU', '12', '1211', '1');
INSERT INTO `provincia` VALUES ('123', 'VIRU', '12', '1212', '1');
INSERT INTO `provincia` VALUES ('124', 'CHICLAYO', '13', '1301', '1');
INSERT INTO `provincia` VALUES ('125', 'FERREÑAFE', '13', '1302', '1');
INSERT INTO `provincia` VALUES ('126', 'LAMBAYEQUE', '13', '1303', '1');
INSERT INTO `provincia` VALUES ('127', 'LIMA', '14', '1401', '1');
INSERT INTO `provincia` VALUES ('128', 'CAJATAMBO', '14', '1402', '1');
INSERT INTO `provincia` VALUES ('129', 'CANTA', '14', '1403', '1');
INSERT INTO `provincia` VALUES ('130', 'CAÑETE', '14', '1404', '1');
INSERT INTO `provincia` VALUES ('131', 'HUAURA', '14', '1405', '1');
INSERT INTO `provincia` VALUES ('132', 'HUAROCHIRI', '14', '1406', '1');
INSERT INTO `provincia` VALUES ('133', 'YAUYOS', '14', '1407', '1');
INSERT INTO `provincia` VALUES ('134', 'HUARAL', '14', '1408', '1');
INSERT INTO `provincia` VALUES ('135', 'BARRANCA', '14', '1409', '1');
INSERT INTO `provincia` VALUES ('136', 'OYON', '14', '1410', '1');
INSERT INTO `provincia` VALUES ('137', 'MAYNAS', '15', '1501', '1');
INSERT INTO `provincia` VALUES ('138', 'ALTO AMAZONAS', '15', '1502', '1');
INSERT INTO `provincia` VALUES ('139', 'LORETO', '15', '1503', '1');
INSERT INTO `provincia` VALUES ('140', 'REQUENA', '15', '1504', '1');
INSERT INTO `provincia` VALUES ('141', 'UCAYALI', '15', '1505', '1');
INSERT INTO `provincia` VALUES ('142', 'MARISCAL RAMON CASTILLA', '15', '1506', '1');
INSERT INTO `provincia` VALUES ('143', 'DATEM DEL MARAÑON', '15', '1507', '1');
INSERT INTO `provincia` VALUES ('144', 'TAMBOPATA', '16', '1601', '1');
INSERT INTO `provincia` VALUES ('145', 'MANU', '16', '1602', '1');
INSERT INTO `provincia` VALUES ('146', 'TAHUAMANU', '16', '1603', '1');
INSERT INTO `provincia` VALUES ('147', 'MARISCAL NIETO', '17', '1701', '1');
INSERT INTO `provincia` VALUES ('148', 'GENERAL SANCHEZ CERRO', '17', '1702', '1');
INSERT INTO `provincia` VALUES ('149', 'ILO', '17', '1703', '1');
INSERT INTO `provincia` VALUES ('150', 'PASCO', '18', '1801', '1');
INSERT INTO `provincia` VALUES ('151', 'DANIEL ALCIDES CARRION', '18', '1802', '1');
INSERT INTO `provincia` VALUES ('152', 'OXAPAMPA', '18', '1803', '1');
INSERT INTO `provincia` VALUES ('153', 'PIURA', '19', '1901', '1');
INSERT INTO `provincia` VALUES ('154', 'AYABACA', '19', '1902', '1');
INSERT INTO `provincia` VALUES ('155', 'HUANCABAMBA', '19', '1903', '1');
INSERT INTO `provincia` VALUES ('156', 'MORROPON', '19', '1904', '1');
INSERT INTO `provincia` VALUES ('157', 'PAITA', '19', '1905', '1');
INSERT INTO `provincia` VALUES ('158', 'SULLANA', '19', '1906', '1');
INSERT INTO `provincia` VALUES ('159', 'TALARA', '19', '1907', '1');
INSERT INTO `provincia` VALUES ('160', 'SECHURA', '19', '1908', '1');
INSERT INTO `provincia` VALUES ('161', 'PUNO', '20', '2001', '1');
INSERT INTO `provincia` VALUES ('162', 'AZANGARO', '20', '2002', '1');
INSERT INTO `provincia` VALUES ('163', 'CARABAYA', '20', '2003', '1');
INSERT INTO `provincia` VALUES ('164', 'CHUCUITO', '20', '2004', '1');
INSERT INTO `provincia` VALUES ('165', 'HUANCANE', '20', '2005', '1');
INSERT INTO `provincia` VALUES ('166', 'LAMPA', '20', '2006', '1');
INSERT INTO `provincia` VALUES ('167', 'MELGAR', '20', '2007', '1');
INSERT INTO `provincia` VALUES ('168', 'SANDIA', '20', '2008', '1');
INSERT INTO `provincia` VALUES ('169', 'SAN ROMAN', '20', '2009', '1');
INSERT INTO `provincia` VALUES ('170', 'YUNGUYO', '20', '2010', '1');
INSERT INTO `provincia` VALUES ('171', 'SAN ANTONIO DE PUTINA', '20', '2011', '1');
INSERT INTO `provincia` VALUES ('172', 'EL COLLAO', '20', '2012', '1');
INSERT INTO `provincia` VALUES ('173', 'MOHO', '20', '2013', '1');
INSERT INTO `provincia` VALUES ('174', 'MOYOBAMBA', '21', '2101', '1');
INSERT INTO `provincia` VALUES ('175', 'HUALLAGA', '21', '2102', '1');
INSERT INTO `provincia` VALUES ('176', 'LAMAS', '21', '2103', '1');
INSERT INTO `provincia` VALUES ('177', 'MARISCAL CACERES', '21', '2104', '1');
INSERT INTO `provincia` VALUES ('178', 'RIOJA', '21', '2105', '1');
INSERT INTO `provincia` VALUES ('179', 'SAN MARTIN', '21', '2106', '1');
INSERT INTO `provincia` VALUES ('180', 'BELLAVISTA', '21', '2107', '1');
INSERT INTO `provincia` VALUES ('181', 'TOCACHE', '21', '2108', '1');
INSERT INTO `provincia` VALUES ('182', 'PICOTA', '21', '2109', '1');
INSERT INTO `provincia` VALUES ('183', 'EL DORADO', '21', '2110', '1');
INSERT INTO `provincia` VALUES ('184', 'TACNA', '22', '2201', '1');
INSERT INTO `provincia` VALUES ('185', 'TARATA', '22', '2202', '1');
INSERT INTO `provincia` VALUES ('186', 'JORGE BASADRE', '22', '2203', '1');
INSERT INTO `provincia` VALUES ('187', 'CANDARAVE', '22', '2204', '1');
INSERT INTO `provincia` VALUES ('188', 'TUMBES', '23', '2301', '1');
INSERT INTO `provincia` VALUES ('189', 'CONTRALMIRANTE VILLAR', '23', '2302', '1');
INSERT INTO `provincia` VALUES ('190', 'ZARUMILLA', '23', '2303', '1');
INSERT INTO `provincia` VALUES ('191', 'CALLAO', '24', '2401', '1');
INSERT INTO `provincia` VALUES ('192', 'CORONEL PORTILLO', '25', '2501', '1');
INSERT INTO `provincia` VALUES ('193', 'PADRE ABAD', '25', '2502', '1');
INSERT INTO `provincia` VALUES ('194', 'ATALAYA', '25', '2503', '1');
INSERT INTO `provincia` VALUES ('195', 'PURUS', '25', '2504', '1');

-- ----------------------------
-- Table structure for transaccion
-- ----------------------------
DROP TABLE IF EXISTS `transaccion`;
CREATE TABLE `transaccion` (
  `cTraCodigo` varchar(100) NOT NULL COMMENT 'Codigo de la transaccion que se va a realizar.',
  `nOpeCodigo` int(11) NOT NULL COMMENT 'Codigo de la operacion que se esta realizando',
  `cPerCodigo` varchar(20) NOT NULL COMMENT 'Codigo de la persona quien esta realizando una determinada transaccion.',
  `dTraFecha` datetime NOT NULL COMMENT 'Fecha en que se realiza una determinada transaccion.',
  `cComputer` varchar(250) NOT NULL COMMENT 'Descripcion del equipo que se esta utilizando',
  `cTraDescripcion` longtext NOT NULL COMMENT 'Descripcion de la transaccion que se esta realizando',
  PRIMARY KEY (`cTraCodigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='En esta tabla se registrara las transaciones que realiza un ';

-- ----------------------------
-- Records of transaccion
-- ----------------------------
INSERT INTO `transaccion` VALUES ('201407121737462568b1540a1511e493d92016d8d47c3d', '36', '1', '2014-07-12 17:37:46', '', 'Ingreso al Sistema');
INSERT INTO `transaccion` VALUES ('2014071623543371aa96490d6e11e486192016d8d47c3d', '36', '1', '2014-07-16 23:54:33', '', 'Ingreso al Sistema');
INSERT INTO `transaccion` VALUES ('20140716235444781ca1e10d6e11e486192016d8d47c3d', '36', '1', '2014-07-16 23:54:44', '', 'Ingreso al Sistema');
INSERT INTO `transaccion` VALUES ('20140716235444787626f30d6e11e486192016d8d47c3d', '36', '1', '2014-07-16 23:54:44', '', 'Ingreso al Sistema');
INSERT INTO `transaccion` VALUES ('20140716235607aa082cbf0d6e11e486192016d8d47c3d', '36', '1', '2014-07-16 23:56:07', '', 'Ingreso al Sistema');
INSERT INTO `transaccion` VALUES ('20140718002353b84c9ba00e3b11e4b4072016d8d47c3d', '36', '1', '2014-07-18 00:23:53', '', 'Ingreso al Sistema');
INSERT INTO `transaccion` VALUES ('20140719102605000b317f0f5911e4bb572016d8d47c3d', '36', '1', '2014-07-19 10:26:05', '', 'Ingreso al Sistema');
INSERT INTO `transaccion` VALUES ('20140719121307f3fe96280f6711e4bb572016d8d47c3d', '36', '1', '2014-07-19 12:13:07', '', 'Ingreso al Sistema');
INSERT INTO `transaccion` VALUES ('201407191257473138dd100f6e11e4bb572016d8d47c3d', '1', '1', '2014-07-19 12:57:47', '', 'NUEVO PERIODO: nParCodigo : 1 - nParClase : 2001 - cParDescripcion : CAMPAÑA 2014');
INSERT INTO `transaccion` VALUES ('201407191402012a3009130f7711e4bb572016d8d47c3d', '1', '1', '2014-07-19 14:02:01', '', 'NUEVO PERIODO: nParCodigo : 1 - nParClase : 2001 - cParDescripcion : CAMPAÑA 2014');
INSERT INTO `transaccion` VALUES ('2014071914024041e32dfd0f7711e4bb572016d8d47c3d', '1', '1', '2014-07-19 14:02:40', '', 'NUEVO PERIODO: nParCodigo : 2 - nParClase : 2001 - cParDescripcion : CAMPAÑA 2015');
INSERT INTO `transaccion` VALUES ('2014071914024544eacd860f7711e4bb572016d8d47c3d', '4', '1', '2014-07-19 14:02:45', '', 'CERRO Y/O APERTURO PERIODO: nParCodigo : 2 - nParClase : 2001 - cParDescripcion : ');
INSERT INTO `transaccion` VALUES ('201407191402574bd91a630f7711e4bb572016d8d47c3d', '4', '1', '2014-07-19 14:02:57', '', 'CERRO Y/O APERTURO PERIODO: nParCodigo : 1 - nParClase : 2001 - cParDescripcion : ');
INSERT INTO `transaccion` VALUES ('201407191403034f8d83b50f7711e4bb572016d8d47c3d', '4', '1', '2014-07-19 14:03:03', '', 'CERRO Y/O APERTURO PERIODO: nParCodigo : 1 - nParClase : 2001 - cParDescripcion : ');
INSERT INTO `transaccion` VALUES ('2014071914030751fb966a0f7711e4bb572016d8d47c3d', '4', '1', '2014-07-19 14:03:07', '', 'CERRO Y/O APERTURO PERIODO: nParCodigo : 2 - nParClase : 2001 - cParDescripcion : ');
INSERT INTO `transaccion` VALUES ('201407191403295ea523e60f7711e4bb572016d8d47c3d', '2', '1', '2014-07-19 14:03:29', '', 'ACTUALIZO PERIODO: nParCodigo : 2 - nParClase : 2001 - cParDescripcion : CAMPAÑA 2015');
INSERT INTO `transaccion` VALUES ('20140719140747f886370c0f7711e4bb572016d8d47c3d', '2', '1', '2014-07-19 14:07:47', '', 'ACTUALIZO PERIODO: nParCodigo : 1 - nParClase : 2001 - cParDescripcion : CAMPAÑA 2014');
INSERT INTO `transaccion` VALUES ('20140719140754fcdf93d40f7711e4bb572016d8d47c3d', '2', '1', '2014-07-19 14:07:54', '', 'ACTUALIZO PERIODO: nParCodigo : 1 - nParClase : 2001 - cParDescripcion : CAMPAÑA 2014');
INSERT INTO `transaccion` VALUES ('201407191409112aef23820f7811e4bb572016d8d47c3d', '3', '1', '2014-07-19 14:09:11', '', 'ELIMNO PERIODO: nParCodigo : 1 - nParClase : 2001 - cParDescripcion : ');
INSERT INTO `transaccion` VALUES ('201407201701376bff95c1105911e488102016d8d47c3d', '36', '1', '2014-07-20 17:01:37', '', 'Ingreso al Sistema');

-- ----------------------------
-- Procedure structure for usp_Buscar_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Buscar_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Buscar_Parametro`(nParCodigo int (11), nParClase int(11))
BEGIN

		SELECT parametro.nParCodigo,
				parametro.cParNombre,
				parametro.cParDescripcion
		FROM parametro
		WHERE parametro.nParEstado = 1
		AND parametro.nParClase = nParClase
		AND parametro.nParCodigo = nParCodigo;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Buscar_Persona_By_cPerCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Buscar_Persona_By_cPerCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Buscar_Persona_By_cPerCodigo`(cPerCodigo varchar(20))
BEGIN

	SELECT persona.cPerCodigo, persona.cPerNombre, persona.cPerApellidos
	FROM persona
	WHERE persona.cPerCodigo=cPerCodigo;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Buscar_Persona_By_cPerDocNumero
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Buscar_Persona_By_cPerDocNumero`;
DELIMITER ;;
CREATE PROCEDURE `usp_Buscar_Persona_By_cPerDocNumero`(nPerTipo int(11), nPerDocTipo int(11), cPerDocNumero varchar(20))
BEGIN
	#Routine body goes here...
	SELECT persona.cPerCodigo, persona.cPerNombre, persona.cPerApellidos,
				perdocumento.nPerDocTipo, perdocumento.cPerDocNumero
	FROM persona
	INNER JOIN perdocumento ON persona.cPerCodigo=perdocumento.cPerCodigo
	WHERE persona.nPerEstado=1
	AND perdocumento.nPerDocEstado=1
	AND	( (nPerTipo	=	0  ) 				OR 	(persona.nPerTipo = nPerTipo) )
	AND	( (nPerDocTipo	=	0  ) 		OR 	(perdocumento.nPerDocTipo = nPerDocTipo) )
	AND	( (cPerDocNumero	=	"-")	OR	(perdocumento.cPerDocNumero LIKE CONCAT(cPerDocNumero,"%")) );
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Elm_Persona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Elm_Persona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Elm_Persona`(cPerCodigo varchar(100))
BEGIN
	UPDATE persona
	SET nPerEstado=0
	WHERE persona.cPerCodigo=cPerCodigo;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Filtrar_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Filtrar_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Filtrar_Parametro`(nOriReg Int(4), nCanReg Int(4), nPagRegistro Int(4) , nParClase int(11) , cParNombre varchar(100), cParDescripcion varchar(500))
BEGIN

	IF  (nPagRegistro = 1 ) THEN
		SET @sentencia = CONCAT('SELECT parametro.nParCodigo,
							parametro.cParNombre,
							IFNULL(parametro.cParDescripcion,"") cParDescripcion
					FROM parametro
					WHERE parametro.nParClase="',nParClase,'"
					AND parametro.nParEstado = 1
					AND( ( "',cParNombre ,'" 				= "-" )	OR ( parametro.cParNombre like "',cParNombre ,'%") )
					AND( ( "',cParDescripcion ,'" 	= "-" ) OR ( parametro.cParDescripcion like "',cParDescripcion ,'%") )
					ORDER BY parametro.cParDescripcion ASC
					LIMIT  ',nOriReg,',',nCanReg,' ; ');
					prepare consulta FROM @sentencia;
					execute consulta;
	ELSE
		SELECT parametro.nParCodigo,
				parametro.cParNombre,
				IFNULL(parametro.cParDescripcion,"") cParDescripcion
		FROM parametro
		WHERE parametro.nParClase = nParClase
		AND parametro.nParEstado = 1
		AND ( ( cParNombre 			= "-" ) OR ( parametro.cParNombre 			LIKE CONCAT(cParNombre,'%') ) )
		AND	( ( cParDescripcion = "-" ) OR ( parametro.cParDescripcion 	LIKE CONCAT(cParDescripcion,'%') ) )
		ORDER BY parametro.cParDescripcion ASC ;
	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_get_DocPersona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_get_DocPersona`;
DELIMITER ;;
CREATE PROCEDURE `usp_get_DocPersona`(cDocCodigo varchar(20), cPerCodigo varchar(20), nDocTipo int(4), nDocPerTipo int(4), nPerRelacion int(4))
BEGIN
	#Routine body goes here...
	SELECT	docpersona.cDocCodigo, docpersona.cPerCodigo
	FROM 	docpersona
	WHERE docpersona.cDocCodigo		=	cDocCodigo
	AND		docpersona.cPerCodigo		=	cPerCodigo
	AND		docpersona.nDocTipo			=	nDocTipo
	AND		docpersona.nDocPerTipo	=	nDocPerTipo
	AND		docpersona.nPerRelacion	=	nPerRelacion;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Parametro_By_cParClase
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Parametro_By_cParClase`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Parametro_By_cParClase`(nParClase int(11))
BEGIN
		SELECT parametro.nParCodigo,
				parametro.cParNombre,
				parametro.cParDescripcion
		FROM parametro
		WHERE parametro.nParEstado = 1
		AND parametro.nParClase = nParClase
		ORDER BY 	parametro.cParDescripcion ,
		parametro.cParNombre  ASC;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Parametro_By_Todos
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Parametro_By_Todos`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Parametro_By_Todos`(nParCodigo int(4), nParClase Int(4), cParJerarquia nVarChar(20), cParNombre nVarChar(100), cParDescripcion nVarChar(500), nParEstado Int(3))
BEGIN

	SELECT parametro.nParCodigo,
		parametro.nParClase,
		parametro.cParJerarquia,
		parametro.cParNombre,
		parametro.cParDescripcion,
		(length(parametro.cParJerarquia)) as CanJerarquia
	From parametro
	WHERE (( nParCodigo = 0) OR (parametro.nParCodigo = nParCodigo ))
	AND (( nParClase = 0) OR (parametro.nParClase = nParClase ))
	AND (( cParJerarquia = '-' ) OR (parametro.cParJerarquia = cParJerarquia ))
	AND (( cParNombre = '-' ) OR (parametro.cParNombre = cParNombre ))
	AND (( cParDescripcion = '-' ) OR (parametro.cParDescripcion = cParDescripcion ))
	AND (( nParEstado = 0) OR (parametro.nParEstado = nParEstado ))
	ORDER BY parametro.cParJerarquia;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Parametro_Head_nParClase
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Parametro_Head_nParClase`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Parametro_Head_nParClase`(nParClase INT(4))
BEGIN
		SELECT parametro.cParJerarquia ,
			parametro.cParNombre ,
			parametro.cParDescripcion FROM parametro
		WHERE parametro.nParClase =  nParClase
		AND parametro.nParEstado = 0
		AND parametro.nParCodigo = 0  ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Parametro_Padre_nParClase
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Parametro_Padre_nParClase`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Parametro_Padre_nParClase`(nParClase INT(4))
BEGIN
		SELECT
			parametro.cParJerarquia ,
			parametro.cParNombre ,
			parametro.cParDescripcion FROM parametro
		WHERE parametro.nParClase =  nParClase
		AND parametro.nParEstado = 0
		AND parametro.nParCodigo = 0  ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Periodo_By_nPrdCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Periodo_By_nPrdCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Periodo_By_nPrdCodigo`(nPrdCodigo Int(4))
BEGIN

	SELECT periodo.nPrdCodigo,
		periodo.cPrdDescripcion,
		periodo.nPrdTipo ,
		periodo.dPrdFecInic,
		periodo.dPrdFecFin,
		periodo.nPrdEstado
	FROM periodo
	WHERE periodo.nPrdCodigo		  = nPrdCodigo;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Permisos_Botonera_By_Usuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Permisos_Botonera_By_Usuario`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Permisos_Botonera_By_Usuario`(nPerTipo int(4), nPerEstado int(4), nPerUsuEstado Int(4), nPerUsuAccEstado Int(4), nParClase Int(4),cPerCodigo  varchar(20), nPerUsuAccGrupo Int(4), nParTipo Int(4), nParSrcClase Int(4), nParSrcCodigo Int(4))
BEGIN
	SELECT persona.cPerCodigo,
		persona.cPerNombre,
		persona.nPerTipo,
		perusuacceso.nPerUsuAccGrupo,
    perusuacceso.nPerUsuAccCodigo,
		perusuacceso.nPerUsuAccEstado,
		parametro.cParJerarquia,
		parametro.cParNombre,
    parametro.cParDescripcion,
		(length(parametro.cParJerarquia)) as CanJerarquia,
		parparametro.cValor
	FROM persona
  INNER JOIN perusuario  	ON persona.cPerCodigo    = perusuario.cPerCodigo
  INNER JOIN perusuacceso ON perusuario.cPerCodigo = perusuacceso.cPerCodigo
  INNER JOIN parametro    ON parametro.nParCodigo  = perusuacceso.nPerUsuAccCodigo AND parametro.nParClase = perusuacceso.nPerUsuAccObjCodigo
	INNER JOIN parparametro	ON parparametro.nParDstClase = parametro.nParClase AND parparametro.nParDstCodigo = parametro.nParCodigo
	WHERE persona.nPerTipo             = nPerTipo
  AND persona.nPerEstado             <> nPerEstado
  AND perusuario.nPerUsuEstado       <> nPerUsuEstado
  AND perusuacceso.nPerUsuAccEstado  <>	nPerUsuAccEstado
  AND parametro.nParClase            = nParClase
  AND persona.cPerCodigo             = cPerCodigo
	AND perusuacceso.nPerUsuAccGrupo	 = nPerUsuAccGrupo
	AND parametro.nParEstado			   		 = nParTipo
	AND parparametro.nParSrcClase			 = nParSrcClase
	AND parparametro.nParSrcCodigo		 = nParSrcCodigo
	ORDER BY parametro.cParJerarquia;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Permisos_By_Usuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Permisos_By_Usuario`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Permisos_By_Usuario`(nPerTipo int(4), nPerEstado int(4), nPerUsuEstado Int(4), nPerUsuAccEstado Int(4), nParClase Int(4), cPerCodigo  varchar(20), nPerUsuAccGrupo Int(4))
BEGIN
	SELECT persona.cPerCodigo,
		persona.cPerNombre,
		persona.nPerTipo,
		perusuacceso.nPerUsuAccGrupo,
    perusuacceso.nPerUsuAccCodigo,
		perusuacceso.nPerUsuAccEstado,
		parametro.cParJerarquia,
		parametro.cParNombre,
		-- CONCAT(UPPER(LEFT(parametro.cParDescripcion,1)),lower(SUBSTR(parametro.cParDescripcion,2))) AS NombreMenu,
		parametro.cParDescripcion AS NombreMenu,
		(length(parametro.cParJerarquia)) as CanJerarquia
	FROM persona
  INNER JOIN perusuario   ON persona.cPerCodigo    = perusuario.cPerCodigo
  INNER JOIN perusuacceso ON perusuario.cPerCodigo = perusuacceso.cPerCodigo
  INNER JOIN parametro    ON parametro.nParCodigo  = perusuacceso.nPerUsuAccCodigo AND parametro.nParClase = perusuacceso.nPerUsuAccObjCodigo
	WHERE persona.nPerTipo            = nPerTipo
  AND persona.nPerEstado            <> nPerEstado
  AND perusuario.nPerUsuEstado      <> nPerUsuEstado
  AND perusuacceso.nPerUsuAccEstado <> nPerUsuAccEstado
  AND parametro.nParClase           = nParClase
  AND persona.cPerCodigo            = cPerCodigo
	AND perusuacceso.nPerUsuAccGrupo	= nPerUsuAccGrupo
	ORDER BY parametro.cParJerarquia;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Permiso_By_Acceso_Grupo_Persona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Permiso_By_Acceso_Grupo_Persona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Permiso_By_Acceso_Grupo_Persona`(nParCodigo int(4), nParClase Int(4), cPerCodigo  varchar(20), nPerUsuAccEstado Int(4))
BEGIN
	SELECT  perusuacceso.nPerUsuAccCodigo   ,
       		perusuacceso.cPerCodigo         ,
        	perusuacceso.nPerUsuAccGrupo    ,
        	perusuacceso.nPerUsuAccPrdCodigo,
        	perusuacceso.nPerUsuAccEstado
	FROM    perusuacceso
	WHERE   perusuacceso.nPerUsuAccEstado = nPerUsuAccEstado
  AND perusuacceso.cPerCodigo        = cPerCodigo
  AND perusuacceso.nPerUsuAccGrupo   = nParClase
  AND perusuacceso.nPerUsuAccCodigo  = nParCodigo;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Persona_By_Apellidos
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Persona_By_Apellidos`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Persona_By_Apellidos`(cPerNatApellido varchar(250))
BEGIN
	SELECT 	persona.cPerCodigo,
			CONCAT(persona.cPerNombre, ' ' ,persona.cPerApellidos) Nombre,
			IFNULL(perdocumento.cPerDocNumero,"-") cPerDocNumero,
			RIGHT(persona.cPerCodigo,5)
	FROM	persona
	INNER JOIN pernatural 	ON persona.cPerCodigo = pernatural.cPerCodigo
	LEFT JOIN perdocumento 	ON persona.cPerCodigo = perdocumento.cPerCodigo
	WHERE   persona.nPerTipo        = 1
  AND persona.nPerEstado          <> 0
	AND perdocumento.nPerDocTipo 		<>6
	AND perdocumento.nPerDocEstado	= 1
	HAVING Nombre LIKE CONCAT(cPerNatApellido ,'%')
	limit 0,8;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Persona_By_cParCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Persona_By_cParCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Persona_By_cParCodigo`(cPerCodigo varchar(20))
BEGIN

	SELECT persona.cPerCodigo, persona.cPerNombre, persona.cPerApellidos
	FROM persona
	WHERE persona.cPerCodigo=cPerCodigo;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Persona_By_cPerDocNumero
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Persona_By_cPerDocNumero`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Persona_By_cPerDocNumero`(cPerDocNumero varchar(250), nPerDocTipo Int(4), cPerCodigo varchar(20))
BEGIN
	SELECT CONCAT(persona.cPerApellidos,' ', persona.cPerNombre),  perdocumento.cPerDocNumero, parametro.cParDescripcion
	FROM perdocumento
		INNER JOIN persona 		ON persona.cPerCodigo = perdocumento.cPerCodigo
		INNER JOIN parametro 		ON perdocumento.nPerDocTipo = parametro.nParCodigo AND parametro.nParClase = 1001
	WHERE perdocumento.cPerDocNumero=cPerDocNumero
		AND perdocumento.nPerDocTipo = nPerDocTipo
		AND persona.nPerEstado = 1
		AND ((cPerCodigo ='-') OR (persona.cPerCodigo <> cPerCodigo ));
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Persona_By_nPerRelTipo_cPerDocNumero
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Persona_By_nPerRelTipo_cPerDocNumero`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Persona_By_nPerRelTipo_cPerDocNumero`(nPerRelTipo int(11), cPerDocNumero varchar(100))
BEGIN
	IF  (nPerRelTipo = 1 ) THEN
		SET @sentencia=CONCAT('SELECT	persona.cPerCodigo,
																	persona.cPerNombre,
																	"-",
																	rubro.cParDescripcion,
																	CONCAT(contacto.cPerNombre, " ", contacto.cPerApellidos) AS cPerApellidos
													FROM persona
													INNER JOIN perjuridica ON persona.cPerCodigo=perjuridica.cPerCodigo
													INNER JOIN perdocumento ON persona.cPerCodigo=perdocumento.cPerCodigo
													INNER JOIN parametro AS rubro ON rubro.nParCodigo=perjuridica.nPerJurRubro AND rubro.nParClase=1006
													INNER JOIN perrelacion ON perrelacion.cPerJuridica=perjuridica.cPerCodigo
													INNER JOIN persona	AS contacto ON contacto.cPerCodigo=perrelacion.cPerCodigo AND perrelacion.nPerRelTipo=2018
													WHERE perdocumento.cPerDocNumero=',cPerDocNumero,'
													AND persona.nPerTipo = 2
													AND persona.nPerEstado = 1
													AND perdocumento.nPerDocTipo=7
													AND perrelacion.nPerRelEstado=1');
					prepare consulta FROM @sentencia;
					execute consulta;
	ELSE
		SELECT	persona.cPerCodigo,
						persona.cPerNombre,
						pernatural.cPerNatApePaterno,
						pernatural.cPerNatApeMaterno,
						'0',
						perdocumento.nPerDocTipo
		FROM persona
		INNER JOIN pernatural ON persona.cPerCodigo=pernatural.cPerCodigo
		INNER JOIN perdocumento ON persona.cPerCodigo=perdocumento.cPerCodigo
		WHERE perdocumento.cPerDocNumero = cPerDocNumero
		AND persona.nPerTipo = 1
		AND persona.nPerEstado = 1
		AND perdocumento.nPerDocTipo=2;
	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Persona_GenerarCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Persona_GenerarCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Persona_GenerarCodigo`()
BEGIN


  SELECT 	IFNULL( MAX(persona.cPerCodigo)+1 , '1000001' )
	FROM		persona;

/*

	#Routine body goes here...
	DECLARE cPerCodigo VARCHAR(20);

  SELECT 	IFNULL( MAX(RIGHT(persona.cPerCodigo,6))+1 , '100001' ) INTO cPerCodigo
	FROM		persona;

	SELECT CONCAT('100000',cPerCodigo);

  SELECT 	IFNULL( MAX(persona.cPerCodigo)+1 , '1000001' )
	FROM		persona;

*/
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_seleccionar_personas
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_seleccionar_personas`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_seleccionar_personas`(nOriReg Int(4), nCanReg Int(4), nPagRegistro Int(4), cPerApellidos varchar(500), cPerNombre varchar(500), cPerDocNumero varchar(500))
BEGIN
	IF  (nPagRegistro = 1 ) THEN

		SET @sentencia = CONCAT('SELECT persona.cPerCodigo,
				persona.cPerNombre,
				persona.cPerApellidos,
				IFNULL(perdocumento.cPerDocNumero,"-") cPerDocNumero,
				IFNULL(pernatural.nPerNatEstCivil,"-")nPerNatEstCivil,
				IFNULL(perdireccion.cPerDirDescripcion,"-") cPerDirDescripcion,
				RIGHT(persona.cPerCodigo,5)
		FROM	pernatural
		Inner Join persona ON persona.cPerCodigo = pernatural.cPerCodigo
		Left Join perdocumento ON persona.cPerCodigo = perdocumento.cPerCodigo AND perdocumento.nPerDocTipo=2
		Left Join perdireccion ON persona.cPerCodigo = perdireccion.cPerCodigo
		WHERE   persona.nPerTipo     = 1
AND persona.nPerEstado=1
		AND( ("',cPerNombre,'" ="-"  ) OR (persona.cPerNombre like "',cPerNombre,'%") )
		AND( ("',cPerApellidos,'" ="-"  ) OR (persona.cPerApellidos like "',cPerApellidos,'%") )
		AND( ("',cPerDocNumero,'" ="-"  ) OR (perdocumento.cPerDocNumero like"',cPerDocNumero,'%") )
		ORDER BY persona.cPerApellidos, persona.cPerNombre DESC
		LIMIT  ',nOriReg,',',nCanReg);
		prepare consulta FROM @sentencia;
		execute consulta;
	ELSE
		SELECT 	persona.cPerCodigo,
				persona.cPerNombre,
				persona.cPerApellidos,
				IFNULL(perdocumento.cPerDocNumero, '-') cPerDocNumero,
				IFNULL(pernatural.nPerNatEstCivil, '-')nPerNatEstCivil,
				IFNULL(perdireccion.cPerDirDescripcion, '-') cPerDirDescripcion,
				RIGHT(persona.cPerCodigo,5)
		FROM	pernatural
		Inner Join persona 		 ON persona.cPerCodigo = pernatural.cPerCodigo
		Left Join perdocumento ON persona.cPerCodigo = perdocumento.cPerCodigo AND perdocumento.nPerDocTipo=2
		Left Join perdireccion ON persona.cPerCodigo = perdireccion.cPerCodigo
		WHERE persona.nPerTipo = 1
AND persona.nPerEstado=1
		AND( (cPerNombre ='-') 		OR ( persona.cPerNombre like CONCAT(cPerNombre,'%')) )
		AND( (cPerApellidos ='-') OR ( persona.cPerApellidos like CONCAT(cPerApellidos,'%') ) )
		AND( (cPerDocNumero ='-') OR ( perdocumento.cPerDocNumero like CONCAT(cPerDocNumero,'%')) )
		ORDER BY persona.cPerApellidos, persona.cPerNombre DESC;

	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Sel_Periodos
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Sel_Periodos`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Sel_Periodos`(nOriReg Int(4), nCanReg Int(4), nPagRegistro Int(4),  cPrdDescripcion varchar(100))
BEGIN

	IF  (nPagRegistro = 1 ) THEN

		SET @sentencia = CONCAT('SELECT periodo.nPrdCodigo,
					 periodo.cPrdDescripcion,
					DATE_FORMAT(periodo.dPrdFecInic ,"%d/%m/%Y") AS dPrdFecInic,
					DATE_FORMAT(periodo.dPrdFecFin ,"%d/%m/%Y") AS dPrdFecFin ,
					periodo.nPrdEstado
				FROM periodo
				WHERE periodo.nPrdEstado 		IN( 1, 2)
				AND( ("',cPrdDescripcion ,'" ="-"  ) OR (  periodo.cPrdDescripcion like "',cPrdDescripcion ,'%") )
				ORDER BY DATE_FORMAT(periodo.dPrdFecInic ,"%d/%m/%Y") DESC , DATE_FORMAT(periodo.dPrdFecFin ,"%d/%m/%Y")  DESC
				LIMIT ',nOriReg,',',nCanReg);
		prepare consulta FROM @sentencia;
		execute consulta;

	ELSE

		SELECT periodo.nPrdCodigo,
			 periodo.cPrdDescripcion,
			 DATE_FORMAT(periodo.dPrdFecInic ,'%d/%m/%Y') AS dPrdFecInic,
			 DATE_FORMAT(periodo.dPrdFecFin ,'%d/%m/%Y') AS dPrdFecFin ,
			periodo.nPrdEstado

		FROM periodo
		WHERE periodo.nPrdEstado 		IN( 1, 2)
		AND( (cPrdDescripcion ='-') 		OR ( periodo.cPrdDescripcion like concat(cPrdDescripcion,'%')) )
		ORDER BY DATE_FORMAT(periodo.dPrdFecInic ,"%d/%m/%Y") DESC , DATE_FORMAT(periodo.dPrdFecFin ,"%d/%m/%Y")  DESC;

	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Sel_Sectores
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Sel_Sectores`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Sel_Sectores`(nOriReg Int(4), nCanReg Int(4), nPagRegistro Int(4),  cParDescSector varchar(100))
BEGIN


	IF  (nPagRegistro = 1 ) THEN

		SET @sentencia = CONCAT('
			SELECT
			departamento.nDepCodigo ,
			departamento.cDepDescripcion,
			provincia.nProCodigo ,
			provincia.cProDescripcion ,
			distrito.nDisCodigo ,
			distrito.cDisDescripcion ,
			p_sector.nParCodigo ,
			p_sector.cParDescripcion
		FROM departamento
		INNER JOIN provincia ON provincia.nDepCodigo = departamento.nDepCodigo
		INNER JOIN distrito ON distrito.nProCodigo = provincia.nProCodigo
		INNER JOIN parametro AS p_sector ON p_sector.nParCodigo = distrito.nDisCodigo
																		 AND p_sector.nParClase = 2002
					WHERE p_sector.nParEstado = 1
				AND( ("',cParDescSector  ,'" ="-"  ) OR (  p_sector.cParDescripcion like "',cParDescSector  ,'%") )
				ORDER BY departamento.cDepDescripcion, provincia.cProDescripcion ,distrito.cDisDescripcion ASC
				LIMIT ',nOriReg,',',nCanReg);
		prepare consulta FROM @sentencia;
		execute consulta;

	ELSE

		SELECT
			departamento.nDepCodigo ,
			departamento.cDepDescripcion,
			provincia.nProCodigo ,
			provincia.cProDescripcion ,
			distrito.nDisCodigo ,
			distrito.cDisDescripcion ,
			p_sector.nParCodigo ,
			p_sector.cParDescripcion
		FROM departamento
		INNER JOIN provincia ON provincia.nDepCodigo = departamento.nDepCodigo
		INNER JOIN distrito ON distrito.nProCodigo = provincia.nProCodigo
		INNER JOIN parametro AS p_sector ON p_sector.nParCodigo = distrito.nDisCodigo
																		 AND p_sector.nParClase = 2002
		WHERE p_sector.nParEstado = 1
		AND ((cParDescSector = "-") OR ( 	p_sector.cParDescripcion LIKE CONCAT(cParDescSector,"%") ))
		ORDER BY departamento.cDepDescripcion, provincia.cProDescripcion ,distrito.cDisDescripcion ASC
		;

	END IF;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_SubPermisos_By_Usuario_Jerarquia
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_SubPermisos_By_Usuario_Jerarquia`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_SubPermisos_By_Usuario_Jerarquia`(nPerTipo int(4), nPerEstado int(4), nPerUsuEstado Int(4), nPerUsuAccEstado Int(4), nParClase Int(4), cPerCodigo  varchar(20), nCanJerarquia Int(4), cJerarquia nVarChar(50), nPerUsuAccGrupo Int(4), nParJerarquia Int(4))
BEGIN
	SELECT
		persona.cPerCodigo,
		persona.cPerNombre,
		persona.nPerTipo,
		perusuacceso.nPerUsuAccGrupo,
    perusuacceso.nPerUsuAccCodigo,
		perusuacceso.nPerUsuAccEstado,
		parametro.cParJerarquia,
		parametro.cParNombre ,
    Concat(left(parametro.cParDescripcion,1),lower(right(parametro.cParDescripcion,(length(parametro.cParDescripcion)-1)))) AS NombreMenu,
		(length(parametro.cParJerarquia)) as CanJerarquia
	FROM persona
  INNER JOIN perusuario   ON persona.cPerCodigo    = perusuario.cPerCodigo
  INNER JOIN perusuacceso ON perusuario.cPerCodigo = perusuacceso.cPerCodigo
  INNER JOIN parametro    ON parametro.nParCodigo  = perusuacceso.nPerUsuAccCodigo AND  parametro.nParClase = perusuacceso.nPerUsuAccObjCodigo
	WHERE   persona.nPerTipo           = nPerTipo
  AND persona.nPerEstado             <> nPerEstado
  AND perusuario.nPerUsuEstado       <> nPerUsuEstado
  AND perusuacceso.nPerUsuAccEstado  <> nPerUsuAccEstado
  AND parametro.nParClase            = nParClase
  AND persona.cPerCodigo             = cPerCodigo
	AND LENGTH(parametro.cParJerarquia)= (nCanJerarquia+2)
	AND LEFT(parametro.cParJerarquia,nParJerarquia)= cJerarquia
	AND perusuacceso.nPerUsuAccGrupo	 = nPerUsuAccGrupo
	ORDER BY parametro.cParJerarquia ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Usuario_By_Clave_UserName
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Usuario_By_Clave_UserName`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Usuario_By_Clave_UserName`(cUserName varchar(50),cUserClave varchar(50))
BEGIN
	SELECT  perusuario.cPerCodigo,
		 persona.cPerNombre,
		 persona.cPerApellidos
	FROM    perusuario
	Inner Join persona ON persona.cPerCodigo = perusuario.cPerCodigo
	WHERE   perusuario.cPerUsuCodigo  =cUserName
  AND perusuario.cPerUsuClave   = cUserClave
  AND perusuario.nPerUsuEstado  <> 0;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Ins_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Ins_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Ins_Parametro`(nParCodigo int(11), nParClase int(11) ,cParNombre varchar(1000), cParDescripcion varchar(1000))
BEGIN

	DECLARE cParJerarquia VARCHAR(20);

-- Generar jerarquia para el parametro


	SELECT 	IFNULL( MAX(parametro.cParJerarquia)+1 , 1001 ) INTO cParJerarquia
	FROM 		parametro
	WHERE 	parametro.nParClase=nParClase AND parametro.nParCodigo <> 0 ;

		INSERT INTO parametro (parametro.nParCodigo,
												 parametro.nParClase,
												 parametro.cParJerarquia,
												 parametro.cParNombre,
												 parametro.cParDescripcion,
												 parametro.nParEstado)
  VALUES(nParCodigo, nParClase, cParJerarquia, cParNombre, cParDescripcion,	1);

	SELECT nParCodigo, cParJerarquia;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Ins_Transaccion
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Ins_Transaccion`;
DELIMITER ;;
CREATE PROCEDURE `usp_Ins_Transaccion`(nOpeCodigo int(11), cPerCodigo  varchar(20), cComputer varchar(250), cTraDescripcion varchar(250))
BEGIN

	insert into transaccion
		(cTraCodigo, nOpeCodigo, cPerCodigo, dTraFecha, cComputer, cTraDescripcion)
	values
		(CONCAT( CAST(replace(replace(replace(now(),'-',''),' ',''),':','') AS CHAR), LEFT(CAST(  REPLACE(UUID(),'-','') AS CHAR),36)),
		  nOpeCodigo,
		  cPerCodigo,
		  now(),
		  cComputer,
		  cTraDescripcion );

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_All_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_All_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_All_Parametro`(nParCodigo int(11), nParClase int(11) ,cParNombre varchar(100), cParDescripcion varchar(500))
BEGIN

	DECLARE cParJerarquia VARCHAR(20);

-- Generar jerarquia para el parametro
  SELECT 	IFNULL( MAX(parametro.cParJerarquia)+1 , 1001 ) INTO cParJerarquia
	FROM 		parametro
	WHERE 	parametro.nParClase=nParClase AND parametro.nParCodigo <> 0 ;

		INSERT INTO parametro (parametro.nParCodigo,
												 parametro.nParClase,
												 parametro.cParJerarquia,
												 parametro.cParNombre,
												 parametro.cParDescripcion,
												 parametro.nParEstado)
  VALUES(nParCodigo, nParClase, cParJerarquia, cParNombre, cParDescripcion,	1);

	SELECT nParCodigo, cParJerarquia;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_All_Persona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_All_Persona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_All_Persona`(cPerCodigo varchar(20), cPerNombre varchar(500), cPerApellidos varchar(500), dPerNacimiento varchar(20), nPerTipo int(3), nPerEstado int(3))
BEGIN
	/*registrar persona*/
	INSERT INTO persona(persona.cPerCodigo,
											persona.cPerNombre,
											persona.cPerApellidos,
											persona.dPerNacimiento,
											persona.nPerTipo,
											persona.nPerEstado)
	VALUES (cPerCodigo,
					cPerNombre,
					cPerApellidos,
					dPerNacimiento,
					nPerTipo,
					nPerEstado);

	SELECT cPerCodigo;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_DocPersona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_DocPersona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_DocPersona`(cDocCodigo varchar(20), nDocPerTipo int(11), cPerCodigo varchar(20), nPerRelacion int(11),  nDocTipo int(11))
BEGIN

	INSERT INTO docpersona(docpersona.cDocCodigo,
												 docpersona.nDocPerTipo,
												 docpersona.cPerCodigo,
												 docpersona.nPerRelacion,
												 docpersona.nDocTipo)
	VALUES(cDocCodigo,
				 nDocPerTipo,
				 cPerCodigo,
				 nPerRelacion,
				 nDocTipo);

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_Parametro`(nParClase int(11) ,cParNombre varchar(100), cParDescripcion varchar(500))
BEGIN
  DECLARE nParCodigo INT;
	DECLARE cParJerarquia VARCHAR(20);
-- Generar codigo para el parametro
  SELECT 	IFNULL( MAX(parametro.nParCodigo)+1 , 1 ) INTO nParCodigo
	FROM		parametro
	WHERE		parametro.nParClase = nParClase;
-- Generar jerarquia para el parametro
  -- SELECT 	LPAD(IFNULL( MAX(parametro.cParJerarquia)+1 , 1001 ),4,'0') INTO cParJerarquia
	SELECT 	IFNULL( MAX(parametro.cParJerarquia)+1 , 1001 ) INTO cParJerarquia
	FROM 		parametro
	WHERE 	parametro.nParClase=nParClase AND parametro.nParCodigo <> 0 ;

		INSERT INTO parametro (parametro.nParCodigo,
												 parametro.nParClase,
												 parametro.cParJerarquia,
												 parametro.cParNombre,
												 parametro.cParDescripcion,
												 parametro.nParEstado)
  VALUES(nParCodigo, nParClase, cParJerarquia, cParNombre, cParDescripcion,	1);

	SELECT nParCodigo, cParJerarquia;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_Periodo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_Periodo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_Periodo`(cPrdDescripcion VARCHAR(250), dPrdFecInic DATE , dPrdFecFin DATE , nPrdTipo INT(4) ,  nPrdEstado INT(4))
BEGIN

	-- SELECT MAX(CAST((nPrdCodigo) AS SIGNED))+1
SELECT ( IFNULL(MAX(CAST((nPrdCodigo) AS SIGNED)),0)+1 ) INTO @pnPeriodo
	FROM periodo ;

	INSERT INTO periodo
	(
		periodo.nPrdCodigo,
		periodo.cPrdDescripcion,
		periodo.dPrdFecInic,
		periodo.dPrdFecFin,
		periodo.nPrdTipo,
		periodo.nPrdEstado
	)
	VALUES
	(
		@pnPeriodo,
		cPrdDescripcion,
		dPrdFecInic,
		dPrdFecFin,
		nPrdTipo ,
		nPrdEstado
	);

		SELECT  @pnPeriodo AS nPrdCodigo ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_Persona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_Persona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_Persona`(cPerNombre varchar(500), cPerApellidos varchar(500), dPerNacimiento varchar(20), nPerTipo int(3), nPerEstado int(3))
BEGIN
	# declarar variable
		DECLARE cPerCodigo_ VARCHAR(20);
/*
	# capturar codigo mayor
		SELECT 	IFNULL( MAX(RIGHT(persona.cPerCodigo,7))+1 , '1000001' ) INTO cPerCodigo_
		FROM		persona
		WHERE		LENGTH(persona.cPerCodigo)=14;
	# concatenar codigo
		SET cPerCodigo_ = CONCAT('1000000',cPerCodigo_);
*/

  SELECT 	IFNULL( MAX(persona.cPerCodigo)+1 , '1000001' )   INTO cPerCodigo_
	FROM		persona
	WHERE		LENGTH(persona.cPerCodigo) > 6;


	INSERT INTO persona(persona.cPerCodigo,
											persona.cPerNombre,
											persona.cPerApellidos,
											persona.dPerNacimiento,
											persona.nPerTipo,
											persona.nPerEstado)
	VALUES (cPerCodigo_,
					cPerNombre,
					cPerApellidos,
					dPerNacimiento,
					nPerTipo,
					nPerEstado);
	# seleccionar codigo
		SELECT cPerCodigo_ AS cPerCodigo;



END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_Transaccion
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_Transaccion`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_Transaccion`(nOpeCodigo int(11), cPerCodigo  varchar(20), cComputer varchar(250), cTraDescripcion varchar(250))
BEGIN

	insert into transaccion
		(cTraCodigo, nOpeCodigo, cPerCodigo, dTraFecha, cComputer, cTraDescripcion)
	values
		(CONCAT( CAST(replace(replace(replace(now(),'-',''),' ',''),':','') AS CHAR), LEFT(CAST(  REPLACE(UUID(),'-','') AS CHAR),36)),
		  nOpeCodigo,
		  cPerCodigo,
		  now(),
		  cComputer,
		  cTraDescripcion );

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_ubg_Get_Departamentos_by_nPaiCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_ubg_Get_Departamentos_by_nPaiCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_ubg_Get_Departamentos_by_nPaiCodigo`(nPaiCodigo INT(11))
BEGIN
	SELECT
		departamento.nDepCodigo,
		departamento.cDepDescripcion
	FROM departamento
	WHERE departamento.nDepEstado = 1
	AND departamento.nPaiCodigo = nPaiCodigo
	ORDER BY departamento.cDepDescripcion ASC ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_ubg_Get_Distritos_by_nProCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_ubg_Get_Distritos_by_nProCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_ubg_Get_Distritos_by_nProCodigo`(nProCodigo INT(11))
BEGIN
	SELECT
		distrito.nDisCodigo ,
		distrito.cDisDescripcion
	FROM distrito
	WHERE distrito.nProCodigo = nProCodigo
	AND distrito.nDisEstado = 1
	ORDER BY distrito.cDisDescripcion ASC
	;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_ubg_Get_Provincias_by_nDepCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_ubg_Get_Provincias_by_nDepCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_ubg_Get_Provincias_by_nDepCodigo`(nDepCodigo INT(11))
BEGIN
	SELECT
		provincia.nProCodigo ,
		provincia.cProDescripcion
	FROM provincia
	WHERE provincia.nDepCodigo = nDepCodigo
	AND provincia.nProEstado = 1
	ORDER BY provincia.cProDescripcion  ASC
;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_Parametro`(nParCodigo int(11), nParClase  int(11) , cParNombre varchar(100), cParDescripcion varchar(255))
BEGIN

		UPDATE parametro
			SET parametro.cParNombre = cParNombre,
					parametro.cParDescripcion = cParDescripcion
		WHERE parametro.nParCodigo = nParCodigo
		AND parametro.nParClase = nParClase
		AND parametro.nParEstado = 1;

	SELECT  nParCodigo  ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_Parametro_Estado
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_Parametro_Estado`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_Parametro_Estado`(nParCodigo int(11), nParClase int(11) ,   nParEstado int(3))
BEGIN
  UPDATE parametro SET
				parametro.nParClase = nParEstado
	WHERE parametro.nParCodigo = nParCodigo
	AND parametro.nParClase = nParClase ;

SELECT nParCodigo  ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_Periodo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_Periodo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_Periodo`(nPrdCodigo INT(11) , cPrdDescripcion VARCHAR(250) , dPrdFecInic DATE , dPrdFecFin DATE, nPrdTipo INT(11))
BEGIN

	UPDATE periodo SET
		periodo.cPrdDescripcion = cPrdDescripcion,
		periodo.dPrdFecInic     = dPrdFecInic,
		periodo.dPrdFecFin      = dPrdFecFin,
		periodo.nPrdTipo        = nPrdTipo
	WHERE periodo.nPrdCodigo = nPrdCodigo;
	-- esto para que el metodo de conexion no duelva error cuando se trabaja con transacciones
	SELECT "Ok" AS cMensaje ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_Periodo_Estado
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_Periodo_Estado`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_Periodo_Estado`(nPrdCodigo INT(11), nPrdEstado INT(4))
BEGIN
	UPDATE periodo SET
		periodo.nPrdEstado = nPrdEstado
	WHERE periodo.nPrdCodigo = nPrdCodigo;
	SELECT "ok" AS cMensaje ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_Persona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_Persona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_Persona`(cPerCodigo varchar(20), cPerNombre varchar(500), cPerApellidos varchar(500), dPerNacimiento varchar(20), nPerTipo int(3), nPerEstado int(3))
BEGIN

	UPDATE persona
	SET persona.cPerNombre		=	cPerNombre,
			persona.cPerApellidos	=	cPerApellidos,
			persona.dPerNacimiento=	dPerNacimiento ,
			persona.nPerTipo			= nPerTipo,
			persona.nPerEstado		= nPerEstado
	WHERE persona.cPerCodigo	=  cPerCodigo;

	SELECT cPerCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_Parametro`(nParClase int(11), cParNombre varchar(100), cParDescripcion varchar(500))
BEGIN

		SELECT 	parametro.nParCodigo,
						parametro.cParNombre,
						cParDescripcion
		FROM parametro
		WHERE parametro.nParEstado = 1
		AND	parametro.nParClase = nParClase
		AND ( ( cParNombre 			= "-" ) OR ( parametro.cParNombre 			= cParNombre ) )
		AND	( ( cParDescripcion = "-" ) OR ( parametro.cParDescripcion 	= cParDescripcion ) );

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_Periodo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_Periodo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_Periodo`(nPrdCodigo int(11) , cPrdDescripcion varchar(150) , dPrdFecInic varchar(20) , dPrdFecFin varchar(20))
BEGIN

	SELECT
				periodo.nPrdCodigo ,
				periodo.cPrdDescripcion ,
				periodo.dPrdFecInic ,
				periodo.dPrdFecFin,
				periodo.nPrdEstado
	FROM periodo
	WHERE ((nPrdCodigo = 0 ) OR ( periodo.nPrdCodigo = nPrdCodigo ))
		AND ((cPrdDescripcion = '-' ) OR ( periodo.cPrdDescripcion = cPrdDescripcion ))
		AND ((dPrdFecInic = '-' ) OR ( periodo.dPrdFecInic = dPrdFecInic ))
		AND ((dPrdFecFin = '-' ) OR ( periodo.dPrdFecFin = dPrdFecFin ))
 ;
-- nPrdCodigo , cPrdDescripcion , dPrdFecInic , dPrdFecFin
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_Periodo_by_Fecha
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_Periodo_by_Fecha`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_Periodo_by_Fecha`(dPrdFecha DATE , nPrdTipo INT(4))
BEGIN

	SELECT
				periodo.nPrdCodigo ,
				periodo.cPrdDescripcion ,
				periodo.dPrdFecInic ,
				periodo.dPrdFecFin ,
				periodo.nPrdEstado
				FROM periodo
	WHERE dPrdFecha  BETWEEN periodo.dPrdFecInic AND periodo.dPrdFecFin
	AND periodo.nPrdTipo = nPrdTipo
	AND nPrdEstado IN( 1 , 2) ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_Persona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_Persona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_Persona`(cPerCodigo varchar(20) ,cPerNombres varchar(500), cPerApellidos varchar(500))
BEGIN

		SELECT 	persona.cPerCodigo,
						persona.cPerNombre,
						persona.cPerApellidos,
						persona.dPerNacimiento
		FROM persona
		WHERE persona.nPerEstado = 1
		AND ( ( cPerCodigo		= "-" ) OR ( persona.cPerCodigo 		= cPerCodigo 	) )
		AND ( ( cPerNombres		= "-" ) OR ( TRIM(persona.cPerNombre) 		= TRIM(cPerNombres) 	) )
		AND	( ( cPerApellidos	=	"-" ) OR ( TRIM(persona.cPerApellidos) 	= TRIM(cPerApellidos) ) );

END
;;
DELIMITER ;
