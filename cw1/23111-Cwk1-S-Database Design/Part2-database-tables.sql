CREATE TABLE IF NOT EXISTS `section` (
	`course_id` varchar(200) NOT NULL,
	`sec_id` int(10) NOT NULL,
	`semester` varchar(200) NOT NULL,
	`year` int(10) NOT NULL,
	`building` varchar(200) NOT NULL,
	`room_no` int(10) NOT NULL,
	`time_slot_id` varchar(200) NOT NULL,
	PRIMARY KEY (`sec_id`,`course_id`,`semester`,`year`))
ENGINE = InnoDB 
DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `classroom` (
	`building` varchar(200) NOT NULL,
	`room_no` int(10) NOT NULL,
	`capacity` int(10) NOT NULL,
	PRIMARY KEY (`building`,`room_no`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `takes` (
	`ID` int(10) NOT NULL,
	`course_id` varchar(200) NOT NULL,
	`sec_id` int(10) NOT NULL,
	`semester` varchar(200) NOT NULL,
	`year` int(10) NOT NULL,
	`grade` varchar(200),
	PRIMARY KEY (`ID`,`course_id`,`sec_id`,`semester`,`year`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `time_slot` (
	`time_slot_id` varchar(200) NOT NULL,
	`day` varchar(200) NOT NULL,
	`start_hour` int(10) NOT NULL,
	`start_min` int(10) NOT NULL,
	`end_hour` int(10) NOT NULL,
	`end_min` int(10) NOT NULL,
	PRIMARY KEY (`time_slot_id`,`day`,`start_hour`,`start_min`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `teaches` (
	`ID` int(10) NOT NULL,
	`course_id` varchar(200) NOT NULL,
	`sec_id` int(10) NOT NULL,
	`semester` varchar(200) NOT NULL,
	`year` int(10) NOT NULL,
	PRIMARY KEY (`course_id`,`sec_id`, `semester`, `year`))
ENGINE = InnoDB 
DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `course` (
	`course_id` varchar(200) NOT NULL,
	`title` varchar(200) NOT NULL,
	`dept_name` varchar(200) NOT NULL,
	`credits` int(10) NOT NULL,
	FOREIGN KEY (`dept_name`) references department(`dept_name`),
	PRIMARY KEY (`course_id`))
ENGINE = InnoDB 
DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `prereq` (
	`course_id` varchar(200) NOT NULL,
	`prereq_id` varchar(200) NOT NULL,
	FOREIGN KEY (`course_id`) references course(`course_id`),
	PRIMARY KEY (`course_id`,`prereq_id`))
ENGINE = InnoDB 
DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `student` (
	`ID` int(10) NOT NULL,
	`name` varchar(200) NOT NULL,
	`dept_name` varchar(200) NOT NULL,
	`tot_cred` int(10) NOT NULL,
	FOREIGN KEY (`dept_name`) references department(`dept_name`),
	PRIMARY KEY (`ID`))
ENGINE = InnoDB 
DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `instructor` (
	`ID` int(10) NOT NULL,
	`name` varchar(200) NOT NULL,
	`dept_name` varchar(200) NOT NULL,
	`salary` int(10) NOT NULL,
	FOREIGN KEY (`dept_name`) references department(`dept_name`),
	PRIMARY KEY (`ID`))
ENGINE = InnoDB 
DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `department` (
	`dept_name` varchar(200) NOT NULL,
	`building` varchar(200) NOT NULL,
	`budget` int(10) NOT NULL,
	PRIMARY KEY (`dept_name`))
ENGINE = InnoDB 
DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `advisor` (
	`s_id` int(10) NOT NULL,
	`i_id` int(10) NOT NULL,
	FOREIGN KEY (`s_id`) references student (`ID`),
	FOREIGN KEY (`i_id`) references instructor (`ID`),
	PRIMARY KEY (`s_id`, `i_id`))
ENGINE = InnoDB 
DEFAULT CHARACTER SET = utf8;