#
# Table structure for table 'tt_address'
#
CREATE TABLE tt_address (

  token varchar(36) DEFAULT '' NOT NULL,
  is_email_verified int(11) DEFAULT '0' NOT NULL,
  is_newsletter_active int(11) DEFAULT '0' NOT NULL

);
