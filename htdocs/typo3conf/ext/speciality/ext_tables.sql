#
# Table structure for table 'tt_address'
#
CREATE TABLE tt_address (

  token varchar(36) DEFAULT '' NOT NULL,
  is_email_verified int(11) DEFAULT '0' NOT NULL,
  is_newsletter_active int(11) DEFAULT '0' NOT NULL

);
#
# Table structure for table 'tx_speciality_member'
#
CREATE TABLE tx_speciality_member (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
  deleted tinyint(3) unsigned DEFAULT '0' NOT NULL,


	first_name tinytext NOT NULL,
	last_name tinytext NOT NULL,
	gender text,
	country tinytext NOT NULL,
	city tinytext NOT NULL,
	phone tinytext,
	mobile_phone tinytext NOT NULL,
	email tinytext NOT NULL,
	organisation tinytext,
	address tinytext,
	occupation tinytext NOT NULL,
	member tinytext,

  token varchar(36) DEFAULT '' NOT NULL,
  is_email_verified int(11) DEFAULT '0' NOT NULL,
  is_member_active int(11) DEFAULT '0' NOT NULL
	PRIMARY KEY (uid),
	KEY parent (pid)
);