CREATE TABLE IF NOT EXISTS b_collected_daysarticle2_two
(
	ID int(11) NOT NULL AUTO_INCREMENT,
	ELEMENT_ID varchar(255) NULL,
	FOR_OFFERS varchar(10) DEFAULT "N",
	DISCOUNT_ID_ARRAY TEXT,
	ACTIVE CHAR(1) DEFAULT 'Y' NOT NULL,
	DATE_FROM datetime,
	DATE_TO datetime,
	DISCOUNT int(11) DEFAULT NULL,
	VALUE_TYPE CHAR(1) DEFAULT 'F' NOT NULL,
	CURRENCY CHAR(3) NOT NULL,
	QUANTITY int(11) DEFAULT NULL,
	AUTO_RENEWAL CHAR(1) DEFAULT 'N' NOT NULL,
	DINAMICA varchar(255) NULL,
	DINAMICA_DATA text,
	PRIMARY KEY (ID)
);