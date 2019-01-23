
/* create tables for users -- 1397-10-27 */

CREATE TABLE IF NOT EXISTS sw_d_users (
  user_id INT AUTO_INCREMENT,
  role_id TINYINT NOT NULL,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  date_created DATETIME NOT NULL,
  date_modified DATETIME NOT NULL,
  status TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (user_id)
);

CREATE TABLE IF NOT EXISTS sw_d_users_description (
  user_desc_id INT AUTO_INCREMENT,
  user_id INT NOT NULL,
  language_id TINYINT NOT NULL,
  name VARCHAR(255) NOT NULL,
  date_created DATETIME NOT NULL,
  date_modified DATETIME NOT NULL,
  PRIMARY KEY (user_desc_id)
);

CREATE TABLE IF NOT EXISTS sw_d_users_role (
  user_role_id INT NOT NULL,
  name VARCHAR(255) NOT NULL,
  date_created DATETIME NOT NULL,
  date_modified DATETIME NOT NULL,
  PRIMARY KEY (user_role_id)
);

/* #end create tables for users */

/* create tables for request fighter -- 1397-10-28 */

CREATE TABLE IF NOT EXISTS sw_d_war_request_fight (
  requester_id INT NOT NULL,
  requested_id INT NOT NULL,
  date_request DATETIME NOT NULL,
  canceler_id INT,
  date_cancel DATETIME,
  status TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (requester_id,requested_id)
);

/* #end create tables for request fighter */
