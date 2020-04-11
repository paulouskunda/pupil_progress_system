-- Type of data dealing with.
	-- Pupil data
		-- pupil name
		-- date of birth
		-- parent id
		-- grade
		-- year started

	-- Parent/Guardians  data
		-- parent name
		-- phone number
		-- address

	-- Teacher data
		-- teacher name
		-- phone number
		-- address
		-- teacher grade

--- important inform
 	-- Teacher will require a login screen



-- Structure of the database
	
create table pupil (

	`pupilID` int(11) NOT NULL AUTO_INCREMENT,
	`pupilName` varchar(50) NOT NULL,
	`parentID` int(11) NOT NULL,
	`dateOfBirth` varchar(10) NOT NULL,
	`grade` int(11) NOT NULL,
	`yearStarted` varchar(20) NOT NULL,
	`dateModified` date NULL,
	`activeStatus` varchar(10) DEFAULT 'active',

	PRIMARY KEY (`pupilID`)

);


create table teacher (
	`teacherID` int(11) NOT NULL AUTO_INCREMENT,
	`teacherName` varchar(50) NOT NULL,
	`phoneNumber` varchar(20) NOT NULL,
	`address` varchar(20) NOT NULL,
	`password` varchar(100) NOT NULL,
	`dateCreated` varchar(100) NOT NULL,

	PRIMARY KEY (`teacherID`)
);

create table admin(
	`adminID` int(11) NOT NULL AUTO_INCREMENT,
	`adminUserName` varchar(50) NOT NULL,
	`password` varchar(100) NOT NULL,
	`dateCreated` varchar(100) NOT NULL,

	PRIMARY KEY (`adminID`)
);

create table parent(
	`parentID` int(11) NOT NULL AUTO_INCREMENT,
	`parentName` varchar(50) NOT NULL,
	`phoneNumber` varchar(20) NOT NULL,
	`address` varchar(20) NOT NULL,
	`dateCreated` varchar(100) NOT NULL,

	PRIMARY KEY (`parentID`)
);

create table reasons(
	`reasonID` int(11) NOT NULL AUTO_INCREMENT,
	`pupilID` int(11) NOT NULL,
	`reason` varchar(50) NOT NULL,
	`reasonDetails` text NOT NULL,

	PRIMARY KEY (`reasonID`)

);

create table tracking (
	`trackingID` int(11) NOT NULL AUTO_INCREMENT,
	`pupilID` int(11) NOT NULL,
	`grade` int(11) NOT NULL,
	`dateModified` date NOT NULL,

	PRIMARY KEY (`trackingID`)
);


-- File Structure
	-- App Root	
		-- admin
			-- addTeacher.php
			-- reports.php
			-- index.php
		-- teacher
			-- view.php (The teacher has to select a grade to view, right?)
			-- move.php
			-- activeStatus.php

		-- index.php


-- Move logic (core functionality)
	-- in theory (get the all the ids and query them.)

