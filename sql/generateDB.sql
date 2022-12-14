-- TODO: make this script wipe all tables in case we want to fully redo DB?

CREATE TABLE IF NOT EXISTS `u413142534_project8`.`users` (`userID` INT NOT NULL AUTO_INCREMENT, `username` VARCHAR(25) NOT NULL, `name_first` VARCHAR(30) NOT NULL, `name_last` VARCHAR(30) NOT NULL, `password` VARCHAR(30) NOT NULL, `isAdmin` BOOLEAN NULL DEFAULT 0, PRIMARY KEY(`userID`));

CREATE TABLE IF NOT EXISTS `u413142534_project8`.`questions` (`questionID` INT NOT NULL AUTO_INCREMENT, `question` VARCHAR(200) NOT NULL, `questionType` VARCHAR(50) NOT NULL, `answer1` VARCHAR(50) NULL, `answer2` VARCHAR(50) NULL, `answer3` VARCHAR(50) NULL, `answer4` VARCHAR(50) NULL, `isSaved` BOOLEAN NULL DEFAULT 0, PRIMARY KEY(`questionID`));

CREATE TABLE IF NOT EXISTS `u413142534_project8`.`responses` (`responseID` INT NOT NULL AUTO_INCREMENT, `groupID` INT NOT NULL, `questionID` INT NOT NULL, `question` VARCHAR(200) NOT NULL, `answerName` VARCHAR(50) NULL, `answerNum` INT NULL, PRIMARY KEY(`responseID`));

CREATE TABLE IF NOT EXISTS `u413142534_project8`.`studentGroups` (`groupID` INT NOT NULL AUTO_INCREMENT, `roomGroupID` INT NOT NULL, `student1` VARCHAR(100) NULL, `student2` VARCHAR(100) NULL, `student3` VARCHAR(100) NULL, `student4` VARCHAR(100) NULL, PRIMARY KEY(`groupID`));

CREATE TABLE IF NOT EXISTS `u413142534_project8`.`rooms` (`roomID` INT NOT NULL AUTO_INCREMENT, `roomName` VARCHAR(30) NULL, `groupID` INT NOT NULL, PRIMARY KEY(`roomID`));