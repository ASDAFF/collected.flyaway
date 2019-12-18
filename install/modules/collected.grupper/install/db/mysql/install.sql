CREATE TABLE IF NOT EXISTS b_collected_grupper_groups
(
	ID int(11) NOT NULL AUTO_INCREMENT,
	XML_ID varchar(255) NULL,
	CODE varchar(255) NULL,
	NAME varchar(255) NOT NULL,
	SORT int(18) NOT NULL DEFAULT 500,
	ICON_PATH varchar(500) NULL,
	PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS b_collected_grupper_binds
(
	ID int(11) NOT NULL AUTO_INCREMENT,
	IBLOCK_PROPERTY_ID int(11) NOT NULL,
	GROUP_ID int(18) NOT NULL,
	PRIMARY KEY (ID)
);