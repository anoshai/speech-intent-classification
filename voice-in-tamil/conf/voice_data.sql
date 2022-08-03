CREATE DATABASE IF NOT EXISTS voice_data;
USE voice_data;

CREATE TABLE IF NOT EXISTS voice_provider(
  id BIGINT(20) NOT NULL AUTO_INCREMENT,
  username VARCHAR(255),
  gender ENUM('Male', 'Female'),
  age INT(100),
  selected_symptom VARCHAR(255),
  selected_description VARCHAR(255),
  voice_file_name VARCHAR(255),
  PRIMARY KEY (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='voice_provider';
