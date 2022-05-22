CREATE TABLE `token` (
  `ID` BIGINT(255),
  `user_id` INT(255),
  `token` TEXT(64),
  `validator` TEXT(64),
  PRIMARY KEY (`ID`),
  FOREIGN KEY (user_id) REFERENCES users (ID)
);

CREATE TABLE `departments` (
  `ID` BIGINT(255),
  `name` VARCHAR(64),
  `description` VARCHAR(255),
  PRIMARY KEY (`ID`)
);

CREATE TABLE `doctors` (
  `ID` BIGINT(255),
  `user_id` Type,
  `depatment_id` INT(255),
  `medical_code` INT(255),
  `education_degree` TEXT(32),
  `university` TEXT(32),
  `experience` VARCHAR(255),
  `Start_working_hours` TIME,
  `end_of_working_hours` TIME,
  `address` TEXT(150),
  `phone_number` INT(32),
  `social_media` VARCHAR(255),
  `authentication` BOOLEAN,
  PRIMARY KEY (`ID`),
  FOREIGN KEY (user_id) REFERENCES users (ID),
  FOREIGN KEY (`depatment_id`) REFERENCES `departments`(`ID`)
);

CREATE TABLE `users` (
  `ID` BIGINT(255),
  `username` VARCHAR(32),
  `role` VARCHAR(32),
  `name` VARCHAR(32),
  `nickname` VARCHAR(32),
  `email` VARCHAR(320),
  `mobile_number` INT(11),
  `about` VARCHAR(150),
  `password` VARCHAR(64),
  `register_date` TIMESTAMP,
  `last_login` TIMESTAMP,
  PRIMARY KEY (`ID`)
);

CREATE TABLE `profile_pics` (
  `ID` BIGINT(255),
  `user_id` INT(255),
  `address` VARCHAR(255),
  `date` TIMESTAMP,
  PRIMARY KEY (`ID`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`ID`)
);

